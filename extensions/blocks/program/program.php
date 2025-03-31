<?php


// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$hideBlock = get_field('hide_block') ? 'display: none;' : '';

?>

<div <?php echo $anchor; ?>class=" block-program-container default-container" style="padding-top:0; padding-bottom:0; <?php echo $hideBlock; ?>">

     <div class="default-content">

          <h3 style="margin-bottom: 40px; color: #942F6D;"><?php echo get_field('title'); ?></h3>
          <p style="margin-bottom:40px;"><?php echo get_field('description') ?></p>
          <div class="program-list-wrapper">
               <?php if(get_field('program_rows')) {

                    foreach( get_field('program_rows') as $progrm_row) {
                         $has_subcontent = ( $progrm_row['content']['program_subtitle'] ) ? true : false;
                         $subcontent_class = $has_subcontent ? 'has_subcontent' : '';
                         echo '<div class="program-row dropshadow '.$subcontent_class.'">';
                              echo '<div class="program-row-time">';
                                   echo '<p>'.$progrm_row['time']['from'].' - '.$progrm_row['time']['till'].'</p>';
                              echo '</div>';
                              echo '<div class="program-row-content ">';
                                   echo '<h4 class="has-primary-color-color" style=" ">'.$progrm_row['content']['program_title'].'</h4>';
                                   // SUBCONTENT
                                   echo '<div class="program-row-subcontent">';
                                   echo $progrm_row['content']['program_subtitle'];
                                   //Sesstion Content

                                   if($progrm_row['content']['type'] == 'sessions'){
                                       echo '<div class="programm-sessions-list">';
                                       foreach($progrm_row['content']['sessions'] as $session){
                                           echo '<div class="programm-sessions-item">';
                                            echo '<div class="programm-sessions-item-left">';
                                                echo '<p style="font-size:1.5em !important;">'.$session['session_label'].'</p>';
                                                if($session['room']){

                                                echo '<p>Room: '.$session['room'].'</p>';
                                                }
                                            echo '</div>';
                                            echo '<div class="programm-sessions-item-right">';
                                                echo '<h4>'.$session['session_title'].'</h4>';
                                                echo '<p>'.$session['session_content'].'</p>';
                                            echo '</div>';
                                           echo '</div>';
                                       }
                                       echo '</div>';
                                   }
                                   echo '</div>';
                                   if($has_subcontent){
                                        echo '<img class="program-arrow" src="'.get_template_directory_uri() .'/assets/arrow.svg" />';
                                   }
                              echo '</div>';
                         echo '</div>';
                    }
                    echo '</div>';
               }?>
          </div>
     </div>

</div>
