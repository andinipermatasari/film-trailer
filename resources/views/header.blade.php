{{-- <div class="uppercase text-base mx-5 text-black hover:text-red-500 duration-200 font-inter">
            <a href="" class="w-fit bg-pink-500 text-white pl-2 pr-4 py-2 mt-5 font-inter text-sm flex flex-row rounded-full items-center hover:drop-shadow-lg duration-200">
                <span>Detail</span>
            </a>
        </div>   
        <div class="uppercase text-base mx-5 text-black hover:text-red-500 duration-200 font-inter">
            <a href="/film/logout">Keluar</a>
        </div>    --}}
    <div class="w-full bg-white h-[96px] drop-shadow-lg flex flex-row items-center">
        {{-- @if ((Auth::check())) --}}
        <div class="w-1/3 pl-5">
            <a href="/movies" class="uppercase text-base mx-5 text-black hover:text-pink-500 duration-200 font-inter">Movies</a>
            <a href="/tv-shows" class="uppercase text-base mx-5 text-black hover:text-pink-500 duration-200 font-inter">TV Shows</a>
            {{-- <a href="" class="uppercase text-base mx-5 text-black hover:text-pink-500 duration-200 font-inter">Gendre</a> --}}
        </div>
        <div class="w-1/3 flex items-center justify-center">
            <a href="/" class="font-bold text-5xl font-quicksand text-black hover:text-pink-500 duration-200">CINEMATION</a>
        </div>
            <div class="w-1/3 flex flex-row justify-end pr-10">
                <a href="/search" class="group mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"
                        class="fill-black group-hover:fill-pink-500 duration-200"/>
                    </svg>
                </a>
            </div>
        {{-- @else --}}
        {{-- <div class="w-1/5 pl-5">
            <a href="/login" class="uppercase text-base mx-5 text-black hover:text-pink-500 duration-200 font-inter">
                <button type="button" class="btn btn-outline-danger">LOGIN</button>
            </a>
            <a href="/register" class="uppercase text-base mx-5 text-black hover:text-pink-500 duration-200 font-inter">Register</a>
        </div>
        
        @endif --}}
    </div>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>

{{-- <div class="w-full bg-white h-[96px] drop-shadow-lg flex flex-row items-center">
    @auth
    <div class="w-1/3 pl-5">
        <a href="/movies" class="uppercase text-base mx-5 text-black hover:text-pink-500 duration-200 font-inter">Movies</a>
        <a href="/tv-shows" class="uppercase text-base mx-5 text-black hover:text-pink-500 duration-200 font-inter">TV Shows</a>
    </div>
    <div class="w-1/3 flex items-center justify-center">
        <a href="/" class="font-bold text-5xl font-quicksand text-black hover:text-pink-500 duration-200">CINEMATION</a>
    </div>
    <div class="w-1/5 flex flex-row justify-end pr-10">
        <a href="/search" class="group mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"
                class="fill-black group-hover:fill-pink-500 duration-200"/>
            </svg>
        </a>
        <a href="{{ route('logout') }}" class="ml-3">
            <button type="button" class="btn btn-danger">Logout</button>
        </a>
    </div>
    @else
    <div class="w-1/5 pl-5">
        <a href="/login" class="uppercase text-base mx-5 text-black hover:text-pink-500 duration-200 font-inter">
        Login
        </a>
        <a href="/register" class="uppercase text-base mx-5 text-black hover:text-pink-500 duration-200 font-inter">Register</a>
    </div>
    @endauth
</div>
<script>
    // Menangani klik tombol keluar
    document.getElementById('logoutButton').addEventListener('click', function(e) {
        e.preventDefault();
        $('#confirmLogoutModal').modal('show');
    });

    // Menangani konfirmasi keluar
    document.getElementById('confirmLogout').addEventListener('click', function() {
        window.location.href = "{{ route('logout') }}";
    });
    <div class="modal fade" id="confirmLogoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Keluar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda yakin ingin keluar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmLogout">Keluar</button>
                </div>
            </div>
        </div>
    </div>
</script> --}}
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset ('css/botstrap.min.css') }}">
</head>
<body>
    <div class="w-full bg-white h-[96px] drop-shadow-lg flex flex-row items-center">
        @auth
        <!-- Konten untuk pengguna yang sudah login -->
        @else
        <!-- Konten untuk pengguna yang belum login -->
        <div class="w-1/5 pl-5">
            <a href="/login" class="uppercase text-base mx-5 text-black hover:text-pink-500 duration-200 font-inter">
            Login
            </a>
            <a href="/register" class="uppercase text-base mx-5 text-black hover:text-pink-500 duration-200 font-inter">Register</a>
        </div>
        @endauth
    </div>
    
    <!-- Script JavaScript di bawah ini -->
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script>
        // Menangani klik tombol keluar
        document.getElementById('logoutButton').addEventListener('click', function(e) {
            e.preventDefault();
            $('#confirmLogoutModal').modal('show');
        });
    
        // Menangani konfirmasi keluar
        document.getElementById('confirmLogout').addEventListener('click', function() {
            window.location.href = "{{ route('logout') }}";
        });
    </script>
    
