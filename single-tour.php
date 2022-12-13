<?php 
    include('./partials/header.php');
  
    include('./partials/nav_new_mobile.php');
    include('backend/AllTourScriptFront.php');
?>

<div class="container-fluid padding-container">
        <div class="row mt-4 mb-4">
            <div class="col">
                <h1 class='text-center text-white'> Tour </h1>  
            </div>
        </div>

        <div class="container" style="display:flex; justify-content: center; align-items:center">
            <div class="row">
                <div class="col">
                   
                    <h4 class='mt-4 mb-4 text-center'> Name Of Tour: <?php echo $data['tour_name'] ?> </h4>
                    <?php
                        $img= $data['cover_image'];
                            echo '<img style="width: 100%; margin-right: 10px; margin-bottom: 10px; text-align: justify;" src="./assets/img/uploads/'.$img.'">'
                    ?>
                    <a href='tour.php' style='color: #fff' class='btn btn-info marginY'> Go back </a>
                </div>
            </div>
        </div>
    </div>
    
   <!-- NavBar -->
  
</div>

<?php

        include('./partials/footer.php');
?>