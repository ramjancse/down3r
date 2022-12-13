<?php

include('config.php');
session_start();
if(isset($_POST['update_news_button'])){
    $id             = $_REQUEST['id'];
    $news_title     =  $_REQUEST['news_title'];
    $date           =  $_REQUEST['date'];
    $description    =  $_REQUEST['description'];

    $old_cover      = $_REQUEST['old_cover'];
   
    $created_at = date('Y/m/d H:i:s');


    $selectSingleTourInfo = "SELECT * FROM news WHERE id= $id";   
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
            imagejpeg($im,$upload . "small_" . $cover_image);
            imagedestroy($im);
            $cover_image_to_save=("small_" . $cover_image);
            unlink($upload.$cover_image);
            $img= $data['cover_image'];
            unlink('../assets/img/uploads/'.$data['cover_image']);
            
            
            $news = "UPDATE news SET 
            id='$id', 
            news_title='$news_title',
            date = '$date', 
            description = '$description', 
            cover_image ='$cover_image_to_save',
            created_at = '$created_at' WHERE id=$id";
            $tour_edit_run = mysqli_query($db, $news);
            
            $img= $data['cover_image'];
            unlink('../assets/img/uploads/'.$data['cover_image']);
            
            $url = '..\all-news.php';
            $_SESSION['status']="Data Updated Successfully";
            header("location: $url");
            exit(0);

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
            imagepng($im,$upload . "small_" . $cover_image);
            $cover_image_to_save=("small_" . $cover_image);
            imagedestroy($im);
            unlink($upload.$cover_image);
            
            $img= $data['cover_image'];
            unlink('../assets/img/uploads/'.$data['cover_image']);
  
           

            $news = "UPDATE news SET 
            id='$id', 
            news_title='$news_title',
            date = '$date', 
            description = '$description', 
            cover_image ='$cover_image_to_save',
            created_at = '$created_at' WHERE id=$id";
            $tour_edit_run = mysqli_query($db, $news);

            $url = '..\all-news.php';
            $_SESSION['status']="Data Updated Successfully";
            header("location: $url");
            exit(0);
        }  
      
    }else{
        $news = "UPDATE news SET 
        id='$id', 
        news_title='$news_title',
        date = '$date', 
        description = '$description', 
        cover_image ='$old_cover',
        created_at = '$created_at' WHERE id=$id";
        $tour_edit_run = mysqli_query($db, $news);

        $url = '..\all-news.php';
        $_SESSION['status']="Data Updated Successfully";
        header("location: $url");
        exit(0);
    }
}

?>