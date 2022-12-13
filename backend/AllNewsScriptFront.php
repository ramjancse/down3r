<?php
    include('backend/config.php');
  
    $all_news_query = "SELECT * FROM news ORDER BY created_at DESC";
    $all_news_query_run = mysqli_query($db, $all_news_query);

    $latest_news_query = "SELECT * FROM news ORDER BY created_at DESC LIMIT 1";
    $latest_news_query_run = mysqli_query($db, $latest_news_query);
    $latest_news = $latest_news_query_run->fetch_assoc();
   
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        //contact
        $selectSingleNewsInfo = "SELECT * FROM news WHERE id= $id";   
        $selectSingleNewsData = mysqli_query($db,$selectSingleNewsInfo);
        $data = $selectSingleNewsData->fetch_assoc();
        
        // print_r($result);
          // $count = mysqli_num_rows($row);
        //   $data = [];
    
        //     while($row = mysqli_fetch_assoc($result))
        //       {     
        //           $data[] = $row;
        //       } 
          $Error = 'Data not Found';

          
    }
?>