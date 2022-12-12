@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>Arsip</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="/arsip">Arsip</a></div>
                <div class="breadcrumb-item">Edit Arsip</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Edit Arsip</h4>
                        </div>
                        <div class="card-body">
                            <form action="/arsip/{{ $arsip->id }}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="no_surat">Nomor Surat</label>
                                    <input type="text" class="form-control @error('no_surat') is-invalid  @enderror"
                                        name="no_surat" id="no_surat" value="{{ $arsip->no_surat }}">
                                    @error('no_surat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama File</label>
                                    <input type="text" class="form-control @error('name') is-invalid  @enderror"
                                        name="name" id="name" value="{{ $arsip->name }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kode_klasifikasi">Kode Klasifikasi</label>
                                    <input type="text"
                                        class="form-control @error('kode_klasifikasi') is-invalid  @enderror"
                                        name="kode_klasifikasi" id="kode_klasifikasi"
                                        value="{{ $arsip->kode_klasifikasi }}">
                                    @error('kode_klasifikasi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="sumber_arsip">Sumber Arsip</label>
                                    <select class="form-control select2" name="sumber_id">
                                        @forelse ($sumber as $s)
                                            <option value="{{ $s->id }}"
                                                @if ($arsip->sumber->id == $s->id) selected @endif>{{ $s->name }}
                                            </option>
                                        @empty
                                            <option value="">Tidak Ada Data Sumber</option>
                                        @endforelse
                                    </select>
                                    @error('sumber_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Ruangan</label>
                                    <select class="form-control @error('ruangan_id') is-invalid  @enderror select2"
                                        name="ruangan_id" id="select_ruangan">
                                        @forelse ($ruangan as $ruang)
                                            <option value="{{ $ruang->id }}"
                                                {{ $arsip->ruangan->id == $ruang->id ? 'selected' : '' }}>
                                                {{ $ruang->name }}</option>
                                        @empty
                                            <option value="">Tidak Ada Data Ruangan</option>
                                        @endforelse
                                    </select>
                                    @error('ruangan_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Rak</label>
                                    <select class="form-control select2" name="rak_id" id="select_rak">
                                        <option>Pilih Rak</option>
                                        @forelse ($rak as $ra)
                                            <option value="{{ $ra->id }}"
                                                {{ $arsip->rak->id == $ra->id ? 'selected' : '' }}>{{ $ra->name }}
                                            </option>
                                        @empty
                                            <option value="">Tidak Ada Data Rak</option>
                                        @endforelse
                                    </select>
                                    @error('rak_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="perkembangan">Perkembangan</label>
                                    <input type="text" class="form-control @error('perkembangan') is-invalid  @enderror"
                                        name="perkembangan" id="perkembangan" value="{{ $arsip->perkembangan }}">
                                    @error('perkembangan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="sampul">Sampul</label>
                                    <input type="text" class="form-control @error('sampul') is-invalid  @enderror"
                                        name="sampul" id="sampul" value="{{ $arsip->sampul }}">
                                    @error('sampul')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="box">Box</label>
                                    <input type="text" class="form-control @error('box') is-invalid  @enderror"
                                        name="box" id="box" value="{{ $arsip->box }}">
                                    @error('box')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control @error('jumlah') is-invalid  @enderror"
                                        name="jumlah" id="jumlah" value="{{ $arsip->jumlah }}">
                                    @error('jumlah')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Satuan</label>
                                    <select class="form-control select2" name="satuan_id">
                                        @forelse ($satuan as $s)
                                            <option value="{{ $s->id }}">{{ $s->name }}
                                            </option>
                                        @empty
                                            <option value="">Tidak Ada Data Satuan</option>
                                        @endforelse
                                    </select>
                                    @error('satuan_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control @error('keterangan') is-invalid  @enderror" name="keterangan" id="keterangan" rows="3">{{ $arsip->keterangan }}</textarea>
                                    @error('keterangan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>File</label>
                                    <input type="file" class="form-control" name="file">
                                    @error('file')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="/rak/{{ $arsip->rak->id }}" class="btn btn-warning">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
