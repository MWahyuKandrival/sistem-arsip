@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>Ruangan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item">Ruangan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex">
                            <h4><a href="/ruangan/create" class="btn btn-primary">Tambahkan Ruangan</a></h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Ruangan</th>
                                            <th>Jumlah Rak</th>
                                            <th>Jumlah Arsip</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($ruangan as $a)
                                            <tr>
                                                <td> {{ $loop->iteration }} </td>
                                                <td> {{ $a->name }} </td>
                                                <td> {{ $a->rak->count() }} </td>
                                                <td> {{ $a->arsip->count() }} </td>
                                                <td>
                                                    <a href="/ruangan/{{ $a->id }}" class="badge bg-info text-white"><i
                                                            class="fa-sharp fa-solid fa-eye"></i>
                                                    </a>
                                                    <a href="/ruangan/{{ $a->id }}/edit"
                                                        class="badge bg-warning text-white"><i
                                                            class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <form action="/ruangan/{{ $a->id }}" method="POST"
                                                        id="deleteForm_{{ $loop->iteration }}">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="badge bg-danger text-white border-0 btn-ruangan"
                                                            data-loop="{{ $loop->iteration }}"
                                                            data-nama_ruangan="{{ $a->name }}">
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
