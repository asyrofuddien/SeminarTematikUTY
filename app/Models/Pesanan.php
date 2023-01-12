<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
    protected $with = ['produk','author'];



    
    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function produk(){
        return $this->belongsTo(Katalog::class);
    }

    
}
