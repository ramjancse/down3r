<div class='social-icons-bottom d-none' id=''>
    <div>
        <a href='#'> <img src='./assets/img/socialicons/social media icons_Deezer.png' class='icon-width' /> </a>
    </div>
    <div>
        <a href='https://www.facebook.com/DLDown3rFanpage/' target="_blank"> <img src='./assets/img/socialicons/social media icons_Facebook.png' class='icon-width' /> </a>
    </div>
    <div>
        <a href='https://www.instagram.com/dldown3r/?hl=en' target="_blank"> <img src='./assets/img/socialicons/social media icons_Instagram.png'  class='icon-width'/> </a>
    </div>
    <div>
        <a href='https://soundcloud.com/skivve/suga-boom-boom-chasing-dragon-feat-laleazy' target="_blank"> <img src='./assets/img/socialicons/social media icons_Soundcloud.png' class='icon-width' /> </a>
    </div>
    <div>
        <a href='https://open.spotify.com/artist/0Ik8Ikbe7NpHu216p2Dbag' target="_blank"> <img src='./assets/img/socialicons/social media icons_Spotify.png' class='icon-width' /> </a>
    </div>
    <div>
        <a href='https://twitter.com/jwdown3r' target="_blank"> <img src='./assets/img/socialicons/social media icons_Twitter.png' class='icon-width' /> </a>
    </div>
    <div>
        <a href='https://www.youtube.com/channel/UCtraRkXPVSXyqr76pmj7umg/featured' target="_blank"> <img src='./assets/img/socialicons/social media icons_Youtube.png' class='icon-width' /> </a>
    </div>
    <div>
        <a href='https://music.apple.com/us/album/suga-boom-boom/1174030986?i=1174031209' target="_blank"> <img src='./assets/img/socialicons/socialmediaicons_AppleMusic.png' class='icon-width' /> </a>
    </div>
</div>

<script> 
    const bodyWidthSocialmobile = document.body.clientWidth;
    const windoWidthSocialMobile = window.innerWidth;
    const socialIconsMobile =   document.getElementById("socialIconsMobile");
    
    // 991 er besi hole dekha jabe
    
    if(bodyWidthSocialmobile && windoWidthSocialMobile < 991){
       
        socialIconsMobile.classList.remove('d-none');                    
    }else{
        socialIconsMobile.classList.add('d-none');
    }

  window.addEventListener("resize", function(event) {
    const bodyWidthSocialmobile = document.body.clientWidth;
    const windoWidthSocialMobile = window.innerWidth;
    const socialIconsMobile =   document.getElementById("socialIconsMobile");

    if(bodyWidthSocialmobile && windoWidthSocialMobile < 991){
      socialIconsMobile.classList.remove('d-none');                    
    }else{
        socialIconsMobile.classList.add('d-none');
    }
})

</script>