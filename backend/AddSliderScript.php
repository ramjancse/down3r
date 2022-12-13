<?php 
  session_start();
  include('config.php');

  
  if(isset($_POST['add_slider_button'])){
    $slider_title =  $_REQUEST['slider_title'];
    $unique_file_name = md5(date('Y-m-d H:i:s:u'));

    $filename =  $_FILES['cover_image']['name'];
    $tem =  $_FILES['cover_image']['tmp_name'];
    $filesize =  $_FILES['cover_image']['size'];
    $pathinfo =  pathinfo($filename);
  
    $created_at = date('Y/m/d H:i:s');
   
    
    if(!empty($filename) && !empty($pathinfo)){
    $parts = explode('.', $_FILES['cover_image']['name']);
    $cover_image = $parts[0].$unique_file_name.'.'.$parts[1];
    $temp_loc = $_FILES['cover_image']['tmp_name'];
    
    
    $upload = '../assets/img/uploads/';
    $vdir_upload = '../assets/img/uploads/';
    $active = 1;
        move_uploaded_file($temp_loc, $upload.$cover_image);
        $temp_image_name = $upload.$cover_image;
        $ext = strtolower(pathinfo($temp_image_name, PATHINFO_EXTENSION));
        
        if($ext == 'jpg' || $ext == 'jpeg'){
          list($width_orig, $height_orig) = getimagesize($temp_image_name);
          $dst_width = 1200;
          $dst_height = 450; 
          // ($dst_width/$width_orig)*$height_orig;
          $im = imagecreatetruecolor($dst_width,$dst_height);
          $image = imagecreatefromjpeg($temp_image_name);
          imagecopyresampled($im, $image, 0, 0, 0, 0, $dst_width, $dst_height, $width_orig, $height_orig);
          imagescale($im, 1200,450);
          imagejpeg($im,$vdir_upload . "small_" . $cover_image);
          imagedestroy($im);
          $cover_image_to_save=("small_" . $cover_image);
          
          unlink($upload.$cover_image);
         

          $sql = "INSERT INTO sliders (slider_title,cover_image,active,created_at) VALUES ('$slider_title', '$cover_image_to_save','$active','$created_at')";
          $music_query_run = mysqli_query($db, $sql);

        if($music_query_run){
            $url = '..\all-slider.php';
            $_SESSION['status']="Data Inserted Successfully";
            header("location: $url");
          }else{
            echo "Getting Error While inserting data";
          }

          }else if($ext == 'png'){
          list($width_orig, $height_orig) = getimagesize($temp_image_name);
          $dst_width = 1200;
          $dst_height = 450; 
          // $dst_height = ($dst_width/$width_orig)*$height_orig;
          $im = imagecreatetruecolor($dst_width,$dst_height);
          $image = imagecreatefrompng($temp_image_name);
          imagecopyresampled($im, $image, 0, 0, 0, 0, $dst_width, $dst_height, $width_orig, $height_orig);
          imagescale($im, 1200,450);
          imagealphablending($im, false);
          imagesavealpha($im,true);
          imagecolortransparent($im);
          imagepng($im,$vdir_upload . "small_" . $cover_image);
          $cover_image_to_save=("small_" . $cover_image);
          imagedestroy($im);
          unlink($upload.$cover_image);

         
          $sql = "INSERT INTO sliders (slider_title,cover_image,active, created_at) VALUES ('$slider_title', '$cover_image_to_save','$active','$created_at')";
          $music_query_run = mysqli_query($db, $sql);

        if($music_query_run){
            $url = '..\all-slider.php';
            $_SESSION['status']="Data Inserted Successfully";
            header("location: $url");
          }else{
            echo "Getting Error While inserting data";
          }

        }else if($ext == 'mp4' || $ext == 'avi' || $ext == 'mov' ){
          // list($width_orig, $height_orig) = getimagesize($temp_image_name);
          // $dst_width = 1200;
          // $dst_height = 450; 
          $cover_image_to_save=($cover_image);

          // unlink($upload.$cover_image);

          $sql = "INSERT INTO sliders (slider_title,cover_image,active, created_at) VALUES ('$slider_title', '$cover_image_to_save','$active','$created_at')";
          $music_query_run = mysqli_query($db, $sql);

        if($music_query_run){
            $url = '..\all-slider.php';
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
    } 
    
    if(isset($_POST['active_button'])){
      $active =  $_REQUEST['active'];
      $id =  $_REQUEST['id'];
      print_r($id);
    $update_active = "UPDATE sliders SET active='$active' WHERE id=$id";
      
    $active_update_run = mysqli_query($db, $update_active);
       if($active_update_run){
        $url = '..\all-slider.php';
        $_SESSION['status']="Data Updated Successfully";
        header("location: $url");
        exit(0);
       }


    }
    
  ?>