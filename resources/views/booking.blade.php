{{-- @extends('layout.home')

@section('title', 'حجز موعد - د. محمد محمود مسلّم')

@section('contact')

--}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Page</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
    <header>
        <div class="container">
            <div class="logo">
                <span class="icon">👁️</span>
                د. <span>محمد محمود مسلّم</span>
            </div>
            <nav>
                <a class="nav-link" href="{{route('home')}}#hero">الرئيسية</a>
                {{-- <a class="nav-link" {{route('home')}}#>عن العيادة</a> --}}
                <a class="nav-link" href="{{route('home')}}#services">الخدمات</a>
                <a class="nav-link" href="{{route('home')}}#team">فريق العمل</a>
                <a class="nav-link btn-nav" href="{{ route('booking.index') }}">📅 حجز موعد</a>
                <a class="nav-link btn-nav" href="{{ route('dashboard.index') }}" style="background:#1e40af;">📊 لوحة
                    التحكم</a>
            </nav>
        </div>
    </header>

    <div id="page-booking" class="page active">
        @if (session('success'))
            <div class="alert-success">
                ✅ {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert-danger">
                ❌ There are some errors in the form:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <section class="booking">
            <div class="container">
                <div class="section-header">
                    <span class="section-tag">احجز الآن</span>
                    <h2>📝 حجز موعد</h2>
                    <p>املأ النموذج التالي وسيتم التواصل معك لتأكيد الموعد في أقرب وقت</p>
                </div>



                <div class="booking-form-wrapper">
                    <h3>بيانات المريض</h3>
                    <p class="sub">جميع البيانات محفوظة بشكل آمن وتستخدم فقط لأغراض طبية</p>

                    <form method="POST" action="{{ route('booking.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label for="fullname">الاسم الكامل <span class="required">*</span></label>
                                <input type="text" id="fullname" name="fullname" placeholder="أدخل اسمك الثلاثي"
                                    required value="{{ old('fullname') }}">
                                @error('fullname')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">رقم الجوال <span class="required">*</span></label>
                                <input type="tel" id="phone" name="phone" placeholder="مثال: 01012345678" required
                                    value="{{ old('phone') }}" />
                                @error('phone')

                                @enderror
                                <span class="hint">📱 أرقام فقط (10-13 رقم)</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="age">العمر</label>
                                <input type="number" id="age" name="age" min="1" placeholder="مثال: 45" />
                            </div>
                            <div class="form-group">
                                <label for="address">العنوان</label>
                                <input type="text" id="address" name="address" placeholder="مثال: غزة - السريا" />
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="preferred_date">التاريخ المناسب للموعد</label>
                            <input type="date" id="preferred_date" name="preferred_date" />
                        </div>

                        <div class="form-group">
                            <label for="complaint_type">نوع الشكوى / سبب الزيارة <span class="required">*</span></label>
                            <select id="complaint_type" name="complaint_type" required>
                                <option value="">اختر نوع الزيارة...</option>
                                <option value="فحص شامل">فحص شامل</option>
                                <option value="استشارة">استشارة</option>
                                <option value="عملية">عملية</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <lapel for="complaint_description">وصف الشكوى</lapel>
                            <textarea placeholder="مثال:اعاني من احمرار دائم في العينين" name="complaint_description"
                                id="complaint_description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="notes">ملاحظات إضافية</label>
                            <textarea id="notes" name="notes" rows="2"
                                placeholder="هل لديك أي معلومات إضافية تود إضافتها؟"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="pathfile">رفع ملف متعلق بالحالة (اختياري)</label>
                            <input type="file" id="pathfile" name="pathfile" accept=".jpeg,.png,.pdf,.doc,.docx" />
                        </div>

                        <button class="btn-primary" style="width:100%;" type="submit">✅ 00إرسال طلب
                            الحجز</button>

                    </form>
                </div>
            </div>
        </section>

    </div>
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h4>👁️ د. محمد محمود مسلّم</h4>
                    <p>استشاري طب وجراحة العيون</p>
                    <p>زمالة الكلية الملكية للجراحين</p>
                </div>
                <div class="footer-col">
                    <h4>روابط سريعة</h4>
                    <a onclick="showPage('home')" href="{{ route('home') }}">الرئيسية</a>
                    <a onclick="showPage('booking')" href="{{ route('booking.index') }}">حجز موعد</a>
                    <a onclick="showPage('dashboard')" href="{{ route('dashboard.index') }}">لوحة التحكم</a>
                </div>
                <div class="footer-col">
                    <h4>تواصل معنا</h4>
                    <p>📞 01012345678</p>
                    <p>📍 مستشفى أحمد للتخصصات - القاهرة</p>
                    <p>🕐 السبت - الخميس: 5-9 مساءً</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2026 جميع الحقوق محفوظة - د. محمد محمود مسلّم</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>



{{-- <div id="page-booking" class="page active">
    @if (session('success'))
    <div class="alert-success">
        ✅ {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert-danger">
        ❌ There are some errors in the form:
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <section class="booking">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">احجز الآن</span>
                <h2>📝 حجز موعد</h2>
                <p>املأ النموذج التالي وسيتم التواصل معك لتأكيد الموعد في أقرب وقت</p>
            </div>



            <div class="booking-form-wrapper">
                <h3>بيانات المريض</h3>
                <p class="sub">جميع البيانات محفوظة بشكل آمن وتستخدم فقط لأغراض طبية</p>

                <form method="POST" action="{{ route('booking.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fullname">الاسم الكامل <span class="required">*</span></label>
                            <input type="text" id="fullname" name="fullname" placeholder="أدخل اسمك الثلاثي" required
                                value="{{ old('fullname') }}">
                            @error('field_name')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">رقم الجوال <span class="required">*</span></label>
                            <input type="tel" id="phone" name="phone" placeholder="مثال: 01012345678" required
                                value="{{ old('phone') }}" />
                            @error('phone')

                            @enderror
                            <span class="hint">📱 أرقام فقط (10-13 رقم)</span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="age">العمر</label>
                            <input type="number" id="age" name="age" min="1" placeholder="مثال: 45" />
                        </div>
                        <div class="form-group">
                            <label for="address">العنوان</label>
                            <input type="text" id="address" name="address" placeholder="مثال: غزة - السريا" />
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="preferred_date">التاريخ المناسب للموعد</label>
                        <input type="date" id="preferred_date" name="preferred_date" />
                    </div>

                    <div class="form-group">
                        <label for="complaint_type">نوع الشكوى / سبب الزيارة <span class="required">*</span></label>
                        <select id="complaint_type" name="complaint_type" required>
                            <option value="">اختر نوع الزيارة...</option>
                            <option value="فحص شامل">فحص شامل</option>
                            <option value="استشارة">استشارة</option>
                            <option value="عملية">عملية</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <lapel for="complaint_description">وصف الشكوى</lapel>
                        <textarea placeholder="مثال:اعاني من احمرار دائم في العينين" name="complaint_description"
                            id="complaint_description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="notes">ملاحظات إضافية</label>
                        <textarea id="notes" name="notes" rows="2"
                            placeholder="هل لديك أي معلومات إضافية تود إضافتها؟"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="pathfile">رفع ملف متعلق بالحالة (اختياري)</label>
                        <input type="file" id="pathfile" name="pathfile" accept=".jpeg,.png,.pdf,.doc,.docx" />
                    </div>

                    <a class="btn-primary" style="width:100%;" href="{{ route('booking.store') }}">✅ 00إرسال طلب
                        الحجز</a>

                </form>
            </div>
        </div>
    </section>

</div> --}}
{{-- @stop --}}