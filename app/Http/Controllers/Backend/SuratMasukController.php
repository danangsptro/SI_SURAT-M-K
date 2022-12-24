<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Models\indexSurat;
use App\Http\Models\suratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    public function index()
    {
        $data = suratMasuk::all();
        return view('page.surat-masuk.index', compact('data'));
    }

    public function create()
    {
        $suratMasuk = indexSurat::all();
        return view('page.surat-masuk.create', compact('suratMasuk'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'surat_dari' => 'required|min:2',
            'nomor_surat' => 'required|max:11',
            'tanggal_surat' => 'required',
            'tanggal_surat_masuk' => 'required',
            'perihal' => 'required|min:5',
            'index_surat_id' => 'required',
            'softcopy_surat' => 'required'
        ]);
        $data = new suratMasuk();
        $data->surat_dari = $validate['surat_dari'];
        $data->nomor_surat = $validate['nomor_surat'];
        $data->tanggal_surat = $validate['tanggal_surat'];
        $data->tanggal_surat_masuk = $validate['tanggal_surat_masuk'];
        $data->perihal = $validate['perihal'];
        $data->index_surat_id = $validate['index_surat_id'];
        $data->softcopy_surat = $request->file('softcopy_surat')->store('asset/suratmasuk', 'public');
        $data->save();
        if ($data) {
            return redirect('dashboard/surat-masuk')->with([
                'message' => "Menambahkan Surat Masuk",
                'style' => 'success'
            ]);
        } else {
            return redirect('dashboard/surat-masuk')->with([
                'message' => "Gagal Menambahkan Surat Masuk",
                'style' => 'error'
            ]);
        }
    }

    public function edit($id)
    {
        $data = suratMasuk::find($id);
        $suratMasuk = indexSurat::all();
        return view('page.surat-masuk.edit', compact('data', 'suratMasuk'));
    }

    public function destroy($id)
    {
        if (!$id) {
            return redirect()->back()->with([
                'message' => "Data not found",
                'style' => 'error'
            ]);
        }
        $data = suratMasuk::find($id);
        Storage::delete('public/' . $data->softcopy_surat);
        $data->delete();
        if ($data) {
            return redirect()->back()->with([
                'message' => "Delete Surat Masuk",
                'style' => 'success'
            ]);
        }
    }
}
