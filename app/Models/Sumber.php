<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sumber extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function arsip()
    {
        return $this->hasMany(Arsip::class);
    }
}
