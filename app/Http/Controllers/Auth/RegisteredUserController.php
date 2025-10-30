<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use App\Models\ModelBiodata;
use Illuminate\Http\Request;
use App\Models\ModelAngkatan;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $angkatan = ModelAngkatan::latest('angkatan')->get();
        return view('auth.register', compact('angkatan'));
    }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'npm' => ['required', 'string', 'max:20', 'unique:users,npm'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'jk' => ['required', 'string', 'max:255'],
            'tempat' => ['required', 'string', 'max:255'],
            'no_telp' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'tahun_lulus' => ['required', 'integer'],
            'angkatan' => ['required', 'integer', 'exists:tb_angkatans,id'],
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'npm.required' => 'NPM wajib diisi.',
            'npm.unique' => 'NPM sudah digunakan.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'jk.required' => 'Jenis kelamin harus dipilih.',
            'tempat.required' => 'Tempat lahir wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            'no_telp.required' => 'Nomor telepon wajib diisi.',
            'tahun_lulus.required' => 'Tahun lulus wajib diisi.',
            'angkatan.required' => 'Angkatan harus dipilih.',
            'angkatan.exists' => 'Angkatan yang dipilih tidak valid.',
        ]);

        // 🔹 Ambil tahun dari tanggal lahir
        $tahunLahir = date('Y', strtotime($request->tanggal_lahir));

        // 🔹 Ambil data angkatan
        $angkatan = ModelAngkatan::where('id', $request->angkatan)->first();

        // 🔹 Ambil 2 digit terakhir dari tiap data
        $angkatanAkhir = substr($angkatan->angkatan, -2);
        $lahirAkhir = substr($tahunLahir, -2);
        $npmAkhir = substr($request->npm, -2);

        // 🔹 Gabungkan jadi password
        $passwordOtomatis = $angkatanAkhir . $lahirAkhir . $npmAkhir;


        // Log::info($request->all());
        // dd($request->all());

        $user = User::create([
            'npm' => $request->npm,
            'email' => $request->email,
            'password' => Hash::make($passwordOtomatis),
        ]);

        // 🔹 Gambar default (ambil dari public/images/default.png)
        $defaultImage = 'profile.jpg';


        ModelBiodata::create([
            'user_id' => $user->id,
            'angkatan_id' => $request->angkatan,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jk,
            'tempat' => $request->tempat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telp' => $request->no_telp,
            'tahun_lulus' => $request->tahun_lulus,
            'gambar' => $defaultImage,
        ]);


        // Log::info('✅ Data user berhasil disimpan');

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('dashboard.user')
            ->with('success', 'Data berhasil ditambahkan!')
            ->with('password_default', $passwordOtomatis);;
    }
}
