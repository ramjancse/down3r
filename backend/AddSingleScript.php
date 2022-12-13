<?php 
  session_start();
  include('config.php');

  
  if(isset($_POST['add_single_button'])){
    $album_name =  $_REQUEST['album_name'];
    $artist_name =  $_REQUEST['artist_name'];
    $description =  $_REQUEST['description'];
    $amazon =  $_REQUEST['amazon'];
    $deezer =  $_REQUEST['deezer'];
    $itunes =  $_REQUEST['itunes'];
    $spotify =  $_REQUEST['spotify'];
    $unique_file_name = md5(date('Y-m-d H:i:s:u'));
   

    $filename =  $_FILES['cover_image']['name'];
    $tem =  $_FILES['cover_image']['tmp_name'];
    $filesize =  $_FILES['cover_image']['size'];
    $pathinfo =  pathinfo($filename);
  
   
    
    if(!empty($filename) && !empty($pathinfo)){
    $parts = explode('.', $_FILES['cover_image']['name']);
    $cover_image = $parts[0].$unique_file_name.'.'.$parts[1];
    $temp_loc = $_FILES['cover_image']['tmp_name'];
   
    
    $upload = '../assets/img/uploads/';
    $vdir_upload = '../assets/img/uploads/';
    
        move_uploaded_file($temp_loc, $upload.$cover_image);
        $temp_image_name = $upload.$cover_image;
        $ext = pathinfo($temp_image_name, PATHINFO_EXTENSION);
        
        
        if($ext == 'jpg' || $ext == 'JPG' || $ext == 'jpeg' || $ext == 'JPEG'){
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
          $created_at = date('Y/m/d H:i:s');

          $sql = "INSERT INTO singles (album_name, artist_name, amazon, deezer, itunes, spotify, description, cover_image,created_at) 
          VALUES ('$album_name', '$artist_name', '$amazon', '$deezer', '$itunes', '$spotify', '$description','$cover_image_to_save','$created_at')";
          $music_query_run = mysqli_query($db, $sql);

        if($music_query_run){
            $url = '..\all-singles-eps.php';
            $_SESSION['status']="Data Inserted Successfully";
            header("location: $url");
          }else{
            echo "Getting Error While inserting data";
          }

          }else if($ext == 'png' || $ext == 'PNG'){
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

          $created_at = date('Y/m/d H:i:s');
          $sql = "INSERT INTO singles (album_name,artist_name,description, cover_image,created_at) 
          VALUES ('$album_name', '$artist_name', '$description','$cover_image_to_save','$created_at')";
          $music_query_run = mysqli_query($db, $sql);

        if($music_query_run){
            $url = '..\all-singles-eps.php';
            $_SESSION['status']="Data Inserted Successfully";
            header("location: $url");
          }else{
            echo "Getting Error While inserting data";
          }

        }else{
          echo "please upload jpg or png Image";
        }   
    }else{
        $cover_image_to_save = '';
    }
    }  
  ?>