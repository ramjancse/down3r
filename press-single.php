<?php 
    include('./partials/header.php');

    include('./partials/nav_new_mobile.php');
    include('backend/AllNewsScriptFront.php')
?>

<div class="container-fluid padding-container">
        <div class="row mt-4 mb-4">
            <div class="col">
                <div class='text-center text-white title'> News Title : <?php echo $data['news_title']?>  </div>  
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">
                        <?php
                            $img= $data['cover_image'];
                            echo '<img class="img-fluid album-img" src="./assets/img/uploads/'.$img.'">'
                        ?>
                        <p class='press-text'>
                            <?php echo $data['description']?>
                        </p>
                        <a href='press.php' class='btn btn-info marginY'> Go Back </a>
                </div> 
            </div>
            
            
           
        </div>
    
   <!-- NavBar -->
  
</div>

<?php

    include('./partials/footer.php');
?>
