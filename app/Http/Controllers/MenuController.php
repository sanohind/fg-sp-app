<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller
{
    /**
     * Show the main menu page
     */
    public function index()
    {
        Log::info('User accessed main menu', [
            'timestamp' => now()
        ]);

        return view('menu.index');
    }
}
