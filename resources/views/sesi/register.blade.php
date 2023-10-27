{{-- @extends('layout/aplikasi')
@section('konten')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/film/create" method="POST">
        @csrf
        <div class="table-responsive">
            <div class="container h-100">
                <div class="vh-100 row h-100 d-flex justify-content-center align-items-center">
                    <div class="col-md-4 py-5 border rounded ">
                        <h1 class="text-center">Register</h1>
                        <div class="mb-3 mt-5">
                            <label for="name" class="form-label">Nama</label>
                            <input type="name" value="{{ Session::get('email') }}" name="name" class="form-control" placeholder="Masukkan Nama">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" value="{{ Session::get('email') }}" name="email" class="form-control" placeholder="Masukkan Email">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                        </div>
                        <div class="mb-3 d-grid mt-3">
                            <button name="submit" type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @if (Session::has('pesan'))
        <div class="alert alert-danger mt-2">
            {{ Session::get('pesan') }}
        </div>
    @endif
@endsection --}}

@extends('layout/aplikasi')
@section('konten')

<form action="/film/create" method="POST">
    @csrf
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class="register">
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" placeholder="Username" name="name">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" placeholder="Email" name="email">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" placeholder="Password" name="password">
                    </div>
                    <button class="button login__submit">
                        <span class="button__text"> <a href="/login">Register Now</a> </span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>				
                </form>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>		
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>		
        </div>
    </div>
</form>
@endsection