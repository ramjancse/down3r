<?php 
  session_start();
  include('config.php');
  
  if(isset($_POST['add_gig_button'])){
    $year =  $_REQUEST['year'];
    $month_and_day =  $_REQUEST['month_and_day'];
    $location = $_REQUEST['location'];
    $event_title = $_REQUEST['event_title'];
    $flyer_link = $_REQUEST['flyer_link'];
    $created_at = date('Y/m/d H:i:s');
   

    $sql = "INSERT INTO gigs (year,month_and_day,location,event_title,flyer_link,created_at) VALUES ('$year','$month_and_day', '$location', '$event_title', '$flyer_link', '$created_at')";
    $gig_query_run = mysqli_query($db, $sql);

    if($gig_query_run){
        $url = '..\all-gig.php';
        $_SESSION['status']="Data Inserted Successfully";
        header("location: $url");
      }else{
        $_SESSION['status']="Something Went Wrong";
      }

    }  
  ?>