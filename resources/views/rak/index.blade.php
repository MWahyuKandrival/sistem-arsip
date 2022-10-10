@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>rak</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item">rak</div>
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
                            <h4><a href="/rak/create" class="btn btn-primary">Tambahkan rak</a></h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Rak</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($rak as $a)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td> {{ $a->rak }}</td>
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
                                                        <button class="badge bg-danger text-white border-0 btn-submit"
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
