<?php

include('config.php');
session_start();
if(isset($_POST['update_bio_button'])){
    $id  = $_REQUEST['id'];
    $bio = $_REQUEST['bio'];

    $old_cover   = $_REQUEST['old_cover'];
    $old_doc     = $_REQUEST['old_doc'];
   
    $created_at = date('Y/m/d H:i:s');


    $selectSingleTourInfo = "SELECT * FROM bio WHERE id= $id";   
    $selectSingleTourData = mysqli_query($db,$selectSingleTourInfo);
    $data = $selectSingleTourData->fetch_assoc();
    

    $unique_file_name = md5(date('Y-m-d H:i:s:u'));

    $filename =  $_FILES['cover_image']['name'];
    $doc_filename =  $_FILES['doc']['name'];

    $upload = '../assets/img/uploads/';
    $doc_parts = explode('.', $_FILES['doc']['name']);
    $doc_cover_image = $doc_parts[0].$unique_file_name.'.'.$doc_parts[1];
    $doc_temp_loc = $_FILES['doc']['tmp_name'];
    move_uploaded_file($doc_temp_loc, $upload.$doc_cover_image);
    $temp_doc_name = $upload.$doc_cover_image;


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
            $dst_width = 1920;
            $dst_height = 1080; 
            // ($dst_width/$width_orig)*$height_orig;
            $im = imagecreatetruecolor($dst_width,$dst_height);
            $image = imagecreatefromjpeg($temp_image_name);
            imagecopyresampled($im, $image, 0, 0, 0, 0, $dst_width, $dst_height, $width_orig, $height_orig);
            imagescale($im, 1920,1080);
            imagejpeg($im,$upload . "small_" . $cover_image);
            imagedestroy($im);
            $cover_image_to_save=("small_" . $cover_image);
            unlink($upload.$cover_image);
            $img= $data['cover_image'];
            unlink('../assets/img/uploads/'.$data['cover_image']);
            
            
           
            
            $bioEdit = "UPDATE bio SET 
            id='$id', 
            bio='$bio',
            cover_image ='$cover_image_to_save',
            doc='$doc_cover_image',
            created_at = '$created_at' WHERE id=$id";
            $bio_edit_run = mysqli_query($db, $bioEdit);
            
            $img= $data['cover_image'];
            unlink('../assets/img/uploads/'.$data['cover_image']);
            
            $url = '..\bio.php';
            $_SESSION['status']="Data Updated Successfully";
            header("location: $url");
            exit(0);

        }else if($ext == 'png'){
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
            imagepng($im,$upload . "small_" . $cover_image);
            $cover_image_to_save=("small_" . $cover_image);
            imagedestroy($im);
            unlink($upload.$cover_image);
            
            $img= $data['cover_image'];
            unlink('../assets/img/uploads/'.$data['cover_image']);
  
           

            $bioEdit = "UPDATE bio SET 
            id='$id', 
            bio='$bio',
            cover_image ='$cover_image_to_save',
            doc='$doc_cover_image',
            created_at = '$created_at' WHERE id=$id";
            $bio_edit_run = mysqli_query($db, $bioEdit);


            $url = '..\bio.php';
            $_SESSION['status']="Data Updated Successfully";
            header("location: $url");
            exit(0);
        }  
      
    }else{
        $tourEdit = "UPDATE bio SET 
        id='$id', 
        bio='$bio',
        cover_image ='$old_cover',
        doc='$doc_cover_image',
        created_at = '$created_at' WHERE id=$id";
        $bio_edit_run = mysqli_query($db, $tourEdit);

        $url = '..\bio.php';
        $_SESSION['status']="Data Updated Successfully";
        header("location: $url");
        exit(0);
    }
}

?>