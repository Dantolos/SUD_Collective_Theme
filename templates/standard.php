<?php

/*
 *Template Name: Standard Template
 */
get_header();

echo '<div class="default-container">';
echo '<div class="default-content">';
echo the_content();
echo '</div>';
echo '</div>';

get_footer();