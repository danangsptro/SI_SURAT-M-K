<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Models\suratKeluar;
use App\Http\Models\suratMasuk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $suratMasuk = suratMasuk::all();
        $suratKeluar = suratKeluar::all();
        return view('page.home.index', compact('suratMasuk','suratKeluar'));
    }
}
