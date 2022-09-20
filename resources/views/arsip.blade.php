@extends('layouts.main')

@section('container')
    {{-- <h1 class="mb-5">{{ $title }}</h1> --}}
    {{-- @foreach ($posts as $post)
        <article class="mb-5 pb-5 border-bottom">
            <a class="text-decoration-none" href="/posts/{{ $post->slug }}">
                <h2>{{ $post->title }}</h2>
            </a>
            <p>By. <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>
                in <a class="text-decoration-none" href="/categories/{{ $post->category->slug }}">
                    {{ $post->category->name }}</a></p>

            <p>{{ $post->excerpt }}</p>
            <a class="text-decoration-none" href="/posts/{{ $post->slug }}"> Read More </a>
        </article>
    @endforeach --}}
    <h1>arsip</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Masuk</th>
                <th scope="col">Sumber Arsip</th>
                <th scope="col">Kode Klasifikasi</th>
                <th scope="col">Uraian Informasi</th>
                <th scope="col">Kurun-Waktu</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Proses (Transit/ Pengolahan/ Record Center/ Musnah/ Pindah/ Serah)</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Upload File</th>
            </tr>
        </thead>
        <tbody>
            @forelse($arsip as $reply)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $reply->tanggal_masuk }}</td>
                    <td>{{ $reply->sumber_arsip }}</td>
                    <td>{{ $reply->kode_klasifikasi }}</td>
                    <td>{{ $reply->uraian_informasi }}</td>
                    <td>{{ $reply->kurun_waktu }}</td>
                    <td>{{ $reply->jumlah }}</td>
                    <td>{{ $reply->proses }}</td>
                    <td>{{ $reply->lokasi }}</td>
                    <td>{{ $reply->keterangan }}</td>
                    <td>{{ $reply->file }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="11" class="text-center">no data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
