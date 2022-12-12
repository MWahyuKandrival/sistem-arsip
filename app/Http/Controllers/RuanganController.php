<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Models\Rak;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ruangan.index', [
            'ruangan' => Ruangan::with(['rak', 'arsip'])->latest()->get(), 
            "title" => "List Ruangan - Arsip",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ruangan.create', [
            "title" => "Tambah Ruangan - Arsip",
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

        Ruangan::create($validatedData);
        return redirect('/ruangan')->with('success', 'Ruangan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function show(Ruangan $ruangan)
    {
        return view('ruangan.show', [
            'ruangan' => $ruangan, 
            'rak' => Rak::with(['arsip'])->where('ruangan_id', $ruangan->id)->latest()->get(),
            "title" => "Detail Ruangan " . $ruangan->name . " - Arsip",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function edit(Ruangan $ruangan)
    {
        return view('ruangan.edit', [
            'ruangan' => $ruangan,
            "title" => "Detail Ruangan " . $ruangan->name . " - Arsip",
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ruangan $ruangan)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        Ruangan::where('id', $ruangan->id)
                ->update($validatedData);
        return redirect('/ruangan')->with('success', 'Ruangan Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ruangan $ruangan)
    {
        Ruangan::destroy($ruangan->id);

        return redirect('/ruangan')->with('success', 'Ruangan Berhasil Dihapus!');
    }
}
