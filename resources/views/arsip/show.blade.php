@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>Arsip</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="/arsip">Arsip</a></div>
                <div class="breadcrumb-item">{{ $arsip->name }}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Detail Arsip</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="no_surat">Nomor Surat</label>
                                <input type="text" class="form-control" name="no_surat" id="no_surat" readonly
                                    value="{{ $arsip->no_surat }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Nama Surat</label>
                                <input type="text" class="form-control" name="name" id="name" readonly
                                    value="{{ $arsip->name }}">
                            </div>
                            <div class="form-group">
                                <label for="kode_klasifikasi">Kode Klasifikasi</label>
                                <input type="text" class="form-control" name="kode_klasifikasi" id="kode_klasifikasi"
                                    readonly value="{{ $arsip->kode_klasifikasi }}">
                            </div>
                            <div class="form-group">
                                <label for="sumber_arsip">Sumber Arsip</label>
                                <input type="text" class="form-control" name="box" id="box" readonly
                                    value="{{ $arsip->sumber->name }}">
                            </div>

                            <div class="form-group">
                                <label>Ruangan</label>
                                <input type="text" class="form-control" name="box" id="box" readonly
                                    value="{{ $arsip->ruangan->name }}">
                            </div>

                            <div class="form-group">
                                <label>Rak</label>
                                <input type="text" class="form-control" name="box" id="box" readonly
                                    value="{{ $arsip->rak->name }}">
                            </div>

                            <div class="form-group">
                                <label for="perkembangan">Perkembangan</label>
                                <input type="text" class="form-control" name="perkembangan" id="perkembangan" readonly
                                    value="{{ $arsip->perkembangan }}">
                            </div>

                            <div class="form-group">
                                <label for="sampul">Sampul</label>
                                <input type="text" class="form-control" name="sampul" id="sampul" readonly
                                    value="{{ $arsip->sampul }}">
                            </div>

                            <div class="form-group">
                                <label for="box">Box</label>
                                <input type="text" class="form-control" name="box" id="box" readonly
                                    value="{{ $arsip->box }}">
                            </div>

                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" class="form-control" name="jumlah" id="jumlah" readonly
                                    value="{{ $arsip->jumlah }}">
                            </div>

                            <div class="form-group">
                                <label>Satuan</label>
                                <input type="text" class="form-control" name="box" id="box" readonly
                                    value="{{ $arsip->satuan->name }}">
                            </div>

                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" name="keterangan" id="keterangan" rows="3">{{ $arsip->keterangan }}</textarea>
                            </div>

                            @if ($arsip->file != '')
                                <div class="form-group">
                                    <object data="/file/{{ $arsip->file }}" type="application/pdf" width="600"
                                        height="500">
                                        <embed src="/file/{{ $arsip->file }}" width="600px" height="500px" />
                                        <p>This browser does not support PDFs. Please download the PDF to view it:
                                            <a href="/file/{{ $arsip->file }}">Download PDF</a>.
                                        </p>
                                        </embed>
                                    </object>
                                    {{-- <iframe
                                    src="https://drive.google.com/viewerng/viewer?embedded=true&url=http://infolab.stanford.edu/pub/papers/google.pdf#toolbar=0&scrollbar=0"
                                    frameBorder="0" scrolling="auto" height="100%" width="100%"></iframe> --}}
                                </div>
                            @endif

                            <a href="/rak/{{ $arsip->rak->id }}" class="btn btn-warning">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
