<x-layoutUser>
    @section('title', 'Edit Profil')

    {{-- Edit Profile --}}
    <div class="container py-4">
        <h2 class="mb-4 text-center fw-bold">Profil</h2>

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-4 rounded shadow">
            @csrf
            @method('PATCH')

            <div class="row">
                <!-- KIRI: Foto Profil -->
                <div class="col-md-4 text-center border-end">
                    <div class="mb-3">
                        <img src="{{ asset('storage/img/' . $user->tb_biodata->gambar ?? 'storage/img/profile.jpg') }}"
                            alt="Foto Profil" class="rounded-circle shadow-sm mb-3" width="160" height="160"
                            style="object-fit: cover;">
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label fw-semibold">Ubah Foto Profil</label>
                        <input type="file" class="form-control" name="gambar" id="gambar" accept="image/*">
                        @error('gambar')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr>

                    <!-- Form Ganti Password -->
                    <h5 class="fw-bold mt-4">Ubah Password</h5>
                    <div class="text-start">
                        <div class="mb-3">
                            <label class="form-label">Password Lama</label>
                            <input type="password" name="old_password" class="form-control">
                            @error('old_password')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password Baru</label>
                            <input type="password" name="new_password" class="form-control">
                            @error('new_password')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" name="new_password_confirmation" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- KANAN: Data Profil -->
                <div class="col-md-8">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control"
                                value="{{ old('nama', $user->tb_biodata->nama ?? '') }}">
                            @error('nama')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $user->email ?? '') }}">
                            @error('email')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">NPM</label>
                            <input type="text" name="npm" class="form-control"
                                value="{{ old('npm', $user->npm ?? '') }}" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">No. Telepon</label>
                            <input type="text" name="no_telp" class="form-control"
                                value="{{ old('no_telp', $user->tb_biodata->no_telp ?? '') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Jenis Kelamin</label>
                            <input type="text" name="jk" class="form-control"
                                value="{{ old('tempat', $user->tb_biodata->jenis_kelamin ?? '') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat" class="form-control"
                                value="{{ old('tempat', $user->tb_biodata->tempat ?? '') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control"
                                value="{{ old('tanggal_lahir', $user->tb_biodata->tanggal_lahir ?? '') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Angkatan</label>
                            <input type="text" name="angkatan" class="form-control"
                                value="{{ old('angkatan', $user->tb_biodata->angkatan ?? '') }}" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tahun Lulus</label>
                            <input type="number" name="tahun_lulus" class="form-control"
                                value="{{ old('tahun_lulus', $user->tb_biodata->tahun_lulus ?? '') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control"
                                value="{{ old('pekerjaan', $user->tb_biodata->pekerjaan ?? '') }}">
                        </div>
                    </div>

                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
                        <a href="{{ route('dashboard.user') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- Riwayat --}}
    <div class="container py-4">
        <h2 class="mb-4 text-center fw-bold">Riwayat Forum</h2>
        {{-- <div class="text-end">
            <button class="btn btn-upload">Tambah Forum</button>
        </div> --}}
        <form action="" method="POST" class="bg-white p-4 rounded shadow">
            <div class="text-end mb-3">
                {{-- <button type="submit" class="btn btn-primary px-4">
                    <a href="{{ route('addForum-user') }}">Tambah Forum</a>
                </button> --}}
                <a href="{{ route('addForum-user') }}" class="btn btn-primary px-4 text-white text-decoration-none">
                    Tambah Forum
                </a>

            </div>
            @forelse ($tampilForum as $data)
                <div class="alumni-card d-flex justify-content-between align-items-center flex-wrap">
                    <div class="d-flex align-items-center">
                        <div class="alumni-img me-3">
                            <span>Img</span>
                        </div>
                        <div>
                            <p class="mb-1"><strong>Nama Forum: </strong>{{ $data->nama_forum }}</p>
                            <p class="mb-1"><strong>Deskripsi: </strong> {{ $data->deskripsi }} </p>
                        </div>
                    </div>
                    <div>
                        <p class="mb-0 text-end">
                            <strong>Status</strong>
                            @if ($data['waktu_berakhir'] > now())
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-danger">Non-Aktif</span>
                            @endif
                        </p>
                        <p class="mb-1 post-meta"><strong>Di posting :</strong>
                            {{ \Carbon\Carbon::parse($data->created_at)->format('H:i - d/m/Y') }}
                        </p>
                    </div>
                </div>
            @empty
            @endforelse
        </form>
    </div>
</x-layoutUser>
