<?php 
  session_start();
  include('config.php');

  if(isset($_POST['add_video_button'])){
    $artist_name =  $_REQUEST['artist_name'];
    $video_name =  $_REQUEST['video_name'];
    $year_of_release = $_REQUEST['year_of_release'];
    $video_link = $_REQUEST['video_link'];
    $created_at = date('Y/m/d H:i:s');
   
    $sql = "INSERT INTO videos (artist_name,video_name,year_of_release,video_link,created_at) 
    VALUES ('$artist_name','$video_name', '$year_of_release', '$video_link', '$created_at')";
    $vide_query_run = mysqli_query($db, $sql);

    if($vide_query_run){
        $url = '..\all-video.php';
        $_SESSION['status']="Data Inserted Successfully";
        header("location: $url");
      }else{
        $_SESSION['status']="Something Went Wrong";
      }

    }  
  ?>