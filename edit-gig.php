<?php
    session_start();
  include('backend/Session.php');
  include('backend/EditGigScript.php');
 
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
                    <h1>Edit Gig</h1>
                </div>
            </div>
            <form action='backend/EditGigForm.php' method='POST' enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <div class="row" id="main" >
                    <div class="col-sm-3 col-md-3" id="content">
                        <label for="year" class="form-label">Year:</label>
                    </div>
                    <div class="col-sm-6 col-md-6" id="content">
                        <input 
                        type="text" 
                        name='year' 
                        class="form-control" 
                        id="year" 
                        placeholder="Year"
                        value='<?php echo $data['year']?>'
                        >
                    </div>
                </div>
                <div class="row" id="main" style='margin-top:20px;'>
                    <div class="col-sm-3 col-md-3" id="content">
                        <label for="month_and_day" class="form-label">Month and Day:</label>
                    </div>
                    <div class="col-sm-6 col-md-6" id="content">
                        <input 
                        type="text" 
                        name='month_and_day' 
                        class="form-control" 
                        id="month_and_day" 
                        placeholder="December 15"
                        value='<?php echo $data['month_and_day']?>'
                        >
                    </div>
                </div>
                <div class="row" id="main" style='margin-top:20px;'>
                    <div class="col-sm-3 col-md-3" id="content">
                        <label for="location" class="form-label">Location:</label>
                    </div>
                    <div class="col-sm-6 col-md-6" id="content">
                        <input 
                        type="text" 
                        name='location' 
                        class="form-control" 
                        id="location" 
                        placeholder="Location"
                        value='<?php echo $data['location']?>'
                        >
                    </div>
                </div>
                <div class="row" id="main" style='margin-top:20px;'>
                    <div class="col-sm-3 col-md-3" id="content">
                        <label for="event_title" class="form-label">Event Title:</label>
                    </div>
                    <div class="col-sm-6 col-md-6" id="content">
                        <input 
                        type="text" 
                        name='event_title' 
                        class="form-control" 
                        id="event_title" 
                        placeholder="Event Title"
                        value='<?php echo $data['event_title']?>'
                        >
                    </div>
                </div>
                <div class="row" id="main" style='margin-top:20px;'>
                    <div class="col-sm-3 col-md-3" id="content">
                        <label for="flyer_link" class="form-label">Flyer Link:</label>
                    </div>
                    <div class="col-sm-6 col-md-6" id="content">
                        <input 
                        type="text" 
                        name='flyer_link' 
                        class="form-control" 
                        id="flyer_link" 
                        placeholder="Flyer Link"
                        value='<?php echo $data['flyer_link']?>'
                        >
                    </div>
                </div>
                
                <div class="row" id="main" style='margin-top:20px;'>
                    <div class="col-sm-3 col-md-3" id="content">
                        
                    </div>
                    <div class="col-sm-6 col-md-6" id="content">
                        <button type="submit" name='update_gig_button' class="btn btn-primary"> Update </button>
                        <a href="all-gig.php" class="btn btn-primary marginY"> Go Back </a>
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