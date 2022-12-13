<?php 

  include('config.php');
  
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
   
    $selectSingleMusicInfo = "SELECT * FROM bio WHERE id= $id";   
    $selectSingleMusicData = mysqli_query($db,$selectSingleMusicInfo);
    $data = $selectSingleMusicData->fetch_assoc();

}

  ?>