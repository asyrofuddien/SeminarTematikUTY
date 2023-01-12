@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Produk</h1>
    </div>
    <div class="col-lg-8">
    <form method="post" action="/dashboard/katalog" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="nama_produk" class="form-label">Nama Produk</label>
          <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" name="nama_produk" required autofocus value="{{ old('nama_produk') }}">
        @error('nama_produk')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}" >
          @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="harga" class="form-label">Harga</label>
          <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" required value="{{ old('harga') }}" >
          @error('harga')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="kategori_id"  class="form-label">Kategori</label>
          <select class="form-select" name="kategori_id">
            @foreach ($kategori as $kategori)
            @if (old('kategori_id') == $kategori->id) 
            <option value="{{ $kategori->id }}" selected>{{ $kategori->nama }}</option>
            @else
            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
            @endif
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="image" class="form-label" >Gambar</label>
          <img class="img-preview im-fluid mb-3 col-sm-5">
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi Barang</label>
          @error('deskripsi')
            <p class="text-danger">{{ $message }}</p>
          @enderror
          <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}" required>
          <trix-editor input="deskripsi"></trix-editor>
        </div>
        
        <button type="submit" class="btn btn-primary">Tambah Produk</button>
      </form>
    </div>

    <script>
      const title = document.querySelector('#nama_produk');
      const slug = document.querySelector('#slug');

      title.addEventListener("keyup", function() {
          let preslug = title.value;
          preslug = preslug.replace(/ /g,"-");
          slug.value = preslug.toLowerCase();
      });

      document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
      });

      function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
          imgPreview.src = oFREvent.target.result;
        }
      }
    </script>
@endsection