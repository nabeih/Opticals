<header>
    <div class="container">
        <div class="logo">
            <span class="icon">👁️</span>
            د. <span>محمد محمود مسلّم</span>
        </div>
        <nav>
            <a class="nav-link" onclick="showPage('home')">الرئيسية</a>
            <a class="nav-link" onclick="showPage('home')">عن العيادة</a>
            <a class="nav-link" onclick="showPage('home')">الخدمات</a>
            <a class="nav-link" onclick="showPage('home')">فريق العمل</a>
            <a class="nav-link btn-nav" href="{{ route('booking.index') }}">📅 حجز موعد</a>
            <a class="nav-link btn-nav" href="{{ route('dashboard.index') }}" style="background:#1e40af;">📊 لوحة
                التحكم</a>
        </nav>
    </div>
</header>