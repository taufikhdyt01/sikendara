<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Booking;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $monthlyUsage = $this->getMonthlyUsage();
        $totalUsage = Booking::where('status', 'approved')->count();

        return view('pages.dashboard', compact('monthlyUsage', 'totalUsage'));
    }

    private function getMonthlyUsage()
    {
        $usage = [];
        $currentYear = Carbon::now()->year;

        for ($month = 1; $month <= 12; $month++) {
            $startOfMonth = Carbon::create($currentYear, $month, 1)->startOfMonth();
            $endOfMonth = Carbon::create($currentYear, $month, 1)->endOfMonth();

            $usage[$month] = Booking::where('status', 'approved')
                ->whereBetween('start_date', [$startOfMonth, $endOfMonth])
                ->count();
        }

        return $usage;
    }
}