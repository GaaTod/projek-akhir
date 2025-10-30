<x-layoutUser>
    <div class="container">
        <h4 class="fw-bold mt-4">Tambah Forum</h4>
        <!-- Form Input -->
        <form action="{{ route('tambahforum-store') }}" method="POST" enctype="multipart/form-data">
            <div class="form-container">
                <div class="row align-items-center">
                    @csrf
                    <div class="col-md-6 text-center mb-3 mb-md-0">
                        <div class="upload-box mb-2">
                            <i class="bi bi-image"></i>
                            <span class="text-white">Gambar Preview</span>
                        </div>
                        <input type="file" class="form-control w-75 mx-auto" name="gambarforum">
                        <small>*Maks ukuran 500Kb</small>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Forum</label>
                            <input type="text" class="form-control" name="namaForum">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" rows="4" name="deskripsi"></textarea>
                        </div>
                        <div class="mb-3" id="input-durasi">
                            <label class="form-label fw-bold">Durasi Forum</label>
                            <div class="input-group">
                                <input type="number" name="durasi" class="form-control" value=""
                                    placeholder="Masa Aktif Forum" onfocus="this.showPicker()" required>
                                <span id="span-durasi" class="">
                                    <select name="tipe_durasi" class="form-control" id="pilih-durasi" required>
                                        <option value="" selected disabled>Pilih Durasi</option>
                                        <option value="jam">Jam</option>
                                        <option value="hari">Hari</option>
                                        <option value="minggu">Minggu</option>
                                    </select>
                                </span>
                            </div>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-upload">UPLOAD</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>

</x-layoutUser>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
