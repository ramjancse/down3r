<?php 
    include('config.php');
    session_start();
    
    if(isset($_POST['login_now_btn'])){

        
        if(!empty(trim($_POST['email'])) && !empty(trim($_POST['password']))){
            
            $email = mysqli_real_escape_string($db, $_POST['email']);
            $plaintext_password = mysqli_real_escape_string($db, $_POST['password']);

            $login_query = "SELECT * FROM admin WHERE email='$email' LIMIT 1";
            $login_query_run = mysqli_query($db, $login_query);

            if(mysqli_num_rows($login_query_run) > 0){
                $row = mysqli_fetch_array($login_query_run);
                $login_password = $row['password'];
                $verify = password_verify($plaintext_password, $login_password);
                
                if($row['confirm'] == '1'){
                    if($verify){
                        $_SESSION['authenticated'] = TRUE;
                        $_SESSION['auth_user'] = [
                            'id' => $row['id'],
                            'username' => $row['username'],
                            'email' => $row['email'],
                            'name' => $row['name'],
                            'contact' => $row['contact'],
                            'picture' => $row['picture'],
                        ];
                        $url = '..\all-music.php';
                        $_SESSION['status']="You are Logged In Successfully";
                        header("location: $url");
                        exit(0);

                    }else{
                        $url = '..\login.php';
                        $_SESSION['status']="Invalid Password";
                        header("location: $url");
                    }
                }else{
                    $url = '..\login.php';
                    $_SESSION['status']="Please verify Your Email Address to Login";
                    header("location: $url");
                }

            }
            else{
                $url = '..\login.php';
                $_SESSION['status']="Invalid Email";
                header("location: $url");
            }    

        }else{
            $url = '..\login.php';
            $_SESSION['status']="All Fields are required";
            header("location: $url");
        }
    }


    mysqli_close($db);

?>