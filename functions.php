<?php
$theme = wp_get_theme();
define('THEME_VERSION', $theme->Version); 

function boilerplate_load_assets() {
  wp_enqueue_script('ourmainjs', get_theme_file_uri('/build/index.js'), array('wp-element'), THEME_VERSION, true);
  wp_enqueue_style('ourmaincss', get_theme_file_uri('/build/index.css', [], THEME_VERSION, 'all'));
}

add_action('wp_enqueue_scripts', 'boilerplate_load_assets');

function boilerplate_add_support() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'boilerplate_add_support');


/*-------------------------------------------------------------*/
/*-------------------- Theme Options Page ---------------------*/
/*-------------------------------------------------------------*/

require_once( dirname(__FILE__).'/theme/theme.config.php' );

/*-------------------------------------------------------------*/
/*---------------------- LOAD HELPERS -------------------------*/
/*-------------------------------------------------------------*/

$helperFolder = opendir(dirname(__FILE__).'/src/helper');
if ( $helperFolder ) {
    while (($entry = readdir($helperFolder)) !== FALSE  ) {
      if($entry[0] !== '.'){
        require_once( dirname(__FILE__).'/src/helper/'.$entry );
      }
    }
}
closedir($helperFolder);


/*-------------------------------------------------------------*/
/*--------------------- LOAD COMPONENTS -----------------------*/
/*-------------------------------------------------------------*/

$componentsFolder = opendir(dirname(__FILE__).'/src/components');
if ( $componentsFolder ) {
    while (($entry = readdir($componentsFolder)) !== FALSE  ) {
      if($entry[0] !== '.'){
        require_once( dirname(__FILE__).'/src/components/'.$entry );
      }
    }
}
closedir($componentsFolder);


/*-------------------------------------------------------------*/
/*------------------------- CPT UI ----------------------------*/
/*-------------------------------------------------------------*/

//check directory extensions/cptui for files

$cptuiFolder = opendir(dirname(__FILE__).'/extensions/ctpui');
if ( $cptuiFolder ) {
    while (($entry = readdir($cptuiFolder)) !== FALSE  ) {
      if($entry[0] !== '.'){
        require_once( dirname(__FILE__).'/extensions/ctpui/'.$entry );
      }
    }
}
closedir($cptuiFolder);


/*-------------------------------------------------------------*/
/*--------------------------- ACF -----------------------------*/
/*-------------------------------------------------------------*/

//check directory extensions/acf for files

$acfFolder = opendir(dirname(__FILE__).'/extensions/acf');
if ( $acfFolder ) {
    while (($entry = readdir($acfFolder)) !== FALSE  ) {
      if($entry[0] !== '.'){
        require_once( dirname(__FILE__).'/extensions/acf/'.$entry );
      }
    }
}
closedir($acfFolder);


/*-------------------------------------------------------------*/
/*------------------------ Blocks -----------------------------*/
/*-------------------------------------------------------------*/

require_once(dirname(__FILE__).'/extensions/blocks/blocks-register.php');


/*-------------------------------------------------------------*/
/*-------------------- Filetypes Enable -----------------------*/
/*-------------------------------------------------------------*/
add_filter( 'wp_check_filetype_and_ext', 'my_svgs_disable_real_mime_check', 10, 4 );
function my_svgs_disable_real_mime_check( $data, $file, $filename, $mimes ) {
  $wp_filetype = wp_check_filetype( $filename, $mimes );	
  $ext = $wp_filetype['ext'];
  $type = $wp_filetype['type'];
  $proper_filename = $data['proper_filename'];
  return compact( 'ext', 'type', 'proper_filename' );
}
add_filter( 'upload_mimes', function ( $mime_types ) {
    $mime_types['svg'] = 'image/svg+xml';
    $mime_types[ 'eps' ] = 'application/postscript';
    $mime_types['json'] = 'application/json'; 
    $mime_types['obj'] = 'model/obj'; 
    $mime_types['fbx'] = 'model/fbx'; 
    return $mime_types;
} );



/*-------------------------------------------------------------*/
/*------------------------- Menu ------------------------------*/
/*-------------------------------------------------------------*/
function SUD_register_nav_menus() {
  register_nav_menus( array(
      'primary' => __( 'Primary Menu', 'primary-menu' ),
      'footer' => __( 'Footer Menu', 'footer-menu' )
  )); 
}
add_action( 'after_setup_theme', 'SUD_register_nav_menus' );


/*-------------------------------------------------------------*/
/*----------------------- Colors ------------------------------*/
/*-------------------------------------------------------------*/
function mytheme_setup_theme_supported_features() {
  add_theme_support( 'editor-color-palette', array(
    array(
        'name' => esc_attr__( 'primary color', 'SUD_Theme' ),
        'slug' => 'primary-color',
        'color' => '#942F6D',
    ),
    array(
        'name' => esc_attr__( 'secondary color', 'SUD_Theme' ),
        'slug' => 'secondary-color',
        'color' => '#7C70B1',
    ),
    array(
      'name' => esc_attr__( 'third color', 'SUD_Theme' ),
      'slug' => 'third-color',
      'color' => '#C3B1D7',
    ),
    array(
      'name' => esc_attr__( 'dark color', 'SUD_Theme' ),
      'slug' => 'dark-color',
      'color' => '#3C1438',
    ),
      
      
  ) );
}

add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );


/*-------------------------------------------------------------*/
/*----------------------- Dashboard ---------------------------*/
/*-------------------------------------------------------------*/
remove_action('welcome_panel', 'wp_welcome_panel');


/*-------------------------------------------------------------*/
/*------------------------LOAD SCRIPTS-------------------------*/
/*-------------------------------------------------------------*/
function theme_add_scripts() 
{
    $JsIncList = array(
        array('navi-js', 'navigation.js' ),
        array('anchor-js', 'inc/anchor.js' ),
        array('partner-js', 'inc/partner.js' ),
        array('main-js', 'main.js' ),
    );

    foreach ($JsIncList as $JsInc) 
    {
        wp_enqueue_script( $JsInc[0], get_template_directory_uri() . '/src/scripts/' . $JsInc[1], array('jquery'), THEME_VERSION, true );
    }

    /*------------------------------Send Global Variables---------------------------*/
    $wnm_custom = array( 
        'templateUrl' => get_template_directory_uri(), 
        'sitename' => get_bloginfo('name'),

        //'info' => $quickInfoAktiv
    );
    
    $scriptToAdGlobal = array('main-js', 'partner-js' );
    foreach( $scriptToAdGlobal as $script ){
        wp_localize_script( $script, 'globalURL', $wnm_custom );
    }

}
add_action( 'wp_enqueue_scripts', 'theme_add_scripts' );


//add dashicons to frontend
add_action( 'wp_enqueue_scripts', 'dashicons_front_end' );

function dashicons_front_end() {
   wp_enqueue_style( 'dashicons' );
}


//Register block script
add_action( 'init', 'sud_register_block_script' );
function sud_register_block_script() {
  wp_register_script( 'block-partner-grid', get_template_directory_uri() . '/extensions/blocks/partner-grid/partner-grid.js', [ 'jquery', 'acf' ] );
}


// Change template directory


function adminfavicon() {
  echo '<link rel="icon" type="image/x-icon" href="'.get_field('icon', 'option')['url'].'" />';
}
add_action( 'admin_head', 'adminfavicon' );


