<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function rak()
    {
        return $this->hasMany(Rak::class);
    }
    public function arsip()
    {
        return $this->hasMany(Arsip::class);
    }
}
