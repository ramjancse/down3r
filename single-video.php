<?php 
    include('./partials/header.php');
    include('./partials/socialIcons.php');
    include('backend/AllVideoScriptFront.php');
?>

<div class="container-fluid padding-container">
        <div class="row mt-4 mb-4">
            <div class="col">
                <h1 class='text-center text-white'> Video </h1>  
            </div>
        </div>

        <div class="container" style="display:flex; justify-content: center; align-items:center">
            <div class="row">
                <div class="col">
                   
                    <h4 class='mt-4 text-center'> Artist Name: <?php echo $data['artist_name'] ?> </h4>
                    <h5 class='mb-2 text-center'> Video Name: <?php echo $data['video_name'] ?> </h5>
                    <h5 class='mb-2 text-center'> Year of Release: <?php echo $data['year_of_release'] ?> </h5>
                    <h5 class='mb-2 text-center'> 
                        <a href='<?php echo $item['video_link']?>' target='_blank'> Click To Watch</a>  
                    </h5>
                    <?php
                        $img= $data['cover_image'];
                            echo '<img style="width: 100%; margin-right: 10px; margin-bottom: 10px; text-align: justify;" src="./assets/img/uploads/'.$img.'">'
                    ?>
                    <a href='video.php' style='color: #fff' class='btn btn-info marginY'> Go back </a>
                </div>
            </div>
        </div>
    </div>
    
   <!-- NavBar -->
  
</div>

<?php
        include('./partials/nav.php');
        // include('./partials/copyright.php');
        include('./partials/footer.php');
?>