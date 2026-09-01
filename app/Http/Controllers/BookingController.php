<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class BookingController
{
    public function index()
    {
        return view('booking');
    }

    public function store(Request $request)
    {
        //fullname
        // phone
        // age
        // address
        // preferred_date
        // complaint_type
        // complaint_description
        // notes
        // pathfile
        // dd($request->all());

        $validated = $request->validate(
            [
                'fullname' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'digits_between:10,13'],
                'age' => ['nullable', 'integer', 'min:1'],
                'address' => ['nullable', 'string', 'max:255'],

                'preferred_date' => ['nullable', 'date'],

                'complaint_type' => ['required', 'in:فحص شامل,استشارة,عملية'],
                'complaint_description' => ['nullable', 'string'],
                'pathfile' => ['nullable', 'file', 'mimes:jpeg,png,pdf,doc,docx', 'max:2048'],

                'notes' => ['nullable', 'string'],

            ],
            [
                'fullname.required' => 'الرجاء إدخال الاسم الكامل.',
                'phone.required' => 'الرجاء إدخال رقم الهاتف.',
                'phone.digits_between' => 'رقم الهاتف يجب أن يكون بين 10 و 13 رقمًا.',
                'age.integer' => 'العمر يجب أن يكون رقمًا صحيحًا.',
                'age.min' => 'العمر يجب أن يكون على الأقل 1 سنة.',
                'address.max' => 'العنوان يجب ألا يتجاوز 255 حرفًا.',
                'preferred_date.date' => 'التاريخ المفضل يجب أن يكون تاريخًا صالحًا.',
                'complaint_type.required' => 'الرجاء اختيار نوع الشكوى.',
                'complaint_type.in' => 'نوع الشكوى غير صالح.',
                'pathfile.file' => 'الملف المرفق يجب أن يكون ملفًا صالحًا.',
                'pathfile.mimes' => 'الملف المرفق يجب أن يكون من نوع: jpeg, png, pdf, doc, docx.',
                'pathfile.max' => 'حجم الملف المرفق يجب ألا يتجاوز 2 ميغابايت.',
            ]
        );
        Patient::create($validated);

        return redirect()->route('booking.index')->with('success', 'تم استلام طلبك بنجاح! سيتم التواصل معك قريباً لتأكيد الموعد.');
    }
}
