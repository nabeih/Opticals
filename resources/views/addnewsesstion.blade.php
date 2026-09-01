{{--
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>تسجيل جلسة علاجية جديدة</title>
</head>

<body>
    <h1>تسجيل جلسة علاجية جديدة</h1>
    <form action="{{ route('patient-session.store') }}" method="POST">
        @csrf
        <input type="hidden" name="patient_id" value="{{ $patient->id }}">
        <div class="form-group">
            <label for="session_date">تاريخ الجلسة:</label>
            <input type="date" name="session_date" id="session_date" value="{{ now()->toDateString() }}" required>
        </div>

        <div class="form-group">
            <label for="session_type">نوع الجلسة:</label>
            <select name="session_type" id="session_type" required>
                <option value="">اختر...</option>
                <option value="فحص">فحص</option>
                <option value="متابعة">متابعة</option>
                <option value="عملية">عملية</option>
                <option value="استشارة">استشارة</option>
            </select>
        </div>

        <div class="form-group">
            <label for="diagnosis">التشخيص:</label>
            <input type="text" name="diagnosis" id="diagnosis" placeholder="مثال: ماء أبيض في العين اليسرى">
        </div>

        <div class="form-group">
            <label for="medical_report">التقرير الطبي المفصل:</label>
            <textarea name="medical_report" id="medical_report" rows="3"
                placeholder="اكتب التقرير الطبي، التوصيات، وخطة العلاج..." required></textarea>
        </div>

        <div class="form-group">
            <label for="treatment">العلاج الموصوف:</label>
            <textarea name="treatment" id="treatment" rows="2"
                placeholder="مثال: قطرة عين مرتين يومياً لمدة أسبوع"></textarea>
        </div>

        <div class="form-group">
            <label for="next_appointment">موعد الجلسة القادمة:</label>
            <input type="date" name="next_appointment" id="next_appointment">
        </div>

        <div class="form-group">
            <label for="notes">ملاحظات إضافية:</label>
            <input type="text" name="notes" id="notes" placeholder="أي ملاحظات أخرى...">

        </div>
        <button type="submit">حفظ الجلسة</button>
    </form>

    {{--
    <script src="{{ asset('assets/js/script.js') }}"></script> --}}
    {{--
</body>

</html> --}}

{{-- <form action="{{ route('patient-session.store') }}" method="POST">
    @csrf
    <input type="hidden" name="patient_id" value="{{ $patient->id }}">

    <div class="session-form" id="sessionForm"
        style="display: none; background: #fff; padding: 24px; border-radius: var(--radius-md); border: 1px solid var(--border-color); margin-bottom: 24px; box-shadow: var(--shadow-sm);">
        <h3 style="margin-bottom: 16px; color: var(--primary-teal);">📝 تسجيل جلسة علاجية جديدة
        </h3>

        <div class="form-row">
            <div class="form-group">
                <label>📅 تاريخ الجلسة <span class="required">*</span></label>
                <input type="date" name="session_date" value="{{ now()->toDateString() }}" required />
            </div>

            <div class="form-group">
                <label>📌 نوع الجلسة <span class="required">*</span></label>
                <select name="session_type" required>
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
            <input type="text" name="diagnosis" placeholder="مثال: ماء أبيض في العين اليسرى" />
        </div>

        <div class="form-group">
            <label>📋 التقرير الطبي المفصل <span class="required">*</span></label>
            <textarea name="medical_report" rows="3" placeholder="اكتب التقرير الطبي، التوصيات، وخطة العلاج..."
                required></textarea>
        </div>

        <div class="form-group">
            <label>💊 العلاج الموصوف</label>
            <textarea name="treatment" rows="2" placeholder="مثال: قطرة عين مرتين يومياً لمدة أسبوع"></textarea>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>📅 موعد الجلسة القادمة</label>
                <input type="date" name="next_session_date" />
            </div>

            <div class="form-group">
                <label>📝 ملاحظات إضافية</label>
                <input type="text" name="notes" placeholder="أي ملاحظات أخرى..." />
            </div>
        </div>

        <div style="display:flex; gap:12px; margin-top:12px;">
            <button type="submit" class="btn-primary">💾 حفظ الجلسة</button>
            <button type="button" class="btn-outline" onclick="toggleSessionForm()">❌
                إلغاء</button>
        </div>
    </div>
</form> --}}

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تسجيل جلسة علاجية جديدة</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        :root {
            --primary-teal: #0d9488;
            --primary-dark: #134e4a;
            --primary-light: #f0fdfa;
            --border-color: #e2e8f0;
            --text-main: #334155;
            --text-light: #64748b;
            --radius-md: 12px;
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.05), 0 1px 2px -1px rgba(0, 0, 0, 0.05);
            --transition: all 0.25s ease-in-out;
        }

        body {
            background-color: #f8fafc;
            font-family: 'Cairo', sans-serif;
            color: var(--text-main);
            margin: 0;
            padding: 40px 20px;
        }

        .session-page-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .back-link {
            margin-bottom: 20px;
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

        .session-card {
            background: #fff;
            padding: 32px;
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
        }

        .session-card h1 {
            font-size: 20px;
            color: var(--primary-dark);
            margin-top: 0;
            margin-bottom: 24px;
            border-bottom: 2px solid var(--primary-light);
            padding-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* تنسيق الصفوف والحقول */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 18px;
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 8px;
        }

        .form-group label .required {
            color: #dc2626;
            margin-right: 3px;
        }

        .form-group input[type="text"],
        .form-group input[type="date"],
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 11px 14px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            color: var(--text-main);
            background-color: #fff;
            box-sizing: border-box;
            transition: var(--transition);
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-teal);
            box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.1);
        }

        .form-group textarea {
            resize: vertical;
        }

        /* أزرار الحفظ والإلغاء */
        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 28px;
            padding-top: 20px;
            border-top: 1px solid #f1f5f9;
        }

        .btn-primary {
            background-color: var(--primary-teal);
            color: #fff;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
        }

        .btn-outline {
            background-color: #f1f5f9;
            color: var(--text-main);
            border: 1px solid var(--border-color);
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .btn-outline:hover {
            background-color: #e2e8f0;
        }
    </style>
</head>

<body>

    <div class="session-page-container">

        <div class="back-link">
            <a href="{{ route('patients.show', $patient->id) }}">← العودة لملف المريض</a>
        </div>

        <div class="session-card">
            <h1>📝 تسجيل جلسة علاجية جديدة</h1>

            <form action="{{ route('patient-session.store') }}" method="POST">
                @csrf
                <input type="hidden" name="patient_id" value="{{ $patient->id }}">

                <div class="form-row">
                    <div class="form-group">
                        <label for="session_date">📅 تاريخ الجلسة <span class="required">*</span></label>
                        <input type="date" name="session_date" id="session_date" value="{{ now()->toDateString() }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="session_type">📌 نوع الجلسة <span class="required">*</span></label>
                        <select name="session_type" id="session_type" required>
                            <option value="">اختر نوع الجلسة...</option>
                            <option value="فحص">فحص</option>
                            <option value="متابعة">متابعة</option>
                            <option value="عملية">عملية</option>
                            <option value="استشارة">استشارة</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="diagnosis">🏥 التشخيص</label>
                    <input type="text" name="diagnosis" id="diagnosis" placeholder="مثال: ماء أبيض في العين اليسرى">
                </div>

                <div class="form-group">
                    <label for="medical_report">📋 التقرير الطبي المفصل <span class="required">*</span></label>
                    <textarea name="medical_report" id="medical_report" rows="3"
                        placeholder="اكتب التقرير الطبي، التوصيات، وخطة العلاج..." required></textarea>
                </div>

                <div class="form-group">
                    <label for="treatment">💊 العلاج الموصوف</label>
                    <textarea name="treatment" id="treatment" rows="2"
                        placeholder="مثال: قطرة عين مرتين يومياً لمدة أسبوع"></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="next_session_date">📅 موعد الجلسة القادمة</label>
                        <input type="date" name="next_session_date" id="next_session_date">
                    </div>

                    <div class="form-group">
                        <label for="notes">📝 ملاحظات إضافية</label>
                        <input type="text" name="notes" id="notes" placeholder="أي ملاحظات أخرى...">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary">💾 حفظ الجلسة</button>
                    <a href="{{ route('patients.show', $patient->id) }}" class="btn-outline">❌ إلغاء</a>
                </div>
            </form>
        </div>

    </div>

    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
