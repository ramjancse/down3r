<?php 
  session_start();
  include('config.php');

  
  if(isset($_POST['add_news_button'])){
    $news_title =  $_REQUEST['news_title'];
    $date =  $_REQUEST['date'];
    $description =  $_REQUEST['description'];
    
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
    
        move_uploaded_file($temp_loc, $upload.$cover_image);
        $temp_image_name = $upload.$cover_image;
        $ext = strtolower(pathinfo($temp_image_name, PATHINFO_EXTENSION));
        
        if($ext == 'jpg' || $ext == 'jpeg'){
          list($width_orig, $height_orig) = getimagesize($temp_image_name);
          $dst_width = 1000;
          $dst_height = 1000; 
          // ($dst_width/$width_orig)*$height_orig;
          $im = imagecreatetruecolor($dst_width,$dst_height);
          $image = imagecreatefromjpeg($temp_image_name);
          imagecopyresampled($im, $image, 0, 0, 0, 0, $dst_width, $dst_height, $width_orig, $height_orig);
          imagescale($im, 1000,1000);
          imagejpeg($im,$vdir_upload . "small_" . $cover_image);
          imagedestroy($im);
          $cover_image_to_save=("small_" . $cover_image);
          
          unlink($upload.$cover_image);
         

          $sql = "INSERT INTO news (news_title,date,description,cover_image,created_at) 
          VALUES ('$news_title','$date','$description','$cover_image_to_save','$created_at')";
          $music_query_run = mysqli_query($db, $sql);

        if($music_query_run){
            $url = '..\all-news.php';
            $_SESSION['status']="Data Inserted Successfully";
            header("location: $url");
          }else{
            echo "Getting Error While inserting data";
          }

          }else if($ext == 'png'){
          list($width_orig, $height_orig) = getimagesize($temp_image_name);
          $dst_width = 1000;
          $dst_height = 1000; 
          // $dst_height = ($dst_width/$width_orig)*$height_orig;
          $im = imagecreatetruecolor($dst_width,$dst_height);
          $image = imagecreatefrompng($temp_image_name);
          imagecopyresampled($im, $image, 0, 0, 0, 0, $dst_width, $dst_height, $width_orig, $height_orig);
          imagescale($im, 1000,1000);
          imagealphablending($im, false);
          imagesavealpha($im,true);
          imagecolortransparent($im);
          imagepng($im,$vdir_upload . "small_" . $cover_image);
          $cover_image_to_save=("small_" . $cover_image);
          imagedestroy($im);
          unlink($upload.$cover_image);

         
          $sql = "INSERT INTO news (news_title,date,description,cover_image,created_at) 
          VALUES ('$news_title','$date','$description','$cover_image_to_save','$created_at')";
          $music_query_run = mysqli_query($db, $sql);

        if($music_query_run){
            $url = '..\all-news.php';
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
  ?>