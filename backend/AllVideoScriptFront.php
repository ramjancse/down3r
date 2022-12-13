<?php
    include('backend/config.php');  

    $all_video_query = "SELECT * FROM videos ORDER BY created_at DESC";
    $all_video_query_run = mysqli_query($db, $all_video_query);
   
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        //contact
        $selectSingleVideoInfo = "SELECT * FROM videos WHERE id= $id";   
        $selectSingleVideoData = mysqli_query($db,$selectSingleVideoInfo);
        $data = $selectSingleVideoData->fetch_assoc();
       
          $Error = 'Data not Found';   
    }
?>