<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title' ?? 'Sistem Alumni | Dashboard')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-color: #f9f9f9;
        }

        /* Hero Section */
        .hero {
            position: relative;
            text-align: center;
            color: white;
        }

        .hero img {
            width: 100%;
            height: 450px;
            object-fit: cover;
            filter: brightness(45%);
        }

        .hero-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 90%;
        }

        .hero-text h1 {
            font-weight: 800;
            font-size: 2.5rem;
            line-height: 1.3;
        }

        .form-container {
            background-color: #f5f6f8;
            padding: 30px;
            border-radius: 5px;
            margin-top: 40px;
        }

        .form-label {
            font-weight: 600;
            color: #000;
        }

        .upload-box {
            width: 100%;
            height: 250px;
            background-color: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.5rem;
        }

        .btn-upload {
            background-color: #00FF00;
            color: #000;
            font-weight: 700;
            border-radius: 8px;
            padding: 6px 25px;
            box-shadow: 2px 3px 0 #222;
        }

        .btn-upload:hover {
            background-color: #00cc00;
            color: #fff;
        }

        small {
            font-size: 0.75rem;
            color: #888;
        }

        /* Informasi Section */
        .informasi {
            background-color: #fff;
            padding: 40px 5%;
        }

        .informasi h5 {
            font-weight: 600;
            margin-bottom: 25px;
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .info-item img {
            width: 80px;
            height: 80px;
            background-color: #e0e0e0;
            margin-right: 15px;
            border-radius: 8px;
            object-fit: cover;
        }

        .info-text {
            color: #333;
            font-size: 0.95rem;
        }

        .konten-kanan {
            background-color: #dcdcdc;
            height: 220px;
            border-radius: 8px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <x-navbarUser></x-navbarUser>

    <main class="main">
        {{ $slot }}
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Validasi Gagal!',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonText: 'Mengerti'
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    @if (session('password_default'))
        <script>
            Swal.fire({
                title: 'Password Default',
                html: 'Password default akun ini adalah: <b>{{ session('password_default') }}</b>',
                icon: 'info',
                confirmButtonText: 'Salin Password',
            }).then((result) => {
                if (result.isConfirmed) {
                    navigator.clipboard.writeText("{{ session('password_default') }}");
                    Swal.fire('Disalin!', 'Password sudah disalin ke clipboard.', 'success');
                }
            });
        </script>
    @endif

</body>

</html>
