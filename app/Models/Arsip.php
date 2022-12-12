<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $with = ['rak', 'ruangan', 'sumber', 'satuan'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('file', 'like', '%' . $search . '%')
                ->orWhere('sumber_arsip', 'like', '%' . $search . '%')
                ->orWhere('kode_klasifikasi', 'like', '%' . $search . '%')
                // ->orWhere('uraian_informasi', 'like', '%' . $search . '%')
                ->orWhere('kurun_waktu', 'like', '%' . $search . '%')
                ->orWhere('jumlah', 'like', '%' . $search . '%')
                ->orWhere('lokasi', 'like', '%' . $search . '%')
                // ->orWhere('keterangan', 'like', '%' . $search . '%')
                ->orWhere('tanggal_masuk', 'like', '%' . $search . '%')
                ;
        });
    }

    public function rak()
    {
        return $this->belongsTo(Rak::class);
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }

    public function sumber()
    {
        return $this->belongsTo(Sumber::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }
}
