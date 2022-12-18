<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Models\indexSurat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class IndexSuratController extends Controller
{
    public function index()
    {
        $data = indexSurat::all();
        return view('page.index-surat.index', compact('data'));
    }

    public function create()
    {
        return view('page.index-surat.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'index_surat' => 'required|max:5',
            'index_perihal' => 'required|max:15',
        ]);

        $data = indexSurat::create($request->all(), $validate);
        $data->save();
        if ($data) {
            return redirect('dashboard/index-surat')->with([
                'message' => "Menambahkan Index Surat",
                'style' => 'success'
            ]);
        } else {
            return redirect('dashboard/index-surat')->with([
                'message' => "Gagal Menambahkan Index Surat",
                'style' => 'error'
            ]);
        }
    }

    public function edit(Request $request, $id)
    {
        $data = indexSurat::find($id);
        return view('page.index-surat.edit', compact('data'));
    }

    public function update (Request $request, $id)
    {
        $validate = $request->validate([
            'index_surat' => 'required|max:5',
            'index_perihal' => 'required|max:15',
        ]);

        $id = $request->id;

        $data = indexSurat::find($id);
        $data->index_surat = $validate['index_surat'];
        $data->index_perihal = $validate['index_perihal'];
        $data->save();

        if ($data) {
            return redirect('dashboard/index-surat')->with([
                'message' => "Menambahkan Index Surat",
                'style' => 'success'
            ]);
        } else {
            return redirect('dashboard/index-surat')->with([
                'message' => "Gagal Menambahkan Index Surat",
                'style' => 'error'
            ]);
        }
    }

    public function destroy($id)
    {
        if (!$id) {
            return redirect()->back()->with([
                'message' => "Data not found",
                'style' => 'error'
            ]);
        }
        $data = indexSurat::find($id);
        $data->delete();
        if ($data) {
            return redirect()->back()->with([
                'message' => "Delete Index Surat",
                'style' => 'success'
            ]);
        }
    }
}
