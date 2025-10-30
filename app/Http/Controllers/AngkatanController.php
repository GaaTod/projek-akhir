<?php

namespace App\Http\Controllers;

use App\Models\ModelAngkatan;
use App\Models\ModelBiodata;
use Illuminate\Http\Request;

class AngkatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $angkatans = ModelAngkatan::withCount([
            'biodatas',
            'biodatas as laki_laki_count' => function ($query) {
                $query->where('jenis_kelamin', 'Laki-laki');
            },
            'biodatas as perempuan_count' => function ($query) {
                $query->where('jenis_kelamin', 'Perempuan');
            },
        ])
            ->orderBy('angkatan', 'desc')
            ->get();
        //     $angkatans = ModelAngkatan::withCount('biodatas')
        // ->orderBy('angkatan', 'desc') // urutkan dari tahun terbesar ke kecil
        // ->get();


        // $angkatans = ModelAngkatan::withCount('biodatas')->get();

        // $jumlah = ModelBiodata::where('angkatan_id', '')->count();
        return view('dataAngkatan', compact('angkatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'angkatan' => 'required|integer|unique:tb_angkatans,angkatan',
        ], [
            'angkatan.required' => 'Kolom angkatan wajib diisi!',
            'angkatan.integer'  => 'Angkatan harus berupa angka!',
            'angkatan.unique'   => 'Angkatan ini sudah terdaftar!',
        ]);

        ModelAngkatan::create($request->only('angkatan'));

        return redirect()->back()->with('success', 'Data angkatan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'angkatan' => 'required|integer|unique:tb_angkatans,angkatan,' . $id,
        ]);

        $angkatan = ModelAngkatan::findOrFail($id);
        $angkatan->update($request->only('angkatan'));

        return redirect()->back()->with('success', 'Data angkatan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            $angkatan = ModelAngkatan::FindOrFail($id);

            $angkatan->delete();
            return redirect()->back()->with('success', 'Angkatan Berhasil Di Hapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi Kesalahan');
        }
    }
}
