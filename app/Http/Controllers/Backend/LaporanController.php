<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Models\suratKeluar;
use App\Http\Models\suratMasuk;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index()
    {
        $suratMasuk = suratMasuk::all();
        $suratKeluar = suratKeluar::all();

        return  view('page.laporan.index', compact('suratMasuk', 'suratKeluar'));
    }

    public function suratMasuk()
    {
        $suratMasuk = suratMasuk::all();
        return view('page.laporan.surat-masuk', compact('suratMasuk'));
    }

    public function suratKeluar()
    {
        $suratKeluar = suratKeluar::all();
        return view('page.laporan.surat-keluar', compact('suratKeluar'));
    }

    public function searchSuratMasuk(Request $request)
    {
        $suratMasuk = suratMasuk::all();

        $start = date("Y-m-d", strtotime($request->start));
        $end = date("Y-m-d", strtotime($request->end));

        if ($request->start && $request->end) {
            $suratMasuk = $suratMasuk->whereBetween('tanggal_surat_masuk', [$start, $end]);
        }

        return view('page.laporan.surat-masuk', compact('suratMasuk'));
    }

    public function seachSuratKeluar(Request $request)
    {
        $suratKeluar = suratKeluar::all();

        $start = date("Y-m-d", strtotime($request->start));
        $end = date("Y-m-d", strtotime($request->end));

        if ($request->start && $request->end) {
            $suratKeluar = $suratKeluar->whereBetween('tanggal_surat_keluar', [$start, $end]);
        }

        return view('page.laporan.surat-keluar', compact('suratKeluar'));
    }

    public function printPdfSM(Request $request)
    {
        $suratMasuk = suratMasuk::all();

        $text = 'Laporan Surat Masuk';
        $user = Auth::user()->id;
        $idUser = User::where('id', $user)->first();

        $start = date("Y-m-d", strtotime($request->start));
        $end = date("Y-m-d", strtotime($request->end));

        if ($request->start && $request->end) {
            $suratMasuk = $suratMasuk->whereBetween('tanggal_surat_masuk', [$start, $end]);
        }

        $pdf = app('dompdf.wrapper');
        // $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->setPaper('A4', 'landscape');
        $pdf->loadView('page.laporan.print-sm', compact(
            'suratMasuk',
            'text',
            'idUser'
        ));

        return $pdf->stream("Laporan-surat-masuk.pdf");
    }

    public function printPdfSK(Request $request)
    {
        $suratKeluar = suratKeluar::all();

        $text = 'Laporan Surat Keluar';
        $user = Auth::user()->id;
        $idUser = User::where('id', $user)->first();

        $start = date("Y-m-d", strtotime($request->start));
        $end = date("Y-m-d", strtotime($request->end));

        if ($request->start && $request->end) {
            $suratKeluar = $suratKeluar->whereBetween('tanggal_surat_keluar', [$start, $end]);
        }

        $pdf = app('dompdf.wrapper');
        // $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->setPaper('A4', 'landscape');
        $pdf->loadView('page.laporan.print-sk', compact(
            'suratKeluar',
            'text',
            'idUser'
        ));

        return $pdf->stream("Laporan-surat-keluar.pdf");
    }
}
