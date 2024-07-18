<?php

namespace App\Http\Controllers;

use App\Exports\BookingsExport;
use App\Http\Requests\BookingRequest;
use App\Models\Approval;
use App\Models\Booking;
use App\Models\Driver;
use App\Models\Mine;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $bookings = Booking::whereHas('vehicle', function ($query) use ($search) {
                $query
                    ->where('brand', 'like', '%' . $search . '%')
                    ->orWhere('model', 'like', '%' . $search . '%')
                    ->orWhereRaw("CONCAT(brand, ' ', model) LIKE ?", ['%' . $search . '%']);
            })->get();
        } else {
            $bookings = Booking::with('vehicle')->get();
        }

        $vehicles = Vehicle::all();
        $drivers = Driver::all();
        $mines = Mine::all();
        $approvers = User::where('role', 'approver')->get();

        return view('pages.bookings.index', compact('bookings', 'vehicles', 'drivers', 'mines', 'approvers'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookingRequest $request)
    {
        DB::transaction(function () use ($request) {
            $booking = Booking::create([
                'driver_id' => $request->driver,
                'vehicle_id' => $request->vehicle,
                'mine_id' => $request->mine,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => 'pending',
            ]);

            $approvers = $request->approvers;
            $level = 1;
            foreach ($approvers as $approverId) {
                $status = $level == 1 ? 'process' : 'pending';
                Approval::create([
                    'booking_id' => $booking->id,
                    'user_id' => $approverId,
                    'level' => $level,
                    'status' => $status,
                ]);
                $level++;
            }
        });

        return redirect()->route('bookings.index')->with('success', 'Booking berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function approve(Request $request, Booking $booking)
    {
        if (!auth()->user()->canApprove($booking)) {
            abort(403, 'Unauthorized action.');
        }

        $approval = $booking->approvals()->where('user_id', auth()->id())->first();

        $approval->update(['status' => 'approved']);

        $higherApprovals = Approval::where('booking_id', $booking->id)
            ->where('level', '>', $approval->level)
            ->get();

        foreach ($higherApprovals as $higherApproval) {
            if ($higherApproval->level == $approval->level + 1) {
                $higherApproval->update(['status' => 'process']);
            }
        }

        if ($higherApprovals->isEmpty()) {
            $booking->update(['status' => 'approved']);

            $driver = Driver::findOrFail($booking->driver_id);
            $driver->update(['status' => 'assigned']);

            $vehicle = Vehicle::findOrFail($booking->vehicle_id);
            $vehicle->update(['status' => 'in use']);
        }

        return redirect()->back()->with('success', 'Booking telah disetujui.');
    }

    public function reject(Request $request, Booking $booking)
    {
        if (!auth()->user()->canApprove($booking)) {
            abort(403, 'Unauthorized action.');
        }

        $approval = $booking->approvals()->where('user_id', auth()->id())->first();

        $approval->update(['status' => 'rejected']);

        $booking->update(['status' => 'rejected']);

        return redirect()->back()->with('success', 'Booking telah ditolak.');
    }

    public function export(Request $request)
{
    // Ambil data berdasarkan bulan dan tahun
    $bookings = Booking::whereMonth('created_at', $request->input('export-month'))
                       ->whereYear('created_at', $request->input('export-year'))
                       ->get();

    // Buat spreadsheet baru
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set header kolom
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Brand');
    $sheet->setCellValue('C1', 'Model');
    $sheet->setCellValue('D1', 'Number Plate');
    $sheet->setCellValue('E1', 'Type');
    $sheet->setCellValue('F1', 'Owned By');
    $sheet->setCellValue('G1', 'Driver');
    $sheet->setCellValue('H1', 'Mine');
    $sheet->setCellValue('I1', 'Region');
    $sheet->setCellValue('J1', 'Start Date');
    $sheet->setCellValue('K1', 'End Date');
    $sheet->setCellValue('L1', 'Status');
    $sheet->setCellValue('M1', 'Created At');

    // Isi data
    $row = 2;
    foreach ($bookings as $booking) {
        $sheet->setCellValue('A' . $row, $booking->id);
        $sheet->setCellValue('B' . $row, $booking->vehicle->brand);
        $sheet->setCellValue('C' . $row, $booking->vehicle->model);
        $sheet->setCellValue('D' . $row, $booking->vehicle->number_plate);
        $sheet->setCellValue('E' . $row, $booking->vehicle->type);
        $sheet->setCellValue('F' . $row, $booking->vehicle->owned_by);
        $sheet->setCellValue('G' . $row, $booking->driver->name);
        $sheet->setCellValue('H' . $row, $booking->mine->name);
        $sheet->setCellValue('I' . $row, $booking->mine->region);
        $sheet->setCellValue('J' . $row, $booking->start_date);
        $sheet->setCellValue('K' . $row, $booking->end_date);
        $sheet->setCellValue('L' . $row, $booking->status);
        $sheet->setCellValue('M' . $row, $booking->created_at->format('Y-m-d H:i:s'));
        $row++;
    }

    // Konfigurasi response untuk download
    $filename = 'bookings_export_' . now()->format('YmdHis') . '.xlsx';

    $writer = new Xlsx($spreadsheet);
    $writer->save(storage_path('exports/' . $filename));

    return response()->download(storage_path('exports/' . $filename))->deleteFileAfterSend();
}
}
