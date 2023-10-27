<!DOCTYPE html>
<html>
<head>
  <title>Modal Iklan dalam Iframe</title>
  <style>
    /* Gaya untuk modal di luar iframe */
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.4);
    }
    /* Gaya untuk konten modal */
    .modal-content {
      background-color: white;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }
  </style>
</head>
<body>

<!-- Tombol untuk membuka modal -->
<button id="openModalBtn">Buka Modal Iklan</button>

<!-- Modal di luar elemen iframe -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span id="closeModalBtn">&times;</span>
    <!-- Konten iklan di sini -->
    <div class="modal-body movie-modal-content p-0 border" style="background-image: url({{ $backdropPath }})">
        <div class="justify-content-center align-items-center d-flex flex-column position-relative p-3 pt-5 text-center">            
            <div class="ex-icon justify-content-center d-flex flex-column position-relative">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                </svg> 
        </div>
        <div class="h3 font-bold mt-3">Activate your FREE Account!</div>
            <p>You must create an account to continue watching</p>
            <a href="https://www.youtube.com/embed/{{$trailerID}}?enablejsapi=1" class="btn btn-lg bg-pink bg-hover-theme mb-4">Continue to watch for FREE ➞</a>
        </div>
        <div class="modal-footer align-items-center d-flex flex-column justify-content-center text-center text-dark">
            <p class="text-large mb-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                </svg><span class="text-large font-bold">Quick Sign Up!</span></p>
            <p class="small">It takes less then 1 minute to Sign Up, then you can enjoy Unlimited Movies &amp; TV titles.</p>
        </div>
    </div>
  </div>
</div>

<!-- Iframe untuk konten eksternal -->
<iframe id="youtubeVideo" class="w-full h-full" src="https://www.youtube.com/embed/{{$trailerID}}?enablejsapi=1" title="{{$movieData->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

<script>
var openModalBtn = document.getElementById("openModalBtn");
var modal = document.getElementById("myModal");
var closeModalBtn = document.getElementById("closeModalBtn");
var externalContent = document.getElementById("externalContent");

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
</script>

</body>
</html>
