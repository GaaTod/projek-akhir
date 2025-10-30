<x-layoutAdmin>
    <div class="mb-3">
        <h1 class="h3  align-middle"><strong>Data Angkatan</strong></h1>

        <!-- Tombol Tambah Data -->
        <button type="button" class="btn btn-primary mb-3 mt-2" data-bs-toggle="modal"
            data-bs-target="#modaltambahAngkatan">
            <i class="bi bi-plus-lg"></i>Tambah Data
        </button>

        {{-- @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif --}}


        <div class="card mt-2">
            <div class="card-body pt-4">
                <table class="table table-striped-columns">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Angkatan</th>
                            <th scope="col">Laki-laki</th>
                            <th scope="col">Perempuan</th>
                            <th scope="col">jumlah</th>
                            <th scope="col" class="text-nowrap text-center" style="width:1%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($angkatans as $data)
                            <tr class="text-center">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->angkatan }}</td>
                                <td>{{ $data->laki_laki_count }}</td>
                                <td>{{ $data->perempuan_count }}</td>
                                <td>{{ $data->biodatas_count }}</td>
                                <td class="text-nowrap text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <form action="{{ route('angkatan.destroy', $data->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm btn-delete" onclick="">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                        </form>
                                        <button href="" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modalEditAngkatan{{ $data->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal Edit Angkatan-->
                            <div class="modal fade" id="modalEditAngkatan{{ $data->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel"><strong>Edit
                                                    Data {{ $data->angkatan }}</strong></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('angkatan.update', $data->id) }}" method="POST"
                                            class="modal-content">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Angkatan</label>
                                                    <input type="number" name="angkatan" class="form-control"
                                                        value="{{ $data->angkatan }}" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <td class="text-center" colspan="4">Belum ada data</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Tambah Data-->
        <div class="modal fade" id="modaltambahAngkatan" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"><strong>Tambah Angkatan</strong></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('angkatan.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Angkatan</label>
                                <input type="text" name="angkatan" class="form-control">
                                @error('angkatan')
                                    <label class="form-label text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </label>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success">Tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</x-layoutAdmin>
