<?php 
    include('./partials/header.php');
    session_start();
?>
<body>

  
                    
<div class="container">
    <div class="container d-flex align-items-center justify-content-center">
        <div>
            <div class="row sub-title">
                <div class="col-sm-12" style="margin-top:20px;">
                <h1> DL Down3r </h1>
                <form action="UpdatePasswordCode.php" method="POST">
                    <div style="text-align:center">
                        <?php 
                            if(isset($_SESSION['status'])){
                                echo $_SESSION['status'];
                                unset($_SESSION['status']);
                            }
                            ?>
                    </div>
                    <label class="m-account--title"> Change your password</label>
                        <input type="hidden" name="password_token"
                        value="<?php if(isset($_GET['token'])){ echo $_GET['token']; }?>"
                    >
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" placeholder="Email"
                                value="<?php if(isset($_GET['email'])){ echo $_GET['email']; }?>"
                                class="form-control" autocomplete="off" required
                            >
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input name='new_password' type="password" placeholder='New Password' class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input name='confirm_password' placeholder='Confirm Password'type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" name="update_password" class="btn btn-primary">Update Password</button>
                    </form>
                    <div class="mb-3" style='margin-top:10px'>
                        <h6> Don't have an account? <a href='register.php'> Register Here</a> </h6>
                    </div> 
                    <div class="mb-3" style='margin-top:10px'>
                        <a href="forgot-password.php" style='color:#fff'> Already have an Account? Login Here</a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

              
                    
        <!-- Register Page End -->
   
    

    <!-- Scripts -->
  
   

    <!-- Page Level Scripts -->

</body>
</html>
