<html>
    <head>
        <title>CINEMATION | Better Movie Better life</title>
            @vite('resources/css/app.css')
    </head>
    <body>
        <div class="w-full h-auto min-h-screen flex flex-col">
            <!-- header section -->
            @include('header')

            <!-- Sort Section -->
            <div class="ml-28 mt-6 flex flex-row items-center">
                <span class="font-inter font-bold text-xl">Sort</span>

                <div class="relative ml-4">
                    <select class="block appearance-none bg-white drop-shadow-[0_0px_4px_rgba(0,0,0,0.25)] text-black font-inter py-3 pl-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white"
                    onchange="changeSort(this)">
                        <option value="popularity.desc">Popularity (Descending)</option>
                        <option value="popularity.asc">Popularity (Ascending)</option>
                        <option value="vote_average.desc">Top Rated (Descending)</option>
                        <option value="vote_average.asc">Top Rated (Ascending)</option>
                    </select>
                </div>
            </div>

            <!-- Content Section -->
            <div class="w-auto pl-28 pr-10 pt-6 pb-10 grid grid-cols-3 lg:grid-cols-5 gap-5" id="dataWrapper">
                @foreach ($tvShows as $tvItem)

                @php
                $original_date = $tvItem->first_air_date;
                $timestamp = strtotime($original_date);

                $tvYear = date("Y", $timestamp);
                $tvID = $tvItem->id;
                $tvTitle = $tvItem->name;
                $tvRating = $tvItem->vote_average * 10;
                $tvImage = "{$imageBaseURL}/w500{$tvItem->poster_path}";

                @endphp
                <a href="tv/{{$tvID}}" class="group">
                    <div class="min-w-[232px] min-h-[428px] bg-white drop-shadow-[0_0px_8px_rgba(0,0,0,0.25)] group-hover:drop-shadow-[0_0px_8px_rgba(0,0,0,0.5)] rounded-[32px] p-5 flex flex-col mr-8 duration-100">
                        <div class="overlow-hidden rounded-[32px]">
                            <img class="w-full h-[300px] rounded-[32px] group-hover:scale-125 duration-200" src="{{$tvImage}}">
                        </div>
                        <span class="font-inter font-bold text-xl mt-4 line-clamp-1 group-hover:line-clamp-none">{{$tvTitle}}</span>
                        <span class="font-inter text-sm mt-1">{{$tvYear}}</span>
                        <div class="flex flex-row mt-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="blue" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                            </svg>
                            <span class="font-inter text-sm ml-1">{{$tvRating}}%</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

            <!-- Data Loader -->
            <div class="w-full pl-28 pr-10 flex justify-center mb-5" id="autoLoad">
                <svg version="1.1" id="L9" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"
                x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                <path fill="#000"
                d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                </path>
                </svg>
            </div>

            <!-- Error Notification -->
            <div id="notification" class="min-w-[250px] p-4 bg-red-700 text-white text-center rounded-lg fixed z-index-10 top-0 right-0 mr-10 mt-5 drop-shadow-lg">
                <span id="notificationMessage"></span>
            </div>

            <!-- Load More -->
            <div class="w-full pl-28 pr-10" id="loadMore">
                <button class="w-full mb-10 bg-pink-500 text-white p-4 font-inter font-bold rounded-xl uppercase drop-shadow-lg" onclick="loadMore()">Load More</button>
            </div>

            <!-- footer section -->
            @include('footer')
        </div>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" 
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" 
        crossorigin="anonymous"></script>

        <script>
            let baseURL = "<?php echo $baseURL; ?>";
            let imageBaseURL = "<?php echo $imageBaseURL; ?>";
            let apiKey = "<?php echo $apiKey; ?>";
            let sortBy = "<?php echo $sortBy; ?>";
            let page = "<?php echo $page; ?>";
            let minimalVoter = "<?php echo $minimalVoter; ?>";
        
            //Hide Loader
            $("#autoLoad").hide();

            //Hide Notification
            $("#notification").hide();

            function loadMore(){
                $.ajax({
                    url: `${baseURL}/discover/tv?page=${++page}&sort_by=${sortBy}&api_key=${apiKey}&vote_count.gte=${minimalVoter}`,
                    type: "get",
                    beforeSend: function(){
                        //Show Loader
                        $("#autoLoad").show();
                    }
                })
                .done(function (response){
                    //Hide Loader
                    $("#autoLoad").hide();

                    // Get Data
                    if (response.results){
                        var htmlData = [];
                        response.results.forEach(item => {
                            let original_date = item.first_air_date;
                            let date = new Date(original_date);
                            let tvYear = date.getFullYear();
                            let tvID = item.id;
                            let tvTitle = item.name;
                            let tvImage = `${imageBaseURL}/w500${item.poster_path}`;
                            let tvRating = item.vote_average * 10;

                            htmlData.push(`<a href="tv/${tvID}" class="group">
                                <div class="min-w-[232px] min-h-[428px] bg-white drop-shadow-[0_0px_8px_rgba(0,0,0,0.25)] group-hover:drop-shadow-[0_0px_8px_rgba(0,0,0,0.5)] rounded-[32px] p-5 flex flex-col mr-8 duration-100">
                                    <div class="overlow-hidden rounded-[32px]">
                                        <img class="w-full h-[300px] rounded-[32px] group-hover:scale-125 duration-200" src="${tvImage}">
                                    </div>
                                    <span class="font-inter font-bold text-xl mt-4 line-clamp-1 group-hover:line-clamp-none">${tvTitle}</span>
                                    <span class="font-inter text-sm mt-1">${tvYear}</span>
                                    <div class="flex flex-row mt-1 items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="blue" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                            <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                                        </svg>
                                        <span class="font-inter text-sm ml-1">${tvRating}%</span>
                                    </div>
                                </div>
                            </a>`);
                        });

                        $("#dataWrapper").append(htmlData.join(""));
                    }
                })
                .fail(function (jqHXR, ajaxOptions, thrownError){
                    //Hide loader
                    $("#autoLoad").hide();

                    //Show Notification
                    $("#notificationMessage").text("Terjadi kendala, coba beberapa saat lagi");
                    $("#notification").show();

                    //Set timeout
                    setTimeout(function() {
                        $("#notification").hide();
                    }, 3000);
                })
            }

            function changeSort(component){
                // console.log('component:', component);
                // console.log('component_value:', component.value);
                if (component.value){
                    //set new value
                    sortBy = component.value;

                    //clear data
                    $("#dataWrapper").html("");

                    //reset page value
                    page = 0;

                    //get data
                    loadMore();
                }
            }
        </script>
    </body>
</html>