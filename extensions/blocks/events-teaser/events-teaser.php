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

?>


<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?> event-teaser-container" style="">
    <?php
    foreach($events as $event){
        $eventCard = new \sud\components\eventCard\Event_Card($event);
        echo $eventCard->html;
    }
    ?>
</div>  