<?php


// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

?>

<div <?php echo $anchor; ?>class=" block-program-container default-container">

     <div class="default-content">

          <h3><?php echo get_field('title'); ?></h3>
          <p><?php echo get_field('description') ?></p>
          <div class="program-list-wrapper">
               <?php if(get_field('program_rows')) {
                    echo '<div class="program-row">';
                    foreach( get_field('program_rows') as $progrm_row) {
                         echo '<div class="program-row-time">';
                         echo '<p>'.$progrm_row['time']['from'].' - '.$progrm_row['time']['till'].'</p>';
                         echo '</div>';
                         echo '<div class="program-row-content">';
                         echo '<h4>'.$progrm_row['content']['program_title'].'</h4>';
                         echo '<p>'.$progrm_row['content']['program_subtitle'].'</p>';
                         echo '</div>';
                    }
                    echo '</div>';
               }?>
          </div>
     </div>
 
</div>