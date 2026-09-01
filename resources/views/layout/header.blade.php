<header>
    <div class="container">
        <div class="logo">
            {{-- <span class="icon"><img  src="{{ asset('assets/images/logo.jpg') }}"></span> --}}
            د. <span>محمد محمود مسلّم</span>
        </div>
        {{-- <nav>
            <a class="nav-link" href="{{route('home')}}">الرئيسية</a>
            <a class="nav-link" href="{{route('home')}}">عن العيادة</a>
            <a class="nav-link" href="{{route('home')}}">الخدمات</a>
            <a class="nav-link" href="{{route('home')}}">فريق العمل</a>
            <a class="nav-link btn-nav" href="{{ route('booking.index') }}">📅 حجز موعد</a>
            <a class="nav-link btn-nav" href="{{ route('dashboard.index') }}" style="background:#1e40af;">📊 لوحة
                التحكم</a>
        </nav> --}}
        <nav>
    <a class="nav-link" href="{{ route('home') }}#hero">الرئيسية</a>
    {{-- <a class="nav-link" href="{{ route('home') }}#about">عن العيادة</a> --}}
    <a class="nav-link" href="{{ route('home') }}#services">الخدمات</a>
    <a class="nav-link" href="{{ route('home') }}#team">فريق العمل</a>
    <a class="nav-link btn-nav" href="{{ route('booking.index') }}">📅 حجز موعد</a>
    <a class="nav-link btn-nav" href="{{ route('dashboard.index') }}" style="background:#1e40af;">📊 لوحة التحكم</a>
</nav>
    </div>
</header>
