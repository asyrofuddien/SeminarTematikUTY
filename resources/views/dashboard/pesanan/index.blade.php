@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Pesanan</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-10">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Produk</th>
          <th scope="col">Harga</th>
          <th scope="col">Pembeli</th>
          <th scope="col">Bukti Pembayaran</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pesanan as $item)    
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->produk->nama_produk }}</td>
          <td>@currency($item->produk->harga)</td>
          <td>{{ $item->author->nama }}</td>
          <td>
            <div class="align-self-lg-center" style="max-height: 50px;max-width: 50px; overflow:hidden">
              <a href="{{ asset('storage/'.$item->bukti) }}" >
                <img src="{{ asset('storage/'.$item->bukti) }}" alt="" class="img-fluid ">
              </a>
            </div>
         </td>
          <td>
            @if($item->status)
            <i class="bi bi-check">Selesai</i>
            @else
            <form method="post" action="/dashboard/pesanan/{{ $item->id }}"  enctype="multipart/form-data">
              @method('put')
              @csrf
              <div class="mb-3" hidden>
                <label for="status" class="form-label"></label>
                <input type="text" class="form-control @error('status') is-invalid @enderror" id="nama_produk" name="status" required autofocus value="dibayar">
              </div>
              <button type="submit" class="btn btn-primary"><i class="bi bi-truck"> Proses</i></button>
            </form>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection