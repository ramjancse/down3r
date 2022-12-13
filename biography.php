<?php 
    include('./partials/header.php');
   
    include('./partials/nav_new_mobile.php');
    include('./backend/AllBioScriptFront.php');
?>

<div class="container-fluid padding-container">
        <div class="row mt-4 mb-4">
            <div class="col">
                <div class='text-center text-white title'> Biography </div>  
            </div>
        </div>

        <div class="container" style="display:flex; justify-content: center; align-items:center">
            <div class="row">
                <div class="col">
                
                <div>
                <?php 
                     $img= $data['cover_image'];
                     echo '<img class="img-fluid" src="./assets/img/uploads/'.$img.'">'
                ?>
                </div>
                    <div class='bio-text'>
                       <?php 
                        $bio= $data['bio'];
                        echo $bio;
                       ?>
                    </div>
                </div>
                <div class="bio marginY">
                    <a href="./assets/img/uploads/<?=$data['doc'] ?>" style='color: #fff'>  Download BIO </a> 
                </div>
            </div>
        </div>
    
   <!-- NavBar -->
  
</div>

<?php
   
    include('./partials/footer.php');
?>