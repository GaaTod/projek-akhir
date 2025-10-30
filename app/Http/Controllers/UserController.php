<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ModelBiodata;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataUser = ModelBiodata::get();
        return view('user', compact('dataUser'));

    }
}
