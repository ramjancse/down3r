<?php
   
    include('backend/Session.php');
    include('backend/config.php');

         
    $all_single_query = "SELECT * FROM singles ORDER BY created_at DESC";

    $all_single_query_run = mysqli_query($db, $all_single_query);
   

?>