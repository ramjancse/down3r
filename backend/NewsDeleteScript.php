<?php
   
    session_start();
    include('config.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
       
        $selectSingleMusicInfo = "SELECT * FROM news WHERE id= $id";   
        $selectSingleMusicData = mysqli_query($db,$selectSingleMusicInfo);
        $data = $selectSingleMusicData->fetch_assoc();
        $img= $data['cover_image'];
        unlink('../assets/img/uploads/'.$data['cover_image']);

        $sqlcont="DELETE FROM news WHERE id = '$id'";
        $resultsqlcont = mysqli_query($db, $sqlcont);
        

        if($resultsqlcont){
            $_SESSION['message']="Data Deleted Successfully";
            header("Location: ..\all-news.php");
         }else{
            echo "Somthing went Wrong";
         } 
 
    }
   

?>