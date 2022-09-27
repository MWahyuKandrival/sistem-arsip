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
                            <div class="row">
                                <div class="col-lg-3">
                                    Nama File 
                                </div>
                                <div class="col-lg-1">
                                    :
                                </div>
                                <div class="col-lg-7">
                                    {{ $arsip->file }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    Kode Klasifikasi 
                                </div>
                                <div class="col-lg-1">
                                    :
                                </div>
                                <div class="col-lg-7">
                                    {{ $arsip->kode_klasifikasi }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    Sumber Arsip
                                </div>
                                <div class="col-lg-1">
                                    :
                                </div>
                                <div class="col-lg-7">
                                    {{ $arsip->sumber_arsip }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    Uraian Informasi 
                                </div>
                                <div class="col-lg-1">
                                    :
                                </div>
                                <div class="col-lg-7">
                                    {{ $arsip->uraian_informasi }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    Jumlah 
                                </div>
                                <div class="col-lg-1">
                                    :
                                </div>
                                <div class="col-lg-7">
                                    {{ $arsip->jumlah }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    proses 
                                </div>
                                <div class="col-lg-1">
                                    :
                                </div>
                                <div class="col-lg-7">
                                    {{ $arsip->proses }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    Lokasi 
                                </div>
                                <div class="col-lg-1">
                                    :
                                </div>
                                <div class="col-lg-7">
                                    {{ $arsip->lokasi }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    Keterangan 
                                </div>
                                <div class="col-lg-1">
                                    :
                                </div>
                                <div class="col-lg-7">
                                    {{ $arsip->keterangan }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    Tanggal Masuk 
                                </div>
                                <div class="col-lg-1">
                                    :
                                </div>
                                <div class="col-lg-7">
                                    {{ \Carbon\Carbon::parse($arsip->created_at)->isoFormat('D MMMM Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
