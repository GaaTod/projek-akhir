<style>
    /* efek hover halus */
    .card-hover {
        transition: transform .18s ease, box-shadow .18s ease;
    }

    .card-hover:hover {
        transform: translateY(-2px);
        box-shadow: 0 .75rem 1.5rem rgba(0, 0, 0, .06);
    }

    /* potong deskripsi 3 baris */
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        overflow: hidden;
    }

    /* wadah gambar biar konsisten */
    .post-thumb {
        border-radius: .75rem;
        overflow: hidden;
        background: #f2f2f2;
    }

    /* meta kecil & lembut */
    .post-meta {
        font-size: .875rem;
        color: #6c757d;
    }

    /* empty state */
    .empty-state {
        border: 1px dashed #d0d7de;
        background: #f8f9fa;
    }
</style>
<x-layoutUser>
    @section('title', 'Dashboard | Forum Diskusi Alumni')
    <!-- Content -->
    <div class="container my-5">
        <div class="row g-4 align-items-stretch"> <!-- biarkan kolom punya tinggi yang sama -->
            <!-- Right: Sidebar -->

            <div class="col-lg-8 d-flex"> <!-- jadikan kolom kiri flex -->
                {{-- <div class="row g-4 flex-grow-1"> <!-- biar isi ikut memenuhi tinggi kolom -->
                    @forelse ($tampilForum as $data)
                        <!-- Left: Post -->
                        <div class="col-lg-12">
                            <div class="post-card">
                                <h4 class="fw-bold">{{ $data->nama_forum }}</h4>
                                <a class="fw-bold"
                                    href="{{ route('detailForum-user', $data->id) }}">{{ $data->nama_forum }}</a>
                                <div class="post-img d-flex justify-content-center align-items-center text-muted">
                                    <img class="img-fluid" src="{{ asset('storage/' . $data->gambar) }}"
                                        alt="gambar forum" style="width:100%; height:100%; object-fit:cover;">
                                </div>
                                <p>{{ $data->deskripsi }}</p>
                                <p class="fw-semibold mb-0">Diposting oleh
                                    {{ $data->user->tb_biodata->nama ?? 'admin' }}
                                </p>
                                <p class="post-meta">
                                    {{ \Carbon\Carbon::parse($data->created_at)->format('H:i - d/m/Y') }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-12 d-flex align-items-center"> <!-- pusat vertikal -->
                            <div class="alert alert-warning rounded-4 w-100 text-center mb-0">
                                Tidak ada forum diskusi tersedia.
                            </div>
                        </div>
                    @endforelse
                </div> --}}
                <div class="row g-4 flex-grow-1">
                    @forelse ($tampilForum as $data)
                        <div class="col-12">
                            <article class="card border-0 shadow-sm card-hover h-100 rounded-4">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <span class="badge bg-primary-subtle text-primary fw-semibold">Forum</span>
                                        <span class="post-meta">
                                            {{ \Carbon\Carbon::parse($data->created_at)->format('H:i - d/m/Y') }}
                                        </span>
                                    </div>

                                    <h3 class="h4 fw-bold mb-1">{{ $data->nama_forum }}</h3>
                                    {{-- <a class="fw-semibold link-primary text-decoration-none mb-3 d-inline-block"
                                        href="{{ route('detailForum-user', $data->id) }}">
                                        Lihat detail diskusi
                                    </a> --}}

                                    <!-- Thumbnail konsisten 16:9 -->
                                    <div class="ratio ratio-16x9 post-thumb mb-3">
                                        <img src="{{ asset('storage/' . $data->gambar) }}"
                                            class="w-100 h-100 object-fit-cover"
                                            alt="Gambar forum: {{ $data->nama_forum }}">
                                    </div>

                                    <p class="mb-3 line-clamp-3">{{ $data->deskripsi }}</p>

                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="fw-semibold">
                                            Diposting oleh {{ $data->user->tb_biodata->nama ?? 'admin' }}
                                        </div>
                                        <a href="{{ route('detailForum-user', $data->id) }}"
                                            class="btn btn-sm btn-primary rounded-pill px-3">
                                            Buka Diskusi
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @empty
                        <div class="col-12 d-flex align-items-center">
                            <div class="empty-state w-100 text-center rounded-4 p-5">
                                <div class="mb-2 fs-5 fw-semibold">Tidak ada forum diskusi tersedia</div>
                                <div class="text-muted mb-3">Saat ini belum ada topik. Coba kembali nanti.</div>
                                {{-- Opsional: tampilkan tombol buat topik jika user berhak --}}
                                {{-- <a href="{{ route('forum.create') }}" class="btn btn-primary rounded-pill px-4">Buat Topik</a> --}}
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="col-lg-4">
                <h6 class="fw-bold mb-3">Informasi terkini</h6>
                <div class="sidebar-info">
                    <div class="info-item">
                        <div class="info-thumb"></div>
                        <div class="info-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit</div>
                    </div>
                    <div class="info-item">
                        <div class="info-thumb"></div>
                        <div class="info-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit</div>
                    </div>
                    <div class="info-item">
                        <div class="info-thumb"></div>
                        <div class="info-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit</div>
                    </div>
                    <div class="info-item">
                        <div class="info-thumb"></div>
                        <div class="info-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-layoutUser>
