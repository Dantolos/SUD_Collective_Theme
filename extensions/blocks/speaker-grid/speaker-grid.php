<?php


// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}
$hideBlock = get_field('hide_block') ? 'display: none;' : '';

$speakers = get_field('speakers') ?: null;

?>

<div <?php echo $anchor; ?>class=" block-speaker-grid-container default-container" style="padding-top:0; padding-bottom:0; <?php echo $hideBlock; ?>">
     <h2><?php echo get_field('title'); ?></h2>
     <?php if($speakers) {
          foreach($speakers as $speaker){ ?>
               <div class="speaker-container">
                    <div class="speaker-portrait" style="background-image:url(<?= $speaker['portait'];  ?>);"></div>
                    <div class="speaker-gradient-layer"></div>
                    <div class="speaker-info">
                         <div class="speaker-visible-content">
                              <h4><?php echo $speaker['speaker_name'] ?></h4>
                              <p><?php echo $speaker['speaker_function'] ?></p>
                         </div>
                         <div class="speaker-hidden-content">
                              <div class="speaker-cv">
                                   <?php echo $speaker['cv'] ?>
                                   <?php if($speaker['linkedin']) : ?>
                                        <a href="<?php echo $speaker['linkedin']; ?>" target="_blank" rel="noopener noreferrer">
                                             <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/linkedin-icon.svg" alt="linkedin <?php echo $speaker['speaker_name'] ?>" />
                                        </a>
                                   <?php endif; ?>
                              </div>
                         </div>
                    </div>
               </div>
     <?php }} ?>
</div>
