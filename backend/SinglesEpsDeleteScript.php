<?php
   
    session_start();
    include('config.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
       
        $selectSinglesEpsInfo = "SELECT * FROM singles WHERE id= $id";   
        $selectSinglesEpsData = mysqli_query($db,$selectSinglesEpsInfo);
        $data = $selectSinglesEpsData->fetch_assoc();
        $img= $data['cover_image'];
        unlink('../assets/img/uploads/'.$data['cover_image']);

        $sqlcont="DELETE FROM singles WHERE id = '$id'";
        $resultsqlcont = mysqli_query($db, $sqlcont);
        

        if($resultsqlcont){
            $_SESSION['message']="Data Deleted Successfully";
            header("Location: ..\all-singles-eps.php");
         }else{
            echo "Somthing went Wrong";
         } 
 
    }
   

?>