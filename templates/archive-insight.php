<?php

/*
 *Template Name: Insight Archive
 */

get_header();


$args = array(
    'post_status' => 'publish',
    'post_type' => 'insight',
    'posts_per_page' => '-1'
);
$insights = new WP_Query($args);

echo '<div class="event-page-container">';

echo '<div class="event-content">';
echo the_content();
echo '</div>';

echo '<div class="event-card-container">';
foreach($insights->posts as $insight){
    $insightCard = new \sud\components\insightCard\Insight_Card($insight->ID);
    echo $insightCard->html;
}

echo '</div>';
echo '</div>';

get_footer();

