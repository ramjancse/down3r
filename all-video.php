<?php
session_start();

include('backend/AllVideoScript.php')
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
                    <h1>All Video</h1>
                </div>
            </div>
           
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Album Name</th>
                        <th scope="col">Artist Name</th>
                        <th scope="col">Description</th>

                        <th scope="col"> Action</th>
                        <th scope="col"> </th>
                        <th scope="col"> </th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                 if(mysqli_num_rows($all_video_query_run) > 0){
                    $i = 1; 
                    foreach($all_video_query_run as $item){
                        ?>
                            <tr>
                                <th scope="row"> <?php echo $i ?>  </th>
                                <td> <?= $item['artist_name']?>    </td>
                                <td> <?= $item['video_name']?>    </td>
                                <td> <?= $item['year_of_release']?>   </td>
                                
                                <td > 
                                    <a href='/single-video-view.php?id=<?=$item['id']?>' class='btn btn-sm btn-primary'> View </a> 
                                </td>
                                <td> 
                                    <a href="/edit-video.php?id=<?=$item['id']?>" class='btn btn-sm btn-info'> Edit </a>
                                </td>
                                <td> 
                                    <a href="/backend/VideoDeleteScript.php?id=<?=$item['id']?>" class='btn btn-sm btn-danger'> Delete </a>
                                </td>
                            </tr>
                        <?php
                         $i++;
                        }
                       
                    }else{
                        echo '<tr> 
                            <td> Data not found </td>
                        </tr>';
                    }
                
                ?>

                </tbody>
                </table>
                
           
            
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