<?php

namespace App\Http\Controllers;

// use App\Models\User;
use Illuminate\View\View;
// use App\Models\ModelBiodata;
use Illuminate\Http\Request;
use App\Models\ModelAngkatan;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
// use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        
        $angkatan = ModelAngkatan::all();
        return view('users.profile.edit', [
            'user' => $request->user(),
            'angkatan' => $angkatan,
        ]);
    }

    // /**
    //  * Update the user's profile information.
    //  */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    public function update(Request $request)
    {
        $user = $request->user();

        // --- VALIDASI DASAR ---
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            Rule::unique('tb_biodatas', 'email')->ignore($user->tb_biodata->id),
            'npm' => 'required|string|max:20',
            Rule::unique('users', 'npm')->ignore($user->id),
            'no_telp' => 'nullable|string|max:20',
            'jk' => 'nullable|string|max:20',
            'tempat' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'angkatan' => 'nullable|integer|exists:tb_angkatans,id',
            'tahun_lulus' => 'nullable|integer',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'pekerjaan' => 'nullable|string|max:255',
        ]);

        // --- UPDATE FOTO ---
        if ($request->hasFile('gambar')) {
            // Pastikan folder tujuan ada
            $pathFolder = public_path('storage/img');
            if (!file_exists($pathFolder)) {
                mkdir($pathFolder, 0777, true);
            }

            // Hapus foto lama jika ada
            if ($user->tb_biodata->gambar && file_exists(public_path('storage/img/' . $user->tb_biodata->gambar))) {
                unlink(public_path('storage/img/' . $user->tb_biodata->gambar));
            }

            // Simpan foto baru dengan nama unik
            $file = $request->file('gambar');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/img'), $filename);

            // Simpan nama file ke database
            $user->tb_biodata->gambar = $filename;
        }

        // --- UPDATE USER (npm tetap diupdate walau password tidak diubah) ---
        $user->npm = $validated['npm'];
        $user->email = $validated['email'];


        // --- UPDATE DATA BIODATA ---
        $user->tb_biodata->fill([
            'nama' => $validated['nama'],
            'no_telp' => $validated['no_telp'],
            'jenis_kelamin' => $validated['jk'],
            'tempat' => $validated['tempat'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'angkatan_id' => $validated['angkatan'],
            'tahun_lulus' => $validated['tahun_lulus'],
            'pekerjaan' => $validated['pekerjaan'],
        ])->save();

        // --- GANTI PASSWORD (jika diisi) ---
        if ($request->filled('old_password') || $request->filled('new_password')) {
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|min:8|confirmed',
            ]);

            if (!Hash::check($request->old_password, $user->password)) {
                return back()->withErrors(['old_password' => 'Password lama tidak cocok.']);
            }

            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
