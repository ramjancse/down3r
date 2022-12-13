<?php 
  session_start();
  include('config.php');
  
  if(isset($_POST['add_tour_button'])){
    $tour_name =  $_REQUEST['tour_name'];
    $unique_file_name = md5(date('Y-m-d H:i:s:u'));

    $filename =  $_FILES['cover_image']['name'];
    $tem =  $_FILES['cover_image']['tmp_name'];
    $filesize =  $_FILES['cover_image']['size'];
    $pathinfo =  pathinfo($filename);
  
    $created_at = date('Y/m/d H:i:s');
    
    if(!empty($filename) && !empty($pathinfo) && !empty($tour_name)){
    $parts = explode('.', $_FILES['cover_image']['name']);
    $cover_image = $parts[0].$unique_file_name.'.'.$parts[1];
    $temp_loc = $_FILES['cover_image']['tmp_name'];
   
    $upload = '../assets/img/uploads/';
    $vdir_upload = '../assets/img/uploads/';
    move_uploaded_file($temp_loc, $upload.$cover_image);
   
    $sql = "INSERT INTO tours (tour_name,cover_image,created_at) 
    VALUES ('$tour_name', '$cover_image','$created_at')";
          $music_query_run = mysqli_query($db, $sql);

        if($music_query_run){
            $url = '..\all-tour.php';
            $_SESSION['status']="Data Inserted Successfully";
            header("location: $url");
          }else{
            echo "Getting Error While inserting data";
          }

        }else{
          echo "We need all required filed and upload jpg or png Image.";
        }   
    }else{
      echo "We need all required filed and upload jpg or png Image.";
    }
  
  ?>