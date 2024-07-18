<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $vehicles = Vehicle::where(function ($query) use ($search) {
                $query
                    ->where('brand', 'like', '%' . $search . '%')
                    ->orWhere('model', 'like', '%' . $search . '%')
                    ->orWhere(function ($query) use ($search) {
                        $keywords = explode(' ', $search);
                        foreach ($keywords as $keyword) {
                            $query->where('brand', 'like', '%' . $keyword . '%')->orWhere('model', 'like', '%' . $keyword . '%');
                        }
                    });
            })->get();
        } else {
            $vehicles = Vehicle::all();
        }

        foreach ($vehicles as $vehicle) {
            $lastService = $vehicle->services()->orderBy('service_date', 'desc')->first();
            $vehicle->nextServiceDate = $lastService
                ? Carbon::parse($lastService->service_date)
                    ->addMonth()
                    ->format('Y-m-d')
                : null;
            $vehicle->approvedBookings = $vehicle->bookings()->where('status', 'approved')->get();
        }

        return view('pages.vehicles.index', compact('vehicles'));
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
    public function store(VehicleRequest $request)
    {
        Vehicle::create([
            'brand' => $request->brand,
            'model' => $request->model,
            'number_plate' => $request->number_plate,
            'type' => $request->type,
            'owned_by' => $request->owned_by,
            'status' => 'available',
        ]);

        return redirect()->route('vehicles.index')->with('success', 'Kendaraan berhasil ditambahkan.');
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
}
