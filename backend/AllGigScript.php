<?php
   
    include('backend/Session.php');
    include('backend/config.php');

         
    $all_gig_query = "SELECT * FROM gigs ORDER BY created_at DESC";
    $all_gig_query_run = mysqli_query($db, $all_gig_query);
   

?>