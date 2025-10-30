<x-layoutAuth>
    @section('title', 'Login | Sistem Informasi Alumni')

    {{-- gambar kiri --}}
    <div class="left-side">
        <img src="{{ asset('storage/img/LoginScreen.jpg') }}" alt="Login Screen">
    </div>

    <!-- Form Login -->
    <div class="right-side">
        <div class="login-box">
            <h4 class="login-title mb-1">SISTEM INFORMASI <span>ALUMNI</span></h4>
            <p class="text-muted mb-4">Prodi D-III Manajemen Informatika</p>

            @if (session('status'))
                <div class="alert alert-success mt-2">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="npm" class="form-label">NPM <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="npm" name="npm" placeholder="Masukkan npm"
                        autocomplete="off">
                    @error('npm')
                        <label class="form-label text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </label>
                    @enderror
                </div>

                <div class="mb-2 position-relative">
                    <label for="password" class="form-label">Kata Sandi <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Masukkan kata sandi">
                    @error('password')
                        <label class="form-label text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </label>
                    @enderror
                    <div class="forgot-password mt-1">
                        <a href="{{ route('password.request') }}">Lupa sandi?</a>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-3">Masuk</button>
            </form>
        </div>
    </div>
</x-layoutAuth>
