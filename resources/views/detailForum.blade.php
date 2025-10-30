<x-layoutAdmin>
    <h1 class="h3 mb-3"><strong>Detail Forum</strong></h1>

    <div class="card mt-3">
        <div class="card-body">

            <!-- Bagian Detail -->
            <div class="row">
                <!-- Gambar -->
                <div class="col-md-4 mb-3 d-flex justify-content-center">
                    <div class=""
                        style="width:250px; aspect-ratio:1/1; overflow:hidden; border:1px solid #ddd; border-radius:8px;">
                        <img src="{{ asset('storage/'.$forum->gambar) }}" alt="Gambar Forum"
                            style="width:100%; height:100%; object-fit:cover;">
                    </div>
                </div>

                <!-- Informasi -->
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Forum</label>
                        <input type="text" class="form-control" value="{{ $forum->nama_forum }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Deskripsi</label>
                        <textarea class="form-control" rows="6">{{ $forum->deskripsi }}</textarea>
                    </div>
                </div>
            </div>

            {{-- <!-- Bagian Komentar -->
            <div class="mt-4">
                <h5 class="mb-3"><strong>Komentar</strong></h5>
                <textarea class="form-control" rows="3" placeholder="Tulis komentar..." readonly></textarea>
            </div> --}}

        </div>
    </div>
</x-layoutAdmin>
