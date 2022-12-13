<?php
session_start();

include('backend/AllSingleEpsScript.php')
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
                    <h1>Singles Eps</h1>
                </div>
            </div>
           
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Album Name</th>
                        <th scope="col">Artist Name</th>
                        <th scope="col">Amazon</th>
                        <th scope="col">iTunes</th>
                        <th scope="col">Spotify </th>
                        <th scope="col">Cover Photo</th>
                        <th scope="col"> Action</th>
                        <th scope="col"> </th>
                        <th scope="col"> </th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                 if(mysqli_num_rows($all_single_query_run) > 0){
                    $i = 1; 
                    foreach($all_single_query_run as $item){
                        ?>
                            <tr>
                                <th scope="row"> <?php echo $i ?>  </th>
                                <td> <?= $item['album_name']?>    </td>
                                <td> <?= $item['artist_name']?>    </td>
                                <td>
                                    <?php
                                        $img= $item['cover_image'];
                                        echo '<img style="width:100px;" class="rounded mx-auto d-block" src="./assets/img/uploads/'.$img.'">'
                                    ?>
                                </td>
                                <td>
                                	<?php
										if(!empty($item['amazon'])){
									?>
										<a href='<?=$item['amazon']?>' target="_blank">
											<?php

												echo '<img style="width:29px;" class="rounded mx-auto d-block" src="assets/img/socialicons/amazon-system.png">'
											?>
										</a>
									<?php
										}
									?>
                                </td>
                                <td>
                                    <?php
										if(!empty($item['itunes'])){
									?>
										<a href='<?=$item['itunes']?>' target="_blank">
											<?php

												echo '<img style="width:29px;" class="rounded mx-auto d-block" src="assets/img/socialicons/itunes-system.png">'
											?>
										</a>
									<?php
										}
									?>
                                </td>
                                <td>
									<?php
										if(!empty($item['spotify'])){
									?>
										<a href='<?=$item['spotify']?>' target="_blank">
											<?php

												echo '<img style="width:29px;" class="rounded mx-auto d-block" src="assets/img/socialicons/spotify-system.png">'
											?>
										</a>
									<?php
										}
									?>
                                </td>                                
                                <td > 
                                    <a href='/single-eps-view.php?id=<?=$item['id']?>' class='btn btn-sm btn-primary'> View </a> 
                                </td>
                                <td> 
                                    <a href="/edit-singles-eps.php?id=<?=$item['id']?>" class='btn btn-sm btn-info'> Edit </a>
                                </td>
                                <td> 
                                    <a href="/backend/SinglesEpsDeleteScript.php?id=<?=$item['id']?>" class='btn btn-sm btn-danger'> Delete </a>
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