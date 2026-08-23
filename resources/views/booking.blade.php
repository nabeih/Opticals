@extends('layout.home')

@section('title', 'حجز موعد - د. محمد محمود مسلّم')

@section('contact')

<div id="page-booking" class="page active">

    <section class="booking">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">احجز الآن</span>
                <h2>📝 حجز موعد</h2>
                <p>املأ النموذج التالي وسيتم التواصل معك لتأكيد الموعد في أقرب وقت</p>
            </div>

            @if (session('success'))
                <div class="alert-success">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <div class="booking-form-wrapper">
                <h3>بيانات المريض</h3>
                <p class="sub">جميع البيانات محفوظة بشكل آمن وتستخدم فقط لأغراض طبية</p>

                <form method="POST" action="{{ route('booking.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fullname">الاسم الكامل <span class="required">*</span></label>
                            <input type="text" id="fullname" name="fullname" placeholder="أدخل اسمك الثلاثي" required />
                        </div>
                        <div class="form-group">
                            <label for="phone">رقم الجوال <span class="required">*</span></label>
                            <input type="tel" id="phone" name="phone" placeholder="مثال: 01012345678" required />
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

                    <button type="submit" class="btn-primary" style="width:100%;">✅ إرسال طلب الحجز</button>
                </form>
            </div>
        </div>
    </section>

</div>
@stop
