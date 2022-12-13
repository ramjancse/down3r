<?php 
    include('./partials/header.php');
    include('./partials/nav_new_mobile.php');

    
    include('backend/AllMusicScriptFront.php');
?>

<div class="container-fluid padding-container ">
        <div class="row mt-4 mb-4">
            <div class="col">
                <div class='text-center text-white title'> <a href='#album'> Albums </a> | <a href='#eps'> Singles & Eps </a> </div>  
            </div>
        </div>

        <div class="container marginY" id='album' style='margin-top:50px;'>
        <div class='text-white title' style='margin-left:15px; margin-bottom:20px;'> Albums</div>
            <div class="row">
                <?php 
                    if(mysqli_num_rows($all_music_query_run) > 0){
                        $i = 1; 
                        foreach($all_music_query_run as $item){
                        ?>
                        <div class="col-sm-4 gx-5 my-4 d-flex flex-column justify-content-center">
                            <div>
                            
                            <?php
                                $img= $item['cover_image'];
                                echo '<img class="img-fluid album-img" src="./assets/img/uploads/'.$img.'">'
                            ?>
                            
                            <p class='sub-title'> Album Name:  <?php echo $item['album_name']?></p>
                            <p class='sub-title'> Artist Name:  <?php echo $item['artist_name']?></p>
                            </div>
                            <div class='mt-1'>
								
								<ul class="musicList">
								
									<?php
										if(!empty($item['amazon'])){
									?>
										<li>
											<a href='<?php echo $item['amazon']?>' style='color: #fff' target="_blank">
												<img class="img-fluid album-img" src="assets/img/socialicons/amazon.png" width="40px">
											</a>
										</li>
									<?php
										}
									?>

									<?php
										if(!empty($item['itunes'])){
									?>
										<li>
											<a href='<?php echo $item['itunes']?>' style='color: #fff' target="_blank">
												<img class="img-fluid album-img" src="assets/img/socialicons/itunes.png" width="40px">
											</a>
										</li>
									<?php
										}
									?>

									<?php
										if(!empty($item['spotify'])){
									?>
										<li>
											<a href='<?php echo $item['spotify']?>' style='color: #fff' target="_blank">
												<img class="img-fluid album-img" src="assets/img/socialicons/spotify.png" width="40px">
											</a>
										</li>
									<?php
										}
									?>	
									
								</ul>
                                 
                            </div>
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


        <div class="container marginY" id='eps'>
        <div class='text-white title' style='margin-left:15px; margin-bottom:20px;'>Singles & Eps</div>
            <div class="row">
                <?php 
                    if(mysqli_num_rows($all_singles_query_run) > 0){
                        $i = 1; 
                        foreach($all_singles_query_run as $itemsingles){
                        ?>
                        <div class="col-sm-4 gx-5 my-4 d-flex flex-column justify-content-center">
                            <div>
                            <?php
                                $img= $itemsingles['cover_image'];
                                echo '<img class="img-fluid album-img" src="./assets/img/uploads/'.$img.'">'
                            ?>
                           <p class='sub-title'> Album Name:  <?php echo $itemsingles['album_name']?></p>
                            <p class='sub-title'> Artist Name:  <?php echo $itemsingles['artist_name']?></p>
                            </div>
                            <div class='mt-1'>
                                 <ul class="musicList">
								
									<?php
										if(!empty($itemsingles['amazon'])){
									?>
										<li>
											<a href='<?php echo $itemsingles['amazon']?>' style='color: #fff' target="_blank">
												<img class="img-fluid album-img" src="assets/img/socialicons/amazon.png" width="40px">
											</a>
										</li>
									<?php
										}
									?>

									<?php
										if(!empty($itemsingles['itunes'])){
									?>
										<li>
											<a href='<?php echo $itemsingles['itunes']?>' style='color: #fff' target="_blank">
												<img class="img-fluid album-img" src="assets/img/socialicons/itunes.png" width="40px">
											</a>
										</li>
									<?php
										}
									?>

									<?php
										if(!empty($itemsingles['spotify'])){
									?>
										<li>
											<a href='<?php echo $itemsingles['spotify']?>' style='color: #fff' target="_blank">
												<img class="img-fluid album-img" src="assets/img/socialicons/spotify.png" width="40px">
											</a>
										</li>
									<?php
										}
									?>	
									
								</ul>
                            </div>
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
  
</div>
<?php

    include('./partials/footer.php');
?>
