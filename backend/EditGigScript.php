<?php 

  include('config.php');
  
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
   
    $selectSingleGigInfo = "SELECT * FROM gigs WHERE id= $id";   
    $selectSingleGigData = mysqli_query($db,$selectSingleGigInfo);
    $data = $selectSingleGigData->fetch_assoc();

}

  ?>