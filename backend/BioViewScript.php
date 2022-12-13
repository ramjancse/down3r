<?php
   
    include('backend/Session.php');
    include('backend/config.php');
   
    $bio_query = "SELECT * FROM bio ORDER BY created_at DESC";
    $bio_query_run = mysqli_query($db, $bio_query);
   

?>