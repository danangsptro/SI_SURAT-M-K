@extends('masterBackend')
@section('title', 'Surat Masuk')

@section('backend')
    <div class="container">
        <a href="{{route('surat-masuk')}}" class="btn btn-dark btn btn-md btn-block">Back</a>
        <div class="text-center mb-4 card py-4">
            <h4><b>Softcopy Surat Masuk</b></h4>
            <hr>
            <h6 class="text-bold">Perihal Surat : <b>{{ $data->perihal }}</b></h6>
        </div>
        <br>
        <div class="d-flex justify-content-center">
            <iframe src="{{ Storage::url($data->softcopy_surat) }}" style="width:900px; height:1100px;"
                frameborder="0"></iframe>
        </div>
    </div>
@endsection
