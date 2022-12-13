<nav class="navbar navbar-expand-lg navbar-dark text-white fixed-bottom" id="navMenu">
  <div class="container-fluid ">
    <a class="navbar-brand" href="/"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-uppercase" style="margin: auto;">
        <li class="nav-item px-2">
          <a class="nav-link active" aria-current="page" href="/">+</a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link" href="music.php">Music</a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link" href="video.php">Videos</a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link" href="tour.php">Tour</a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link" href="gigs.php">Gigs</a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link" href="press.php">Press</a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link" href="biography.php">DL Down3r</a>
        </li>
       
        
      </ul>
     
    </div>
  </div>
</nav>

<script>
 
    const newWidth = document.body.clientWidth;
    const windoWidth = window.innerWidth;
    const topNav = document.getElementById("navMenu");
    
    if(newWidth && windoWidth < 991){
      topNav.classList.add('d-none');
    }else{
      topNav.classList.remove('d-none');
    }


  window.addEventListener("resize", function(event) {
    const newWidth = document.body.clientWidth;
    const windoWidth = window.innerWidth;
    const topNav = document.getElementById("navMenu");
    if(newWidth && windoWidth < 991){
      topNav.classList.add('d-none');
    }else{
      topNav.classList.remove('d-none');
    }
}) 

</script>