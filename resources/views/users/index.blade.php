<x-layoutUser>
    <!-- Hero Section -->
    <section class="hero">
        <img src="https://picsum.photos/1200/675?blur=1" alt="Gedung Kampus">
        <div class="hero-text">
            <h1>
                SELAMAT DATANG <br>
                SISTEM ALUMNI PRODI <br>
                D-III MANAJEMEN INFORMATIKA
            </h1>
        </div>
    </section>

    <!-- Informasi Section -->
    <section class="informasi">
        <div class="row">
            <!-- Kolom kiri -->
            <div class="col-md-4">
                <h5>Informasi terkini</h5>
                <div class="info-item text-center">
                    <img src="https://via.placeholder.com/80" alt="Berita 1">
                    <div class="info-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                    </div>
                </div>
                <div class="info-item">
                    <img src="https://via.placeholder.com/80" alt="Berita 2">
                    <div class="info-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                    </div>
                </div>
            </div>

            <!-- Kolom kanan -->
            <div class="col-md-8">
                <div class="konten-kanan"></div>
            </div>
        </div>
    </section>
</x-layoutUser>/
<script>
    document.querySelectorAll('form[action="{{ route('logout') }}"]').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Yakin ingin keluar?',
                text: "Sesi kamu akan berakhir.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, keluar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
