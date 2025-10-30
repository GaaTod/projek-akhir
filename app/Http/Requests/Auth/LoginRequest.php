<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'npm' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'npm.required' => 'NPM wajib diisi.',
            'npm.string' => 'Format NPM tidak valid.',

            'password.required' => 'Kata sandi wajib diisi.',
            'password.string' => 'Format kata sandi tidak valid.',
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        // Ambil user berdasarkan NPM
        $user = \App\Models\User::where('npm', $this->npm)->first();

        // ✅ Jika NPM tidak ditemukan
        if (! $user) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'npm' => 'NPM tidak ditemukan dalam sistem.',
            ]);
        }

        // ✅ Jika password salah
        if (! \Illuminate\Support\Facades\Hash::check($this->password, $user->password)) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'password' => 'Password yang kamu masukkan salah.',
            ]);
        }

        // ✅ Jika berhasil, lakukan login
        if (! \Illuminate\Support\Facades\Auth::attempt($this->only('npm', 'password'), $this->boolean('remember'))) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'npm' => 'Terjadi kesalahan saat mencoba masuk.',
            ]);
        }

        \Illuminate\Support\Facades\RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'npm' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('npm')) . '|' . $this->ip());
    }
}
