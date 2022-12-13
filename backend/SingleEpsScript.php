<?php
   
    include('backend/Session.php');
    include('backend/config.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        //contact
        $selectSingleEpsInfo = "SELECT * FROM singles WHERE id= $id";   
        $selectSingleEpsData = mysqli_query($db,$selectSingleEpsInfo);
        $data = $selectSingleEpsData->fetch_assoc();
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