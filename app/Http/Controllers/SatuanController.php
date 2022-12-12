<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use App\Models\Arsip;
use Illuminate\Http\Request;


class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("satuan.index", [
            "title" => "List Satuan - Arsip",
            "satuan" => Satuan::select("name", "id")->with(['arsip'])->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("satuan.create", [
            "title" => "Tambah Satuan - Arsip",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        Satuan::create($validatedData);
        return redirect('/satuan')->with('success', 'Satuan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function show(Satuan $satuan)
    {
        return view('satuan.show', [
            'satuan' => $satuan,
            'arsip' => Arsip::with(['satuan','rak', 'ruangan'])->where('satuan_id', $satuan->id)->latest()->get(), 
            "title" => "Detail Satuan " . $satuan->name . " - Arsip",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Satuan $satuan)
    {
        return view('satuan.edit', [
            'satuan' => $satuan,
            "title" => "Edit Satuan " . $satuan->name . " - Arsip",
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Satuan $satuan)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        Satuan::where('id', $satuan->id)
            ->update($validatedData);
        
        return redirect('/satuan')->with('success', 'Satuan Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Satuan $satuan)
    {
        Satuan::destroy($satuan->id);

        return redirect('/satuan')->with('success', 'Satuan Berhasil Dihapus!');
    }
}
