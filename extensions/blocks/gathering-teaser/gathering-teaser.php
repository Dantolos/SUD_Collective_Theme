<?php


// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

?>

<div <?php echo $anchor; ?>class=" block-gathering-teaser-container default-container" style="padding-top:0; padding-bottom:0;">

     <div class="default-content block-gathering-teaser-wrapper">

          <div class="gathering-left-container" style="background-image:url(<?php echo get_field('image'); ?>);">
               
          </div>
          <div class="gathering-right-container">
               <h3 class="has-primary-color-color"><?php echo get_field('title'); ?></h3>
               <p class="has-secondary-color-color"><?php echo get_field('description') ?></p>

               <?php 
               if(get_field('infopoint')){
                    echo '<div class="infopoint-wrapper">';
                    foreach(get_field('infopoint') as $key => $point){
                         ?>
                              <div class="infopoint-row">
                                   <div class="infopoint-icon">
                                        <img src="<?php echo $point['icon']; ?>" alt="">
                                   </div>
                                   <div class="infopoint-content">
                                        <h4 class="has-primary-color-color" style="font-family: 'mediasans-bold';"><?php echo $point['informations']['title']; ?></h4>
                                        <p class="has-secondary-color-color"><?php echo $point['informations']['text']; ?></p>
                                   </div>
                              </div>
                         <?php
                    }
                    echo '</div>';
               }
               ?>
                              <a href="<?php echo get_field('button')['url']; ?>"><button style="font-family: 'mediasans-bold';"><?php echo get_field('button')['title']; ?></button></a>
          </div>
     </div>
 
</div>