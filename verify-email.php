<?php
    session_start();
    include('./backend/config.php');

    if(isset($_GET['token'])){
        $token = $_GET['token'];
        
        $verify_query = "SELECT verify_token,confirm FROM admin WHERE verify_token='$token' LIMIT 1";

        $verify_query_run = mysqli_query($db,$verify_query);

        if(mysqli_num_rows($verify_query_run) > 0){
            $row = mysqli_fetch_array($verify_query_run);
            
            if($row['confirm'] == '0'){
                $clicked_token = $row['verify_token'];
                $update_query = "UPDATE admin SET confirm='1' WHERE verify_token='$clicked_token' LIMIT 1";
                $update_query_run = mysqli_query($db,$update_query);

                if($update_query_run){
                    $url = '..\login.php';
                    $_SESSION['status']="Your account has been verified successfully.";
                    header("location: $url");
                }else{
                    $url = '..\login.php';
                    $_SESSION['status']="Verification failed";
                    header("location: $url");
                }
            }else{
                $url = '..\login.php';
                $_SESSION['status']="Email Already verified";
                header("location: $url");
            }
        }
        else{
            $url = '..\login.php';
            $_SESSION['status']="This Token is not Exists";
            header("location: $url");
        }
    }else{
        $url = '..\login.php';
        $_SESSION['status']="Not Allowed";
        header("location: $url");
    }

?>

