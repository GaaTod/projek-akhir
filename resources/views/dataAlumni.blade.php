<x-layoutAdmin>
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle"><strong>Data Alumni</strong></h1>

        {{-- <div class="mb-3 mt-3 d-flex justify-content-start ">
            <a href="" class="btn btn-primary me-2">
                <i class="bi bi-plus-lg"></i> Tambah Data
            </a>
        </div> --}}


        <div class="card mt-2">
            <div class="card-body pt-4">
                <table class="table table-striped-columns">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Npm</th>
                            <th scope="col">Angkatan</th>
                            <th scope="col" class="text-nowrap text-center" style="width:1%;">Aksi</th>
                        </tr>
                    </thead>
                    @forelse ($dataBiodata as $data)
                        <tbody>
                            <tr class="text-center">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->user->npm }}</td>
                                <td>{{ $data->angkatan->angkatan }}</td>
                                <td class="text-nowrap text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('detailAlumni-admin', $data->id) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        <form action="{{ route('hapusAlumni-admin', $data->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin hapus data ini?')"> <i
                                                    class="bi bi-trash3-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>

                    @empty
                        <td class="text-center" colspan="5">Belum ada data</td>
                    @endforelse
                </table>

            </div>
        </div>

</x-layoutAdmin>
