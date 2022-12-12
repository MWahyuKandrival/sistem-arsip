<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Rak;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class RakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rak.index', [
            'rak' => Rak::latest()->get(), 
            "title" => "List Rak - Arsip",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($param1 = "")
    {
        return view('rak.create', [
            'param1' => $param1,
            'ruang' => Ruangan::where('id', $param1)->first(),
            "title" => "Tambah Rak - Arsip",
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
            'name' => 'required',
            'ruangan_id' => 'required',
        ]);

        Rak::create($validatedData);

        return redirect('/ruangan/'.$request->ruangan_id)->with('success', 'Rak Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function show(Rak $rak)
    {
        return view('rak.show', [
            'rak' => $rak,
            'ruang' => Ruangan::where('id', $rak->ruangan->id)->first(),
            'arsip' => Arsip::with(['rak', 'ruangan'])->where('rak_id', $rak->id)->latest()->get(), 
            "title" => "Detail Rak " . $rak->name . " - Arsip",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function edit(Rak $rak)
    {
        return view('rak.edit', [
            'rak' => $rak,
            'ruang' => Ruangan::where('id', $rak->ruangan->id)->first(),
            'ruangan' => Ruangan::all(),
            "title" => "Edit Rak " . $rak->name . " - Arsip",
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rak $rak)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'ruangan_id' => 'required',
        ]);

        Rak::where('id', $rak->id)
            ->update($validatedData);
        
        return redirect('/ruangan/'.$rak->ruangan->id)->with('success', 'Rak has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rak $rak)
    {
        $ruangan_id = $rak->ruangan->id;
        Rak::destroy($rak->id);

        return redirect('/ruangan/'.$ruangan_id)->with('success', 'Rak has been deleted');
    }
}
