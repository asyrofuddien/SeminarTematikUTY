@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <div class="row my-4">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $katalog->title }}</h1>
                <a href="/dashboard/katalog" class="btn btn-success"><i class="bi bi-arrow-left-circle"></i> Back to all my katalogs</a>
                <a href="/dashboard/katalog/{{ $katalog->slug }}/edit" class="btn btn-warning text-white"><i class="bi bi-pencil"></i> Edit</a>
                <form action="/dashboard/katalog/{{ $katalog->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i> Delete</button>
                  </form>
                  <h1 class="mb-3">{{ $katalog->nama_produk }}</h1>
                <p>Toko <a href="/?author={{ $katalog->author->username }}">{{ $katalog->author->nama }}</a> || Kategori : <a href="/?category={{ $katalog->kategori->slug }}">{{ $katalog->kategori->nama }}</a></p>
                  @if($katalog->image)
                  <div style="max-height: 350px; overflow:hidden">
                      <img src="{{ asset('storage/'.$katalog->image) }}?{{ $katalog->kategori->nama }}" alt="" class="img-fluid mt-4">
                  </div>
                  @else
                    <img src="https://source.unsplash.com/1200x400?{{ $katalog->kategori->nama }}" alt="" class="img-fluid mt-4">
                  @endif
                  <h3 class="mt-4">Rp {{ $katalog->harga }}</h3>
                <article class="my-3 fs-5">
                    {!! $katalog->deskripsi !!}
                </article>

                
            </div>

        </div>
    </div>
@endsection