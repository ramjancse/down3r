<?php 
    include('./partials/header.php');
    include('./partials/socialIcons.php');
    include('backend/AllMusicScriptFront.php');
?>

<div class="container-fluid padding-container">
    <div class="row mt-4 mb-4">
            <div class="col"><h1 class='text-center text-white'> Albums | Singles | EPs </h1>  </div>
    </div>

    <div class="container" style="display:flex; justify-content: center; align-items:center">
        <div class="row">
            <div class="col">
                <h4 class='mt-4 text-center'>Album Name:  <?php echo $data['album_name'] ?> </h4>
                <h5 class='mb-4 text-center'> Artist Name: <?php echo $data['artist_name'] ?> </h5>
                <p style='text-align: justify;'>
                    <?php
                        $img= $data['cover_image'];
                            echo '<img style="float: left; width: 300px; margin-right: 10px; margin-bottom: 10px; text-align: justify;" src="./assets/img/uploads/'.$img.'">'
                    ?>
                    <?php echo $data['description']?> 
                </p>
            </div>
            
        </div>
    </div> 
    <div class="container margin-back">
        <div class="row">
            <div class="col">
                <a href='music.php' style='color: #fff' class='btn btn-info'> Go back </a>
            </div>
        </div> 
    </div>
</div>

<?php
        include('./partials/nav.php');
       
        // include('./partials/copyright.php');
        include('./partials/footer.php');
?>