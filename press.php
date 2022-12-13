<?php 
    include('./partials/header.php');

    include('./partials/nav_new_mobile.php');
    include('./backend/AllNewsScriptFront.php');
?>

<div class="container-fluid padding-container">
    <div class="row mt-4 mb-4">
        <div class="col">
            <div class='text-center text-white title'> Press </div>  
        </div>
    </div>

       
    <div class="d-flex justify-content-center flex-nowrap">
        <div class="text-white mx-2 p-2">
            <h1 class='text-center'> Latest News</h1>
            <a href='press-single.php?id=<?php echo $latest_news['id']?>' style='color: #fff'>
                <?php
                    $img= $latest_news['cover_image'];
                        echo '<img style="width: 100%; margin-right: 10px; margin-bottom: 10px; text-align: justify;" src="./assets/img/uploads/'.$img.'">'
                ?>
            </a>
            <div class='title' style='margin-top:20px'> News Title: <?php echo $latest_news['news_title']?> </div>
            <div class='title' style='margin-top:20px'> Date: <?php echo $latest_news['date']?> </div>
        </div>
    </div>

    <div class="container" style='margin-top:50px'>
        <div class="d-flex justify-content-center flex-nowrap marginY">
            <div class="row">
            <?php 
                if(mysqli_num_rows($all_news_query_run) > 0){
                    $i = 1; 
                    foreach($all_news_query_run as $item){
                    ?>
                    <div class="col-sm-6 mt-4 gx-5">
                    <a href='press-single.php?id=<?php echo $item['id']?>' style='color: #fff'>
                    <?php
                        $img= $item['cover_image'];
                        echo '<img class="img-fluid album-img" src="./assets/img/uploads/'.$img.'">'
                    ?>
                        <div class='title' style='margin-top:20px'> News Title: <?php echo $item['news_title']?> </div>
                        <div class='title'> Date: <?php echo $item['date']?>  </div>
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
    </div>
        
        
    
</div>
    
   <!-- NavBar -->
  
</div>

<?php

    include('./partials/footer.php');
?>
