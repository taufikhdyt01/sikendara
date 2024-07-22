<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Services\LogService;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $drivers = Driver::where('name', 'like', '%' . $search . '%')->get();
        } else {
            $drivers = Driver::all();
        }

        return view('pages.drivers.index', compact('drivers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $driver = Driver::create([
            'name' => $request->name,
            'status' => 'available',
        ]);

        LogService::record("Menambahkan driver baru {$driver->name}");

        return redirect()->route('drivers.index')->with('success', 'Driver berhasil ditambahkan.');
    }
}
