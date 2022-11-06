<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $with = ['ruangan'];

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }

    public function arsip()
    {
        return $this->hasMany(Arsip::class);
    }
}
