@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>Rak</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="/rak">Rak</a></div>
                <div class="breadcrumb-item">Tambah Rak</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Tambah Rak</h4>
                        </div>
                        <div class="card-body">
                            <form action="/rak" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama Rak</label>
                                    <input type="text" class="form-control @error('name') is-invalid  @enderror"
                                        name="name" id="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Ruangan</label>
                                    <select class="form-control select2" name="ruangan_id">
                                        @forelse ($ruangan as $ruang)
                                            <option value="{{ $ruang->id }}"
                                                @if ($ruangan_id == $ruang->id) selected @endif>{{ $ruang->name }}
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
