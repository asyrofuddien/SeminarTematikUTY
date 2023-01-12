<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $guarded = ['id'];

    use HasFactory;
    public function katalog(){
        return $this->hasMany(Katalog::class);
    }
    public function pesanan(){
        return $this->hasMany(Pesanan::class);
    }
}
