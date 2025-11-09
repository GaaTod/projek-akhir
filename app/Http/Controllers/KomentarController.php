<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelKomentar;

class KomentarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function __construct()
    // {
    //     // pastikan hanya user login yang bisa komentar
    //     $this->middleware('auth');
    // }

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
        $validated = $request->validate([
            'forum_id' => ['required', 'integer', 'exists:tb_forums,id'], // sesuaikan nama tabel forum kamu
            'komentar' => ['required', 'string', 'max:1000'],
        ], [
            'forum_id.required' => 'Forum tidak valid.',
            'forum_id.exists' => 'Forum tidak ditemukan.',
            'komentar.required' => 'Komentar tidak boleh kosong.',
        ]);

        ModelKomentar::create([
            'user_id' => $request->user()->id,
            'forum_id' => $validated['forum_id'],
            'komentar' => $validated['komentar'],
        ]);

        return back()->with('success', 'Komentar berhasil dikirim.');

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