<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title' ?? 'Sistem Informasi Alumni')</title>

    <!-- Link Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .login-container {
            display: flex;
            height: 100vh;
        }

        /* Gambar kiri */
        .left-side {
            flex: 1;
            overflow: hidden;
        }

        .left-side img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Form kanan */
        .right-side {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fff;
        }

        .login-box {
            width: 80%;
            max-width: 400px;
        }

        .login-title {
            font-weight: 700;
            font-size: 22px;
        }

        .login-title span {
            color: #5A35F0;
            /* Warna ungu ALUMNI */
        }

        .btn-primary {
            background-color: #5A35F0;
            border: none;
        }

        .btn-primary:hover {
            background-color: #4a2ed1;
        }

        .form-control {
            border-radius: 8px;
            height: 45px;
        }

        .form-label {
            font-weight: 500;
        }

        .forgot-password {
            text-align: right;
        }

        .forgot-password a {
            color: #5A35F0;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>


    <div class="login-container">
        {{ $slot }}
    </div>


    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
