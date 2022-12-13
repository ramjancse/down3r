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
                    <form action="backend/Registration.php" method="POST">
                    <div style="text-align:center">
                        <?php 
                            if(isset($_SESSION['status'])){
                                echo $_SESSION['status'];
                                unset($_SESSION['status']);
                            }
                            ?>
                    </div>
                        <div class="mb-3">
                            <label for="exampleInputUserName" class="form-label">User Name</label>
                            <input type="text" name='username' class="form-control" placeholder='User Name' id="exampleInputUserName">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Name</label>
                            <input name='name' type="text" class="form-control" placeholder='Name' id="exampleInputName">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input name='email' type="email" placeholder='Email Address' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input name='password' type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPhone" class="form-label">Phone Number</label>
                            <input name='contact' type="text" class="form-control" id="exampleInputPhone">
                        </div>
                       
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">I agree all statements in terms of service</label>
                        </div>
                        <button type="submit" name="register_btn" class="btn btn-primary">Register</button>
                    </form>
                    <div class="mb-3" style='margin-top:10px'>
                        <h6> Already have an account? <a href='login.php'> Login Here</a> </h6>
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
