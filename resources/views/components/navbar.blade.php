<nav class="navbar navbar-expand-lg app-navbar">
    <div class="container">
        <a class="navbar-brand fw-semibold d-inline-flex align-items-center gap-2" href="{{ route('home') }}">
            <img src="{{ asset('images/Logo/RDMS-Logo.png') }}" alt="RDMS Logo" style="width: 28px; height: 28px; object-fit: contain;">
            <span>BSIT OJT BLOG</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center" style="gap: 10px;">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#about">About</a></li>
            </ul>
        </div>
    </div>
</nav>
