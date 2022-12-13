
<?php
    include('./partials/header.php');
    include('./partials/nav_new_mobile.php');   
?>          
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
              <?php
                  include('./backend/config.php');
                  $carosel_sliders_query = "SELECT * FROM sliders WHERE active = '1' ORDER BY created_at DESC";
                  $carosel_sliders_query_run = mysqli_query($db, $carosel_sliders_query);
                  $i = 0; 
                  if(mysqli_num_rows($carosel_sliders_query_run) > 0){
                    foreach($carosel_sliders_query_run as $item){
                        ?>
                          <?php
                              $img= $item['cover_image'];
                              $parts = explode('.', $img);      
                              if($parts[1] == 'jpg' || $parts[1] == 'jpeg' || $parts[1] == 'png'){
                                if($i == 0){
                                  echo'<div class="carousel-item active">
                                        <img src="./assets/img/uploads/'.$img.'" class="d-block w-100" alt="...">
                                      </div>';
                                }else{
                                  echo'<div class="carousel-item">
                                        <img src="./assets/img/uploads/'.$img.'" class="d-block w-100" alt="...">
                                      </div>';
                                }
                                }else{
                                  if($i == 0){
                                    echo '<div class="carousel-item active">
                                    <video class="d-block w-100" autoplay loop muted>
                                      <source src="./assets/img/uploads/'.$img.'" type="video/mp4" />
                                    </video>
                                    </div>';
                                  }else{
                                    echo '<div class="carousel-item">
                                  <video class="d-block w-100" autoplay loop muted>
                                    <source src="./assets/img/uploads/'.$img.'" type="video/mp4" />
                                  </video>
                                  </div>';
                                  }
                                
                                }   
                                ?>
                        <?php
                         $i++;
                        }
                      
                    }else{
                        echo ' 
                            <p> Data not found </p>
                       ';
                    }
                    
                ?>
</div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="container-fluid my-4">
 
  
</div>







<?php
    // include('./partials/nav_new_1.php');
    // include('./partials/socialIcons-mobile.php');
    include('./partials/footer.php');
?>


