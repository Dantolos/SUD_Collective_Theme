<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/png" href="<?php echo get_field('icon', 'option')['url']; ?>"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <?php wp_head();

    ?>
    <style>
      @font-face {
        font-family: 'GTAlpina';
        src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/GT-Alpina-Standard-Regular.eot');
        src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/GT-Alpina-Standard-Regular.eot') format('embedded-opentype'),
             url('<?php echo get_template_directory_uri(); ?>/assets/fonts/GT-Alpina-Standard-Regular.woff2') format('woff2'),
             url('<?php echo get_template_directory_uri(); ?>/assets/fonts/GT-Alpina-Standard-Regular.woff') format('woff'),
             url('<?php echo get_template_directory_uri(); ?>/assets/fonts/GT-Alpina-Standard-Regular.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
      }
      @font-face {
        font-family: 'GTAlpina';
        src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/GT-Alpina-Standard-Bold.eot');
        src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/GT-Alpina-Standard-Bold.eot') format('embedded-opentype'),
             url('<?php echo get_template_directory_uri(); ?>/assets/fonts/GT-Alpina-Standard-Bold.woff2') format('woff2'),
             url('<?php echo get_template_directory_uri(); ?>/assets/fonts/GT-Alpina-Standard-Bold.woff') format('woff'),
             url('<?php echo get_template_directory_uri(); ?>/assets/fonts/GT-Alpina-Standard-Bold.ttf') format('truetype');
        font-weight: bold;
        font-style: bold;
      }
      @font-face {
        font-family: 'mediasans-bold';
            src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/mediasansweb-bold.eot');
            src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/mediasansweb-bold.eot?#iefix') format('embedded-opentype'),
                  url('<?php echo get_template_directory_uri(); ?>/assets/fonts/mediasansweb-bold.woff') format('woff');
      }
      @font-face {
        font-family: 'mediasans-regular';
            src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/mediasans-regular.eot');
            src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/mediasans-regular.eot?#iefix') format('embedded-opentype'),
                  url('<?php echo get_template_directory_uri(); ?>/assets/fonts/mediasans-regular.woff') format('woff'),
                  url('<?php echo get_template_directory_uri(); ?>/assets/fonts/mediasans-regular.woff2') format('woff2');
      }
    </style>
  </head>
  <body <?php body_class(); ?>>
    <?php
      //add navigationbar
      //$navigationBar = new \sud\components\navigation\Navigationbar;
      //echo $navigationBar->html;
    ?>

    <div class="header-wrapper">

         <a href="<?php echo esc_url( get_home_url() ); ?>" style="max-width: 30%;">
              <div class="header-logo"><img src="<?php echo get_field('logo', 'option');?>" alt="startup days logo" /></div>
         </a>


         <div class="header-meta-menu">
              <?php
              if( get_field('meta_menu', 'option') ){
                   echo '<ul>';
                   foreach(get_field('meta_menu', 'option') as $metamenuItem){
                        switch ($metamenuItem["acf_fc_layout"]) {
                             case 'external_link':
                                  echo '<li>';
                                  echo '<a href="'.$metamenuItem["link"].'" target="_blank">';
                                  echo $metamenuItem['label'];
                                  echo '</a>';
                                  echo '</li>';
                                  break;
                             default:
                                  echo '<li>';
                                  echo '<a href="'.$metamenuItem["link"].'" >';
                                  echo $metamenuItem['label'];
                                  echo '</a>';
                                  echo '</li>';
                                  break;
                        }
                   }
                   echo '</ul>';
              }

              ?>
         </div>

         <div class="header-menu">
              <?php
              $menuArgs = array(
                   'menu'              => "Header Menu",
                   'menu_class'        => "desktop-menu",
                   'container'         => "nav",
                   'container_class'   => "se2-navigation desktop-menu-content ",
                   'walker'            => new Walker_Nav_Primary()
              );
              if($menuArgs){
                   wp_nav_menu( $menuArgs );
              }

              if(get_field('header_cta', 'option')){
                   echo '<a class="header-cta-desktop" href="'.get_field('cta_button', 'option')['url'].'" target="'.get_field('cta_button', 'option')['target'].'"><div class="header-cta btn-secondary btn-s">'.get_field('cta_button', 'option')['title'].'</div></a>';
              }
              echo '<div class="burger-menu-trigger"><img src="'.get_template_directory_uri().'/assets/burger-menu.svg" alt="Burger Menu" /></div>';

              echo '<div class="burger-menu-wrapper">';
                   echo '<div class="burger-menu-closer"><img src="'.get_template_directory_uri().'/assets/close-cross-white.svg" alt="Close Icon" /></div>';
                   echo '<div class="burger-menu-sud-icon"><img src="'.get_template_directory_uri().'/assets/sud_icon-white.svg" alt="Close Icon" /></div>';

                   wp_nav_menu(array(
                        'menu'              => "Header Menu",
                        'menu_class'        => "burger-menu",
                        'container'         => "nav",
                        'container_class'   => "se2-navigation menu-burger-content ",
                        'walker' => new Burger_Menu_Walker(),
                   ));

                   if(get_field('header_cta', 'option')){
                        echo '<div class="header-cta-wrapper">';
                        echo '<a class="header-cta" href="'.get_field('cta_button', 'option')['url'].'" target="'.get_field('cta_button', 'option')['target'].'"><div class="header-cta btn-secondary btn-s btn-neg">'.get_field('cta_button', 'option')['title'].'</div></a>';
                        echo '</div>';
                   }
              echo '</div>';
              ?>
         </div>
    </div>

    <div id="main-container">
