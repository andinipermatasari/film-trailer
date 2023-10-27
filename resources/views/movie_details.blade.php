<html>
    <head>
        <title>CINEMATION | Better Movie Better Life</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="w-full h-screen flex flex-col relative">
            @php 
            $backdropPath = $movieData ? "{$imageBaseURL}/original{$movieData->backdrop_path}" : "";
            @endphp
            <!-- Background Image -->
            <img class="w-full h-screen absolute object-cover lg:object-fill" src="{{$backdropPath}}" />
            <div class="w-full h-screen absolute bg-black bg-opacity-60 z-10"></div>

            <!-- Menu Section -->
            <div class="w-full bg-transparent h-[96px] drop-shadow-lg flex flex-row items-center z-10">
                <div class="w-1/3 pl-5">
                    <a href="/movies" class="uppercase text-base mx-5 text-white hover:text-pink-500 duration-200 font-inter">Movies</a>
                    <a href="/tv-shows" class="uppercase text-base mx-5 text-white hover:text-pink-500 duration-200 font-inter>Tv Shows">Tv shows</a>
                </div>

                <div class="w-1/3 flex items-center justify-center">
                    <a href="/" class="font-bold text-5xl font-quicksand text-white hover:text-pink-500 duration-200">CINEMATION</a>
                </div>

                <div class="w-1/3 flex flex-row justify-end pr-10">
                    <a href="/search" class="group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"
                                class="fill-white group-hover:fill-pink-500 duration-200"/>
                        </svg>
                    </a>
                </div>
            </div>

            @php 

            $title = "";
            $tagline = "";
            $year = "";
            $duration = "";
            $rating = "0";

            if ($movieData){
                $original_date = $movieData->release_date;
                $timestamp = strtotime($original_date);
                $year = date("Y", $timestamp);
                $rating = (int) ($movieData->vote_average * 10);
                $title = $movieData->title;

                if ($movieData->tagline){
                    $tagline = $movieData->tagline;
                } else {
                    $tagline = $movieData->overview;
                }

                if ($movieData->runtime){
                    $hour = (int)($movieData->runtime / 60);
                    $minute = $movieData->runtime % 60;
                    $duration = "{$hour}h {$minute}m";
                }
            }

            //2*phi * r . r = 32 pixel
            $circumference = 2 * 22/7 * 32;
            $progressRating = $circumference - ($rating/100) * $circumference;

            $trailerID = "";
            if (isset($movieData->videos->results)){
                foreach($movieData->videos->results as $item){
                    if (strtolower($item->type) == 'trailer'){
                        $trailerID = $item->key;
                        break;
                    }
                }
            }

            @endphp

            <!-- content section -->
            <div class="w-full h-full z-10 flex flex-col justify-center px-20">
                <span class="font-quicksand font-bold text-6xl mt-4 text-white">{{$title}}</span>
                <span class="font-quicksand italic text-2xl mt-4 text-white max-w-3xl line-clamp-5">{{$tagline}}</span>
                
                <div class="flex flex-row mt-4 items-center">
                    <!-- Rating -->
                    <div class="w-20 h-20 rounded-full flex items-center justify-center mr-4" style="background: #00304D;">
                        <svg class="-rotate-90 w-20 h-20">
                            <circle 
                                style = "color: #004F80;"
                                stroke-width = "8"
                                stroke = "currentColor"
                                fill = "transparent"
                                r = "32"
                                cx = "40"
                                cy =  "40"
                            />
                            <circle 
                                style = "color: #6FCF97;"
                                stroke-width = "8"
                                stroke-dasharray = "{{$circumference}}"
                                stroke-dashoffset = "{{$progressRating}}"
                                stroke-linecap = "round"
                                stroke = "currentColor"
                                fill = "transparent"
                                r = "32"
                                cx = "40"
                                cy =  "40"
                            />
                        </svg>

                        <span class="absolute font-inter font-bold text-xl text-white">{{$rating}}%</span>
                    </div>

                    <!-- Year -->
                    <span class="font-inter text-xl text-white bg-transparent rounded-md border border-white p-2 mr-4">{{$year}}</span>

                    <!-- Duration -->
                    @if ($duration)
                    <span class="font-inter text-xl text-white bg-transparent rounded-md border border-white p-2">{{$duration}}</span>
                    @endif
                </div>
                <!-- Play Trailer -->
                @if ($trailerID)
                <button class="w-fit bg-pink-500 text-white pl-4 pr-6 py-3 mt-5 font-inter text-xl flex flex-row rounded-lg items-center hover:drop-shadow-lg duration-200" onclick="showTrailer(true)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                        <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
                    </svg>
                    <span class="">Play Trailer</span>
                </button>
                @endif           
            </div>
            <!-- Trailer Section -->
            <div id="trailerWrapper" class="absolute z-10 w-full h-screen p-20 bg-black flex flex-col">
                <button class="ml-auto group mb-4" onclick="showTrailer(false)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" >
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" class="fill-white group-hover:fill-pink-500 duration-200"/>
                    </svg>
                </button> 
                <iframe id="youtubeVideo" class="w-full h-full" src="https://www.youtube.com/embed/{{$trailerID}}?enablejsapi=1" title="{{$movieData->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                </iframe>
                <!-- Konten iklan di sini -->
                {{-- <div class="w-full h-full">
                    <div class="modal-body movie-modal-content p-0 border" style="background-image: url({{ $backdropPath }})">
                        <div class="justify-content-center align-items-center d-flex flex-column position-relative p-3 pt-5 text-center">            
                            <div class="ex-icon justify-content-center d-flex flex-column position-relative"> 
                                <div class="h3 font-bold mt-3">Activate your FREE Account!</div>
                                    <p>You must create an account to continue watching</p>
                                    <a href="https://www.youtube.com/embed/{{$trailerID}}?enablejsapi=1" style="color: white">Continue to watch for FREE ➞</a>
                            </div>
                            <div class="modal-footer align-items-center d-flex flex-column justify-center text-center text-dark">
                                <p class="text-large mb-1"><span class="text-large font-bold">Quick Sign Up!</span></p>
                                <p class="small">It takes less then 1 minute to Sign Up, then you can enjoy Unlimited Movies &amp; TV titles.</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>      
        <script>
            // Ambil elemen tombol dan modal
            var openModalBtn = document.getElementById("openModalBtn");
            var modal = document.getElementById("myModal");
            var closeModalBtn = document.getElementById("closeModalBtn");
            
            // Fungsi untuk membuka modal
            openModalBtn.onclick = function() {
            modal.style.display = "block";
            };
            
            // Fungsi untuk menutup modal
            closeModalBtn.onclick = function() {
            modal.style.display = "none";
            };
            
            // Fungsi untuk menutup modal ketika pengguna mengklik di luar modal
            window.onclick = function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
            };
            setTimeout(function() {
                player.playVideo(); // Mulai video
                player.pauseVideo(); // Jeda video
                player.loadModule("advertising"); // Muat modul iklan
                player.mute(); // Matikan suara selama iklan
            }, 5000); // 5000 milidetik (5 detik)
        </script>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" 
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" 
        crossorigin="anonymous"></script>
            
        <script>
            //Hide Trailer
            $("#trailerWrapper").hide();

            function showTrailer(isVisible){
                if (isVisible){
                    //show Trailer
                    $("#trailerWrapper").show();
                } else {
                    //stop youtube video
                    $("#youtubeVideo")[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}','*');
                    // Hide trailer
                    $("#trailerWrapper").hide();
                }
            }
        </script>
    </body>
</html>
    