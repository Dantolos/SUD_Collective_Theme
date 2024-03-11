<?php


// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$speakers = get_field('speakers') ?: null;

?>

<div <?php echo $anchor; ?>class=" block-speaker-grid-container default-container" style="padding-top:0; padding-bottom:0;">
     <h2><?php echo get_field('title'); ?></h2>
     <?php if($speakers) {
          foreach($speakers as $speaker){ ?>
               <div class="speaker-container">
                    <div class="speaker-portrait" style="background-image:url(<?= $speaker['portait'];  ?>);"></div>
                    <div class="speaker-info">
                         <h4><?php echo $speaker['speaker_name'] ?></h4>
                         <div class="speaker-hidden-content">
                              <p><?php echo $speaker['speaker_function'] ?></p>
                              <div class="speaker-cv">
                                   <?php echo $speaker['cv'] ?>
                              </div>
                         </div>
                    </div>
               </div>
     <?php }} ?>
</div>