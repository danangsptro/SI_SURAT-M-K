<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class indexSurat extends Model
{
    protected $guarded = [];

    public function suratMasuk()
    {
        return $this->hasMany(suratMasuk::class, 'index_surat_id', 'id');
    }

    public function suratKeluar()
    {
        return $this->hasMany(suratKeluar::class, 'index_surat_id', 'id');
    }
}
