<?php
   
    session_start();
    include('config.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
       
        $selectBioInfo = "SELECT * FROM bio WHERE id= $id";   
        $selectBioData = mysqli_query($db,$selectBioInfo);
        $data = $selectBioData->fetch_assoc();
        
        $img= $data['cover_image'];
        unlink('../assets/img/uploads/'.$data['cover_image']);
        

        $sqlcont="DELETE FROM bio WHERE id = '$id'";
        $resultsqlcont = mysqli_query($db, $sqlcont);
        

        if($resultsqlcont){
            $_SESSION['message']="Data Deleted Successfully";
            header("Location: ..\bio.php");
         }else{
            echo "Somthing went Wrong";
         } 
 
    }
   

?>