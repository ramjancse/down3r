<?php
   
    include('backend/Session.php');
    include('backend/config.php');

         
    $all_news_query = "SELECT * FROM news ORDER BY created_at DESC";
    $all_news_query_run = mysqli_query($db, $all_news_query);

    $latest_news_query = "SELECT * FROM news ORDER BY created_at DESC LIMIT 1";
    $latest_news_query_run = mysqli_query($db, $latest_news_query);
    $latest_news = $latest_news_query_run->fetch_assoc();
   

?>