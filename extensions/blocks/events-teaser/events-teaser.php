<?php


// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'testimonial-block';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}


// Load values and assign defaults.
$events = get_field( 'events' ) ?: 'Choose comming up events ';

$styles = array( 'background-color: ' . 'white', 'color: ' . 'red' );
$style  = implode( '; ', $styles );

$dateFormat = new \sud\helper\date\Date_Format;

?>


<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?> event-teaser-container" style="">
    <?php
    foreach($events as $event){
        echo '<div class="event-card">';

            echo '<div class="eventcard-thumb">';
                echo '<img src="'.esc_url( get_field( 'Thumb', $event )['url'] ).'" alt="'.esc_attr( get_field( 'Thumb', $event )['alt'] ).'">';
                echo '<span>'.esc_html( $dateFormat->formating_Date_Language( get_field( 'facts', $event )['date'], 'date' ) ).'</span>';
            echo '</div>';

            echo '<h4>'. esc_html( get_field( 'content', $event )['title'] ).'</h4>';      
            echo '<p>'. esc_html( get_field( 'content', $event )['lead'] ).'</p>';
            echo '<a href="'.esc_url( get_permalink( $event ) ).'"><button>Attend</button></a>';

             
        echo '</div>';
    }
    ?>
</div>