<?php

namespace sud\components\insightCard;


class Insight_Card {
    public $html = '';

    public function __construct ( $insight ){

        $insightLink = get_field( 'link', $insight ) ?: get_permalink($insight);
        $linkAttr = get_field( 'link', $insight ) ? array('target' => '_blank', 'class' => 'extern-insight') : array('target' => '', 'class' => 'intern-insight');
        $this->html .=  '<div class="insight-card">';
        $this->html .=  '<img src="'.esc_url(get_field('icon', $insight)['url']).'" alt="'.esc_attr(get_field('icon', $insight)['alt']).'" /   >';
        $this->html .=  '<h3>'.esc_html(get_the_title($insight)).'</h3>';
        $this->html .=  '<p>'.esc_html(get_field('excerpt', $insight)).'</p>';
        $this->html .=  '<a href="'.esc_url($insightLink).'" target="'.$linkAttr['target'].'"><button class="'.$linkAttr['class'].'">more</button></a>';
        $this->html .=  '</div>';
    
    
        return $this->html;


    }

}
