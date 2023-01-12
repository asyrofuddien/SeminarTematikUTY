<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardKatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.katalog.index',[
            'katalog'=> Katalog::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.katalog.create',[
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required|max:255',
            'slug' => 'required|unique:katalogs',
            'kategori_id' => 'required',
            'image' => 'image|file|max:1024',
            'deskripsi' => 'required',
            'harga' => 'required'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit (strip_tags($request->body, 200));

        Katalog::create($validatedData);

        return redirect('/dashboard/katalog')->with('success','Produk Berhasil Ditambah!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Katalog  $katalog
     * @return \Illuminate\Http\Response
     */
    public function show(Katalog $katalog)
    {
        return view('dashboard.katalog.show',[
            'katalog' =>$katalog
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
        return view('dashboard.katalog.edit',[
            'katalog' => $katalog,
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Katalog  $katalog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Katalog $katalog)
    {
        $rules = ([
            'nama_produk' => 'required|max:255',
            'kategori_id' => 'required',
            // 'slug' => 'required',
            'image' => 'image|file|max:1024',
            'deskripsi' => 'required',
            'harga' => 'required'
        ]);

        

        if($request->slug != $katalog->slug){
            $rules['slug'] = 'required|unique:katalog';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit (strip_tags($request->body, 200));

        Katalog::where('id',$katalog->id)
            ->update($validatedData);

        return redirect('/dashboard/katalog')->with('success','Produk Terupdate !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Katalog  $katalog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Katalog $katalog)
    {
        if($katalog->image){
            Storage::delete($katalog->image);
        }
        Katalog::destroy($katalog->id);

        return redirect('/dashboard/katalog')->with('success','Produk Berhasil dihapus!!!');
    }
}
