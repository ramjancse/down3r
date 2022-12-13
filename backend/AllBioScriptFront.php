<?php
   
 
    include('backend/config.php');
  
    $bio_query = "SELECT * FROM bio ORDER BY created_at DESC LIMIT 1";
    $bio_query_run = mysqli_query($db, $bio_query);
    $data = $bio_query_run->fetch_assoc();

   

    // if (isset($_GET['id'])) {
    //     $id = $_GET['id'];
        
    //     $selectSingleMusicInfo = "SELECT * FROM musics WHERE id= $id";   
    //     $selectSingleMusicData = mysqli_query($db,$selectSingleMusicInfo);
    //     $data = $selectSingleMusicData->fetch_assoc();

    //     $Error = 'Data not Found';   
    // }
   

?>