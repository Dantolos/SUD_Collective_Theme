<?php

namespace sud\components\eventCard;

class Event_Card{
    public $html = '';

    public function __construct($event){
        $dateFormat = new \sud\helper\date\Date_Format;
        $pastClass = '';
        
        if( strtotime( str_replace( '/', '-', get_field( 'facts', $event )['date'] ) ) < strtotime( str_replace( '/', '-',date( 'd/m/Y' ) ) ) ){
            $pastClass = 'past-event';
        }
        
        
        $this->html .= '<div class="event-card '.$pastClass.'">';
            $this->html .= '<div class="eventcard-thumb">';
                $this->html .= '<div class="eventcard-image">'; 
                    if( get_field( 'Thumb', $event ) ){
                        $this->html .= '<img src="'. get_field( 'Thumb', $event )['url'] .'" alt="'.esc_attr( get_field( 'Thumb', $event )['alt'] ).'" />';
                    } else {
                        $this->html .= '<img src="'. get_template_directory_uri() . '/assets/img-placeholder.png' .'" alt="sud-collective-image-placeholder" />';
                    }
                $this->html .= '</div>';
                if( get_field( 'facts', $event )['date']  ){
                    
                    $this->html .= '<span>'.esc_html( $dateFormat->formating_Date_Language( get_field( 'facts', $event )['date'], 'date' ) ).'</span>';
                }
            $this->html .= '</div>';

            $this->html .= '<h3>'. esc_html( get_field( 'content', $event )['title'] ).'</h3>';      
            $this->html .= '<p>'. esc_html( get_field( 'content', $event )['lead'] ).'</p>';
            $this->html .= '<a href="'.esc_url( get_permalink( $event ) ).'"><button>Attend</button></a>';

            
        $this->html .= '</div>';
        return $this->html;
    }
}