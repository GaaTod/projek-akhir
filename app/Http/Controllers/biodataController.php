<?php

namespace App\Http\Controllers;

use App\Models\ModelBiodata;
use Illuminate\Http\Request;

class biodataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataBiodata = ModelBiodata::get();
        return view('dataAlumni', compact('dataBiodata'));
    }

    public function tampil() 
    {
        $tampilBiodata = ModelBiodata::get();
        return view('users.userAlumni', compact('tampilBiodata'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $biodata = ModelBiodata::findOrFail($id);
        return view('detailAlumni', compact('biodata'));
    }

    public function edit(string $id) {}

    public function update(Request $request, string $id) {}

    public function destroy(string $id)
    {
        $biodata = ModelBiodata::findOrFail($id);
        $biodata->delete();

        return redirect()->route('dataAlumni-admin')->with('success', 'Data alumni berhasil dihapus.');
    }
}
