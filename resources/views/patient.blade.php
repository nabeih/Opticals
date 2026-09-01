{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>د.محمد مسلًم</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        .session-form {
            display: none;
        }

        .session-form.show {
            display: block;
        }

        /* تنسيقات خاصة بالخط الزمني (Timeline) والصفحة */
        .patient-profile-layout {
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 24px;
            align-items: start;
            margin-top: 20px;
        }

        @media (max-width: 992px) {
            .patient-profile-layout {
                grid-template-columns: 1fr;
            }
        }

        /* بطاقة معلومات المريض الثابتة جانبياً */
        .patient-sidebar-card {
            background: #fff;
            border-radius: var(--radius-md);
            padding: 24px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
            position: sticky;
            top: 90px;
        }

        .patient-sidebar-card h3 {
            font-size: 18px;
            color: var(--primary-dark);
            margin-bottom: 16px;
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 10px;
        }

        .sidebar-info-item {
            margin-bottom: 12px;
        }

        .sidebar-info-item .label {
            font-size: 12px;
            color: var(--text-light);
            display: block;
        }

        .sidebar-info-item .value {
            font-size: 15px;
            color: var(--text-main);
            font-weight: 600;
        }

        /* تصميم الخط الزمني (Timeline) */
        .timeline-container {
            position: relative;
            padding-right: 30px;
            margin-top: 20px;
        }

        .timeline-container::before {
            content: '';
            position: absolute;
            right: 10px;
            top: 0;
            bottom: 0;
            width: 3px;
            background: var(--primary-teal, #0d9488);
            border-radius: 2px;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 24px;
            background: #fff;
            border-radius: var(--radius-md);
            padding: 20px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
            transition: var(--transition);
        }

        .timeline-item:hover {
            box-shadow: var(--shadow-md);
        }

        /* نقطة الخط الزمني */
        .timeline-item::after {
            content: '';
            position: absolute;
            right: -27px;
            top: 20px;
            width: 14px;
            height: 14px;
            background: #fff;
            border: 3px solid var(--primary-teal, #0d9488);
            border-radius: 50%;
        }

        .timeline-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
            border-bottom: 1px solid #f1f5f9;
            padding-bottom: 10px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .timeline-date {
            font-size: 13px;
            color: var(--text-light);
            background: #f8fafc;
            padding: 4px 10px;
            border-radius: 6px;
        }

        .timeline-body p {
            margin-bottom: 8px;
            font-size: 14px;
            color: var(--text-main);
        }

        .timeline-body strong {
            color: var(--primary-dark);
        }
    </style>
</head>

<body>

    <div id="page-patient-detail" class="page active">

        <div class="container">

            <div class="back-link no-print" style="margin-bottom: 15px;">
                <a href="{{ route('dashboard.index') }}">← العودة للوحة التحكم</a>
            </div>

            <!-- تخطيط الصفحة: القائمة الجانبية للمريض + المحتوى الرئيسي للجلسات -->
            <div class="patient-profile-layout">

                <!-- العمود الأيمن: بطاقة بيانات المريض الثابتة -->
                <div class="patient-sidebar-card">
                    <h3>👤 ملف المريض</h3>
                    <div class="sidebar-info-item">
                        <span class="label">الاسم الكامل</span>
                        <span class="value">{{ $patient->fullname }}</span>
                    </div>
                    <div class="sidebar-info-item">
                        <span class="label">رقم الجوال</span>
                        <span class="value">{{ $patient->phone }}</span>
                    </div>
                    <div class="sidebar-info-item">
                        <span class="label">العمر</span>
                        <span class="value"> {{ $patient->age }} </span>
                    </div>
                    <div class="sidebar-info-item">
                        <span class="label">العنوان</span>
                        <span class="value">{{ $patient->address ?? '—' }}</span>
                    </div>
                    <div class="sidebar-info-item">
                        <span class="label">نوع الشكوى / الزيارة</span>
                        <span class="value">
                            <span class="status-badge status-new" style="display:inline-block; margin-top:4px;">
                                {{ $patient->complaint_type }}
                            </span>
                        </span>
                    </div>
                    <div class="sidebar-info-item">
                        <span class="label">ملاحظات أولية</span>
                        <span class="value">{{ $patient->notes ?: 'لا توجد ملاحظات' }}</span>
                    </div>

                    <!-- أزرار إضافية سريعة -->
                    <div style="display: flex; flex-direction: column; gap: 8px; margin-top: 20px;" class="no-print">
                        <a class="btn-primary" style="width: 100%;"
                            href="{{route('patient-session.create', $patient->id)}}">➕
                            إضافة جلسة
                            جديدة</a>
                        <button class="btn-small btn-edit" style="width: 100%;">✏️ تعديل بيانات المريض</button>
                        <button class="btn-small btn-danger" onclick="confirmDelete()" style="width: 100%;">🗑️ حذف
                            المريض</button>
                        <button class="btn-small btn-print" onclick="window.print()" style="width: 100%;">🖨️ طباعة
                            الملف</button>
                    </div>
                </div>

                <!-- العمود الأيسر: نموذج إضافة جلسة + سجل الجلسات بالخط الزمني -->
                <div class="patient-main-content">



                    <!-- سجل الجلسات بنظام الخط الزمني (Timeline) -->
                    <div class="sessions-section">
                        <div class="sessions-header"
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                            <h2 style="font-size: 20px; color: var(--primary-dark);">📈 سجل الزيارات والخط الزمني
                                للجلسات</h2>
                            <span class="count"
                                style="background: var(--primary-teal); color: #fff; padding: 4px 12px; border-radius: 20px; font-size: 13px;">
                                إجمالي الجلسات: {{ $patient->Patient_session->count() ?? 0 }}
                            </span>
                        </div>

                        <div class="timeline-container">
                            @forelse($patient->Patient_session->sortByDesc('session_date') as $index => $session)
                            <div class="timeline-item">
                                <div class="timeline-header">
                                    <div>
                                        <span
                                            style="background: #e0f2fe; color: #0369a1; padding: 3px 10px; border-radius: 8px; font-size: 12px; font-weight: 600;">
                                            {{ $session->session_type }}
                                        </span>
                                        <strong style="margin-right: 8px; font-size: 15px;">جلسة رقم
                                            (#{{ $loop->iteration }})</strong>
                                    </div>
                                    <div class="timeline-date">
                                        📅 {{ $session->session_date }}
                                    </div>
                                </div>

                                <div class="timeline-body">
                                    @if($session->diagnosis)
                                    <p><strong>التشخيص:</strong> {{ $session->diagnosis }}</p>
                                    @endif

                                    <p><strong>التقرير الطبي:</strong> {{ $session->medical_report }}</p>

                                    @if($session->treatment)
                                    <p><strong>العلاج الموصوف:</strong> {{ $session->treatment }}</p>
                                    @endif

                                    @if($session->next_session_date)
                                    <p style="color: #0d9488;"><strong>الموعد القادم:</strong>
                                        {{ $session->next_session_date }}
                                    </p>
                                    @endif

                                    @if($session->notes)
                                    <p style="color: var(--text-light); font-size: 13px;"><strong>ملاحظات:</strong>
                                        {{ $session->notes }}
                                    </p>
                                    @endif
                                </div>

                                <div class="timeline-footer no-print"
                                    style="margin-top: 12px; display: flex; gap: 8px; border-top: 1px solid #f1f5f9; padding-top: 10px;">
                                    <button class="btn-small btn-edit" style="padding: 2px 10px; font-size: 12px;">✏️
                                        تعديل الجلسة</button>
                                    <button class="btn-small btn-danger" style="padding: 2px 10px; font-size: 12px;">🗑️
                                        حذف</button>
                                </div>
                            </div>
                            @empty
                            <div
                                style="text-align: center; padding: 40px; background: #fff; border-radius: var(--radius-md); border: 1px solid var(--border-color); color: var(--text-light);">
                                <p style="font-size: 16px;">لا توجد جلسات مسجلة لهذا المريض حتى الآن.</p>
                                <p style="font-size: 13px; margin-top: 6px;">اضغط على زر "إضافة جلسة جديدة" لبدء
                                    توثيق
                                    الزيارات الطبية.</p>
                            </div>
                            @endforelse
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html> --}}

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>د. محمد مسلًم - ملف المريض</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        /* إضافات وتنسيقات احترافية للخط الزمني وملف المريض */
        :root {
            --primary-teal: #0d9488;
            --primary-dark: #134e4a;
            --primary-light: #f0fdfa;
            --border-color: #e2e8f0;
            --text-main: #334155;
            --text-light: #64748b;
            --radius-md: 12px;
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.05), 0 1px 2px -1px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
            --transition: all 0.25s ease-in-out;
        }

        body {
            background-color: #f8fafc;
            font-family: 'Cairo', sans-serif;
            /* يفضل استخدام خط عربي مثل Cairo إذا متوفر */
            color: var(--text-main);
        }

        .session-form {
            display: none;
        }

        .session-form.show {
            display: block;
        }

        /* تخطيط الصفحة الرئيسي */
        .patient-profile-layout {
            display: grid;
            grid-template-columns: 340px 1fr;
            gap: 28px;
            align-items: start;
            margin-top: 24px;
            margin-bottom: 40px;
        }

        @media (max-width: 992px) {
            .patient-profile-layout {
                grid-template-columns: 1fr;
            }
        }

        /* بطاقة معلومات المريض الثابتة جانبياً */
        .patient-sidebar-card {
            background: #fff;
            border-radius: var(--radius-md);
            padding: 24px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
            position: sticky;
            top: 90px;
        }

        .patient-sidebar-card h3 {
            font-size: 17px;
            color: var(--primary-dark);
            margin-bottom: 18px;
            border-bottom: 2px solid var(--primary-light);
            padding-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .sidebar-info-item {
            margin-bottom: 14px;
        }

        .sidebar-info-item .label {
            font-size: 12px;
            color: var(--text-light);
            display: block;
            margin-bottom: 2px;
        }

        .sidebar-info-item .value {
            font-size: 14px;
            color: var(--text-main);
            font-weight: 600;
        }

        /* تصميم الخط الزمني (Timeline) - متوافق مع الاتجاه العربي RTL */
        .timeline-container {
            position: relative;
            padding-right: 32px;
            margin-top: 20px;
        }

        /* الخط العمودي للزمن */
        .timeline-container::before {
            content: '';
            position: absolute;
            right: 11px;
            top: 10px;
            bottom: 10px;
            width: 3px;
            background: linear-gradient(to bottom, var(--primary-teal), #ccfbf1);
            border-radius: 2px;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 24px;
            background: #fff;
            border-radius: var(--radius-md);
            padding: 22px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
            transition: var(--transition);
        }

        .timeline-item:hover {
            box-shadow: var(--shadow-md);
            border-color: #cbd5e1;
        }

        /* نقطة الخط الزمني بجانب البطاقة */
        .timeline-item::after {
            content: '';
            position: absolute;
            right: -28.5px;
            top: 24px;
            width: 14px;
            height: 14px;
            background: #fff;
            border: 3.5px solid var(--primary-teal);
            border-radius: 50%;
            box-shadow: 0 0 0 3px var(--primary-light);
        }

        .timeline-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 14px;
            border-bottom: 1px solid #f1f5f9;
            padding-bottom: 12px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .timeline-date {
            font-size: 12px;
            color: var(--text-light);
            background: #f8fafc;
            padding: 5px 12px;
            border-radius: 20px;
            border: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .timeline-body {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .timeline-body p {
            margin: 0;
            font-size: 14px;
            color: var(--text-main);
            line-height: 1.6;
        }

        .timeline-body strong {
            color: var(--primary-dark);
            font-weight: 600;
        }

        /* تحسين مظهر الأزرار داخل الملف والسایدبار */
        .sidebar-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 22px;
            padding-top: 18px;
            border-top: 1px solid var(--border-color);
        }

        .sidebar-actions .btn-primary,
        .sidebar-actions .btn-small {
            width: 100%;
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            text-decoration: none;
            transition: var(--transition);
        }

        .back-link a {
            color: var(--text-light);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: var(--transition);
        }

        .back-link a:hover {
            color: var(--primary-teal);
        }
    </style>
</head>

<body>

    <div id="page-patient-detail" class="page active" style="padding: 30px 0;">

        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 15px;">

            <div class="back-link no-print" style="margin-bottom: 15px;">
                <a href="{{ route('dashboard.index') }}">← العودة للوحة التحكم</a>
            </div>

            <!-- تخطيط الصفحة: القائمة الجانبية للمريض + المحتوى الرئيسي للجلسات -->
            <div class="patient-profile-layout">

                <!-- العمود الأيمن: بطاقة بيانات المريض الثابتة -->
                <div class="patient-sidebar-card">
                    <h3>👤 ملف المريض</h3>
                    <div class="sidebar-info-item">
                        <span class="label">الاسم الكامل</span>
                        <span class="value">{{ $patient->fullname }}</span>
                    </div>
                    <div class="sidebar-info-item">
                        <span class="label">رقم الجوال</span>
                        <span class="value" dir="ltr"
                            style="text-align: right; display: block;">{{ $patient->phone }}</span>
                    </div>
                    <div class="sidebar-info-item">
                        <span class="label">العمر</span>
                        <span class="value">{{ $patient->age }} سنة</span>
                    </div>
                    <div class="sidebar-info-item">
                        <span class="label">العنوان</span>
                        <span class="value">{{ $patient->address ?? '—' }}</span>
                    </div>
                    <div class="sidebar-info-item">
                        <span class="label">نوع الشكوى / الزيارة</span>
                        <span class="value">
                            <span class="status-badge status-new"
                                style="display:inline-block; margin-top:4px; background: var(--primary-light); color: var(--primary-dark); padding: 3px 10px; border-radius: 6px; font-size: 13px;">
                                {{ $patient->complaint_type }}
                            </span>
                        </span>
                    </div>
                    <div class="sidebar-info-item">
                        <span class="label">ملاحظات أولية</span>
                        <span class="value"
                            style="font-weight: 400; font-size: 13px; color: var(--text-light);">{{ $patient->notes ?: 'لا توجد ملاحظات' }}</span>
                    </div>

                    <!-- أزرار إضافية سريعة -->
                    <div class="sidebar-actions no-print">
                        <a class="btn-primary" style="background: var(--primary-teal); color: #fff;"
                            href="{{ route('patient-session.create', $patient->id) }}">
                            ➕ إضافة جلسة جديدة
                        </a>
                        <button class="btn-small btn-edit"
                            style="background: #f1f5f9; color: var(--text-main); border: 1px solid var(--border-color);">✏️
                            تعديل بيانات المريض</button>
                        <button class="btn-small btn-danger" onclick="confirmDelete()"
                            style="background: #fef2f2; color: #dc2626; border: 1px solid #fee2e2;">🗑️ حذف
                            المريض</button>
                        <button class="btn-small btn-print" onclick="window.print()"
                            style="background: #f8fafc; color: var(--text-main); border: 1px solid var(--border-color);">🖨️
                            طباعة الملف</button>
                    </div>
                </div>

                <!-- العمود الأيسر: سجل الجلسات بالخط الزمني -->
                <div class="patient-main-content">

                    <div class="sessions-section">
                        <div class="sessions-header"
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; background: #fff; padding: 18px 22px; border-radius: var(--radius-md); border: 1px solid var(--border-color); box-shadow: var(--shadow-sm);">
                            <h2 style="font-size: 18px; color: var(--primary-dark); margin: 0;">📈 سجل الزيارات والخط
                                الزمني للجلسات</h2>
                            <span class="count"
                                style="background: var(--primary-light); color: var(--primary-dark); border: 1px solid #99f6e4; padding: 4px 12px; border-radius: 20px; font-size: 13px; font-weight: 600;">
                                إجمالي الجلسات: {{ $patient->Patient_session->count() ?? 0 }}
                            </span>
                        </div>

                        <div class="timeline-container">
                            @forelse($patient->Patient_session->sortByDesc('session_date') as $index => $session)
                                <div class="timeline-item">
                                    <div class="timeline-header">
                                        <div style="display: flex; align-items: center; gap: 8px;">
                                            <span
                                                style="background: #e0f2fe; color: #0369a1; padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 600;">
                                                {{ $session->session_type }}
                                            </span>
                                            <strong style="font-size: 15px; color: var(--primary-dark);">جلسة رقم
                                                (#{{ $loop->iteration }})</strong>
                                        </div>
                                        <div class="timeline-date">
                                            📅 {{ $session->session_date }}
                                        </div>
                                    </div>

                                    <div class="timeline-body">
                                        @if($session->diagnosis)
                                            <p><strong>التشخيص:</strong> {{ $session->diagnosis }}</p>
                                        @endif

                                        <p><strong>التقرير الطبي:</strong> {{ $session->medical_report }}</p>

                                        @if($session->treatment)
                                            <p><strong>العلاج الموصوف:</strong> {{ $session->treatment }}</p>
                                        @endif

                                        @if($session->next_session_date)
                                            <p style="color: var(--primary-teal);"><strong>الموعد القادم:</strong>
                                                {{ $session->next_session_date }}</p>
                                        @endif

                                        @if($session->notes)
                                            <p
                                                style="color: var(--text-light); font-size: 13px; background: #f8fafc; padding: 8px 12px; border-radius: 6px; margin-top: 5px;">
                                                <strong>ملاحظات:</strong> {{ $session->notes }}</p>
                                        @endif
                                    </div>

                                    <div class="timeline-footer no-print"
                                        style="margin-top: 16px; display: flex; gap: 8px; border-top: 1px solid #f1f5f9; padding-top: 12px;">
                                        <button class="btn-small btn-edit"
                                            style="padding: 5px 12px; font-size: 12px; background: #f1f5f9; border: 1px solid var(--border-color); border-radius: 6px; cursor: pointer;">✏️
                                            تعديل الجلسة</button>
                                        <button class="btn-small btn-danger"
                                            style="padding: 5px 12px; font-size: 12px; background: #fef2f2; color: #dc2626; border: 1px solid #fee2e2; border-radius: 6px; cursor: pointer;">🗑️
                                            حذف</button>
                                    </div>
                                </div>
                            @empty
                                <div
                                    style="text-align: center; padding: 50px 20px; background: #fff; border-radius: var(--radius-md); border: 1px solid var(--border-color); color: var(--text-light);">
                                    <p style="font-size: 16px; margin-bottom: 5px;">لا توجد جلسات مسجلة لهذا المريض حتى
                                        الآن.</p>
                                    <p style="font-size: 13px; margin: 0;">اضغط على زر "إضافة جلسة جديدة" لبدء توثيق
                                        الزيارات الطبية.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
