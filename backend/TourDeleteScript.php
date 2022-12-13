<?php
   
    session_start();
    include('config.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id']; 

        $selectSingleTourInfo = "SELECT * FROM tours WHERE id= $id";   
        $selectSingleTourData = mysqli_query($db,$selectSingleTourInfo);
        
        $data = $selectSingleTourData->fetch_assoc();
        $img= $data['cover_image'];
        unlink('../assets/img/uploads/'.$data['cover_image']);
        
        $sqlcont="DELETE FROM tours WHERE id = '$id'";
        $resultsqlcont = mysqli_query($db, $sqlcont);
        
        if($resultsqlcont){
            $_SESSION['message']="Data Deleted Successfully";
            header("Location: ..\all-tour.php");
         }else{
            echo "Somthing went Wrong";
         } 
 
    }
   

?>