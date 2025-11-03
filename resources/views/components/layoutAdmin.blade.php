<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />
    <link rel="canonical" href="https://demo-basic.adminkit.io/" />
    <title>Project Alumni</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet" />

    {{-- data table --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="wrapper">
        <x-sidebarAdmin></x-sidebarAdmin>
        <div class="main">
            <x-navbarAdmin></x-navbarAdmin>
            <main class="content">
                <div class="container-fluid p-0">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>

<script src="{{ asset('js/app.js') }}"></script>

{{-- data table --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Pesan SweetAlert Global -->
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
        })
    </script>
@endif

{{-- SweetAlert untuk semua pesan validasi --}}
@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Validasi Gagal!',
            html: `{!! implode('<br>', $errors->all()) !!}`,
            confirmButtonText: 'Mengerti'
        })
    </script>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.btn-delete');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const form = this.closest('form');

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    // text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>

</html>
