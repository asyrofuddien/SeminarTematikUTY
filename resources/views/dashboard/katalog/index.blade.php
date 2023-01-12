@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">My Post</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-8">
    <a href="/dashboard/katalog/create" class="btn btn-primary mb-3"><i class="bi bi-plus-square"></i> Create new post</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Produk</th>
          <th scope="col">Harga</th>
          <th scope="col">Kategori</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($katalog as $item)    
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->nama_produk }}</td>
          <td>@currency($item->harga)</td>
          <td>{{ $item->kategori->nama }}</td>
          <td>
            <a href="/dashboard/katalog/{{ $item->slug }}" class="badge bg-info">
                <i class="bi bi-eye"></i>
            </a>
            <a href="/dashboard/katalog/{{ $item->slug }}/edit" class="badge bg-warning">
                <i class="bi bi-pencil"></i>
            </a>
            <form action="/dashboard/katalog/{{ $item->slug }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection