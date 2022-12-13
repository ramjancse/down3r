<?php
    session_start();
  include('backend/Session.php');
  include('backend/EditVideoScript.php');
 
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
                    <h1>Edit Video</h1>
                </div>
            </div>
            <form action='backend/EditVideoForm.php' method='POST' enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="row" id="main" >
                    <div class="col-sm-3 col-md-3" id="content">
                        <label for="artist_name" class="form-label">Artist Name:</label>
                    </div>
                    <div class="col-sm-6 col-md-6" id="content">
                        <input 
                        type="text" 
                        name='artist_name'
                        required 
                        class="form-control" 
                        id="artist_name" 
                        placeholder="Artist Name"
                        value='<?php echo $data['artist_name']?>'
                        >
                    </div>
                </div>
                <div class="row" id="main" style='margin-top:20px;'>
                    <div class="col-sm-3 col-md-3" id="content">
                        <label for="video_name" class="form-label">Video Name:</label>
                    </div>
                    <div class="col-sm-6 col-md-6" id="content">
                        <input 
                        type="text" 
                        name='video_name'
                        required 
                        class="form-control" 
                        id="video_name" 
                        placeholder="Video Name"
                        value='<?php echo $data['video_name']?>'
                        >
                    </div>
                </div>
                <div class="row" id="main" style='margin-top:20px;'>
                    <div class="col-sm-3 col-md-3" id="content">
                        <label for="year_of_release" class="form-label">Year of Release:</label>
                    </div>
                    <div class="col-sm-6 col-md-6" id="content">
                        <input 
                        type="text" 
                        name='year_of_release'
                        required 
                        class="form-control" 
                        id="year_of_release" 
                        placeholder="Year of Release"
                        value='<?php echo $data['year_of_release']?>'
                        >
                    </div>
                </div>
                <div class="row" id="main" style='margin-top:20px;'>
                    <div class="col-sm-3 col-md-3" id="content">
                        <label for="video_link" class="form-label">Video Link (iframe):</label>
                    </div>
                    <div class="col-sm-6 col-md-6" id="content">
                        <input 
                        type="text" 
                        name='video_link'
                        required 
                        class="form-control" 
                        id="year_of_release" 
                        placeholder="Video Link"
                        value='<?php echo $data['video_link']?>'
                        >
                    </div>
                </div>
                
                <div class="row" id="main" style='margin-top:20px;'>
                    <div class="col-sm-3 col-md-3" id="content">  
                    </div>
                    <div class="col-sm-6 col-md-6" id="content">
                        <button type="submit" name='update_video_button' class="btn btn-primary"> Update </button>
                        <a href="all-video.php" class="btn btn-primary marginY"> Go Back </a>
                    </div>
                </div>
            </form>
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