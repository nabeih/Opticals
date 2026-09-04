<?php

namespace App\Http\Controllers;

use App\Exports\PatientExpoet;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PatientExport
{
    public function exportExcel()
    {
        return Excel::download(new PatientExpoet, 'patient.xlsx');
    }
}
