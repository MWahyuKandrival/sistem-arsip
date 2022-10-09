@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>Arsip</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="/arsip">Arsip</a></div>
                <div class="breadcrumb-item">Tambah Arsip</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Tambah Arsip</h4>
                        </div>
                        <div class="card-body">
                            <form action="/arsip" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nama_file">Nama File</label>
                                    <input type="text" class="form-control @error('nama_file') is-invalid  @enderror"
                                        name="nama_file" id="nama_file" value="{{ old('nama_file') }}">
                                </div>
                                <div class="form-group">
                                    <label for="kode_klasifikasi">Kode Klasifikasi</label>
                                    <input type="text"
                                        class="form-control @error('kode_klasifikasi') is-invalid  @enderror"
                                        name="kode_klasifikasi" id="kode_klasifikasi" value="{{ old('nama_file') }}">
                                </div>
                                <div class="form-group">
                                    <label for="sumber_arsip">Sumber Arsip</label>
                                    <input type="text" class="form-control @error('sumber_arsip') is-invalid  @enderror"
                                        name="sumber_arsip" id="sumber_arsip" value="{{ old('sumber_arsip') }}">
                                </div>
                                <div class="form-group">
                                    <label for="proses">Proses</label>
                                    <input type="text" class="form-control @error('proses') is-invalid  @enderror"
                                        name="proses" id="proses" value="{{ old('proses') }}">
                                </div>
                                <div class="form-group">
                                    <label>Ruangan</label>
                                    <select class="form-control select2" name="ruangan_id" id="select_ruangan">
                                        <option value="">Pilih Ruangan</option>
                                        @forelse ($ruangan as $ruang)
                                            <option value="{{ $ruang->id }}">{{ $ruang->name }}</option>
                                        @empty
                                            <option value="">Tidak Ada Data Ruangan</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Rak</label>
                                    <select class="form-control select2" name="rak_id" id="select_rak">
                                        <option>Pilih Rak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control @error('keterangan') is-invalid  @enderror"
                                        name="keterangan" id="keterangan" value="{{ old('keterangan') }}">
                                </div>
                                <div class="form-group">
                                    <label>File</label>
                                    <input type="file" class="form-control" name="file">
                                  </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
