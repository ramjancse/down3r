<?php

include('config.php');
session_start();
if(isset($_POST['update_video_button'])){
    $id              = $_REQUEST['id'];
    $artist_name     =  $_REQUEST['artist_name'];
    $video_name      =  $_REQUEST['video_name'];
    $year_of_release =  $_REQUEST['year_of_release'];
    $video_link      =  $_REQUEST['video_link'];
    $old_cover             = $_REQUEST['old_cover'];
   
    $created_at = date('Y/m/d H:i:s');


    $selectSingleTourInfo = "SELECT * FROM videos WHERE id= $id";   
    $selectSingleTourData = mysqli_query($db,$selectSingleTourInfo);
    $data = $selectSingleTourData->fetch_assoc();
    

    $unique_file_name = md5(date('Y-m-d H:i:s:u'));

    $filename =  $_FILES['cover_image']['name'];
       if($filename){
        $parts = explode('.', $_FILES['cover_image']['name']);
        $cover_image = $parts[0].$unique_file_name.'.'.$parts[1];
        $temp_loc = $_FILES['cover_image']['tmp_name'];
        $upload = '../assets/img/uploads/';
        move_uploaded_file($temp_loc, $upload.$cover_image);
      
            $tourEdit = "UPDATE videos SET 
            id='$id', 
            artist_name='$artist_name',
            video_name='$video_name',
            year_of_release='$year_of_release',
            video_link='$video_link',
            created_at = '$created_at' WHERE id=$id";
            $tour_edit_run = mysqli_query($db, $tourEdit);
            
            $img= $data['cover_image'];
            unlink('../assets/img/uploads/'.$data['cover_image']);
            
            $url = '..\all-video.php';
            $_SESSION['status']="Data Updated Successfully";
            header("location: $url");
            exit(0);
      
    }else{
        $tourEdit = "UPDATE videos SET 
        id='$id', 
        artist_name='$artist_name',
        video_name='$video_name',
        year_of_release='$year_of_release',
        video_link='$video_link',
        created_at = '$created_at' WHERE id=$id";
        $tour_edit_run = mysqli_query($db, $tourEdit);

        $url = '..\all-video.php';
        $_SESSION['status']="Data Updated Successfully";
        header("location: $url");
        exit(0);
    }
}

?>