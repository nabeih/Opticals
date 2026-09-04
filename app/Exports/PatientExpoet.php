<?php

namespace App\Exports;

use App\Models\Patient;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PatientExpoet implements FromCollection, WithHeadings
{
    public function collection(): Collection
    {
        return Patient::select('id', 'fullname', 'age', 'Phone', 'address', 'preferred_date', 'complaint_type', 'complaint_description', 'status', 'notes', 'created_at')->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'fullname',
            'age',
            'Phone',
            'address',
            'preferred_date',
            'complaint_type',
            'complaint_description',
            'status',
            'notes',
            'created_at',

        ];
    }
}
