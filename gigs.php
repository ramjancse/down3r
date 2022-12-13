<?php 
    include('./partials/header.php');
    include('./partials/nav_new_mobile.php');

    include('./backend/AllGigScriptFront.php');
?>


        <div class="row mt-4 mb-4">
            <div class="col">
                <div class='text-center text-white title'> Gigs </div>  
            </div>
        </div>

        <div class="container" style="display:flex; justify-content: center; marginY ">
        <table class="table table-borderless gig-text responsive-font" style="margin-bottom:20px;">
            <thead>
                <tr>
                    <th scope="col" style='text-align:left'>Year</th>
                    <th scope="col" style="width:180px;">Month and Day </th>
                    <th scope="col">Location</th>
                    <th scope="col">Event Title</th>
                    <th scope="col" style="width:100px;"> Go to </th>
                </tr>
            </thead>
            <tbody>
            <?php 
                if(mysqli_num_rows($all_gig_query_run) > 0){
                    $i = 1; 
                    foreach($all_gig_query_run as $item){
                    ?>
                        <tr>
                            <td><?php echo $item['year'] ?></td>
                            <td><?php echo $item['month_and_day'] ?></td>
                            <td><?php echo $item['location'] ?></td>
                            <td><?php echo $item['event_title'] ?></td>
                            <td>
                                <a href='http://<?php echo $item['flyer_link'] ?>' style='color:#fff; font-size:20px'       target="_blank"> + 
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                }else{
                    echo '<td>No data Found</td>';
                }
            ?> 
            </tbody>
            </table>
        </div>
<?php

    include('./partials/footer.php');
?>