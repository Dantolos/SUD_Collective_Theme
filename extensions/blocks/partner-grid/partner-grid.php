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
$partners = get_field( 'partner' ) ?: 'Choose partners ';
$minWidth = get_field( 'width' ) ?: '200';
$columns = get_field( 'colums' ) ?: 3;

$columnWidht = 100 / $columns - ( $columns * 2 ); 

$dateFormat = new \sud\helper\date\Date_Format;

if( get_field('order') ){
    if (!function_exists('partner_order_by')) {
        function partner_order_by($a, $b) { 
            if( get_field('direction') === 'asc' ){
                return (get_field('company', $a) < get_field('company', $b)) ? -1 : 1;   
            }
            return (get_field('company', $a) > get_field('company', $b)) ? -1 : 1;   
        }
    }
    uasort($partners, 'partner_order_by');
}



?>


<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?> partner-grid-container">
    <?php
    if( is_array($partners)) {
        foreach($partners as $partner){
            echo '<div class="partner-card" data-partner="'.$partner.'" style="min-width:'.$minWidth.'px; width:'.$columnWidht.'%; background-color:'. get_field('background_color').';" >';
                echo '<img src="'.esc_url(get_field('logo', $partner)['url']).'" alt="'.esc_attr(get_field('company', $partner)).'" />';
            echo '</div>';
        }
    } else {
        echo '<h4>'.$partners.'</h4>';
    } 
    ?>
</div>