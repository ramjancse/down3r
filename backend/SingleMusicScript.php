<?php
   
    include('backend/Session.php');
    include('backend/config.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        //contact
        $selectSingleMusicInfo = "SELECT * FROM musics WHERE id= $id";   
        $selectSingleMusicData = mysqli_query($db,$selectSingleMusicInfo);
        $data = $selectSingleMusicData->fetch_assoc();
        // print_r($result);
          // $count = mysqli_num_rows($row);
        //   $data = [];
    
        //     while($row = mysqli_fetch_assoc($result))
        //       {     
        //           $data[] = $row;
        //       } 
          $Error = 'Data not Found';

          
    }
   

?>