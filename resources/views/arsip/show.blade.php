@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>Arsip {{ $arsip->file }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="/arsip">Arsip</a></div>
                <div class="breadcrumb-item">{{ $arsip->file }}</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail Arsip</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="container">
                                <div class="row d-flex justify-content-center ">
                                    <div class="col-md-6">
                                        <h5>{{ $arsip->nama_file }}</h5>
                                    </div>
                                    <div class="col-md-6">
                                        Test
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
