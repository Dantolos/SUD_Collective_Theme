<?php


// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

?>

<div <?php echo $anchor; ?>class=" block-program-container default-container" style="padding-top:0; padding-bottom:0;">

     <div class="default-content">

          <h3 style="margin-bottom: 40px; color: #942F6D;"><?php echo get_field('title'); ?></h3>
          <p style="margin-bottom:40px;"><?php echo get_field('description') ?></p>
          <div class="program-list-wrapper">
               <?php if(get_field('program_rows')) {
                    
                    foreach( get_field('program_rows') as $progrm_row) {
                         echo '<div class="program-row dropshadow">';
                              echo '<div class="program-row-time">';
                              echo '<p>'.$progrm_row['time']['from'].' - '.$progrm_row['time']['till'].'</p>';
                              echo '</div>';
                              echo '<div class="program-row-content">';
                              echo '<h4 class="has-secondary-color-color">'.$progrm_row['content']['program_title'].'</h4>';
                              echo '<p>'.$progrm_row['content']['program_subtitle'].'</p>';
                              echo '</div>';
                         echo '</div>';
                    }
                    echo '</div>';
               }?>
          </div>
     </div>
 
</div>