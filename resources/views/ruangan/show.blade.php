@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>Ruangan {{ $ruangan->name }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="/ruangan">Ruangan</a></div>
                <div class="breadcrumb-item">{{ $ruangan->name }}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex">
                            <h4><a href="/rak/create/{{ $ruangan->id }}" class="btn btn-primary btn-add-rak" data-id="{{ $ruangan->id }}">Tambahkan Rak</a></h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Rak</th>
                                            <th>Jumlah Arsip</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($rak as $a)
                                            <tr>
                                                <td> {{ $loop->iteration }} </td>
                                                <td> {{ $a->name }} </td>
                                                <td> {{ $a->arsip->count() }} </td>
                                                <td>
                                                    <a href="/rak/{{ $a->id }}" class="badge bg-info text-white"><i
                                                            class="fa-sharp fa-solid fa-eye"></i>
                                                    </a>
                                                    <a href="/rak/{{ $a->id }}/edit"
                                                        class="badge bg-warning text-white"><i
                                                            class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <form action="/rak/{{ $a->id }}" method="POST"
                                                        id="deleteForm_{{ $loop->iteration }}">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="badge bg-danger text-white border-0 btn-rak"
                                                            data-loop="{{ $loop->iteration }}"
                                                            data-nama_rak="{{ $a->name }}">
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
