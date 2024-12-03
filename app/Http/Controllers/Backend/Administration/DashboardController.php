<?php

namespace App\Http\Controllers\Backend\Administration;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.administrations.dashboard');
    }
}