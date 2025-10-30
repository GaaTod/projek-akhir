{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<x-layoutAuth>
    @section('title', 'Lupa Password | Sistem Informasi Alumni')

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

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="Masukkan email" autocomplete="off">
                    @error('email')
                        <label class="form-label text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </label>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-3">Kirim Link Reset Password</button>
            </form>
        </div>
    </div>
</x-layoutAuth>
