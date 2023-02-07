<?php

namespace sud\components\navigation;

class Navigarionbar {
    public $html = '';
    

    public function __construct(){

        $this->html .= '<div id="navigation-container" class="nav-big">';
            $this->html .= '<a href="'.esc_url( get_home_url() ).'"><img class="nav-logo" src="'.get_field('logo', 'option')['url'].'" alt="'.get_field('logo', 'option')['alt'].'"/></a>';
            $this->html .= '<a href="'.esc_url( get_home_url() ).'"><img class="nav-icon" src="'.get_field('icon', 'option')['url'].'" alt="'.get_field('icon', 'option')['alt'].'"/></a>';
            $this->html .= '<nav id="navigation-menu">';
                //menu items
                foreach( wp_get_nav_menu_items('Header Menu') as $menuitem)
                {
                    $this->html .= '<a href="'.$menuitem->url.'">';
                    $this->html .= $menuitem->title;
                    $this->html .= '</a>';
                }
            $this->html .= '</nav>';
        $this->html .= '</div>';

        $this->html .= '<div class="nav-placeholder"></div>';
        return $this->html;
    }
    
}

