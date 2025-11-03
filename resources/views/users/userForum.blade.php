<x-layoutUser>
    <!-- Content -->
    <div class="container my-5">
        <div class="row g-4">
            <!-- Right: Sidebar -->

            <div class="col-lg-8">
                <div class="row g-4">
                    @forelse ($tampilForum as $data)
                        <!-- Left: Post -->
                        <div class="col-lg-12">
                            <div class="post-card">
                                <h4 class="fw-bold">{{ $data->nama_forum }}</h4>
                                <div class="post-img d-flex justify-content-center align-items-center text-muted">
                                    <img class="img-fluid"
                                        src="{{ asset('storage/' . $data->gambar ?? 'storage/img/profile.jpg') }}"
                                        alt="Profile Alumni" style="width:100%; height:100%; object-fit:cover;">
                                    {{-- <span>Gambar</span> --}}
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
