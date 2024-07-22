<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuelConsumptionRequest;
use App\Models\FuelConsumption;
use App\Models\Vehicle;
use App\Services\LogService;
use Illuminate\Http\Request;

class FuelConsumptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $fuelConsumptions = FuelConsumption::whereHas('vehicle', function ($query) use ($search) {
                $query
                    ->where('brand', 'like', '%' . $search . '%')
                    ->orWhere('model', 'like', '%' . $search . '%')
                    ->orWhereRaw("CONCAT(brand, ' ', model) LIKE ?", ['%' . $search . '%']);
            })->get();
        } else {
            $fuelConsumptions = FuelConsumption::with('vehicle')->get();
        }

        $vehicles = Vehicle::all();

        return view('pages.fuel-consumptions.index', compact('fuelConsumptions', 'vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FuelConsumptionRequest $request)
    {
        $fuelConsumption = FuelConsumption::create($request->validated());

        LogService::record("Menambahkan laporan konsumsi BBM kendaraan {$fuelConsumption->vehicle->brand} {$fuelConsumption->vehicle->model} ({$fuelConsumption->vehicle->number_plate})");

        return redirect()->route('fuel-consumptions.index')->with('success', 'Laporan konsumsi BBM berhasil ditambahkan.');
    }
}
