<?php

namespace App\Http\Controllers;

use App\Models\ModelForum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class forumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forum  = ModelForum::latest()->get();
        return view('dataForum', compact('forum'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_forum' => 'required|string',
            'desk' => 'required|string',
            'gambar' => 'required|mimes:png,jpg,jpeg',
            'durasi' => 'required|integer',
            'tipe_durasi' => 'required|string'
        ], [
            'nama_forum.required' => 'Kolom nama Forum wajib diisi!',
            'desk.required' => 'Kolom deskripsi wajib diisi!',
            'gambar.required' => 'gambar wajib di Upload!',
            'durasi.integer' => 'durasi wajib diisi!',
            'tipe_durasi.required'  => 'tipe durasi harus ditentukan',
        ]);

        $tipe = $request->tipe_durasi;
        $durasi = $request->durasi;

        // konversi ke menit
        if ($tipe === 'jam') {
            $durasi *= 60;
        } elseif ($tipe === 'hari') {
            $durasi *= 60 * 24;
        } elseif ($tipe === 'minggu') {
            $durasi *= 60 * 24 * 7;
        }

        // 🔹 Ubah menit ke format waktu HH:MM:SS
        $jam = intdiv($durasi, 60);
        $menit = $durasi % 60;
        $durasiFormatted = sprintf('%02d:%02d:00', $jam, $menit);

        // waktu berakhir = waktu dibuat + durasi
        $waktuBerakhir = now()->addMinutes($durasi);
        $file = $request->file('gambar');
        $filename = $file->store('img/forum', 'public');
        // dd($request->all());
        ModelForum::create([
            'user_id' => Auth::user()->id,
            'nama_forum' => $request->nama_forum,
            'deskripsi' => $request->desk,
            'durasi' => $durasiFormatted,
            'gambar' => $filename,
            'waktu_berakhir' => $waktuBerakhir,
        ]);

        return redirect()->back()->with('success', 'Data Forum berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $forum = ModelForum::findOrFail($id);

        return view('detailForum', compact('forum'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $forum = ModelForum::FindOrFail($id);

            $forum->delete();
            return redirect()->back()->with('success', 'Forum Berhasil Di Hapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi Kesalahan');
        }
    }
}
