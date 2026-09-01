<!-- ===== قسم شهادات المرضى ===== -->
{{-- <section class="testimonials" id="testimonials">
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
</section> --}}
<section class="testimonials" id="testimonials">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">شهادات المرضى</span>
            <h2>ماذا يقولون عنا</h2>
            <p>آراء حقيقية من مرضى تعالجوا في عيادة د. محمد محمود مسلّم</p>
        </div>

        <div class="testimonials-grid">
            <div class="testimonial-card">
                {{-- <div class="quote-icon"><i class="fa-solid fa-quote-right"></i></div> --}}
                {{-- <div class="stars">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div> --}}

                <div class="testimonials-horizontal-wrapper">
                    <div class="testimonials-slider">
                        @forelse ($testimonials as $testimonial)
                            <div class="testimonial-card">
                                <div class="stars">
                                    @for ($i = 0; $i < $testimonial->rating; $i++)
                                        <i class="fa-solid fa-star"></i>
                                    @endfor
                                </div>

                                <blockquote>
                                    <i class="fa-solid fa-quote-right"></i>
                                    {{ $testimonial->message }}
                                </blockquote>

                                <div class="patient-info">
                                    <span class="patient-name">{{ $testimonial->name }}</span>
                                    <span class="patient-detail">مريض بالعيادة</span>
                                </div>
                            </div>
                        @empty
                            <p style="text-align: center; width: 100%;">لا توجد آراء مضافة حالياً</p>
                        @endforelse
                    </div>
                </div>

            </div>

            {{-- <div class="testimonial-card">
                <div class="quote-icon"><i class="fa-solid fa-quote-right"></i></div>
                <div class="stars">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <blockquote>"بعد معاناة مع قصر النظر لسنوات، أجريت عملية ليزك عند د. مسلّم والآن أرى بوضوح. شكراً للفريق
                    الطبي."</blockquote>
                <div class="patient-info">
                    <div class="patient-avatar">سم</div>
                    <div>
                        <div class="patient-name">سارة محمود</div>
                        <div class="patient-detail">عملية ليزك - 2025</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="quote-icon"><i class="fa-solid fa-quote-right"></i></div>
                <div class="stars">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <blockquote>"ابنتي كانت تعاني من حول بسيط، وبفضل فحص د. مسلّم الدقيق تمكننا من علاجها مبكراً. ننصح به
                    بشدة."</blockquote>
                <div class="patient-info">
                    <div class="patient-avatar">أم</div>
                    <div>
                        <div class="patient-name">أم محمد</div>
                        <div class="patient-detail">فحص عيون طفل - 2026</div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <h3>
        <a style="display: table; margin: 0 auto;" class="btn-primary" href="{{route('testimonial.index')}}">انت ايضاً
            يمكنك ان تضيف شيئ</a>
    </h3>
</section>