@extends('layout.home')
@section('title', 'الرئيسية - د. محمد محمود مسلّم')

@section('contact')
<div id="page-home" class="page active">

    <!-- ===== قسم الهيرو ===== -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <span class="badge">🏥 استشاري طب وجراحة العيون</span>
                <h1>د. <span>محمد محمود مسلّم</span></h1>
                <p>
                    استشاري طب وجراحة العيون، حاصل على زمالة الكلية الملكية للجراحين في تخصص العيون.
                    خبرة تزيد عن 15 عاماً في علاج أمراض العيون، وإجراء عمليات المياه البيضاء،
                    والمياه الزرقاء، وتصحيح الإبصار بالليزك.
                </p>

                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="number">15+</span>
                        <span class="label">سنة خبرة</span>
                    </div>
                    <div class="stat-item">
                        <span class="number">5000+</span>
                        <span class="label">مريض تعاملوا معنا</span>
                    </div>
                    <div class="stat-item">
                        <span class="number">98%</span>
                        <span class="label">نسبة نجاح العمليات</span>
                    </div>
                </div>

                <div class="hero-buttons">
                    <a class="btn-primary" href="{{ route('booking.index') }}">📅 احجز
                        موعداً</a>
                    <a class="btn-outline" href="{{ route('dashboard.index') }}">📊 لوحة
                        التحكم</a>
                </div>
            </div>

            <div class="hero-image">
                <div class="image-placeholder">
                    <span>👨‍⚕️</span>
                    <p>د. محمد محمود مسلّم</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== قسم الخدمات ===== -->
    <section class="services" id="services">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">خدماتنا</span>
                <h2>ما نقدمه لك</h2>
                <p>خدمات تشخيصية وعلاجية متكاملة في مجال طب وجراحة العيون</p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <span class="icon">👁️</span>
                    <h3>فحص العيون الشامل</h3>
                    <p>فحص دقيق لقوة الإبصار وضغط العين وشبكية العين</p>
                </div>
                <div class="service-card">
                    <span class="icon">🔬</span>
                    <h3>المياه البيضاء</h3>
                    <p>عمليات استخراج العدسة باستخدام أحدث التقنيات</p>
                </div>
                <div class="service-card">
                    <span class="icon">💡</span>
                    <h3>تصحيح الإبصار بالليزك</h3>
                    <p>علاج قصر النظر والاستجماتيزم باستخدام الليزر</p>
                </div>
                <div class="service-card">
                    <span class="icon">🩺</span>
                    <h3>المياه الزرقاء</h3>
                    <p>تشخيص وعلاج ارتفاع ضغط العين</p>
                </div>
                <div class="service-card">
                    <span class="icon">👶</span>
                    <h3>فحص العيون للأطفال</h3>
                    <p>فحص مبكر للأطفال للكشف عن مشاكل الإبصار</p>
                </div>
                <div class="service-card">
                    <span class="icon">📋</span>
                    <h3>استشارات ما قبل العمليات</h3>
                    <p>تقييم شامل قبل أي تدخل جراحي</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== قسم فريق العمل ===== -->
    <section class="team" id="team">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">فريق العمل</span>
                <h2>نخبة من الأطباء المتخصصين</h2>
                <p>فريق طبي متكامل تحت إشراف د. محمد محمود مسلّم</p>
            </div>
            <div class="team-grid">
                <div class="team-card">
                    <div class="avatar">👨‍⚕️</div>
                    <h4>د. محمد محمود مسلّم</h4>
                    <span class="role">استشاري طب وجراحة العيون</span>
                    <p>خبرة 15 عاماً في جراحات العيون</p>
                </div>
                <div class="team-card">
                    <div class="avatar">👩‍⚕️</div>
                    <h4>د. سارة أحمد</h4>
                    <span class="role">أخصائية البصريات</span>
                    <p>خبرة 8 سنوات في تشخيص وعلاج مشاكل الإبصار</p>
                </div>
                <div class="team-card">
                    <div class="avatar">👨‍⚕️</div>
                    <h4>د. خالد يوسف</h4>
                    <span class="role">أخصائي جراحة الشبكية</span>
                    <p>خبرة 10 سنوات في جراحات الشبكية والزجاجية</p>
                </div>
                <div class="team-card">
                    <div class="avatar">👩‍⚕️</div>
                    <h4>أ. ناديا عادل</h4>
                    <span class="role">أخصائية فحص العيون</span>
                    <p>خبرة 6 سنوات في فحوصات العيون المتقدمة</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== قسم شهادات المرضى ===== -->
    <section class="testimonials" id="testimonials">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">شهادات المرضى</span>
                <h2>ماذا يقولون عنا</h2>
                <p>آراء حقيقية من مرضى تعالجوا في عيادة د. محمد محمود مسلّم</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="stars">⭐⭐⭐⭐⭐</div>
                    <blockquote>"أفضل طبيب عيون تعاملت معه. إجراء عملية المياه البيضاء كانت سلسة والنتائج ممتازة. شكراً
                        د. مسلّم."</blockquote>
                    <div class="patient-name">أحمد خالد</div>
                    <div class="patient-detail">عملية ماء أبيض - 2025</div>
                </div>
                <div class="testimonial-card">
                    <div class="stars">⭐⭐⭐⭐⭐</div>
                    <blockquote>"بعد معاناة مع قصر النظر لسنوات، أجرت عملية ليزك عند د. مسلّم والآن أرى بوضوح. شكراً
                        للفريق الطبي."
                </div>
                <div class="patient-name">سارة محمود</div>
                <div class="patient-detail">عملية ليزك - 2025</div>
            </div>
            <div class="testimonial-card">
                <div class="stars">⭐⭐⭐⭐⭐</div>
                <blockquote>"ابنته كانت تعاني من حول بسيط، وبفضل فحص د. مسلّم الدقيق تمكننا من علاجها مبكراً. ننصح به
                    بشدة."
            </div>
            <div class="patient-name">أم محمد</div>
            <div class="patient-detail">فحص عيون طفل - 2026</div>
        </div>
</div>
</div>
</section>

</div>
@stop