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
            $insightCard = new \sud\components\insightCard\Insight_Card($insight);
            echo $insightCard->html;
        }
    } else {
        echo '<h4>'.$insights.'</h4>';
    }
    ?>
</div>