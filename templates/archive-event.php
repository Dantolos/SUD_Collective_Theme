<?php

/*
 *Template Name: Event Archive
 */

get_header();


$args = array(
    'post_status' => 'publish',
    'post_type' => 'event'
);
$eventObject = new WP_Query($args);

$events = $eventObject->posts;

if( !function_exists('event_order_by_date') ){
    function event_order_by_date($a, $b){
        if( strtotime( str_replace( '/', '-', get_field( 'facts', $a->ID )['date'] ) ) === strtotime( str_replace( '/', '-', get_field( 'facts', $b->ID ) ))  ){
            return 0;
        }
        return strtotime( str_replace( '/', '-', get_field( 'facts', $a->ID )['date'] ) ) > strtotime( str_replace( '/', '-', get_field( 'facts', $b->ID )['date'] ) ) ? -1 : 1;
    }
}

uasort( $events, 'event_order_by_date' );

echo '<div class="event-page-container">';

echo '<div class="event-content">';
echo the_content();
echo '</div>';

echo '<div class="event-card-container">';
foreach($events as $event){
    $eventCard = new \sud\components\eventCard\Event_Card($event->ID);
    echo $eventCard->html;
}

echo '</div>';
echo '</div>';

get_footer();

