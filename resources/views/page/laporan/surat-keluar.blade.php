@extends('masterBackend')
@section('title', 'Surat Keluar')

@section('backend')
    <div class="container-fluid">
        <h4 class="h4 mb-2 text-gray-800 text-center mb-4 mt-4">Laporan Surat Keluar</h3>
            <br>
            <a onclick="exportPdf()" class="btn btn-dark btn-icon-split mb-4">
                <span class="text">Print Laporan &nbsp; <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                        <path
                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                    </svg></span>
            </a>
            <form action="{{ route('laporan-surat-keluar') }}" method="GET">
                <div class="row mt-2">
                    <div class="col-lg-4">
                        <div class="input-group">
                            <span class="input-group-addon">Start: &nbsp;</span>
                            <input type="date" class="form-control date" placeholder="yyyy-mm-dd"
                                value="{{ Request::get('start') ? Request::get('start') : '' }}" name="start" />
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="input-group">
                            <span class="input-group-addon">End: &nbsp;</span>
                            <input type="date" class="form-control date" placeholder="yyyy-mm-dd"
                                value="{{ Request::get('end') ? Request::get('end') : '' }}" name="end" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <button class="btn btn-success" type="submit">Search</button>
                        @if (Request::get('start') and Request::get('end'))
                            <a href="{{ route('laporan-surat-keluar') }}" type="submit" class="btn btn-danger"
                                style="margin-left: 0.5em">Clear filter</a>
                        @endif
                    </div>

                </div>
            </form>
            <br>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tujuan Surat</th>
                                    <th>Nomor Surat</th>
                                    <th>Tanggal Surat</th>
                                    <th>Tanggal Surat Keluar</th>
                                    <th>Perihal</th>
                                    <th>Index Surat</th>
                                    <th>Softcopy Surat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suratKeluar as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->tujuan_surat }}</td>
                                        <td>{{ $d->nomor_surat }}</td>
                                        <td>{{ $d->tanggal_surat }}</td>
                                        <td>{{ $d->tanggal_surat_keluar }}</td>
                                        <td>{{ $d->perihal }}</td>
                                        <td>{{ $d->indexSurat->index_surat }} - {{ $d->indexSurat->index_perihal }}</td>
                                        <td class="text-center">
                                            @if ($d->softcopy_surat)
                                                <a href="{{ route('surat-keluar-show', $d->id) }}">
                                                    <img src="{{ asset('assets/img/pdf.png') }}" alt=""
                                                        width="35px">
                                                </a>
                                            @else
                                                File Not Found
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        function exportPdf() {
            var start = $('input[name=start]').val();
            var end = $('input[name=end]').val();
            var url = "{{ route('print-surat-keluar') }}?start=" + start + "&end=" + end;
            return window.open(url, '_blank');
        }
    </script>
@endsection
