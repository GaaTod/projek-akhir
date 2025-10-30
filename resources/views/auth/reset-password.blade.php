<x-layoutAuth>
    @section('title', 'Reset Password | Sistem Informasi Alumni')

    {{-- gambar kiri --}}
    <div class="left-side">
        <img src="{{ asset('storage/img/LoginScreen.jpg') }}" alt="Login Screen">
    </div>

    <!-- Form Login -->
    <div class="right-side">
        <div class="login-box">
            <h4 class="login-title mb-1">SISTEM INFORMASI <span>ALUMNI</span></h4>
            <p class="text-muted mb-4">Prodi D-III Manajemen Informatika</p>

            {{-- @if (session('status'))
                <div class="alert alert-success mt-2">
                    {{ session('status') }}
                </div>
            @endif --}}

            <form method="POST" action="{{ route('password.store') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <input type="hidden" name="email" value="{{ request('email') }}">

                <div class="mb-3">
                    <label>Password Baru</label>
                    <input type="password" name="password" class="form-control" required>
                    @error('password')
                        <label class="form-label text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </label>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                    @error('password_confirmation')
                        <label class="form-label text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </label>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Ubah Password</button>
            </form>
        </div>
    </div>

</x-layoutAuth>
