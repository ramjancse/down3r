<?php
   
    include('backend/Session.php');
    include('backend/config.php');

         
    $all_video_query = "SELECT * FROM videos ORDER BY created_at DESC";

    $all_video_query_run = mysqli_query($db, $all_video_query);
   

?>