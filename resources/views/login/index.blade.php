@extends('layout.main')

@section('container')
<div class="row justify-content-center mb-3">

    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    

    <div class="col-md-4">
        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
                <form action="/login" method="post">
                    @csrf
                    <div class="form-floating">
                        <input value="{{ old('email') }}" required autofocus type="username" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username">
                        <label for="floatingInput">Username</label>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input required type="password" name="password" class="form-control" id="password" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                
                    <button class="w-100 btn btn-lg btn-primary " type="submit">Login</button>
                </form>
                <small class="mt-3 d-block text-center">Not registerd? <a href="/register">Register Now</a></small>
        </main>
    </div>
</div>

@endsection