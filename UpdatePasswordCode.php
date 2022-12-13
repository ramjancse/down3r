<?php 
    session_start();
    include('backend/config.php');
    
    
    if(isset($_POST['update_password'])){
        $token = mysqli_real_escape_string($db, $_POST['password_token']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $new_password = mysqli_real_escape_string($db, $_POST['new_password']);
        $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);
        print_r($token);
        print_r($email);
        print_r($new_password);
        print_r($confirm_password);

        if(!empty($token)){
            if(!empty($email) && !empty($new_password) && !empty($confirm_password) ){
                //checking token is valid or not
                $check_token = "SELECT verify_token FROM admin WHERE verify_token='$token' LIMIT 1";
                $check_token_run = mysqli_query($db,$check_token);
                print_r($check_token_run);
                
                if(mysqli_num_rows($check_token_run) > 0){
                    if($new_password == $confirm_password){
                        $plaintext_password =  $new_password;
                        $password = password_hash($plaintext_password, PASSWORD_DEFAULT);

                        $update_password = "UPDATE admin SET password='$password' WHERE verify_token='$token' LIMIT 1";
                        $update_password_run = mysqli_query($db,$update_password);
                        
                        if($update_password_run){
                            $new_token = md5(rand());
                            $update_to_new_token = "UPDATE admin SET verify_token='$new_token' WHERE verify_token='$token' LIMIT 1";
                            $update_to_new_token_run = mysqli_query($db,$update_to_new_token);
                            
                            $_SESSION['status']= "New Password Updated Successfully";
                            header("Location:../login.php");
                            exit(0);
                        }else{
                            $_SESSION['status']= "Did not Update paswword, Something went wrong";
                            header("Location:../password-changed.php?token=$token&email=$email");
                            exit(0);
                        }
                    }else{
                        $_SESSION['status']= "Password and Confirm Password Does Not Match";
                        header("Location:../password-changed.php?token=$token&email=$email");
                        exit(0);
                    }
                }else{
                    $_SESSION['status']= "Invalid Token";
                    header("Location:../password-changed.php?token=$token&email=$email");
                    exit(0);
                }

            }else{
                $_SESSION['status']= "All Fields are Mandetory";
                header("Location:../password-changed.php?token=$token&email=$email");
                exit(0);
            }
        }else{
            $_SESSION['status']= "No Token Available";
            header('Location:../password-changed.php');
            exit(0);
        }
    }

?>