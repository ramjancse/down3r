<?php
    session_start();
  include('backend/Session.php');
 
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
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
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
                    <h1>Add Music</h1>
                </div>
            </div>
            <form action='backend/AddMusicScript.php' method='POST' enctype="multipart/form-data">
                <div class="row" id="main" >
                    <div class="col-sm-3 col-md-3" id="content">
                        <label for="album_name" class="form-label">Album Name:</label>
                    </div>
                    <div class="col-sm-6 col-md-6" id="content">
                        <input type="text" required name='album_name' class="form-control" id="album_name" placeholder="Album Name">
                    </div>
                </div>
                <div class="row" id="main" style='margin-top:20px;'>
                    <div class="col-sm-3 col-md-3" id="content">
                        <label for="artist_name" class="form-label">Artist Name:</label>
                    </div>
                    <div class="col-sm-6 col-md-6" id="content">
                        <input type="text" required name='artist_name' class="form-control" id="artist_name" placeholder="Artist Name">
                    </div>
                </div>
				<div class="row" id="main" style='margin-top:20px;'>
                    <div class="col-sm-3 col-md-3" id="content">
                        <label for="amazon" class="form-label">Amazon:</label>
                    </div>
                    <div class="col-sm-6 col-md-6" id="content">
                        <input type="text" name='amazon' class="form-control" id="amazon" placeholder="Amazon">
                    </div>
                </div>
				<div class="row" id="main" style='margin-top:20px;'>
                    <div class="col-sm-3 col-md-3" id="content">
                        <label for="deezer" class="form-label">Deezer:</label>
                    </div>
                    <div class="col-sm-6 col-md-6" id="content">
                        <input type="text" name='deezer' class="form-control" id="deezer" placeholder="Deezer">
                    </div>
                </div>
				<div class="row" id="main" style='margin-top:20px;'>
                    <div class="col-sm-3 col-md-3" id="content">
                        <label for="itunes" class="form-label">iTunes:</label>
                    </div>
                    <div class="col-sm-6 col-md-6" id="content">
                        <input type="text" name='itunes' class="form-control" id="amazon" placeholder="iTunes">
                    </div>
                </div>
				<div class="row" id="main" style='margin-top:20px;'>
                    <div class="col-sm-3 col-md-3" id="content">
                        <label for="spotify" class="form-label">Spotify:</label>
                    </div>
                    <div class="col-sm-6 col-md-6" id="content">
                        <input type="text" name='spotify' class="form-control" id="spotify" placeholder="Spotify">
                    </div>
                </div>
                <div class="row" id="main" style='margin-top:20px;'>
                    <div class="col-sm-3 col-md-3" id="content">
                        <label for="description" class="form-label">Description:</label>
                    </div>
                    <div class="col-sm-6 col-md-6" id="content">
                        <textarea class="form-control" name='description' id="editor" rows="3"></textarea>
                    </div>
                </div>
                <div class="row" id="main" style='margin-top:20px;'>
                    <div class="col-sm-3 col-md-3" id="content">
                    <label for="cover_image" class="form-label">Cover Photo</label>
                    </div>
                    <div class="col-sm-6 col-md-6" id="content">
                        <input class="form-control" required name='cover_image' type="file" id="cover_image">
                        <div id="cover_image" class="form-text">Please upload 1000x1000px Image</div>
                    </div>
                </div>
                <div class="row" id="main" style='margin-top:20px;'>
                    <div class="col-sm-3 col-md-3" id="content">
                        
                    </div>
                    <div class="col-sm-6 col-md-6" id="content">
                    <button type="submit" name='add_music_button' class="btn btn-primary"> Save </button>
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
    CKEDITOR.replace('editor');
</script>
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