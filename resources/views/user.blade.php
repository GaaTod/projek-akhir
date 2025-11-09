<x-layoutAdmin>
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle"><strong>Users</strong></h1>
        <div class="card mt-2">
            <div class="card-body pt-4">
                <table class="table table-striped-columns">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataUser as $data)
                            <tr class="text-center">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $data->nama }}</td>
                                <td>{{$data->user->email}}</td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Tidak ada data user.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

</x-layoutAdmin>
