<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class DashboardController
{
    public function dashboard()
    {
        $patients = Patient::latest()->get();

        return view('dashboard', compact('patients'));
    }
}