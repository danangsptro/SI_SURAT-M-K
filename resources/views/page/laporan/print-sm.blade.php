<!DOCTYPE html>
<html>

<head>
    <title>Laporan Surat Masuk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <p class="text-center font-weight-bold">{{ $text }} </p>
    <div class="mt-4 mb-4">
        <table>
            <tr>
                <td><strong>Note:</strong></td>
            </tr>
            <tr>
                <td>Name </td>
                <td> : {{ $idUser->name }}</td>
            </tr>
        </table>
    </div>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Surat Dari</th>
                <th>Nomor Surat</th>
                <th>Tanggal Surat</th>
                <th>Tanggal Surat Masuk</th>
                <th>Perihal</th>
                <th>Index Surat</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($suratMasuk as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->surat_dari }}</td>
                    <td>{{ $d->nomor_surat }}</td>
                    <td>{{ $d->tanggal_surat }}</td>
                    <td>{{ $d->tanggal_surat_masuk }}</td>
                    <td>{{ $d->perihal }}</td>
                    <td>{{ $d->indexSurat->index_surat }} - {{ $d->indexSurat->index_perihal }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>
