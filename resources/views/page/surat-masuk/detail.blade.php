@extends('masterBackend')
@section('title', 'Surat Masuk')

@section('backend')
    <div>
        <div class="d-flex justify-content-center">
            <iframe src="{{ Storage::url($data->softcopy_surat) }}" style="width:900px; height:1100px;"
                frameborder="0"></iframe>
        </div>
    </div>
@endsection
