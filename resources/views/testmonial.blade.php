<section class="testimonials" id="testimonials">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">شهادات المرضى</span>
            <h2>ماذا يقولون عنا</h2>
            <p>آراء حقيقية من مرضى تعالجوا في عيادة د. محمد محمود مسلّم</p>
        </div>

        <div class="testimonials-grid">
            <div class="testimonial-card">

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

        </div>
    </div>
    <h3>
        <a style="display: table; margin: 0 auto;" class="btn-primary" href="{{route('testimonial.index')}}">انت ايضاً
            يمكنك ان تضيف شيئ</a>
    </h3>
</section>