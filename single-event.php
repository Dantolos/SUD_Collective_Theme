<?php
get_header();

$eventID = get_the_ID();
?>

<div class="event-body">
    <div class="event-container">

   
       <?php

        echo '<div class="event-image-header">';
        echo '<img src="'.esc_url(get_field('Thumb')['url']).'" alt="'.esc_attr(get_field('Thumb')['alt']).'">';
        echo '</div>';
        
        echo '<div class="event-content">';
        echo '<h2>'.esc_html(get_field('content')['title']).'</h2>';
        echo '<p>'.get_field('content')['description'].'</p>';
        echo '</div>';
        ?>
    </div>
</div>


<?php
get_footer();