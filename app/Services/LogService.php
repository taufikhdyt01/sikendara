<?php

namespace App\Services;

use App\Models\Log;
use Illuminate\Support\Facades\Auth;
class LogService
{
    public static function record($action)
    {
        Log::create([
            'action' => $action,
            'user_id' => Auth::id(),
        ]);
    }
}
