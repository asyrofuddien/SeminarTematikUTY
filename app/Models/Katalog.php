<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['kategori','author'];

    public function scopeFilter($query, array $filters){

        $query->when($filters['search'] ?? false, function($query,$search){
            return $query->where('nama_produk', 'like', '%'. $search.'%')
                         ->orWhere('deskripsi','like','%'. $search.'%');
        });

        $query->when($filters['kategori'] ?? false, function($query,$kategori){
            return $query->whereHas('kategori', function($query) use ($kategori){
                $query->where('slug',$kategori);
            });
        });

        $query->when($filters['author'] ?? false, fn($query,$author)=>
                $query->whereHas('author', fn($query)=>
                    $query->where('username',$author))
        );
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
    public function pesanan(){
        return $this->hasMany(Pesanan::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
