@extends('masterBackend')
@section('title', 'Edit Surat Masuk')

@section('backend')
    <div class="container-fluid">
        <div class="container card-content">
            <br>
            <br>
            <h4 class="text-center mb-4">Edit Surat Masuk</h4>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Surat Masuk</h6>
                </div>
                <div class="container-fluid mt-4 mb-4">
                    <form method="POST" action="{{ route('surat-masuk-update', $data->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Surat Dari</label>
                                    <input type="text" class="form-control" placeholder="Example: Surat Dari Sekolah"
                                        value="{{ $data->surat_dari }}" name="surat_dari" required>
                                    @error('surat_dari')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nomor Surat</label>
                                    <input type="number" class="form-control" placeholder="Example: 002" name="nomor_surat"
                                        required value="{{ $data->nomor_surat }}">
                                    @error('nomor_surat')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Tanggal Surat</label>
                                    <input type="date" class="form-control" name="tanggal_surat" required
                                        value="{{ $data->tanggal_surat }}">
                                    @error('tanggal_surat')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Tanggal Surat Masuk</label>
                                    <input type="date" class="form-control" placeholder="Example: PEMERINTAHAN"
                                        name="tanggal_surat_masuk" required value="{{ $data->tanggal_surat_masuk }}">
                                    @error('tanggal_surat_masuk')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Perihal</label>
                                    <input type="text" class="form-control" placeholder="Example: Kepentingan Internal"
                                        name="perihal" required value="{{ $data->perihal }}">
                                    @error('perihal')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Index Surat</label>
                                    <select class=" form-control  r-0 light" id="index_surat_id" name="index_surat_id">
                                        @foreach ($suratMasuk as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('index_surat_id') ?? $data->index_surat_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->index_perihal }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Softcopy Surat</label>
                                    <input type="file" class="form-control" placeholder="Example: PEMERINTAHAN"
                                        name="softcopy_surat" required>
                                    @error('softcopy_surat')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-primary btn-block"
                                        onclick="return confirm('Data yang di masukan sudah benar ?')">Submit</button>
                                </div>
                                <div class="col-lg-6">
                                    <a href="{{ route('surat-masuk') }}" type="submit"
                                        class="btn btn-dark btn-block">Back</a>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
