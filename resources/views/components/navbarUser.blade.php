<style>
    .navbar-brand span:first-child {
        color: #ffffff;
        font-weight: 700;
    }

    .navbar-brand span:last-child {
        color: #d3ff00;
        font-weight: 600;
    }

    body {
        background-color: #fff;
        font-family: "Poppins", sans-serif;
    }

    .btn-primary-custom {
        background-color: #33c0ff;
        border: none;
        font-weight: 600;
        color: #000;
    }

    .btn-primary-custom:hover {
        background-color: #29a9e0;
        color: #fff;
    }

    .alumni-card {
        background-color: #e6e6e6;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 15px;
    }

    .alumni-img {
        width: 100px;
        height: 100px;
        background-color: #ddd;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #aaa;
        font-size: 14px;
    }

    .text-truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }


    .navbar-custom {
        background-color: #1A0D91;
        padding: 0.8rem 1rem;
    }

    .navbar-brand span:first-child {
        color: #ffffff;
        font-weight: 700;
    }

    .navbar-brand span:last-child {
        color: #d3ff00;
        font-weight: 600;
    }

    .navbar-nav .nav-link {
        color: #fff !important;
        font-weight: 600;
        margin-right: 20px;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
        text-decoration: underline;
    }

    .btn-login {
        background-color: #5A8BFF;
        color: #fff;
        font-weight: 600;
        border-radius: 10px;
        padding: 5px 15px;
    }

    .btn-login:hover {
        background-color: #3d6df5;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid px-4">
        <a class="navbar-brand" href="#">
            <span>Sistem</span> <span>Alumni</span>
        </a>

        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.user') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('userAlumni-user') }}">Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('userForum-user') }}">Forum</a>
                </li>
        </div>
        @auth
            <li class="nav-item d-flex align-items-center">
                <a href="{{ route('profile.edit') }}" class="d-flex align-items-center text-decoration-none">
                    <span class="fw-semibold text-white">
                        {{ Auth::user()->tb_biodata->nama ?? 'Pengguna' }}
                    </span>
                    <img src="{{ asset('storage/img/' . Auth::user()->tb_biodata->gambar ?? '/storage/img/profile.jpg') }}"
                        alt="Foto Profil" class="rounded-circle ms-2" width="35" height="35"
                        style="object-fit: cover; border: 2px solid #ddd;">
                </a>
            </li>

            <li class="nav-item ms-3">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm d-flex align-items-center">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </button>
                </form>
            </li>
        @else
            <li class="nav-item">
                <a class="btn btn-login" href="{{ route('login') }}">Masuk</a>
            </li>
        @endauth
        </ul>
    </div>
</nav>

{{-- <nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid px-4 d-flex justify-content-between align-items-center">

        <!-- Kiri -->
        <div class="d-flex align-items-center">
            <a class="navbar-brand" href="#">
                <span>Sistem</span> <span>Alumni</span>
            </a>
        </div>

        <!-- Tengah -->
        <div class="collapse navbar-collapse justify-content-center flex-grow-1" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.user') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('userAlumni-user') }}">Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('userForum-user') }}">Forum</a>
                </li>
            </ul>
        </div>

        <!-- Kanan -->
        <div class="d-flex align-items-center ms-auto">
            @auth
                <a href="{{ route('profile.edit') }}" class="d-flex align-items-center text-decoration-none me-3">
                    <span class="fw-semibold text-white text-truncate" style="max-width: 150px;">
                        {{ Auth::user()->tb_biodata->nama ?? 'Pengguna' }}
                    </span>
                    <img src="{{ asset('storage/img/' . (Auth::user()->tb_biodata->gambar ?? 'profile.jpg')) }}"
                        alt="Foto Profil" class="rounded-circle ms-2" width="35" height="35"
                        style="object-fit: cover; border: 2px solid #ddd;">
                </a>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm d-flex align-items-center">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </button>
                </form>
            @else
                <a class="btn btn-login" href="{{ route('login') }}">Masuk</a>
            @endauth
        </div>
    </div>
</nav> --}}
