<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Patient_session; // تأكد من استدعاء الموديل بالشكل الصحيح لتجنب أخطاء المحرر
use App\Models\Patient;         // (اختياري) إذا أردت جلب بيانات المريض وعرضها في صفحة الإضافة

class PatientSessionController extends Controller
{
    // دالة العرض: استقبال الid من الـ Route مباشرة وإرساله للـ View
    public function create($id)
    {
        // يمكنك هنا جلب بيانات المريض لتعرض اسمه في صفحة إضافة الجلسة (اختياري وحلو كثير)
        $patient = Patient::findOrFail($id);

        return view('addnewsesstion', compact('patient'));
        // أو إذا أردت إرسال الـ id فقط: return view('addnewsesstion', compact('id'));
    }

    // دالة التخزين: استقبال وحفظ بيانات الجلسة مع ربطها بمعرف المريض
    public function store(Request $request)
    {
        // التحقق من صحة البيانات قبل حفظها (أمر أساسي ومهم بحماية لارافل)
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'session_date' => 'required|date',
            'session_type' => 'required|string',
            'medical_report' => 'required|string',
        ]);

        // حفظ البيانات في قاعدة البيانات

        Patient_session::create([
            'patient_id' => $request->patient_id, // يأتي من الحقل المخفي في الفورم
            'session_date' => $request->session_date,
            'session_type' => $request->session_type,
            'diagnosis' => $request->diagnosis,
            'medical_report' => $request->medical_report,
            'treatment' => $request->treatment,
            'next_appointment' => $request->next_appointment,
            'notes' => $request->notes,
        ]);

        // بعد الحفظ، الأفضل إرجاعه إلى صفحة تفاصيل المريض نفسها بدلاً من صفحة فارغة
        return redirect()->route('patients.show', $request->patient_id)
            ->with('success', 'تم حفظ الجلسة بنجاح');
    }
}