</body>
</html> --}}



{{-- <div class="w-full bg-white h-[96px] drop-shadow-lg flex flex-row items-center">
    @auth
    <!-- Konten untuk pengguna yang sudah login -->
    <div class="w-1/3 pl-5">
        <a href="/movies" class="uppercase text-base mx-5 text-black hover:text-pink-500 duration-200 font-inter">Movies</a>
        <a href="/tv-shows" class="uppercase text-base mx-5 text-black hover:text-pink-500 duration-200 font-inter">TV Shows</a>
    </div>
    <div class="w-1/3 flex items-center justify-center">
        <a href="/" class="font-bold text-5xl font-quicksand text-black hover:text-pink-500 duration-200">CINEMATION</a>
    </div>
    <div class="w-1/5 flex flex-row justify-end pr-10">
        <a href="/search" class="group mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"
                class="fill-black group-hover:fill-pink-500 duration-200"/>
            </svg>
        </a>
        <a href="/logout" class="ml-3">
            <button type="button" class="btn btn-danger">Logout</button>
        </a>
    </div>
    @else
    <!-- Konten untuk pengguna yang belum login -->
    <div class="w-1/5 pl-5">
        <a href="/login" class="uppercase text-base mx-5 text-black hover:text-pink-500 duration-200 font-inter">
        Login
        </a>
        <a href="/register" class="uppercase text-base mx-5 text-black hover:text-pink-500 duration-200 font-inter">Register</a>
    </div>
    @endauth
</div> --}}



{{-- 
<div class="w-1/3 pl-5">
    <a href="/movies" class="uppercase text-base mx-5 text-black hover:text-pink-500 duration-200 font-inter">Movies</a>
    <a href="/tv-shows" class="uppercase text-base mx-5 text-black hover:text-pink-500 duration-200 font-inter">TV Shows</a>
</div>
<div class="w-1/3 flex items-center justify-center">
    <a href="/" class="font-bold text-5xl font-quicksand text-black hover:text-pink-500 duration-200">CINEMATION</a>
</div>
<div class="w-1/5 flex flex-row justify-end pr-10">
    <a href="/search" class="group mb-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"
            class="fill-black group-hover:fill-pink-500 duration-200"/>
        </svg>
    </a>
    @auth
    <a href="/logout" class="ml-3">
        <button type="button" class="btn btn-danger">Logout</button>
    </a>
    @else
    <!-- Konten untuk pengguna yang belum login -->
    <div class="w-1/5 pl-5">
        <a href="/login" class="uppercase text-base mx-5 text-black hover:text-pink-500 duration-200 font-inter">
        Login
        </a>
        <a href="/register" class="uppercase text-base mx-5 text-black hover:text-pink-500 duration-200 font-inter">Register</a>
    </div>
    @endauth
</div> --}}
