<?php
   
    include('backend/Session.php');
    include('backend/config.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        //contact
        $selectSingleGigInfo = "SELECT * FROM gigs WHERE id= $id";   
        $selectSingleGigData = mysqli_query($db,$selectSingleGigInfo);
        $data = $selectSingleGigData->fetch_assoc();
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