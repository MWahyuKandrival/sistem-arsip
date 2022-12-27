@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>Arsip</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                @if ($param1 == '')
                    <div class="breadcrumb-item active"><a href="/arsip">Arsip</a></div>
                @elseif ($param1 == 'satuan')
                    <div class="breadcrumb-item active"><a href="/satuan">Satuan</a></div>
                    <div class="breadcrumb-item active"><a href="/satuan/{{ $param2 }}">{{ $name[0] }}</a></div>
                @elseif ($param1 == 'sumber')
                    <div class="breadcrumb-item active"><a href="/sumber">Sumber</a></div>
                    <div class="breadcrumb-item active"><a href="/sumber/{{ $param2 }}">{{ $name[0] }}</a></div>
                @else
                    <div class="breadcrumb-item active"><a href="/ruangan">Ruangan</a></div>
                    <div class="breadcrumb-item active"><a href="/ruangan/{{ $param1 }}">{{ $name[0] }}</a></div>
                    <div class="breadcrumb-item active"><a href="/rak">Rak</a></div>
                    <div class="breadcrumb-item active"><a href="/rak/{{ $param2 }}">{{ $name[1] }}</a></div>
                @endif
                <div class="breadcrumb-item">Tambah Arsip</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Tambah Arsip</h4>
                        </div>
                        <div class="card-body">
                            <form action="/arsip" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="no_surat">Nomor Surat</label>
                                    <input type="text" class="form-control @error('no_surat') is-invalid  @enderror"
                                        name="no_surat" id="no_surat" value="{{ old('no_surat') }}">
                                    @error('no_surat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama Surat</label>
                                    <input type="text" class="form-control @error('name') is-invalid  @enderror"
                                        name="name" id="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kode_klasifikasi">Kode Klasifikasi</label>
                                    <input type="text"
                                        class="form-control @error('kode_klasifikasi') is-invalid  @enderror"
                                        name="kode_klasifikasi" id="kode_klasifikasi"
                                        value="{{ old('kode_klasifikasi') }}">
                                    @error('kode_klasifikasi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                @if ($param1 != 'sumber')
                                    <div class="form-group">
                                        <label>Sumber Arsip</label>
                                        <select class="form-control select2" name="sumber_id">
                                            @forelse ($sumber as $s)
                                                <option value="{{ $s->id }}">{{ $s->name }}
                                                </option>
                                            @empty
                                                <option value="">Tidak Ada Data Sumber</option>
                                            @endforelse
                                        </select>
                                        @error('sumber_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                @else
                                    <input type="hidden" name="redirect" value="/sumber/{{ $param2 }}">
                                    <input type="hidden" name="sumber_id" value="{{ $param2 }}">
                                @endif

                                @if ($param1 != 'satuan' && $param1 != 'sumber' && $param2 != '')
                                    <input type="hidden" name="ruangan_id" value="{{ $param1 }}">
                                    <input type="hidden" name="rak_id" value="{{ $param2 }}">
                                    <input type="hidden" name="redirect" value="/rak/{{ $param2 }}">
                                @else
                                    <div class="form-group">
                                        <label>Ruangan</label>
                                        <select class="form-control @error('proses') is-invalid  @enderror select2"
                                            name="ruangan_id" id="select_ruangan">
                                            <option value="">Pilih Ruangan</option>
                                            @forelse ($ruangan as $ruang)
                                                <option value="{{ $ruang->id }}">{{ $ruang->name }}</option>
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
                                    <div class="form-group">
                                        <label>Rak</label>
                                        <select class="form-control select2" name="rak_id" id="select_rak">
                                            <option>Pilih Rak</option>
                                        </select>
                                        @error('rak_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="perkembangan">Perkembangan</label>
                                    <input type="text" class="form-control @error('perkembangan') is-invalid  @enderror"
                                        name="perkembangan" id="perkembangan" value="{{ old('perkembangan') }}">
                                    @error('perkembangan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="sampul">Sampul</label>
                                    <input type="text" class="form-control @error('sampul') is-invalid  @enderror"
                                        name="sampul" id="sampul" value="{{ old('sampul') }}">
                                    @error('sampul')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="box">Box</label>
                                    <input type="text" class="form-control @error('box') is-invalid  @enderror"
                                        name="box" id="box" value="{{ old('box') }}">
                                    @error('box')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control @error('jumlah') is-invalid  @enderror"
                                        name="jumlah" id="jumlah" value="{{ old('jumlah') }}">
                                    @error('jumlah')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                @if ($param1 != 'satuan')
                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <select class="form-control select2" name="satuan_id">
                                            @forelse ($satuan as $s)
                                                <option value="{{ $s->id }}">{{ $s->name }}
                                                </option>
                                            @empty
                                                <option value="">Tidak Ada Data Satuan</option>
                                            @endforelse
                                        </select>
                                        @error('satuan_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                @else
                                    <input type="hidden" name="satuan_id" value="{{ $param2 }}">
                                    <input type="hidden" name="redirect" value="/satuan/{{ $param2 }}">
                                @endif

                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control @error('keterangan') is-invalid  @enderror" name="keterangan" id="keterangan"
                                        rows="3">{{ old('keterangan') }}</textarea>
                                    @error('keterangan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>File</label>
                                    <input type="file" class="form-control" name="file">
                                    @error('file')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                @if ($name[0] == 'Arsip')
                                    <input type="hidden" name="redirect" value="/">
                                @endif

                                <button type="submit" class="btn btn-primary">Submit</button>
                                @if ($param1 == 'sumber')
                                    <a href="/sumber/{{ $param2 }}" class="btn btn-warning">Back</a>
                                @elseif ($param1 == 'satuan')
                                    <a href="/satuan/{{ $param2 }}" class="btn btn-warning">Back</a>
                                @elseif ($param1 == '')
                                    <a href="/" class="btn btn-warning">Back</a>
                                @else
                                    <a href="/rak/{{ $param2 }}" class="btn btn-warning">Back</a>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
