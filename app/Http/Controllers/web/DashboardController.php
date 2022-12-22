<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->type === 'biker') {
            return view('biker_dashboard');
        }
        return view('sender_dashboard');
    }
}
