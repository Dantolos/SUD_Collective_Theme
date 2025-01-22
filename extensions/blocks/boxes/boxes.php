<?php

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}
$hideBlock = get_field('hide_block') ? 'display: none;' : '';


?>

<div <?php echo $anchor; ?>class=" block-boxes-container default-container" style="<?php echo $hideBlock; ?> padding-top:0; padding-bottom:0;">

     <div class="default-content">

          <h3 style="margin-bottom: 40px; color: #942F6D;"><?php echo get_field('title'); ?></h3>

          <div class="boxes-wrapper">
               <?php if(get_field('boxes')){
                    foreach (get_field('boxes') as $key => $box) {
                         ?>
                         <div class="box-container dropshadow">
                              <img class="box-icon" src="<?php echo $box['icon']; ?>"/>
                              <h3 class="has-secondary-color-color"><?php echo $box['box_title']; ?></h3>
                              <div><?php echo $box['box_content']; ?></div>
                         </div>

                         <?php
                    }
               } ?>
          </div>
     </div>

</div>
