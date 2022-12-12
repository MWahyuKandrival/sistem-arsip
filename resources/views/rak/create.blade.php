@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>Rak/Lemari/Proses/Tahapan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="/ruangan">Ruangan</a></div>
                <div class="breadcrumb-item active"><a href="/ruangan/{{ $param1 }}">{{ $ruang->name }}</a></div>
                <div class="breadcrumb-item">Tambah Rak/Lemari/Proses/Tahapan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Tambah Rak/Lemari/Proses/Tahapan</h4>
                        </div>
                        <div class="card-body">
                            <form action="/rak" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama Rak/Lemari/Proses/Tahapan</label>
                                    <input type="text" class="form-control @error('name') is-invalid  @enderror"
                                        name="name" id="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                <input type="hidden" name="ruangan_id" value="{{ $param1 }}">

                                <button type="submit" class="btn btn-primary">Submit</button>
                                
                                <a href="/ruangan/{{ $param1 }}" class="btn btn-warning">Back</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
