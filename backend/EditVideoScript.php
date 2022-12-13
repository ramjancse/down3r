<?php 

  include('config.php');
  
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
   
    $selectSingleVideoInfo = "SELECT * FROM videos WHERE id= $id";   
    $selectSingleVideoData = mysqli_query($db,$selectSingleVideoInfo);
    $data = $selectSingleVideoData->fetch_assoc();

}

  ?>