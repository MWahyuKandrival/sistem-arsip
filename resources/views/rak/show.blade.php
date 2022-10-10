@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>Rak {{ $rak->name }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="/ruangan/{{ $rak->ruangan->id }}">Ruangan {{ $rak->ruangan->name }}</a></div>
                <div class="breadcrumb-item">{{ $rak->name }}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if (session()->has('success'))
                            <div class="row d-flex justify-content-center">
                                <div class="alert alert-success col-lg-8" role="alert">
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif
                        <div class="card-header d-flex">
                            <h4><a href="/arsip/create" class="btn btn-primary btn-add-rak">Tambahkan Arsip</a></h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>File</th>
                                            <th>Kode Klasifikasi</th>
                                            <th>Sumber Arsip</th>
                                            <th>Proses</th>
                                            <th>Ruangan</th>
                                            <th>Rak</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($arsip as $a)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td> {{ $a->nama_file }}</td>
                                                <td> {{ $a->kode_klasifikasi }}</td>
                                                <td> {{ $a->sumber_arsip }}</td>
                                                <td> {{ $a->proses }}</td>
                                                <td> {{ $a->ruangan->name }}</td>
                                                <td> {{ $a->rak->name }}</td>
                                                <td>
                                                    <a href="/arsip/{{ $a->id }}" class="badge bg-info text-white"><i
                                                            class="fa-sharp fa-solid fa-eye"></i>
                                                    </a>
                                                    <a href="/arsip/{{ $a->id }}/edit"
                                                        class="badge bg-warning text-white"><i
                                                            class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <form action="/arsip/{{ $a->id }}" method="POST"
                                                        id="deleteForm_{{ $loop->iteration }}">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="badge bg-danger text-white border-0 btn-arsip"
                                                            data-loop="{{ $loop->iteration }}"
                                                            data-nama_file="{{ $a->file }}">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="12" class="text-center">No data Found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
