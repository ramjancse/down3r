<?php 
    include('./partials/header.php');
    include('./partials/nav_new_mobile.php');

    include('./backend/AllTourScriptFront.php');
?>
<style>
 .gallery{
    -webkit-column-count:3;
    -moz-column-count:3;
    column-count:3;
    -webkit-column-width:33%;
    -moz-column-width:33%;
    column-width:33%;
    padding-top:12px; 
   
 }
 .gallery .pics{
    -webkit-transition: all 350ms ease;
    transition: all 350ms ease;
    cursor: pointer;
    margin-bottom:12px;
 }
 @media(max-width:991px){
    .gallery{
        -webkit-column-count:2;
        -moz-column-count:2;
        column-count:2;    
 }
 @media(max-width:480px){
    .gallery{
        -webkit-column-count:1;
        -moz-column-count:1;
        column-count:1;
        -webkit-column-width:100%;
        -moz-column-width:100%;
        column-width:100%;    
 }

 }
</style>



        <div class="row mt-4 mb-4">
            <div class="col">
                <div class='text-center text-white title'> Tours </div>  
            </div>
        </div>

        <div class="container marginY" style="margin-bottom:120px;">
            <div class="gallery">
            <?php 
                    if(mysqli_num_rows($all_tour_query_run) > 0){
                        foreach($all_tour_query_run as $item){
                        ?>
                        <div class='pics'>
                            <a href='single-tour.php?id=<?php echo $item['id']?>' style='color: #fff'>
                            <?php
                            $img= $item['cover_image'];
                            echo '<img style="width: 100%;" src="/assets/img/uploads/'.$img.'">';
                            ?>
                            </a>
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

        



    
   <!-- NavBar -->
  


<?php

    include('./partials/footer.php');
?>
