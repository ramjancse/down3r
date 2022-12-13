<?php 
    include('./partials/header.php');
    include('./partials/nav_new_mobile.php');

    include('./backend/AllVideoScriptFront.php');
?>


        <div class="row mt-4 mb-4">
            <div class="col">
                <div class='text-center text-white title'> Videos </div>  
            </div>
        </div>

        <div class="container marginY">
            <div class="row" style="margin-bottom:100px;">
            <?php 
                    if(mysqli_num_rows($all_video_query_run) > 0){
                        $i = 1; 
                        foreach($all_video_query_run as $item){
                        ?>
                            <div class="col-sm-6 mt-4 gx-5 my-4">
                                <div class="ratio" style="--bs-aspect-ratio: 50%;">
                                    <?php echo $item['video_link']?>
                                </div>

                                <div class='mt-4 video-title'> Artist Name: <?php echo $item['artist_name']?> </div>
                                <div class='mt-2 video-title'> Video Name: <?php echo $item['video_name']?>  </div>
                                <div class='mt-2 video-title'> Year of Release: <?php echo $item['year_of_release']?>  </div>
                               
                            </div>
                        <?php
                        }
                    }else{
                        echo '<div class="col-sm-12 text-center marginY"> 
                            <h1> No Data Found</h1>
                        </div>';
                    }
                ?>  
            </div>
            </div>
        </div>

        
    
   <!-- NavBar -->
  


<?php
     include('./partials/footer.php');
?>
