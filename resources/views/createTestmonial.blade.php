@extends('layout.home')
@section('title', 'رأيك مهم')

@section('contact')
<div class="container" style="padding: 50px 0;">
    <div class="back-link" style="margin-bottom: 20px;">
        <a href="{{ route('home') }}"><i class="fa-solid fa-arrow-right"></i> العودة إلى الصفحة الرئيسية</a>
    </div>

    <div class="booking-form-wrapper">
        <h3 style="margin-bottom: 8px; text-align: center; font-size: 24px;">شاركنا رأيك في الخدمة</h3>
        <p class="sub" style="text-align: center; color: var(--text-muted); margin-bottom: 24px; font-size: 15px;">
            تقييمك يساعدنا على تحسين جودة الرعاية الطبية في العيادة</p>

        <form method="POST" action="{{ route('testimonial.creat') }}">
            @csrf

            <!-- حقل الاسم -->
            <div class="form-group">
                <label for="name">الاسم <span class="required">*</span></label>
                <div class="input-with-icon">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" id="name" name="name" placeholder="أدخل اسمك الكريم..." required>
                </div>
            </div>

            <!-- حقل التقييم (تمت إزالة حلقة العرض لأنها صفحة إضافة جديدة وليست عرضاً) -->
            <div class="form-group">
                <label for="rating">التقييم العام <span class="required">*</span></label>
                <div class="star-rating-input">
                    <input type="radio" id="star5" name="rating" value="5" checked><label for="star5"
                        title="5 نجوم">★</label>
                    <input type="radio" id="star4" name="rating" value="4"><label for="star4" title="4 نجوم">★</label>
                    <input type="radio" id="star3" name="rating" value="3"><label for="star3" title="3 نجوم">★</label>
                    <input type="radio" id="star2" name="rating" value="2"><label for="star2" title="نجمتان">★</label>
                    <input type="radio" id="star1" name="rating" value="1"><label for="star1"
                        title="نجمة واحدة">★</label>
                </div>
            </div>

            <!-- حقل الرسالة -->
            <div class="form-group">
                <label for="message">رأيك أو تجربتك بالعيادة <span class="required">*</span></label>
                <textarea id="message" name="message" placeholder="اكتب تفاصيل تجربتك بكل صراحة..." required></textarea>
                <small class="hint">شاركنا تجربتك لمساعدة المرضى الآخرين</small>
            </div>

            <!-- زر الإرسال -->
            <div class="form-action">
                <button type="submit" class="btn-primary btn-submit-full">
                    <span>إرسال الرأي</span>
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </div>
        </form>
    </div>
</div>
@stop