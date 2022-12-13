<?php 
    session_start();
    include('backend/config.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    function send_password_reset($get_username, $get_email, $token){
    include('./backend/base_url.php');      
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 3;  
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'djcentralhub@gmail.com';                  //SMTP username
    $mail->Password   = 'ptoqwlvyntuighnt';                     //SMTP password
    $mail->SMTPSecure = 'tls';                                  //Enable implicit TLS encryption
    $mail->Port       = 587; 
                                                                //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('djcentralhub@gmail.com', $subject);
    $mail->addAddress($get_email, 'receiver');      //Add a recipient
   

     //Content
    $mail->isHTML(true);                                        //Set email format to HTML
    $mail->Subject = 'Password Reset Notification';
    $email_template = "
        <h2> Hello </h2>
        <h3> You are receiving this mail because we received a password reset request for your account.</h3>
        <br/><br/>
        <a href='$base_url/password-changed.php?token=$token&email=$get_email'> click me </a>
    ";
    // <a href='https://djcentralhub.com/password-changed.php?token=$token&email=$get_email'> click me </a>
    $mail->Body    = $email_template;
    $mail->send();
    }

    if(isset($_POST['password_reset_button'])){
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $token = md5(rand());
        $check_email = "SELECT * from admin WHERE email='$email' LIMIT 1";
        $check_email_run = mysqli_query($db,$check_email);

        
        if(mysqli_num_rows($check_email_run) > 0){
            $row = mysqli_fetch_array($check_email_run);
           
            $get_username = $row['username'];
            $get_email = $row['email'];
            $update_token = "UPDATE admin set verify_token='$token' WHERE email='$get_email' LIMIT 1";

            $update_token_run = mysqli_query($db,$update_token);

            if($update_token_run){
                send_password_reset($get_username, $get_email, $token);
                $_SESSION['status']= "We emailed you a password reset link";
                header('Location:../forgot-password.php');
                exit(0);
            }else{
                $_SESSION['status']= "Something went wrong";
                header('Location:../forgot-password.php');
                exit(0);
            }
        }else{
            $_SESSION['status']= "No Email Found";
            header('Location:../forgot-password.php');
            exit(0);
        }
    }
    
    if(isset($_POST['update_password'])){
        $token = mysqli_real_escape_string($db, $_POST['password_token']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $new_password = mysqli_real_escape_string($db, $_POST['new_password']);
        $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);
        print_r($token);
        print_r($db);

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