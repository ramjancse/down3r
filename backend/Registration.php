<?php 
  session_start();
  include('config.php');
  print_r($database);
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  require '../vendor/autoload.php';

  
  function sendemail_verification($username,$email,$verify_token){
    include('base_url.php');
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
    $mail->addAddress($email, 'receiver');      //Add a recipient
   

     //Content
    $mail->isHTML(true);                                        //Set email format to HTML
    $mail->Subject = 'Email Verification from DL Down3r';
    $email_template = "
        <h2> Hello </h2>
        <h3> Please Click the Link Below to Active Your Account.</h3>
        <br/><br/>
        <a href='$base_url/verify-email.php?token=$verify_token'> click me </a> 
    ";
    // <a href='http://djcentralhub.local/verify-email.php?token=$verify_token'> click me </a>

    $mail->Body    = $email_template;
    $mail->send();

  }   
    
  if(isset($_POST['register_btn'])){
    $username =  $_REQUEST['username'];
    $name =  $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $plaintext_password =  $_REQUEST['password'];
    $contact =  $_REQUEST['contact'];
    $password = password_hash($plaintext_password, PASSWORD_DEFAULT);
    $adminType = 0;
    $confirm = 0;
    $verify_token = md5(rand());
    
    // print_r($username);
    // print_r($name);
    // print_r($email);
    // print_r($plaintext_password);
    // print_r($contact);
    // print_r($password);

    $check_email_query = "SELECT email FROM admin WHERE email ='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($db, $check_email_query);
    if(mysqli_num_rows($check_email_query_run) > 0){
      $_SESSION['status']= "Email ID Already Exists";
      $url = '..\register.php';
      header("location: $url");
    }else{
     
      $insert_user = "INSERT INTO admin (username, email, password,verify_token,confirm,name,contact,picture,adminType)
      VALUES ('$username', '$email', '$password', '$verify_token', '$confirm','$name','$contact','','$adminType')";
      $insert_user_run = mysqli_query($db, $insert_user);
      if($insert_user_run){
        sendemail_verification("$username", "$email","$verify_token");
        $_SESSION['status']= "Registration Successfull.! Please verify your email address";
        $url = '..\login.php';
        header("location: $url");
      }else{
        $url = '..\register.php';
        $_SESSION['status']="Registration fail";
        header("location: $url");
      }
  
    } 
  }  

?>