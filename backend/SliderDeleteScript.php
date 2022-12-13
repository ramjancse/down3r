<?php
   
    session_start();
    include('config.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
       
        $selectSingleSliderInfo = "SELECT * FROM sliders WHERE id= $id";   
        $selectSingleSliderData = mysqli_query($db,$selectSingleSliderInfo);
        $data = $selectSingleSliderData->fetch_assoc();
        $img= $data['cover_image'];
        unlink('../assets/img/uploads/'.$data['cover_image']);

        $sqlcont="DELETE FROM sliders WHERE id = '$id'";
        $resultsqlcont = mysqli_query($db, $sqlcont);
        

        if($resultsqlcont){
            $_SESSION['message']="Data Deleted Successfully";
            header("Location: ..\all-slider.php");
         }else{
            echo "Somthing went Wrong";
         } 
 
    }
   

?>