@extends('layout.main')

@section('container')

<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <a href="/" class="btn btn-primary mb-3"><i class="bi bi-arrow-left"></i> Kembali</a>
            <h1 class="mb-3">{{ $katalog->nama_produk }}</h1>
            <p>Toko <a href="/?author={{ $katalog->author->username }}">{{ $katalog->author->nama }}</a> || Kategori : <a href="/?category={{ $katalog->kategori->slug }}">{{ $katalog->kategori->nama }}</a></p>

            @if($katalog->image)
            <div style="max-height: 350px; overflow:hidden">
                <img src="{{ asset('storage/'.$katalog->image) }}?{{ $katalog->kategori->nama }}" alt="" class="img-fluid ">
            </div>
            @else
              <img src="https://source.unsplash.com/1200x400?{{ $katalog->kategori->nama }}" alt="" class="img-fluid ">
            @endif
            <h3 class="mt-4">@currency($katalog->harga)</h3>

                <article class="my-3 fs-5 ">
                    {!! $katalog->deskripsi !!}
                </article>
                
            <div>
                <form method="post" action="/pesen" class="mb-5" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3" hidden>
                        <label for="toko_id" class="form-label"></label>
                        <input type="text" class="form-control @error('toko_id') is-invalid @enderror" id="toko_id" name="toko_id" required autofocus value="{{ $katalog->user_id }}">
                    </div>
                    <div class="mb-3" hidden>
                        <label for="produk_id" class="form-label"></label>
                        <input type="text" class="form-control @error('produk_id') is-invalid @enderror" id="produk_id" name="produk_id" required autofocus value="{{ $katalog->id }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="bank" class="mb-2">Bank Pembayaran</label>
                        <select class="form-control" id="bank" name="bank">
                          <option>MANDIRI</option>
                          <option>BRI</option>
                          <option>BCA</option>
                        </select>
                      </div>
                    <div class="mb-3">
                      <label for="image" class="form-label" >Bukti Pembayaran</label>
                      <img class="img-preview im-fluid mb-3 col-sm-5">
                      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                      @error('image')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary"><i class="bi bi-basket"> Beli</i></button>
                  </form>
            </div>

        </div>

    </div>
</div>


@endsection

