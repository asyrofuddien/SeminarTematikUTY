<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Http\Requests\StoreKatalogRequest;
use App\Http\Requests\UpdateKatalogRequest;
use App\Models\Kategori;
use App\Models\User;


class KatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $title = '';
        if(request('kategori')){
            $kategori = Kategori::firstwhere('slug', request('kategori'));
            $title = ' in '. $kategori->nama;
        }
        if(request('author')){
            $author = User::firstwhere('username', request('author'));
            $title = ' in '. $author->nama;
        }
        return view('home',[
            
            "title" => "Beranda".$title,
            "active" => "home",
            "katalog" => Katalog::latest()->filter(request(['search','kategori','author']))->paginate(9)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKatalogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKatalogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Katalog  $katalog
     * @return \Illuminate\Http\Response
     */
    public function show(Katalog $katalog)
    {
        return view('produk',[
            "title" => "Home",
            "active" => "Home",
            "katalog" => $katalog
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Katalog  $katalog
     * @return \Illuminate\Http\Response
     */
    public function edit(Katalog $katalog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKatalogRequest  $request
     * @param  \App\Models\Katalog  $katalog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKatalogRequest $request, Katalog $katalog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Katalog  $katalog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Katalog $katalog)
    {
        //
    }
}
