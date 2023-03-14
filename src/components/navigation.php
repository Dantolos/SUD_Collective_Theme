<?php

namespace sud\components\navigation;

class Navigationbar {
    public $html = '';
    

    public function __construct(){

        $this->html .= '<div id="navigation-container" class="nav-big" >';
            $this->html .= '<a href="'.esc_url( get_home_url() ).'"><img class="nav-logo" src="'.get_field('logo', 'option')['url'].'" alt="'.get_field('logo', 'option')['alt'].'"/></a>';
            $this->html .= '<a href="'.esc_url( get_home_url() ).'"><img class="nav-icon" src="'.get_field('icon', 'option')['url'].'" alt="'.get_field('icon', 'option')['alt'].'"/></a>';
            
            //desktop menu
            $this->html .= '<nav id="navigation-menu">';
                //menu items
                if(wp_get_nav_menu_items('Header Menu')){
                    foreach( wp_get_nav_menu_items('Header Menu') as $menuitem)
                    {
                        $this->html .= '<a href="'.$menuitem->url.'">';
                        $this->html .= $menuitem->title;
                        $this->html .= '</a>';
                    }
                }
            $this->html .= '</nav>';

            //mobile
            $this->html .= '<div id="burger-button" class="burger-icon" style=""><img src="'.get_template_directory_uri().'/assets/SUD_burger-menu.svg"/></div>';

        $this->html .= '</div>';
        

        $this->html .= '<div class="nav-placeholder"></div>';

        //mobile menu
        $this->html .= '<div id="mobile-navigation">';
            $this->html .= '<div id="menu-close-button" class="burger-ico-close" style=""><img src="'.get_template_directory_uri().'/assets/SUD_burger-menu-close.svg"/></div>';
            
            $this->html .= '<nav id="navigation-menu-mobile" >';
                //menu items
                foreach( wp_get_nav_menu_items('Header Menu') as $menuitem)
                {
                    $this->html .= '<a href="'.$menuitem->url.'">';
                        $this->html .= '<h2>'.$menuitem->title.'</h2>';
                    $this->html .= '</a>';
                }
            $this->html .= '</nav>';
        $this->html .= '</div>';

        return $this->html;
    }
}

