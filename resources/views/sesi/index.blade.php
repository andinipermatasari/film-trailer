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
    <form action="/film/login" method="POST">
        @csrf
        <div class="table-responsive">
            <div class="container h-100">
                <div class="vh-100 row h-100 d-flex justify-content-center align-items-center">
                    <div class="col-md-4 py-4 border rounded">
                        <h3 class="text-center">Login</h3>
                        <div class="col-mb-3 mt-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" value="{{ Session::get('email') }}" name="email" class="form-control">
                        </div>   
                        <div class="col-mb-3 mt-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="pt-3 d-grid mt-3">
                            <button name="submit" type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <div style="margin-left: 200px" class="py-3">
                            <a href="/register">Tidak punya akun? Buat akun</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (Session::has('pesan'))
            <div class="alert alert-danger mt-2">
                {{ Session::get('pesan') }}
            </div>
        @endif
    </form>
@endsection --}}
{{-- @extends('layout/aplikasi')
@section('konten')
    <form action="/film/login" method="POST">
        @csrf
        <div class="container">
            <div class="screen">
                <div class="screen__content">
                    <form class="login">
                        <div class="login__field">
                            <i class="login__icon fas fa-user"></i>
                            <input type="text" name="email" class="login__input" placeholder="Email">
                        </div>
                        <div class="login__field">
                            <i class="login__icon fas fa-lock"></i>
                            <input type="password" name="password" class="login__input" placeholder="Password">
                        </div>
                        <button class="button login__submit">
                            <span class="button__text"> <a href="/">Log In Now</a> </span>
                            <i class="button__icon fas fa-chevron-right"></i>
                        </button>	
                        <div style="margin-left: 100px" class="py-3">
                            <a href="/register" class="text-decoration-none text-dark fw-bold">Don't have an account? <p class="text-primary">Create an account</p></a>
                        </div>			
                    </form>
                </div>
                <div class="screen__background">
                    <span class="screen__background__shape screen__background__shape2" style="background-color: pink"></span>
                    <span class="screen__background__shape screen__background__shape3" style="background-color: pink"></span>		
                    <span class="screen__background__shape screen__background__shape2" style="background-color: pink"></span>
                    <span class="screen__background__shape screen__background__shape1" ></span>
                </div>		
            </div>
        </div>
    </form>
@endsection --}}