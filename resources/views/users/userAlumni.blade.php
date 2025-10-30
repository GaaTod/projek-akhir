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
                        <option>22</option>
                        <option>23</option>
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
        <div class="alumni-card d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex align-items-center">
                <div class="alumni-img me-3">
                    <span>Img</span>
                </div>
                <div>
                    <p class="mb-1"><strong>Nama :</strong> Imam</p>
                    <p class="mb-1"><strong>NPM :</strong> 22xxxxxxxx12</p>
                    <p class="mb-1"><strong>No HP :</strong> 0851202021010</p>
                </div>
            </div>
            <div>
                <p class="mb-0 text-end"> <strong>Komting</strong> </p>
                <p class="mb-1"><strong>Tanggal Lahir :</strong> XX-XX-XXXX</p>
                <p class="mb-1"><strong>Pekerjaan :</strong> PNS</p>
                <p class="mb-1 "><strong>Angkatan :</strong> 22</p>
            </div>
        </div>

        <div class="alumni-card d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex align-items-center">
                <div class="alumni-img me-3">
                    <span>Img</span>
                </div>
                <div>
                    <p class="mb-1"><strong>Nama :</strong> Agatha</p>
                    <p class="mb-1"><strong>NPM :</strong> 22xxxxxxxx17</p>
                    <p class="mb-1"><strong>No HP :</strong> 085XXXXXX10</p>
                </div>
            </div>
            <div>
                <p class="mb-1"><strong>Tanggal Lahir :</strong> XX-XX-XXXX</p>
                <p class="mb-1"><strong>Pekerjaan :</strong> Influencer</p>
                <p class="mb-1 text-end"><strong>Angkatan :</strong> 22</p>
            </div>
        </div>

    </div>
</x-layoutUser>
