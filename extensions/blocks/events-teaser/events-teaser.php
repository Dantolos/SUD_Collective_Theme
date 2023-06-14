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
$selection = get_field( 'selection' );

$events = array();
    
if($selection === 'manual') {
   
    $events = get_field( 'events' ) ?: 'Choose comming up events ';
}
if($selection === 'next') {
    $args = array(
        'post_status' => 'publish',
        'post_type' => 'event',
        'posts_per_page' => '-1'
    );
    $eventObject = new WP_Query($args);
    $allEvents = $eventObject->posts;
    if( !function_exists('event_order_by_date') ){
        function event_order_by_date($a, $b){
            if(!get_field( 'facts', $a->ID )['date'] || !get_field( 'facts', $b->ID )['date']  ){ return 1; }
    
            return strtotime( str_replace( '/', '-', get_field( 'facts', $a->ID )['date'] ) ) < strtotime( str_replace( '/', '-', get_field( 'facts', $b->ID )['date'] ) ) ? -1 : 1;
        }
    }
    
    uasort( $allEvents, 'event_order_by_date' );

    foreach( $allEvents as $singleEvent){
        if( strtotime( str_replace( '/', '-', get_field( 'facts', $singleEvent->ID )['date'] ) ) > strtotime( str_replace( '/', '-',date( 'd/m/Y' ) ) ) ){
            if( count($events) < 3 ){
                array_push( $events, $singleEvent->ID  );
            }
        }
    }
}
?>

<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?> event-teaser-container" style="">
    <?php
    foreach($events as $event){
        $eventCard = new \sud\components\eventCard\Event_Card($event);
        echo $eventCard->html;
    }
    ?>
</div>  