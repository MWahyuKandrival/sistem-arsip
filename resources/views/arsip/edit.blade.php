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
                                    <label for="nama_file">Nama File</label>
                                    <input type="text" class="form-control @error('nama_file') is-invalid  @enderror"
                                        name="nama_file" id="nama_file" value="{{ $arsip->nama_file }}">
                                    @error('nama_file')
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
                                    <label for="proses">Proses</label>
                                    <input type="text" class="form-control @error('proses') is-invalid  @enderror"
                                        name="proses" id="proses" value="{{ $arsip->proses }}">
                                    @error('proses')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Ruangan</label>
                                    <select class="form-control @error('proses') is-invalid  @enderror select2"
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
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control @error('keterangan') is-invalid  @enderror"
                                        name="keterangan" id="keterangan" value="{{ $arsip->keterangan }}">
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
