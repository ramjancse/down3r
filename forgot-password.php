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
                <form action="PasswordResetCode.php" method="POST">
                    <div style="text-align:center">
                        <?php 
                            if(isset($_SESSION['status'])){
                                echo $_SESSION['status'];
                                unset($_SESSION['status']);
                            }
                            ?>
                    </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input name='email' type="email" placeholder='Email Address' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                           
                        </div>
                        
                        <button type="submit" name="password_reset_button" class="btn btn-primary">Send</button>
                    </form>
                    <div class="mb-3" style='margin-top:10px'>
                        <h6> Don't have an account? <a href='register.php'> Register Here</a> </h6>
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
