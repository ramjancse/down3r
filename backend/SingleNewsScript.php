<?php
   
    include('backend/Session.php');
    include('backend/config.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        //contact
        $selectSingleNewsInfo = "SELECT * FROM news WHERE id= $id";   
        $selectSingleNewsData = mysqli_query($db,$selectSingleNewsInfo);
        $data = $selectSingleNewsData->fetch_assoc();
        
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