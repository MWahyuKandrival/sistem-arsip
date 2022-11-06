<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Rak;
use App\Models\Ruangan;
use App\Models\Sumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('arsip.index', [
            'arsip' => Arsip::latest()->get()
        ]);
    }

    public function getRak($id_ruangan = 0)
    {
        $rak['data'] = Rak::orderby('name', 'asc')
                             ->select('id', 'name')
                             ->where('ruangan_id', $id_ruangan)
                             ->get();
        
        return response()->json($rak);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($param1 ="", $param2 = "")
    {
        return view('arsip.create', [
            'param1' => $param1,
            'param2' => $param2,
            'ruangan' => Ruangan::all(), 
            'sumber' => Sumber::all(),
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
            "nama_file" => "required|max:255",
            "kode_klasifikasi" => "required|max:255",
            "sumber_id" => "required|exists:sumbers,id",
            "proses" => "required",
            "ruangan_id" => "required|exists:ruangans,id",
            "rak_id" => "required|exists:raks,id",
            "keterangan" => "required",
            "file" => "mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp",
        ]);

        if($request->file('file')){
            $uploadPath = public_path('file');

            if(!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }
    
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $rename = 'file_' . date('YmdHis') . '.' . $extension;
            $file->move($uploadPath, $rename);
            $validatedData['file'] = $rename;
        }

        Arsip::create($validatedData);
        
        return redirect('/arsip')->with('success', 'Arsip berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function show(Arsip $arsip)
    {
        return view('arsip.show', [
            'arsip' => $arsip
        ]);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function edit(Arsip $arsip)
    {
        return view('arsip/edit', [
            'arsip'=> $arsip,
            'ruangan' => Ruangan::all(),
            'rak' => Rak::where("ruangan_id", $arsip->ruangan->id)->get(),
            'sumber' => Sumber::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Arsip $arsip)
    {
        $validatedData = $request->validate([
            "nama_file" => "required|max:255",
            "kode_klasifikasi" => "required|max:255",
            "sumber_id" => "required|exists:sumbers,id",
            "proses" => "required",
            "ruangan_id" => "required|exists:ruangans,id",
            "rak_id" => "required|exists:raks,id",
            "keterangan" => "required",
            "file" => "mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp",
        ]);

        if($request->file('file')){
            $uploadPath = public_path('file');

            if(!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }
            File::delete("file/".$arsip->file);
    
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $rename = 'file_' . date('YmdHis') . '.' . $extension;
            $file->move($uploadPath, $rename);
            $validatedData['file'] = $rename;
        }

        Arsip::where('id', $arsip->id)
        ->update($validatedData);
        
        // return redirect('/rak/'.$arsip->rak->id)->with('success', 'Arsip has been updated');
        return redirect('/arsip')->with('success', 'Arsip berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arsip $arsip)
    {
        Arsip::destroy($arsip->id);

        return redirect('/arsip')->with('success', 'Post has been deleted');
    }
}
