<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Models\indexSurat;
use App\Http\Models\suratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $data = suratKeluar::all();
        return view('page.surat-keluar.index', compact('data'));
    }

    public function create()
    {
        $data = indexSurat::all();
        return view('page.surat-keluar.create', compact('data'));
    }

    public function store (Request $request)
    {
        $validate = $request->validate([
            'tujuan_surat' => 'required|max:50',
            'nomor_surat' => 'required|max:11',
            'tanggal_surat' => 'required',
            'tanggal_surat_keluar' => 'required',
            'perihal' => 'required|max:50',
            'index_surat_id' => 'required',
            'softcopy_surat' => 'required|mimes:pdf'
        ]);

        $data = new suratKeluar();
        $data->tujuan_surat = $validate['tujuan_surat'];
        $data->nomor_surat = $validate['nomor_surat'];
        $data->tanggal_surat = $validate['tanggal_surat'];
        $data->tanggal_surat_keluar = $validate['tanggal_surat_keluar'];
        $data->perihal = $validate['perihal'];
        $data->index_surat_id = $validate['index_surat_id'];
        $data->softcopy_surat = $request->file('softcopy_surat')->store('asset/suratkeluar', 'public');
        $data->save();
        if ($data) {
            return redirect('dashboard/surat-keluar')->with([
                'message' => "Menambahkan Surat keluar",
                'style' => 'success'
            ]);
        } else {
            return redirect('dashboard/surat-keluar')->with([
                'message' => "Gagal Menambahkan Surat keluar",
                'style' => 'error'
            ]);
        }
    }

    public function edit($id)
    {
        $data = suratKeluar::find($id);
        $suratKeluar = indexSurat::all();
        return view('page.surat-keluar.edit', compact('data', 'suratKeluar'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'tujuan_surat' => 'required|min:2',
            'nomor_surat' => 'required|max:11',
            'tanggal_surat' => 'required',
            'tanggal_surat_keluar' => 'required',
            'perihal' => 'required|min:5',
            'index_surat_id' => 'required',
            'softcopy_surat' => 'required|mimes:pdf'
        ]);

        $id = $request->id;

        $data = suratKeluar::find($id);
        $data->tujuan_surat = $validate['tujuan_surat'];
        $data->nomor_surat = $validate['nomor_surat'];
        $data->tanggal_surat = $validate['tanggal_surat'];
        $data->tanggal_surat_keluar = $validate['tanggal_surat_keluar'];
        $data->perihal = $validate['perihal'];
        $data->index_surat_id = $validate['index_surat_id'];
        if ($data->softcopy_surat) {
            Storage::delete('public/' . $data->softcopy_surat);
            $data->softcopy_surat = $request->file('softcopy_surat')->store('asset/suratKeluar', 'public');
        }
        $data->save();
        if ($data) {
            return redirect('dashboard/surat-keluar')->with([
                'message' => "Edit Surat Keluar",
                'style' => 'success'
            ]);
        } else {
            return redirect('dashboard/surat-keluar')->with([
                'message' => "Gagal Edit Surat Keluar",
                'style' => 'error'
            ]);
        }
    }

    public function show($id)
    {
        $data = suratKeluar::find($id);
        return view('page.surat-keluar.detail', compact('data'));
    }

    public function destroy($id)
    {
        if (!$id) {
            return redirect()->back()->with([
                'message' => "Data not found",
                'style' => 'error'
            ]);
        }
        $data = suratKeluar::find($id);
        Storage::delete('public/'.$data->softcopy_surat);
        $data->delete();
        if ($data) {
            return redirect()->back()->with([
                'message' => "Delete Surat Masuk",
                'style' => 'success'
            ]);
        }
    }
}
