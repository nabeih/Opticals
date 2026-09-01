<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Patient_session;
use Illuminate\Http\Request;

class PatientController
{
    public function patient(Request $request)
    {
        // $patient = Patient::find((int) $request->query('id')) ?? Patient::first();

        // if (!$patient) {
        //     abort(404, 'المريض غير موجود');
        // }
        $patient = Patient::with('Patient_session')->find((int) $request->query('id')) ?? Patient::first();

        return view('patient', compact('patient'));
    }

    public function show($id)
    {
        $patient = Patient::with('Patient_session')->findOrFail($id);
        return view('patient', compact('patient'));
    }
}
