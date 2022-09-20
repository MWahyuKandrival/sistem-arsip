<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;

class ArsipController extends Controller
{
    public function index()
    {
        return view('arsip', [
            "no" => 1,
            "title" => "All Posts",
            "arsip" => Arsip::latest()->get()
        ]);
    }
}
