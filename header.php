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
            src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/mediasansweb-regular.eot');
            src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/mediasansweb-regular.eot?#iefix') format('embedded-opentype'),
                  url('<?php echo get_template_directory_uri(); ?>/assets/fonts/mediasansweb-regular.woff') format('woff'),
                  url('<?php echo get_template_directory_uri(); ?>/assets/fonts/mediasansweb-regular.woff2') format('woff2');
      }
    </style>
  </head>
  <body <?php body_class(); ?>>
    <?php
      //add navigationbar
      $navigationBar = new \sud\components\navigation\Navigationbar;
      echo $navigationBar->html;
    ?>  

    <div id="main-container">