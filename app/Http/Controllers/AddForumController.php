<?php

namespace App\Http\Controllers;

use App\Models\ModelForum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $tambahForum = 'tambahforum';

        return view('users.profile.addForum');
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
        $user = Auth::user();

        $request->validate(
            [
                'namaForum' => ['required', 'string', 'max:255'],
                'deskripsi' => ['required', 'string', 'max:255'],
                'durasi' => ['required', 'integer'],
                'gambarforum' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'tipe_durasi' => 'nullable|string'
            ],
            [
                'namaForum.required' => 'Nama Forum wajib diisi.',
                'deskripsi.required' => 'Deskripsi wajib diisi.',
                'durasi.required' => 'Durasi wajib diisi.'
            ]
        );

        // Handle upload gambar
        $filename = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = $file->store('img/forum', 'public');
        }

        // Konversi durasi ke menit
        $durasi = $request->durasi;
        $tipe = $request->tipe_durasi;

        if ($tipe === 'jam') {
            $durasi *= 60;
        } elseif ($tipe === 'hari') {
            $durasi *= 60 * 24;
        } elseif ($tipe === 'minggu') {
            $durasi *= 60 * 24 * 7;
        }

        // Format waktu (HH:MM:SS)
        $jam = intdiv($durasi, 60);
        $menit = $durasi % 60;
        $durasiFormatted = sprintf('%02d:%02d:00', $jam, $menit);

        // Hitung waktu berakhir
        $waktuBerakhir = now()->addMinutes($durasi);

        // Simpan ke database
        ModelForum::create([
            'user_id' => $user->id,
            'nama_forum' => $request->namaForum,
            'deskripsi' => $request->deskripsi,
            'durasi' => $durasiFormatted,
            'gambar' => $filename ?? null,
            'waktu_berakhir' => $waktuBerakhir,
        ]);

        return redirect()->route('userForum-user')->with('success', 'Forum berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // ambil forum + user + komentar + user komentar
        $forum = ModelForum::with(['user', 'comments'])->findOrFail($id);
        
        return view('users.userDetailForum', compact('forum'));
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
        //
    }
}