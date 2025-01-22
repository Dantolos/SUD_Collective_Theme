<?php


// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}
$hideBlock = get_field('hide_block') ? 'display: none;' : '';

$poster_image = get_field('poster') ?: null;
$group_content = get_field('content') ?: null;
$poster_file = get_field('poster_file') ?: null;
?>

<div  <?php echo $anchor; ?>class="default-container working-group-container" style="padding-top:0; padding-bottom:0; <?php echo $hideBlock; ?>">
     <div class="working-group-left-container">
          <img src="<?php echo $poster_image; ?>" alt="" width="100%" />
     </div>
     <div class="working-group-right-container">
          <div class="working-group-informations">
               <h3 class="has-primary-color-color "><?php echo $group_content['title']; ?></h3>
               <p><?php echo $group_content['description']; ?></p>

               <?php if($group_content['leader']) {
                    echo '<div class="working-group-leader">';
                         echo '<h4 class="has-primary-color-color ">'.__("Leader").'</h4>';
                         echo '<div class="working-group-leader-label">';
                              echo '<div class="working-group-leader-avatar" style="background-image:url('.$group_content['leader']['portrait'].');"></div>';
                              echo '<div class="working-group-leader-avatar-text">';
                                   echo '<h5>'.$group_content['leader']['firstname'].' '.$group_content['leader']['lastname'].'</h5>';
                                   echo '<p>'.$group_content['leader']['company'].'</p>';
                              echo '</div>';
                         echo '</div>';
                    echo '</div>';
               } ?>
          </div>
          <?php
          if( $poster_file ){
               echo '<a href="'.$poster_file['url'].'" target="_blank">';
               echo '<button>';
               echo __('Download');
               echo '</button>';
               echo '</a>';
          }
          ?>
     </div>

</div>
