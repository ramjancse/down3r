<?php

include('config.php');
session_start();
if(isset($_POST['update_gig_button'])){
    $id              = $_REQUEST['id'];
    $year            = $_REQUEST['year'];
    $month_and_day   = $_REQUEST['month_and_day'];
    $location        = $_REQUEST['location'];
    $event_title     = $_REQUEST['event_title'];
    $flyer_link      = $_REQUEST['flyer_link'];
    $created_at = date('Y/m/d H:i:s');

    $gig_edit = "UPDATE gigs SET 
    id='$id', 
    year='$year', 
    month_and_day='$month_and_day', 
    location ='$location',
    event_title ='$event_title',
    flyer_link ='$flyer_link',
    created_at = '$created_at' WHERE id=$id";
      
    $gig_edit_run = mysqli_query($db, $gig_edit);
       if($gig_edit_run){
        $url = '..\all-gig.php';
        $_SESSION['status']="Data Updated Successfully";
        header("location: $url");
        exit(0);
       }
    
    }


?>