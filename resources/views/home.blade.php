<html>
    <head>
        <title>CINEMATION | Better Movie Better life</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="w-full h-auto min-h-screen flex flex-col">
            <!-- Header Section-->
            @include('header')

            <!-- Banner Section-->
            <div class="w-full h-[512px] flex flex-col relative bg-black">
                <!-- Banner Data-->
                @foreach($banner as $bannerItem)
                @php
                $bannerImage = "{$imageBaseURL}/original{$bannerItem->backdrop_path}";
                @endphp
                <div class="flex flex-row items-center w-full h-full relative slide">
                    <!-- image -->
                    <img src="{{$bannerImage}}" class="absolute w-full h-full object-cover">
                    <!-- overlay -->
                    <div class="w-full h-full absolute bg-black bg-opacity-40"></div>
                    <div class="w-10/12 flex flex-col ml-28 z-10">
                        <span class="font-bold font-inter text-4xl text-white">{{ $bannerItem->title }}</span>
                        <span class="font-inter text-xl text-white w-1/2 line-clamp-2">{{ $bannerItem->overview }}</span>
                        <a href="/movie/{{ $bannerItem->id }}" class="w-fit bg-pink-500 text-white pl-2 pr-4 py-2 mt-5 font-inter text-sm flex flex-row rounded-full items-center hover:drop-shadow-lg duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                                <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
                            </svg>
                            <span>Detail</span>
                        </a>
                    </div>
                </div>
                @endforeach
                <!-- Prev Button -->
                <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1/12 flex justify-center" onclick="moveSlide(-1)">
                    <button class="bg-white p-3 rounded-full opacity-20 hover:opacity-100 duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                        </svg>
                    </button>
                </div>
                <!-- Next Button -->
                <div class="absolute right-0 top-1/2 -translate-y-1/2 w-1/12 flex justify-center" onclick="moveSlide(1)">
                    <button class="bg-white p-3 rounded-full opacity-20 hover:opacity-100 duration-200 rotate-180">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                        </svg>
                    </button>
                </div>
                <!-- Indicator -->
                <div class="absolute bottom-0 w-full mb-8">
                    <div class="w-full flex flex-row items-center justify-center">
                        @for($pos = 1; $pos <= count($banner); $pos++)
                        <div class="w-2.5 h-2.5 rounded-full mx-1 cursor-pointer dot" onclick="currentSlide({{$pos}})"></div>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- Top 10 Movies Section -->
            <div class="mt-12">
                <span class="ml-28 font-inter font-bold text-xl">Top 10 Movies</span>
                <div class="w-auto flex flex-row overflow-x-auto pl-28 pt-6 pb-10">
                    @foreach ($topMovies as $movieItem)

                    @php
                    $original_date = $movieItem->release_date;
                    $timestamp = strtotime($original_date);
                    $movieYear = date("Y", $timestamp);

                    $movieID = $movieItem->id;
                    $movieTitle = $movieItem->title;
                    $movieRating = $movieItem->vote_average * 10;
                    $movieImage = "{$imageBaseURL}/w500{$movieItem->poster_path}";
                    @endphp
                    <a href="movie/{{$movieID}}" class="group">
                        <div class="min-w-[232px] min-h-[428px] bg-white drop-shadow-[0_0px_8px_rgba(0,0,0,0.25)] group-hover:drop-shadow-[0_0px_8px_rgba(0,0,0,0.5)] rounded-[32px] p-5 flex flex-col mr-8 duration-100">
                            <div class="overlow-hidden rounded-[32px]">
                                <img class="w-full h-[300px] rounded-[32px] group-hover:scale-125 duration-200" src="{{ $movieImage }}">
                            </div>
                            <span class="font-inter font-bold text-xl mt-4 line-clamp-1 group-hover:line-clamp-none">{{ $movieTitle }}</span>
                            <span class="font-inter text-sm mt-1">{{ $movieYear }}</span>
                            <div class="flex flex-row mt-1 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="blue" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                   <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                                </svg>
                                <span class="font-inter text-sm ml-1">{{ $movieRating }}%</span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

             <!-- Top 10 Tv Shows Section -->
             <div>
                <span class="ml-28 font-inter font-bold text-xl">Top 10 TV Shows</span>
                <div class="w-auto flex flex-row overflow-x-auto pl-28 pt-6 pb-10">
                    @foreach($topTVShows as $tvShowsItem)

                    @php
                    $original_date = $tvShowsItem->first_air_date;
                    $timestamp = strtotime($original_date);
                    $tvShowsYear = date("Y", $timestamp);

                    $tvShowsID = $tvShowsItem->id;
                    $tvShowsTitle = $tvShowsItem->original_name;
                    $tvShowsRating = $tvShowsItem->vote_average * 10;
                    $tvShowsImage = "{$imageBaseURL}/w500{$tvShowsItem->poster_path}";
                    @endphp
                    
                    <a href="tv/{{ $tvShowsID }}" class="group">
                        <div class="min-w-[232px] min-h-[428px] bg-white drop-shadow-[0_0px_8px_rgba(0,0,0,0.25)] group-hover:drop-shadow-[0_0px_8px_rgba(0,0,0,0.5)] rounded-[32px] p-5 flex flex-col mr-8 duration-100">
                            <div class="overlow-hidden rounded-[32px]">
                                <img class="w-full h-[300px] rounded-[32px] group-hover:scale-125 duration-200" src="{{$tvShowsImage}}"/>
                            </div>
                            <span class="font-inter font-bold text-xl mt-4 line-clamp-1 group-hover:line-clamp-none">{{$tvShowsTitle}}</span>
                            <span class="font-inter text-sm mt-1">{{$tvShowsYear}}</span>
                            <div class="flex flex-row mt-1 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="blue" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                   <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                                </svg>
                                <span class="font-inter text-sm ml-1">{{$tvShowsRating}}%</span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

            <!-- Footer Section -->
            @include('footer')
        </div>
        <script>
            // Defauld active slide
            let slideIndex = 1;
            showSlide(slideIndex);
            function showSlide(position){
                let index;
                const slidesArray = document.getElementsByClassName("slide");
                const dotsArray = document.getElementsByClassName("dot");
                
                // Looping effect
                if (position > slidesArray.length) {
                    slideIndex = 1;
                }
                if (position < 1){
                    slideIndex = slidesArray.length;
                }
                // Hide all slides
                for (index = 0; index < slidesArray.length; index++){
                    slidesArray[index].classList.add('hidden');
                }
                // Show active slide
                slidesArray[slideIndex - 1].classList.remove('hidden');
                // remove active status
                for (index = 0; index < dotsArray.length; index++){
                    dotsArray[index].classList.remove('bg-pink-500');
                    dotsArray[index].classList.add('bg-white');
                }
                // set active status
                dotsArray[slideIndex - 1].classList.remove('bg-white');
                dotsArray[slideIndex - 1].classList.add('bg-pink-500');
            }

            function moveSlide(moveStep){
                showSlide(slideIndex += moveStep)
            }

            function currentSlide(position){
                showSlide(slideIndex = position);
            }
            </script>
    </body>
</html>