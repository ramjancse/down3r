<?php
   
    include('backend/Session.php');
    include('backend/config.php');

         
    $all_music_query = "SELECT * FROM musics ORDER BY created_at DESC";

    $all_music_query_run = mysqli_query($db, $all_music_query);
   

?>