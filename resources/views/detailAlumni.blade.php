<x-layoutAdmin>
    <h1 class="h3 mb-3"><strong>Detail Alumni</strong></h1>

    {{-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-dark" href="{{ route('dataAlumni-admin') }}">Data Alumni</a></li>
            <li class="breadcrumb-item active" aria-current="page">Biodata</li>
        </ol>
    </nav> --}}

    <div class="card mt-3">
        <div class="card-body">
            <div class="row align-items-start">
                {{-- <div class="col-md-4 mb-3 d-flex justify-content-center">
                    <div
                        style="width:250px; aspect-ratio:1/1; overflow:hidden; border:1px solid #ddd; border-radius:8px;">
                        <img src="{{ asset('storage/img/' . ($biodata->foto ?? 'profile.jpg')) }}" alt="Foto Alumni"
                            style="width:100%; height:100%; object-fit:cover;">
                    </div>
                </div> --}}
                <div class="col-md-4 mb-3 d-flex justify-content-center">
                    <div class="ratio ratio-1x1" style="max-width: 250px;">
                        <img src="{{ asset('storage/img/' . ($biodata->foto ?? 'profile.jpg')) }}" alt="Foto Alumni"
                            class="w-100 h-100 object-fit-cover rounded border">
                    </div>
                </div>


                <div class="col-md-8">
                    <div class="row">
                        <div class="col-6 col-6 mb-3">
                            <label class="form-label fw-bold">Nama</label>
                            <input type="text" class="form-control" value="{{ Str::title($biodata->nama) }}"
                                readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label fw-bold">NPM</label>
                            <input type="text" class="form-control" value="{{ $biodata->user->npm }}" readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label fw-bold">Angkatan</label>
                            <input type="text" class="form-control" value="{{ $biodata->angkatan->angkatan }}"
                                readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label fw-bold">Jenis Kelamin</label>
                            <input type="text" class="form-control" value="{{ $biodata->jenis_kelamin }}" readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label fw-bold">Tempat</label>
                            <input type="text" class="form-control" value="{{ Str::title($biodata->tempat) }}"
                                readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label fw-bold">Tanggal Lahir</label>
                            <input type="text" class="form-control"
                                value="{{ \Carbon\Carbon::parse($biodata->tanggal_lahir)->format('d-m-Y') }}" readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input type="text" class="form-control" value="{{ $biodata->user->email }}" readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label fw-bold">Pekerjaan</label>
                            <input type="text" class="form-control" value="{{ $biodata->pekerjaan }}" readonly>
                        </div>
                        
                        <div class="col-6 mb-3">
                            <label class="form-label fw-bold">Telepon</label>
                            <input type="text" class="form-control" value="{{ $biodata->no_telp }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layoutAdmin>
