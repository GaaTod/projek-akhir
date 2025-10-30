<x-layoutAdmin>
    <div class="mb-3">
        <h1 class="h3 align-middle"><strong>Data Forum</strong></h1>

        <!-- Tombol Tambah Data -->
        <button type="button" class="btn btn-primary mb-3 mt-2" data-bs-toggle="modal" data-bs-target="#modaltambahforum">
            <i class="bi bi-plus-lg"></i>Tambah Data
        </button>

        <div class="card mt-2">
            <div class="card-body pt-4 w-100">
                <table class="table table-striped-columns">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Nama forum</th>
                            <th scope="col">Pemilik</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Durasi</th>
                            <th scope="col">status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($forum as $data)
                            <tr class="text-center">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->nama_forum }}</td>
                                <td>

                                    {{ $data->user->tb_biodata->nama ?? 'admin' }}

                                </td>
                                <td class ="text-start">
                                    {{ Str::of($data->deskripsi)->limit(30, preserveWords: true) }}
                                </td>
                                <td>{{ $data->durasi }}</td>
                                <td>
                                    @if ($data['waktu_berakhir'] > now())
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Non-Aktif</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('detailForum-admin', $data->id) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        <form action="{{ route('dataForum-admin-delete', $data->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm btn-delete">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                        </form>
                                        @php
                                            $login = Auth::user()->id;
                                        @endphp
                                        @if ($data->user->id != $login)
                                            <a href="" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Tambah Data-->
        <div class="modal fade" id="modaltambahforum" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"><strong>Tambah Forum</strong></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('dataForum-admin') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Forum</label>
                                <input type="text" name="nama_forum" class="form-control" value="" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Deskripsi</label>
                                <textarea type="text" name="desk" class="form-control" value="contoh" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Pilih Durasi</label>
                                <select name="tipe_durasi" class="form-control" id="pilih-durasi" required>
                                    <option value="" selected>Pilih Durasi</option>
                                    <option value="jam">Jam</option>
                                    <option value="hari">Hari</option>
                                    <option value="minggu">Minggu</option>
                                </select>
                            </div>
                            <div class="mb-3" id="input-durasi" hidden>
                                <label class="form-label fw-bold">Durasi Forum</label>
                                <div class="input-group">
                                    <input type="number" name="durasi" class="form-control" value=""
                                        placeholder="Masa Aktif Forum" onfocus="this.showPicker()" required>
                                    <span id="span-durasi" class="input-group-text">Jam</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Upload Konten</label>
                                <input type="file" name="gambar" class="form-control" value="contoh" required>
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

        <script>
            document.getElementById("pilih-durasi").addEventListener("change", function() {
                const tipe = this.value;
                const inputDurasi = document.getElementById("input-durasi");
                const spanDurasi = document.getElementById("span-durasi");

                if (tipe) {
                    // tampilkan elemen (hapus atribut hidden)
                    inputDurasi.removeAttribute("hidden");
                } else {
                    // sembunyikan kembali
                    inputDurasi.setAttribute("hidden", true);
                }

                // ubah teks di span sesuai pilihan
                if (tipe === "jam") {
                    spanDurasi.textContent = "Jam";
                } else if (tipe === "hari") {
                    spanDurasi.textContent = "Hari";
                } else if (tipe === "minggu") {
                    spanDurasi.textContent = "Minggu";
                } else {
                    spanDurasi.textContent = "";
                }
            });
        </script>
</x-layoutAdmin>
