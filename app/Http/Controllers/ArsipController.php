<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Arsip;
use App\Models\Rak;
use App\Models\Ruangan;
use App\Models\Satuan;
use App\Models\Sumber;
use Exception;
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
            'arsip' => Arsip::latest()->get(),
            "title" => "List Arsip - Arsip",
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

    public function export()
    {
        
        $data = Arsip::all();

        // file creation 

        header("Content-Type: application/vnd-ms-excel");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=Data Arsip.xls");

        $heading = false;
        if (!empty($data))
            foreach ($data as $d) {
                if (!$heading) {
                    // display field/column names as a first row
                    echo "\tNo_surat\tNama Surat\tKode Klasifikasi\tSumber\tRuangan\tRak\tPerkembangan\tSampul\tBox\tSatuan\tKeterangan\n";
                    $heading = true;
                }
                echo "\t$d->no_surat\t$d->name\t$d->kode_klasifikasi\t" . $d->sumber->name . "\t" . $d->ruangan->name . "\t" . $d->rak->name . "\t$d->perkembangan\t$d->sampul\t$d->box\t" . $d->satuan->name . "\t$d->keterangan\n";
            }
        exit;

        exit;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($param1 = "", $param2 = "")
    {
        try {
            $name = ["arsip"];
            if ($param1 == "") {
                $name = "arsip";
            } else if ($param1 == "satuan") {
                $name = Satuan::where('id', $param2)->first()->name;
            } else if ($param1 == "sumber") {
                $name = Sumber::where('id', $param2)->first()->name;
            } else if ($param1 != "" && $param2 != "") {
                $name = [Ruangan::where('id', $param1)->first()->name, Rak::where('id', $param2)->first()->name];
            }
            return view('arsip.create', [
                'title' => "Tambah Arsip - Arsip",
                'param1' => $param1,
                'param2' => $param2,
                'name' => $name,
                'ruangan' => Ruangan::all(),
                'sumber' => Sumber::all(),
                'satuan' => Satuan::all(),
            ]);
        } catch (Exception $e) {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                "no_surat" => "required|max:255",
                "name" => "required|max:255",
                "kode_klasifikasi" => "required|max:255",
                "sumber_id" => "required|exists:sumbers,id",
                "ruangan_id" => "required|exists:ruangans,id",
                "rak_id" => "required|exists:raks,id",
                "perkembangan" => "required",
                "sampul" => "required",
                "box" => "required",
                "jumlah" => "required",
                "satuan_id" => "required|exists:satuans,id",
                "keterangan" => "required",
                "file" => "mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp",
            ]);

            $data = [
                "no_surat" => $request->no_surat,
                "name" => $request->name,
                "kode_klasifikasi" => $request->kode_klasifikasi,
                "sumber_id" => $request->sumber_id,
                "ruangan_id" => $request->ruangan_id,
                "rak_id" => $request->rak_id,
                "perkembangan" => $request->perkembangan,
                "sampul" => $request->sampul,
                "box" => $request->box,
                "jumlah" => $request->jumlah,
                "satuan_id" => $request->satuan_id,
                "keterangan" => $request->keterangan,
            ];

            if ($request->file('file')) {
                $uploadPath = public_path('file');

                if (!File::isDirectory($uploadPath)) {
                    File::makeDirectory($uploadPath, 0755, true, true);
                }

                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $rename = 'file_' . date('YmdHis') . '.' . $extension;
                $file->move($uploadPath, $rename);
                $data['file'] = $rename;
            }

            Arsip::create($data);
            return redirect('' . $request->redirect)->with('success', 'Arsip berhasil ditambahkan');
        } catch (Exception $e) {
            // echo "Terjadi Kesalahan";
            echo $e;
            return false;
        }
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
            'arsip' => $arsip,
            'title' => "Detail Arsip " . $arsip->name . " | Arsip",
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
            'arsip' => $arsip,
            'title' => "Edit Arsip " . $arsip->name . " | Arsip",
            'ruangan' => Ruangan::all(),
            'rak' => Rak::where("ruangan_id", $arsip->ruangan->id)->get(),
            'sumber' => Sumber::all(),
            'satuan' => Satuan::all(),
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
            "no_surat" => "required|max:255",
            "name" => "required|max:255",
            "kode_klasifikasi" => "required|max:255",
            "sumber_id" => "required|exists:sumbers,id",
            "ruangan_id" => "required|exists:ruangans,id",
            "rak_id" => "required|exists:raks,id",
            "perkembangan" => "required",
            "sampul" => "required",
            "box" => "required",
            "jumlah" => "required",
            "satuan_id" => "required|exists:satuans,id",
            "keterangan" => "required",
            "file" => "mimes:doc,docx,xls,xlsx,pdf,jpg,jpeg,png,bmp",
        ]);

        if ($request->file('file')) {
            $uploadPath = public_path('file');

            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }
            File::delete("file/" . $arsip->file);

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $rename = 'file_' . date('YmdHis') . '.' . $extension;
            $file->move($uploadPath, $rename);
            $validatedData['file'] = $rename;
        }

        Arsip::where('id', $arsip->id)
            ->update($validatedData);

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
