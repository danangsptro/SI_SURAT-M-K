<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class suratKeluar extends Model
{
    protected $guarded = [];

    public function indexSurat()
    {
        return $this->belongsTo(indexSurat::class, 'index_surat_id');
    }
}
