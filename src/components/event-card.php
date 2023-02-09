<?php

namespace sud\components\eventCard;

class Event_Card{
    public $html = '';

    public function __construct($event){
        $dateFormat = new \sud\helper\date\Date_Format;

        $this->html .= '<div class="event-card">';
            $this->html .= '<div class="eventcard-thumb">';
                $this->html .= '<img src="'.esc_url( get_field( 'Thumb', $event )['url'] ).'" alt="'.esc_attr( get_field( 'Thumb', $event )['alt'] ).'">';
                $this->html .= '<span>'.esc_html( $dateFormat->formating_Date_Language( get_field( 'facts', $event )['date'], 'date' ) ).'</span>';
            $this->html .= '</div>';

            $this->html .= '<h4>'. esc_html( get_field( 'content', $event )['title'] ).'</h4>';      
            $this->html .= '<p>'. esc_html( get_field( 'content', $event )['lead'] ).'</p>';
            $this->html .= '<a href="'.esc_url( get_permalink( $event ) ).'"><button>Attend</button></a>';

            
        $this->html .= '</div>';
        return $this->html;
    }
}