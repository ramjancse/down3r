<?php 
  session_start();
  include('config.php');

  
  if(isset($_POST['add_bio_button'])){
    $bio =  $_REQUEST['bio'];
    $unique_file_name = md5(date('Y-m-d H:i:s:u'));
    $filename =  $_FILES['cover_image']['name'];
    $doc =  $_FILES['doc']['name'];
   
    $tem =  $_FILES['cover_image']['tmp_name'];
    $filesize =  $_FILES['cover_image']['size'];
    $pathinfo =  pathinfo($filename);

    $doc_tem =  $_FILES['doc']['tmp_name'];
    $doc_filesize =  $_FILES['doc']['size'];
    $doc_pathinfo =  pathinfo($doc);
  
   
    
    if(!empty($filename) && !empty($pathinfo)){
    
    $parts = explode('.', $_FILES['cover_image']['name']);
    $cover_image = $parts[0].$unique_file_name.'.'.$parts[1];
    $temp_loc = $_FILES['cover_image']['tmp_name'];

    $doc_parts = explode('.', $_FILES['doc']['name']);
    $doc_cover_image = $doc_parts[0].$unique_file_name.'.'.$doc_parts[1];
    $doc_temp_loc = $_FILES['doc']['tmp_name'];
    
    
    $upload = '../assets/img/uploads/';
    $vdir_upload = '../assets/img/uploads/';
    
        move_uploaded_file($temp_loc, $upload.$cover_image);
        $temp_image_name = $upload.$cover_image;
        $ext = pathinfo($temp_image_name, PATHINFO_EXTENSION);

        move_uploaded_file($doc_temp_loc, $upload.$doc_cover_image);
        $temp_doc_name = $upload.$doc_cover_image;
        
        
        if($ext == 'jpg' || $ext == 'JPG' || $ext == 'jpeg' || $ext == 'JPEG'){
          list($width_orig, $height_orig) = getimagesize($temp_image_name);
          $dst_width = 1920;
          $dst_height = 1080; 
          // ($dst_width/$width_orig)*$height_orig;
          $im = imagecreatetruecolor($dst_width,$dst_height);
          $image = imagecreatefromjpeg($temp_image_name);
          imagecopyresampled($im, $image, 0, 0, 0, 0, $dst_width, $dst_height, $width_orig, $height_orig);
          imagescale($im, 1920,1080);
          imagejpeg($im,$vdir_upload . "small_" . $cover_image);
          imagedestroy($im);
          $cover_image_to_save=("small_" . $cover_image);
          
          unlink($upload.$cover_image);
          $created_at = date('Y/m/d H:i:s');

          $sql = "INSERT INTO bio (bio,cover_image,doc,created_at) 
          VALUES ('$bio','$cover_image_to_save','$doc_cover_image','$created_at')";
          $bio_query_run = mysqli_query($db, $sql);

        if($bio_query_run){
            $url = '..\bio.php';
            $_SESSION['status']="Data Inserted Successfully";
            header("location: $url");
          }else{
            echo "Getting Error While inserting data";
          }

          }else if($ext == 'png' || $ext == 'PNG'){
          list($width_orig, $height_orig) = getimagesize($temp_image_name);
          $dst_width = 1920;
          $dst_height = 1080; 
          // $dst_height = ($dst_width/$width_orig)*$height_orig;
          $im = imagecreatetruecolor($dst_width,$dst_height);
          $image = imagecreatefrompng($temp_image_name);
          imagecopyresampled($im, $image, 0, 0, 0, 0, $dst_width, $dst_height, $width_orig, $height_orig);
          imagescale($im, 1920,1080);
          imagealphablending($im, false);
          imagesavealpha($im,true);
          imagecolortransparent($im);
          imagepng($im,$vdir_upload . "small_" . $cover_image);
          $cover_image_to_save=("small_" . $cover_image);
          imagedestroy($im);
          unlink($upload.$cover_image);

          $created_at = date('Y/m/d H:i:s');
          $sql = "INSERT INTO bio (bio,cover_image,doc,created_at) 
          VALUES ('$bio','$cover_image_to_save','$doc_cover_image','$created_at')";
          $bio_query_run = mysqli_query($db, $sql);

        if($bio_query_run){
            $url = '..\bio.php';
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