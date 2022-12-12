<?php

namespace App\Http\Controllers;
use App\Models\Arsip;
use App\Models\Sumber;
use Illuminate\Http\Request;

class SumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Sumber::select("name")->with(['arsip'])->latest()->get());
        return view('sumber.index', [
            'sumber' => Sumber::select("name", "id")->with(['arsip'])->latest()->get(),
            'title' => "List Sumber - Arsip",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sumber.create', [
            'title' => "Tambah Sumber - Arsip",
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

        Sumber::create($validatedData);
        return redirect('/sumber')->with('success', 'Sumber berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sumber  $sumber
     * @return \Illuminate\Http\Response
     */
    public function show(Sumber $sumber)
    {
        return view('sumber.show', [
            'sumber' => $sumber,
            'title' => "Detail Sumber " . $sumber->name . " - Arsip",
            'arsip' => Arsip::with(['rak', 'ruangan'])->where('sumber_id', $sumber->id)->latest()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sumber  $sumber
     * @return \Illuminate\Http\Response
     */
    public function edit(Sumber $sumber)
    {
        return view('sumber.edit', [
            "sumber" => $sumber, 
            'title' => "Edit Sumber " . $sumber->name . " - Arsip",
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sumber  $sumber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sumber $sumber)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        Sumber::where('id', $sumber->id)
        ->update($validatedData);
        return redirect('/sumber')->with('success', 'Sumber berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sumber  $sumber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sumber $sumber)
    {
        Sumber::destroy($sumber->id);

        return redirect('/sumber')->with('success', 'Sumber berhasil dihapus');
    }
}
