<?php

include('config.php');
session_start();
if(isset($_POST['update_single_button'])){
    $id                    = $_REQUEST['id'];
    $album_name            = $_REQUEST['album_name'];
    $artist_name            = $_REQUEST['artist_name'];
    $amazon =  $_REQUEST['amazon'];
    $deezer =  $_REQUEST['deezer'];
    $itunes =  $_REQUEST['itunes'];
    $spotify =  $_REQUEST['spotify'];
    $description            = $_REQUEST['description'];
    $old_cover             = $_REQUEST['old_cover'];
   
    $created_at = date('Y/m/d H:i:s');


    $selectSingleTourInfo = "SELECT * FROM singles WHERE id= $id";   
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
            
            
           
            
            $tourEdit = "UPDATE singles SET 
            id='$id', 
            album_name='$album_name',
            artist_name = '$artist_name',
            amazon = '$amazon', 
            deezer = '$deezer', 
            itunes = '$itunes', 
            spotify = '$spotify', 
            description = '$description', 
            cover_image ='$cover_image_to_save',
            created_at = '$created_at' WHERE id=$id";
            $tour_edit_run = mysqli_query($db, $tourEdit);
            
            $img= $data['cover_image'];
            unlink('../assets/img/uploads/'.$data['cover_image']);
            
            $url = '..\all-singles-eps.php';
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
  
           

            $tourEdit = "UPDATE singles SET 
            id='$id', 
            album_name='$album_name', 
            artist_name = '$artist_name',
            amazon = '$amazon', 
            deezer = '$deezer', 
            itunes = '$itunes', 
            spotify = '$spotify', 
            description = '$description',
            cover_image ='$cover_image_to_save',
            created_at = '$created_at' WHERE id=$id";
            $tour_edit_run = mysqli_query($db, $tourEdit);

            $url = '..\all-singles-eps.php';
            $_SESSION['status']="Data Updated Successfully";
            header("location: $url");
            exit(0);
        }  
      
    }else{
        $tourEdit = "UPDATE singles SET 
        id='$id', 
        album_name='$album_name',
        artist_name = '$artist_name', 
        amazon = '$amazon', 
        deezer = '$deezer', 
        itunes = '$itunes', 
        spotify = '$spotify', 
        description = '$description', 
        cover_image ='$old_cover',
        created_at = '$created_at' WHERE id=$id";
        $tour_edit_run = mysqli_query($db, $tourEdit);

        $url = '..\all-singles-eps.php';
        $_SESSION['status']="Data Updated Successfully";
        header("location: $url");
        exit(0);
    }
}

?>