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

    // public function updateStatus(Request $request, $id)
    // {
    //     try {
    //         $patient = Patient::findOrFail($id);
    //         $patient->status = $request->input('status');
    //         $patient->save();

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'تم التحديث بنجاح'
    //         ]);
    //     } catch (\Throwable $e) {
    //         // سيقوم هذا السطر بإجبار لارافل على طباعة الخطأ الحقيقي مباشرة على الشاشة
    //         return response()->json([
    //             'success' => false,
    //             'error' => $e->getMessage(),
    //             'line' => $e->getLine(),
    //             'file' => $e->getFile()
    //         ], 500);
    //     }
    // }
    public function updateStatus(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);

        $patient->update([
            'status' => $request->status
        ]);

        return response()->json([
            'success' => true,
            'message' => 'تم تحديث الحالة بنجاح'
        ]);
    }

    public function exportpatients() {
        
    }
}
