<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Models\Vehicle;
use App\Services\LogService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $services = Service::whereHas('vehicle', function ($query) use ($search) {
                $query
                    ->where('brand', 'like', '%' . $search . '%')
                    ->orWhere('model', 'like', '%' . $search . '%')
                    ->orWhereRaw("CONCAT(brand, ' ', model) LIKE ?", ['%' . $search . '%']);
            })->get();
        } else {
            $services = Service::with('vehicle')->get();
        }

        $vehicles = Vehicle::all();

        return view('pages.services.index', compact('services', 'vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        $service = Service::create($request->validated());

        LogService::record("Menambahkan laporan service {$service->vehicle->brand} {$service->vehicle->model} ({$service->vehicle->number_plate})");

        return redirect()->route('services.index')->with('success', 'Laporan service berhasil ditambahkan.');
    }
}
