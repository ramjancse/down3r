<?php
    session_start();
//   include('backend/Session.php');
?>

<!DOCTYPE html>
<html dir="ltr" lang="en" class="no-outlines">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- ==== Document Title ==== -->
    <title>Forgot Password - DJ Central Hub</title>
    
    <!-- ==== Document Meta ==== -->
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- ==== Favicon ==== -->
    <link rel="icon" href="favicon.png" type="image/png">

    <!-- ==== Google Font ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CMontserrat:400,500">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" href="assets/css/morris.min.css">
    <link rel="stylesheet" href="assets/css/select2.min.css">
    <link rel="stylesheet" href="assets/css/jquery-jvectormap.min.css">
    <link rel="stylesheet" href="assets/css/horizontal-timeline.min.css">
    <link rel="stylesheet" href="assets/css/weather-icons.min.css">
    <link rel="stylesheet" href="assets/css/dropzone.min.css">
    <link rel="stylesheet" href="assets/css/ion.rangeSlider.min.css">
    <link rel="stylesheet" href="assets/css/ion.rangeSlider.skinFlat.min.css">
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/fullcalendar.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Page Level Stylesheets -->

</head>
<body>

    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Forgot Password Page Start -->
        <div class="m-account-w" data-bg-img="assets/img/account/wrapper-bg.jpg">
            <div class="m-account">
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <!-- Forgot Password Content Start -->
                        <div class="m-account--content-w" data-bg-img="assets/img/account/content-bg.jpg">
                            <div class="m-account--content">
                               
                            </div>
                        </div>
                        <!-- Forgot Password Content End -->
                    </div>

                    <div class="col-md-6">
                        <!-- Forgot Password Form Start -->
                        <div class="m-account--form-w">
                            <div class="m-account--form">
                                <!-- Logo Start -->
                                <div class="logo">
                                    <img src="assets/img/logo-w-bg.png" alt="">
                                </div>
                                <!-- Logo End -->

                                <form action="PasswordResetCode.php" method="POST">
                                    <label class="m-account--title">Forgot Password?</label>
                                    
                                    <?php 
                                        if(isset($_SESSION['status'])){
                                            echo $_SESSION['status'];
                                            unset($_SESSION['status']);
                                        }
                                     ?>

                                    <!-- <p class="m-account--subtitle"> Don't worry, we'll send you an email to reset your password.</p> -->

                                    <div class="form-group">
                                        <div class="input-group" style="border-radius:0px">
                                            <div class="input-group-prepend" style="border-radius:0px">
                                                <i class="fas fa-envelope" style="border-radius:0px"></i>
                                            </div>

                                            <input type="email" name="email" placeholder="Email" 
                                            class="form-control" style="border-radius:0px" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="form-group pt-3">
                                        <p>Don't remember your email? <a href="#">Contact Support</a></p>
                                    </div>

                                    <div class="m-account--actions">
                                        <button type="submit" name="password_reset_button" 
                                        class="btn btn-block btn-rounded btn-info" style="border-radius:0px">Reset Password</button>
                                    </div>
                                    <div class="m-account--footer">
                                        <p>&copy;DJ CENTRAL HUB.  </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Forgot Password Form End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Forgot Password Page End -->
    </div>
    <!-- Wrapper End -->

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/perfect-scrollbar.min.js"></script>
    <script src="assets/js/jquery.sparkline.min.js"></script>
    <script src="assets/js/raphael.min.js"></script>
    <script src="assets/js/morris.min.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/jquery-jvectormap.min.js"></script>
    <script src="assets/js/jquery-jvectormap-world-mill.min.js"></script>
    <script src="assets/js/horizontal-timeline.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/jquery.steps.min.js"></script>
    <script src="assets/js/dropzone.min.js"></script>
    <script src="assets/js/ion.rangeSlider.min.js"></script>
    <script src="assets/js/datatables.min.js"></script>
    <script src="assets/js/main.js"></script>

    <!-- Page Level Scripts -->

</body>
</html>
