@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>Rak/Lemari/Proses/Tahapan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="/ruangan">Ruangan</a></div>
                <div class="breadcrumb-item active"><a href="/ruangan/{{ $ruang->id }}">{{ $ruang->name }}</a></div>
                <div class="breadcrumb-item active"><a href="/rak">Rak/Lemari/Proses/Tahapan</a></div>
                <div class="breadcrumb-item">Edit Rak</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Edit Rak/Lemari/Proses/Tahapan {{ $rak->name }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="/rak/{{ $rak->id }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama Rak/Lemari/Proses/Tahapan</label>
                                    <input type="text" class="form-control @error('name') is-invalid  @enderror"
                                        name="name" id="name" value="{{ $rak->name }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Ruangan</label>
                                    <select class="form-control select2" name="ruangan_id">
                                        @forelse ($ruangan as $ruangs)
                                            <option value="{{ $ruangs->id }}"
                                                @if ($ruang->id == $ruangs->id) selected @endif>{{ $ruangs->name }}
                                            </option>
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
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="/ruangan/{{ $ruang->id }}" class="btn btn-warning">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
