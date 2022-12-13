<?php
   include('config.php');
   

   if(!isset($_SESSION['authenticated'])){
      $url = '..\index.php';
      $_SESSION['status']="Please Login to Access User Dashboard";
      header("location: $url");
      exit(0);
   }
   
?>
