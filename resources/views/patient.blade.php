@extends('layout.home')
@section('title', 'تفاصيل المريض - د. محمد محمود مسلّم')
@section('contact')
<div id="page-patient-detail" class="page active">

    <section class="patient-detail-page">
        <div class="container">

            <div class="back-link no-print" onclick="showPage('dashboard')">← العودة للوحة التحكم</div>

            <!-- بطاقة المريض -->
            <div class="patient-card">
                <div class="info-item">
                    <span class="label">الاسم الكامل</span>
                    <span class="value">{{ $patient->fullname }}</span>
                </div>
                <div class="info-item">
                    <span class="label">رقم الجوال</span>
                    <span class="value">{{ $patient->phone }}</span>
                </div>
                <div class="info-item">
                    <span class="label">العمر</span>
                    <span class="value">{{ $patient->age }} سنة</span>
                </div>
                <div class="info-item">
                    <span class="label">العنوان</span>
                    <span class="value">{{ $patient->address ?? '—' }}</span>
                </div>
                <div class="info-item">
                    <span class="label">التاريخ المناسب</span>
                    <span class="value">{{ optional($patient->preferred_date)->format('d-m-Y') ?: '—' }}</span>
                </div>
                <div class="info-item">
                    <span class="label">نوع الشكوى / الزيارة</span>
                    <span class="value"><span
                            class="status-badge status-new">{{ $patient->complaint_type }}</span></span>
                </div>
                <div class="info-item full-width">
                    <span class="label">ملاحظات إضافية</span>
                    <span class="value">{{ $patient->notes ?: 'لا توجد ملاحظات' }}</span>
                </div>
                <div class="info-item full-width">
                    <span class="label">تاريخ التسجيل</span>
                    <span class="value">{{ optional($patient->created_at)->format('d-m-Y H:i') }}</span>
                </div>

                <!-- ✅ حقل التقرير الطبي -->
                <div class="info-item full-width"
                    style="grid-column: 1 / -1; border-top: 2px dashed var(--border-color); padding-top: 16px; margin-top: 8px;">
                    <span class="label" style="font-size: 14px; color: var(--primary-teal); font-weight: 700;">
                        📋 التقرير الطبي للمريض
                    </span>
                    <div style="display: flex; flex-direction: column; gap: 8px; width: 100%;">
                        <textarea id="medicalReport" rows="4"
                            style="width: 100%; padding: 12px 14px; border: 2px solid var(--border-color); border-radius: var(--radius-sm); font-size: 15px; font-family: inherit; resize: vertical; transition: var(--transition); background: #f8fafc;"
                            placeholder="اكتب التقرير الطبي للمريض هنا...&#10;مثال: المريض يعاني من ماء أبيض في العين اليسرى، يوصى بإجراء عملية خلال أسبوعين. تم وصف قطرة مضاد حيوي.">المريض يعاني من ماء أبيض في العين اليسرى، يوصى بإجراء عملية خلال أسبوعين. تم وصف قطرة مضاد حيوي لمدة 5 أيام قبل العملية.</textarea>
                        <div style="display: flex; gap: 10px; flex-wrap: wrap; align-items: center;">
                            <button class="btn-small btn-primary" onclick="updateMedicalReport()"
                                style="padding: 6px 20px; font-size: 13px;">
                                💾 حفظ التقرير
                            </button>
                            <span id="reportStatus"
                                style="font-size: 13px; color: var(--text-light); display: flex; align-items: center;">
                                ✅ تم الحفظ
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- الأزرار السريعة -->
            <div class="action-buttons no-print">
                <button class="btn-primary" onclick="toggleSessionForm()">➕ إضافة جلسة جديدة</button>
                <button class="btn-small btn-edit">✏️ تعديل البيانات</button>
                <button class="btn-small btn-danger" onclick="confirmDelete()">🗑️ حذف المريض</button>
                <button class="btn-small btn-print" onclick="window.print()">🖨️ طباعة</button>
            </div>

            <!-- نموذج إضافة جلسة -->
            <div class="session-form" id="sessionForm">
                <h3>📝 تسجيل جلسة جديدة</h3>
                <form onsubmit="addSession(event)">
                    <div class="form-row">
                        <div class="form-group">
                            <label>📅 تاريخ الجلسة <span class="required">*</span></label>
                            <input type="date" required />
                        </div>
                        <div class="form-group">
                            <label>📌 نوع الجلسة <span class="required">*</span></label>
                            <select required>
                                <option value="">اختر...</option>
                                <option value="فحص">فحص</option>
                                <option value="متابعة">متابعة</option>
                                <option value="عملية">عملية</option>
                                <option value="استشارة">استشارة</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>🏥 التشخيص</label>
                        <input type="text" placeholder="مثال: ماء أبيض في العين اليسرى" />
                    </div>

                    <!-- ===== التقرير الطبي المفصل (الحقل المهم) ===== -->
                    <div class="form-group">
                        <label>📋 التقرير الطبي المفصل <span class="required">*</span></label>
                        <textarea rows="4" placeholder="اكتب التقرير الطبي للمريض، التشخيص، التوصيات، خطة العلاج..."
                            required></textarea>
                        <span class="hint">مثال: المريض يعاني من ماء أبيض في العين اليسرى، يوصى بإجراء عملية خلال
                            أسبوعين.
                            تم وصف قطرة مضاد حيوي لمدة 5 أيام قبل العملية.</span>
                    </div>

                    <div class="form-group">
                        <label>💊 العلاج الموصوف</label>
                        <textarea rows="2" placeholder="مثال: قطرة عين مرتين يومياً لمدة أسبوع"></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>📅 موعد الجلسة القادمة</label>
                            <input type="date" value="{{ now()->toDateString() }}" />
                        </div>
                        <div class="form-group">
                            <label>📝 ملاحظات إضافية</label>
                            <input type="text" placeholder="أي ملاحظات أخرى..." />
                        </div>
                    </div>

                    <div style="display:flex; gap:12px; flex-wrap:wrap; margin-top:8px;">
                        <button type="submit" class="btn-primary">💾 حفظ الجلسة</button>
                        <button type="button" class="btn-outline" onclick="toggleSessionForm()">❌ إلغاء</button>
                    </div>
                </form>
            </div>

            <!-- سجل الجلسات -->
            <div class="sessions-section">
                <div class="sessions-header">
                    <h2>📋 سجل الجلسات</h2>
                    <span class="count">عدد الجلسات: 3</span>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>التاريخ</th>
                                <th>النوع</th>
                                <th>التشخيص</th>
                                <th style="min-width:180px;">📋 التقرير الطبي</th>
                                <th>العلاج</th>
                                <th>الموعد القادم</th>
                                <th class="no-print">إجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>10-08-2026</td>
                                <td><span
                                        style="background:#dbeafe; padding:2px 12px; border-radius:12px; font-size:12px;">فحص</span>
                                </td>
                                <td>ماء أبيض متقدم</td>
                                <td class="medical-report-cell">
                                    ماء أبيض في العين اليسرى، يوصى بإجراء عملية استخراج العدسة خلال أسبوعين.
                                    المريض يعاني أيضاً من ارتفاع ضغط الدم، يجب مراقبته قبل العملية.
                                </td>
                                <td>تم تحديد موعد العملية</td>
                                <td>24-08-2026</td>
                                <td class="no-print">
                                    <button class="btn-small btn-edit" style="padding:2px 8px;">✏️</button>
                                    <button class="btn-small btn-danger" style="padding:2px 8px;">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>17-08-2026</td>
                                <td><span
                                        style="background:#d1fae5; padding:2px 12px; border-radius:12px; font-size:12px;">متابعة</span>
                                </td>
                                <td>تحسن ملحوظ</td>
                                <td class="medical-report-cell">
                                    تحسن في الرؤية بنسبة 40%، التزم المريض بالعلاج بشكل جيد.
                                    تم تغيير الجرعة إلى قطرة مرة واحدة يومياً.
                                    ضغط الدم مستقر.
                                </td>
                                <td>تم تغيير الدواء</td>
                                <td>31-08-2026</td>
                                <td class="no-print">
                                    <button class="btn-small btn-edit" style="padding:2px 8px;">✏️</button>
                                    <button class="btn-small btn-danger" style="padding:2px 8px;">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>24-08-2026</td>
                                <td><span
                                        style="background:#fef3c7; padding:2px 12px; border-radius:12px; font-size:12px;">استشارة</span>
                                </td>
                                <td>استشارة حول العملية</td>
                                <td class="medical-report-cell">
                                    تم شرح تفاصيل العملية للمريض، وافق على إجرائها.
                                    سيتم إجراء التحاليل المطلوبة قبل العملية بأسبوع.
                                    المريض في حالة نفسية جيدة.
                                </td>
                                <td>تم حجز موعد العملية</td>
                                <td>07-09-2026</td>
                                <td class="no-print">
                                    <button class="btn-small btn-edit" style="padding:2px 8px;">✏️</button>
                                    <button class="btn-small btn-danger" style="padding:2px 8px;">🗑️</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>

</div>
@stop
