<x-layoutUser>
    <!-- Content -->
    <div class="container my-5">
        <h3 class="fw-bold mb-4">Cari Data Alumni</h3>

        <!-- Search Form -->
        <div class="bg-light p-3 rounded mb-4">
            <form class="row g-3 align-items-end">
                <div class="col-md-5">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" placeholder="Masukan nama lengkap">
                </div>

                <div class="col-md-3">
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
                <div class="col-md-4 d-flex">
                    <button type="button" class="btn btn-secondary me-2">
                        <i class="bi bi-arrow-repeat"></i> Reload
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
                    <div class="col-lg-9">
                        <div class="d-flex align-items-center">
                            <div class="alumni-img me-3">
                                <div class="col-md-4 mb-3 d-flex justify-content-center">
                                    <div class=""
                                        style="width:250px; aspect-ratio:1/1; overflow:hidden; border:1px solid #ddd; border-radius:8px;">
                                        <img class="img-fluid"
                                            src="{{ asset('storage/' . $data->gambar ?? 'storage/img/profile.jpg') }}"
                                            alt="Profile Alumni" style="width:100%; height:100%; object-fit:cover;">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="mb-1"><strong>Nama :</strong>{{ $data->nama }}</p>
                                <p class="mb-1"><strong>NPM :</strong> {{ $data->user->npm }}</p>
                                <p class="mb-1"><strong>No HP :</strong> {{ $data->no_telp }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div>
                            <p class="mb-1 "><strong>Angkatan :</strong>{{ $data->angkatan->angkatan }}</p>
                            <p class="mb-1"><strong>Tanggal Lahir :</strong>
                                {{ \Carbon\Carbon::parse($data->tanggal_lahir)->format('d-m-Y') }}</p>
                            <p class="mb-1"><strong>Pekerjaan :</strong>{{ $data->pekerjaan }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <td class="text-center" colspan="5">Belum ada data</td>
        @endforelse

    </div>
</x-layoutUser>
