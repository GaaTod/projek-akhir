<x-layoutUser>
    <!-- Content -->
    <div class="container my-5">
        <h3 class="fw-bold mb-4">Cari Data Alumni</h3>

        <!-- Search Form -->
        <div class="bg-light p-3 rounded mb-4">
            <form class="row g-3 align-items-end">
                <div class="col-md-8">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" placeholder="Masukan nama lengkap">
                </div>

                <div class="col-md-2">
                    <label class="form-label">Angkatan</label>
                    <select class="form-select">
                        <option value="">Pilih Angkatan</option>
                        @forelse ($tampilBiodata as $data)
                            <option value="{{ $data->angkatan }}">{{ $data->angkatan->angkatan }}</option>
                        @empty
                            <option value="" disabled>--Data Kosong--</option>
                        @endforelse
                    </select>
                </div>
                <div class="col-md-2 d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary me-2">
                        <i class="bi bi-arrow-repeat"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-info text-dark">
                        <i class="bi bi-search"></i> Search
                    </button>
                </div>
            </form>
        </div>

        <!-- Data Alumni -->
        @forelse ($tampilBiodata as $data)
            <div class="alumni-card">
                <div class="row">
                    <div class="col-lg-12">
                        {{-- <div class="d-flex align-items-center">
                            <div class="alumni-img me-3">
                                <div class="col-md-4 mb-3 d-flex justify-content-center">
                                    <div
                                        style="width:100px; height:100px; overflow:hidden; border:2px solid #ddd; border-radius:10px; flex-shrink: 0;">
                                        <img class="img-fluid"
                                            src="{{ asset('storage/img/' . ($data->foto ?? 'profile.jpg')) }}"
                                            alt="Profile Alumni" style="width:100%; height:100%; object-fit:cover;">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="mb-1"><strong>Nama :</strong>{{ $data->nama }}</p>
                                <p class="mb-1"><strong>NPM :</strong> {{ $data->user->npm }}</p>
                                <p class="mb-1"><strong>No HP :</strong> {{ $data->no_telp }}</p>
                            </div>
                        </div> --}}
                        <div class="d-flex align-items-center p-3 rounded" style="background:#e6e6e6;">
                            <div
                                style="width:100px;height:100px;border-radius:10px;overflow:hidden;border:2px solid #ddd;flex-shrink:0;">
                                <img src="{{ asset('storage/img/' . ($data->foto ?? 'profile.jpg')) }}"
                                    alt="Profile Alumni" style="width:100%; height:100%; object-fit:cover;">
                            </div>

                            <div class="ms-3 w-100 d-flex justify-content-between">
                                <div>
                                    <p class="mb-1"><strong>Nama :</strong> {{ $data->nama }}</p>
                                    <p class="mb-1"><strong>NPM :</strong> {{ $data->user->npm }}</p>
                                    <p class="mb-0"><strong>No HP :</strong> {{ $data->no_telp }}</p>
                                </div>
                                <div>
                                    <p class="mb-1"><strong>Angkatan :</strong> {{ $data->angkatan->angkatan }}</p>
                                    <p class="mb-1"><strong>Tanggal Lahir :</strong> {{ $data->tanggal_lahir }}</p>
                                    <p class="mb-0"><strong>Pekerjaan :</strong> {{ $data->pekerjaan }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- <div class="col-lg-3">
                        <div>
                            <p class="mb-1 "><strong>Angkatan :</strong>{{ $data->angkatan->angkatan }}</p>
                            <p class="mb-1"><strong>Tanggal Lahir :</strong>
                                {{ \Carbon\Carbon::parse($data->tanggal_lahir)->format('d-m-Y') }}</p>
                            <p class="mb-1"><strong>Pekerjaan :</strong>{{ $data->pekerjaan }}</p>
                        </div>
                    </div> --}}
                </div>
            </div>
        @empty
            <p class="text-center">-- Data Alumni Tidak Ditemukan --</p>
        @endforelse

    </div>
</x-layoutUser>
