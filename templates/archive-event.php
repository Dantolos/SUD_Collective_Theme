<?php

/*
 *Template Name: Event Archive
 */

get_header();


$args = array(
    'post_status' => 'publish',
    'post_type' => 'event'
);
$events = new WP_Query($args);

echo '<div class="event-page-container">';

echo '<div class="event-content">';
echo the_content();
echo '</div>';

echo '<div class="event-card-container">';
foreach($events->posts as $event){
    $eventCard = new \sud\components\eventCard\Event_Card($event->ID);
    echo $eventCard->html;
}

echo '</div>';
echo '</div>';

get_footer();

