<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $logs = Log::where('action', 'like', '%' . $search . '%')->get();
        } else {
            $logs = Log::all();
        }

        return view('pages.logs.index', compact('logs'));
    }
}
