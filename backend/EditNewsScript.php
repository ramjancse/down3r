<?php 

  include('config.php');
  
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
   
    $selectSingleNewsInfo = "SELECT * FROM news WHERE id= $id";   
    $selectSingleNewsData = mysqli_query($db,$selectSingleNewsInfo);
    $data = $selectSingleNewsData->fetch_assoc();

}

  ?>