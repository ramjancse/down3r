<?php
   
    session_start();
    include('config.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
       
        $sqlcont="DELETE FROM gigs WHERE id = '$id'";
        $resultsqlcont = mysqli_query($db, $sqlcont);
        

        if($resultsqlcont){
            $_SESSION['message']="Data Deleted Successfully";
            header("Location: ..\all-gig.php");
         }else{
            echo "Somthing went Wrong";
         } 
 
    }
   

?>