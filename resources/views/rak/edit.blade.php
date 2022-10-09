@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>Rak</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="/rak">Rak</a></div>
                <div class="breadcrumb-item">Edit Rak</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Edit Rak</h4>
                        </div>
                        <div class="card-body">
                            <form action="/rak/{{ $rak->id }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama Rak</label>
                                    <input type="text" class="form-control @error('name') is-invalid  @enderror"
                                        name="name" id="name" value="{{ $rak->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Ruangan</label>
                                    <select class="form-control select2" name="ruangan_id">
                                        @forelse ($ruangan as $ruang)
                                            <option value="{{ $ruang->id }}" @if ($rak->ruangan->id == $ruang->id)
                                                selected
                                            @endif>{{ $ruang->name }}</option>
                                        @empty
                                            <option value="">Tidak Ada Data Ruangan</option>
                                        @endforelse
                                    </select>
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
