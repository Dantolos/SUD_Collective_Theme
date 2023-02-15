<?php
get_header();

$eventID = get_the_ID();
$dateFormat = new \sud\helper\date\Date_Format;

?>

<div class="event-body">
    <div class="event-container">
       <?php
            
        echo '<div class="event-image-header">';
        if( get_field('Thumb') ){
            echo '<img src="'.esc_url(get_field('Thumb')['url']).'" alt="'.esc_attr(get_field('Thumb')['alt']).'">';
        } else {
            echo '<img src="'. get_template_directory_uri() . '/assets/img-placeholder.png' .'" alt="sud-event-placeholder-image">';
        }
        echo '</div>';
        
        echo '<div class="event-content">';
        echo '<h2>'.esc_html(get_field('content')['title']).'</h2>';
        echo '<p><b>'.esc_html(get_field('content')['lead']).'</b></p>';
        echo get_field('content')['description'];
        echo '</div>';
        ?>
    </div>

    <div class="event-sidebar">
        
        <?php

        if(get_field('facts')['date']){
            echo '<div class="event-fact-row">';
            echo '<h6 style="width:100%;">Date</h6>';
            echo '<p>'.$dateFormat->formating_Date_Language(get_field('facts')['date'], 'date').'</p>';
            echo '</div>';
        }

        if(get_field('facts')['from'] && get_field('facts')['until']){
            echo '<div class="event-fact-row">';
                echo '<div class="event-fact-column">';
                echo '<h6>From</h6>';
                echo '<p>'.$dateFormat->formating_Date_Language(get_field('facts')['from'], 'time').'</p>';
                echo '</div>';

                echo '<div class="event-fact-column">';
                echo '<h6>Until</h6>';
                echo '<p>'.$dateFormat->formating_Date_Language(get_field('facts')['until'], 'time').'</p>';
                echo '</div>';
            echo '</div>';
        }
        
        if(get_field('facts')['venue']){
            echo '<div class="event-fact-row">';
            echo '<h6 style="width:100%;">Venue</h6>';
            echo '<p>'.get_field('facts')['venue'].'</p>';
            echo '</div>';
        }
        if(get_field('facts')['register_link']){
           
             
            echo '<a href="'.get_field('facts')['register_link'].'" target="_blank"><button>Register now</button></a>';
        }

        ?>
    </div>
</div>
 

<?php
get_footer();