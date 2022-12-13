<?php 

  include('config.php');
  
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
   
    $selectSinglesEpsInfo = "SELECT * FROM singles WHERE id= $id";   
    $selectSinglesEpsData = mysqli_query($db,$selectSinglesEpsInfo);
    $data = $selectSinglesEpsData->fetch_assoc();

}

  ?>