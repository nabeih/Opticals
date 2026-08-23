<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController
{
    public function patient(Request $request)
    {
        $patient = Patient::find((int) $request->query('id')) ?? Patient::first();

        if (! $patient) {
            abort(404, 'المريض غير موجود');
        }

        return view('patient', compact('patient'));
    }
}
