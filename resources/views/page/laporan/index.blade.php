@extends('masterBackend')
@section('title', 'Index Surat')

@section('backend')
    <div class="container py-2 text-center">
        <h4 class="mb-4">Laporan Surat Masuk & Keluar</h4>
        <hr>
        <div class="row">
            <div class="col-lg-6 card py-3">
                <h5><b>Surat Masuk</b></h5>
                <hr>
                <div class="text-center">
                    <h2>{{ $suratMasuk->count() }}</h2>
                </div>
                <hr style="border:white">
                <a href="{{ route('surat-masuk-laporan') }}" class="btn btn-dark mt-3">Lihat</a>
            </div>
            <div class="col-lg-6 card py-3">
                <h5><b>Surat Keluar</b></h5>
                <hr>
                <div class="text-center">
                    <h2>{{ $suratKeluar->count() }}</h2>
                </div>
                <hr style="border:white">
                <a href="{{ route('surat-keluar-laporan') }}" class="btn btn-dark mt-3">Lihat</a>
            </div>
        </div>
    </div>

@endsection
