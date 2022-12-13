<?php
   
 
    include('backend/config.php');
  
    $all_music_query = "SELECT * FROM musics ORDER BY created_at DESC";
    $all_music_query_run = mysqli_query($db, $all_music_query);

    $all_singles_query = "SELECT * FROM singles ORDER BY created_at DESC";
    $all_singles_query_run = mysqli_query($db, $all_singles_query);



    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $selectSingleMusicInfo = "SELECT * FROM musics WHERE id= $id";   
        $selectSingleMusicData = mysqli_query($db,$selectSingleMusicInfo);
        $data = $selectSingleMusicData->fetch_assoc();

        $Error = 'Data not Found';   
    }
   

?>