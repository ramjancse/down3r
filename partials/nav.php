<!-- <nav class="navbar bg-transparent text-white ">
    <div class="container-fluid padding-containe text-white nav-position">
        <a class="navbar-brand text-white text-uppercase" href="/">+</a>
        <a class="navbar-brand text-white text-uppercase" href="music.php">Music</a>
        <a class="navbar-brand text-white text-uppercase" href="video.php"> asdsadsd Videos</a>
        <a class="navbar-brand text-white text-uppercase" href="#">Tour</a>
        <a class="navbar-brand text-white text-uppercase" href="#">Gigs</a>
        <a class="navbar-brand text-white text-uppercase" href="#">Press</a>
        <a class="navbar-brand text-white text-uppercase" href="#">DL Down3r</a>
    </div>
</nav> -->
<nav class="navbar navbar-expand-md navbar-dark fixed-bottom cust-nav-bg" id='navMenu'>
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" style='margin-right:10px;' type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" >
      <span class="navbar-toggler-icon" id='toggle'></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
      <div class="navbar-nav">
            <a class="navbar-brand text-white text-uppercase custom-menu-font" href="/">+</a>
            <a class="navbar-brand text-white text-uppercase custom-menu-font" href="music.php">Music</a>
            <a class="navbar-brand text-white text-uppercase custom-menu-font" href="video.php">Videos</a>
            <a class="navbar-brand text-white text-uppercase custom-menu-font" href="tour.php">Tour</a>
            <a class="navbar-brand text-white text-uppercase custom-menu-font" href="gigs.php">Gigs</a>
            <a class="navbar-brand text-white text-uppercase custom-menu-font" href="press.php">Press</a>
            <a class="navbar-brand text-white text-uppercase custom-menu-font" href="biography.php">DL Down3r</a>
      </div>
    </div>
  </div>
</nav>

<script>
 
    const newWidth = document.body.clientWidth;
    const windoWidth = window.innerWidth;
    const topNav = document.getElementById("navMenu");
    
    if(newWidth && windoWidth < 767){
      topNav.classList.add('fixed-top', 'cust-nav-bg-mobile');
      topNav.classList.remove('fixed-bottom', 'cust-nav-bg');
    }else{
      topNav.classList.add('fixed-bottom', 'cust-nav-bg');
      topNav.classList.remove('fixed-top', 'cust-nav-bg-mobile');
    } 


  window.addEventListener("resize", function(event) {
    const newWidth = document.body.clientWidth;
    const windoWidth = window.innerWidth;
    const topNav = document.getElementById("navMenu");
    if(newWidth && windoWidth < 767){
      topNav.classList.add('fixed-top', 'cust-nav-bg-mobile');
      topNav.classList.remove('fixed-bottom', 'cust-nav-bg');
    }else{
      topNav.classList.add('fixed-bottom', 'cust-nav-bg');
      topNav.classList.remove('fixed-top', 'cust-nav-bg-mobile');
    } 
}) 

</script>