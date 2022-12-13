<?php
   
    
    include('backend/config.php');

         
    $all_sliders_query = "SELECT * FROM sliders ORDER BY created_at DESC";
    $all_sliders_query_run = mysqli_query($db, $all_sliders_query);

    // $carosel_sliders_query = "SELECT * FROM sliders WHERE active = '1' ORDER BY created_at DESC LIMIT 3";
    // $carosel_sliders_query_run = mysqli_query($db, $carosel_sliders_query);

   

?>