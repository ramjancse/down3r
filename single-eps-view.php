<?php
session_start();

include('backend/SingleEpsScript.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Dashboard || DL Down3r</title>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="./assets/css/dashboard.css" rel="stylesheet">
  
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  
<!------ Include the above in your HEAD tag ---------->
</head>
<body>


<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- dashboard nav -->
    <?php 
        include('partials/dashboard-header.php')
    ?>
    <!-- end dashboard nav -->


    <!-- /#page-wrapper -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>All Music</h1>
                </div>
            </div>
           
            <div class="container-fluid padding-container">
        <div class="row mt-4 mb-4">
            <div class="col"><h1 class='text-center text-white'>Singles | EPs </h1>  </div>
        </div>
       
        <div style="display:flex; justify-content: center; align-items:center">
        <div class="container">
             <div class="row">
                <div class="col">
                        <div class='mt-2' style="margin: auto; width: 50%;">
                            <h4 class='mt-4'> Album Name: <?php echo $data['album_name']?> </h4>
                            <h5 class='mb-4'> Artist Name: <?php echo $data['artist_name']?> </h5>
                            <a href='<?php echo $data['amazon']?>' style='color: #fff' target="_blank">
                                <img class="img-fluid album-img" src="./assets/img/icon-amazon.jpg">
                            </a>
                            <a href='<?php echo $data['itunes']?>' style='color: #fff' target="_blank">
                                <img class="img-fluid album-img" src="./assets/img/icon-itune.jpg">
                            </a>
                            <a href='<?php echo $data['spotify']?>' style='color: #fff' target="_blank">
                                <img class="img-fluid album-img" src="./assets/img/spotify.png">
                            </a>
                            <a href='<?php echo $data['deezer']?>' style='color: #fff' target="_blank">
                                <img class="img-fluid album-img" src="./assets/img/deezer.jpg">
                             </a>
                        </div>
                    <p style='text-align: justify; margin-top:50px;'>
                    <?php
                        $img= $data['cover_image'];
                            echo '<img style="float: left; width: 300px; margin-right: 10px; margin-bottom: 10px; text-align: justify;" src="/assets/img/uploads/'.$img.'">'
                    ?>
                        <?php echo $data['description']?> 
                    </p>
                    <a href='all-singles-eps.php' class='btn btn-info'> Go Back </a>
                </div>
            </div>
        </div>
        </div>
        
    
   <!-- NavBar -->
  
</div>
           
            
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->


</div><!-- /#wrapper -->
<script>
    $(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $(".side-nav .collapse").on("hide.bs.collapse", function() {                   
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
    });
    $('.side-nav .collapse').on("show.bs.collapse", function() {                        
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");        
    });
})    
    
</script>
</body>
</html>