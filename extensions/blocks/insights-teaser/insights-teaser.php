<?php


// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'testimonial-block';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}


// Load values and assign defaults.
$insights = get_field( 'insights' ) ?: 'Choose comming up insight ';


$styles = array( 'background-color: ' . 'white', 'color: ' . 'red' );
$style  = implode( '; ', $styles );

$dateFormat = new \sud\helper\date\Date_Format;

?>


<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?> insight-teaser-container" style="">
    <?php
    if( is_array($insights)) {
        foreach($insights as $insight){
            $insightLink = get_field( 'link', $insight ) ?: get_permalink($insight);
            $linkAttr = get_field( 'link', $insight ) ? array('target' => '_blank', 'class' => 'extern-insight') : array('target' => '', 'class' => 'intern-insight');
            echo '<div class="insight-card">';
                echo '<img src="'.esc_url(get_field('icon', $insight)['url']).'" alt="'.esc_attr(get_field('icon', $insight)['alt']).'" /   >';
                echo '<h4>'.esc_html(get_the_title($insight)).'</h4>';
                echo '<p>'.esc_html(get_field('excerpt', $insight)).'</p>';
                echo '<a href="'.esc_url($insightLink).'" target="'.$linkAttr['target'].'"><button class="'.$linkAttr['class'].'">more</button></a>';
            echo '</div>';
        }
    } else {
        echo '<h4>'.$insights.'</h4>';
    }
    ?>
</div>