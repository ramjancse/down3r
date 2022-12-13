<?php
   
    include('backend/config.php');
 
    $all_tour_query = "SELECT * FROM tours ORDER BY created_at DESC";
    $all_tour_query_run = mysqli_query($db, $all_tour_query);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        //contact
        $selectSingleTourInfo = "SELECT * FROM tours WHERE id= $id";   
        $selectSingleTourData = mysqli_query($db,$selectSingleTourInfo);
        $data = $selectSingleTourData->fetch_assoc();
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