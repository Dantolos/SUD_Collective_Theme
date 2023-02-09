<?php
get_header();

$eventID = get_the_ID();
?>

<div class="event-body">
    <div class="event-container">
       <?php

      
        
        echo '<div class="event-content">';
            echo '<h1>'. get_the_title().'</h1>';
            echo the_content();
        echo '</div>';
        ?>
    </div>
</div>


<?php
get_footer();