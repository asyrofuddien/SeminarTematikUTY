@extends('layout.main')

@section('container')
@if (session()->has('success'))
<div class="alert alert-success col-lg-12" role="alert">
  {{ session('success') }}
</div>
@endif
    <div id="carouselExampleControls" class="carousel slide mt-3 mb-5" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://source.unsplash.com/1200x400?laptop" class="d-block w-100 rounded-4"  alt="gambar">
          </div>
          <div class="carousel-item">
            <img src="https://source.unsplash.com/1200x400?computer" class="d-block w-100 rounded-4" alt="gambar">
          </div>
          <div class="carousel-item">
            <img src=https://source.unsplash.com/1200x400?handphone" class="d-block w-100 rounded-4" alt="gambar">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only"></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only"></span>
        </a>
      </div>

      <div class="row justify-content-center mb-3">
        <div class="col-md-6">
          <form action="/">
            @if (request('kategori'))
                <input type="hidden" name="kategori" value="{{ request('kategori') }}">
            @endif
            @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="search.." name="search" value="{{ request('search') }}">
                <button class="btn btn-danger" type="submit">Search</button>
              </div>
              
          </form>
        </div>
    </div>
    
      @if ($katalog->count())
      <div class="row bt-4">
        @foreach($katalog as $item)
            <div class="col-md-4 mb-3 rounded-4">
                <div class="card ">
                    <div style="background-color: rgba(0,0,0,0.7) "class="position-absolute px-3 py-2 text-white">
                        <a class="text-white text-decoration-none text-white" href="/?kategori={{ $item->kategori->slug }}">{{ $item->kategori->nama }}</a>
                    </div>
                    @if($item->gambar)
                    <img src="{{ asset('storage/'.$item->image) }}" alt="gambar barang" class="img-fluid">
                    @else
                    <img src="https://source.unsplash.com/500x500?{{ $item->kategori->nama }}" class="card-img-top" alt="">
                    @endif
                    <div class="card-body">
                    <a class="text-decoration-none text-dark" href="/produk/{{ $item->slug }}">
                        <h5 class="card-title">{{ $item->title }}</h5>
                    </a>
                    <p>
                        <small class="text-muted">By. <a href="/?author={{ $item->author->username }}">{{ $item->author->nama }}</a> {{ $item->created_at->diffForHumans() }}
                        </small>
                    </p>
                    <h3 class="card-title">{{ $item->nama_produk }}</h3>
                    <p class="card-text ">@currency($item->harga)</p>
                    @auth
                    <a href="/produk/{{ $item->slug }}" class="btn btn-primary">Beli</a>
                    @else
                    @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @else
    <p class="text-center fs-4">No Post Found.</p>
    @endif
    
    {{ $katalog->links() }}
            
        
@endsection
