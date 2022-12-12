@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>Satuan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="/satuan">Satuan</a></div>
                <div class="breadcrumb-item">Edit Satuan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Edit Satuan</h4>
                        </div>
                        <div class="card-body">
                            <form action="/satuan/{{ $satuan->id }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama Satuan</label>
                                    <input type="text" class="form-control @error('name') is-invalid  @enderror"
                                        name="name" id="name" value="{{ $satuan->name }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="/satuan" class="btn btn-warning">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
