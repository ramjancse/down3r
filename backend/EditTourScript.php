<?php 

  include('config.php');
  
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
   
    $selectSingleTourInfo = "SELECT * FROM tours WHERE id= $id";   
    $selectSingleTourData = mysqli_query($db,$selectSingleTourInfo);
    $data = $selectSingleTourData->fetch_assoc();

}

  ?>