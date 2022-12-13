<?php
   
    include('backend/Session.php');
    include('backend/config.php');

         
    $all_tour_query = "SELECT * FROM tours ORDER BY created_at DESC";
    $all_tour_query_run = mysqli_query($db, $all_tour_query);
   

?>