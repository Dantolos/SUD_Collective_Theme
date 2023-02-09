<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <?php wp_head(); ?>
    <style>
      @font-face {
        font-family: 'GTAlpina';
        src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/GT-Alpina-Condensed-Regular.woff');
        src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/GT-Alpina-Condensed-Regular.woff2') format('woff2'),
             url('<?php echo get_template_directory_uri(); ?>/assets/fonts/GT-Alpina-Condensed-Regular.woff') format('woff');
        font-weight: normal;
        font-style: normal;
      }
      @font-face {
        font-family: 'GTAlpina';
        src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/GT-Alpina-Condensed-Bold.woff');
        src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/GT-Alpina-Condensed-Bold.woff2') format('woff2'),
             url('<?php echo get_template_directory_uri(); ?>/assets/fonts/GT-Alpina-Condensed-Bold.woff') format('woff');
        font-weight: bold;
        font-style: bold;
      }
    </style>
  </head>
  <body <?php body_class(); ?>>
 

    <?php
      //add navigationbar
      $navigationBar = new \sud\components\navigation\Navigationbar;
      echo $navigationBar->html;
    ?>  