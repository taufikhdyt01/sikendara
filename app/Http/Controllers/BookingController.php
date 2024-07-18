<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Approval;
use App\Models\Booking;
use App\Models\Driver;
use App\Models\Mine;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
