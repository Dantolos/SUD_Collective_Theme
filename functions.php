<?php
$theme = wp_get_theme();
define('THEME_VERSION', $theme->Version); 

function boilerplate_load_assets() {
  wp_enqueue_script('ourmainjs', get_theme_file_uri('/build/index.js'), array('wp-element'), THEME_VERSION, true);
  wp_enqueue_style('ourmaincss', get_theme_file_uri('/build/index.css'), [], THEME_VERSION, 'all');
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


function adminfavicon() {
  echo '<link rel="icon" type="image/x-icon" href="'.get_field('icon', 'option')['url'].'" />';
}
add_action( 'admin_head', 'adminfavicon' );




/*-------------------------------------------------------------*/
/*-----------------POST SUBMIT FORM HANDLER--------------------*/
/*-------------------------------------------------------------*/

function lh_acf_save_post( $post_id ) {

  // Don't do this on the ACF post type
  if ( get_post_type( $post_id ) == 'acf' ) {
      return;
  }

  $new_title = '';
  $new_slug = '';

  // Get title from 'event' CPT acf field 'content[title]'
  if ( get_post_type( $post_id ) == 'event' ) {
      $new_title = get_field( 'content', $post_id )['title'];
      $new_slug = sanitize_title( $new_title );
      $type = "Event";
  }

  // Get title from 'partner' CPT acf field 'company'
  if ( get_post_type( $post_id ) == 'partner') {
      $new_title = get_field( 'company', $post_id );
      $new_slug = sanitize_title( $new_title );
      $type = "Partner";
  }

  if ( get_post_type( $post_id ) == 'contact') {
    $new_title = get_field( 'first_name', $post_id ) . ' ' . get_field( 'last_name', $post_id );
    $new_slug = sanitize_title( $new_title );
    $type = "Contact";
}

  // Prevent iInfinite looping...
  remove_action( 'acf/save_post', 'lh_acf_save_post' );

  // Grab post data
  $post = array(
      'ID'            => $post_id,
      'post_title'    => $new_title,
      'post_name'     => $new_slug,
  );

  // Update the Post
  wp_update_post( $post );

  // Continue save action
  add_action( 'acf/save_post', 'lh_save_post' );

  // Set the return URL in case of 'new' post
  $_POST['return'] = add_query_arg( 'updated', 'true', get_permalink( $post_id ) );

  if( get_post_type( $post_id ) == 'partner' || get_post_type( $post_id ) == 'event' ) {
    // email data
    $to = 'mko@startupdays.ch';
    $headers = array('Content-Type: text/html; charset=UTF-8', 'Cc: agi@livelearninglabs.ch');//make it HTML
    $subject = 'SUD Collective | New '.$type.': '.$new_title;
    $link = get_edit_post_link( $post_id );
    
    $body = '<div style="padding: 50px 40px; border-radius:30px;width: 500px; display:flex; flex-direction: column; justify-content:center; align-items:center; background-color:#F4F4F4; color:#3C1438;">';
    $body .= '<h3 style="text-align:center;"><b>Ein neuer '.$type.'-Post wurde eingereicht.</b></h3>';
    $body .= '<p  style="text-align:center;">Bitte überprüfen und publizieren:</p>';
    $body .= '<a href="'.$link.'"><div style="padding: 10px 20px; background-color:#942F6D; color:white; text-align:center;">Direkt zum neuen Beitrag -></div></a>';
    $body .= '</div>';
    
    // send email
    wp_mail($to, $subject, $body, $headers );
  }
}
add_action( 'acf/save_post', 'lh_acf_save_post', 10, 1 );


/*-------------------------------------------------------------*/
/*---------------------DISABLE COMMENTS------------------------*/
/*-------------------------------------------------------------*/
add_action('admin_init', function () {
  // Redirect any user trying to access comments page
  global $pagenow;
   
  if ($pagenow === 'edit-comments.php') {
      wp_safe_redirect(admin_url());
      exit;
  }

  // Remove comments metabox from dashboard
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

  // Disable support for comments and trackbacks in post types
  foreach (get_post_types() as $post_type) {
      if (post_type_supports($post_type, 'comments')) {
          remove_post_type_support($post_type, 'comments');
          remove_post_type_support($post_type, 'trackbacks');
      }
  }
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
  remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
  if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
  }
});


/*-------------------------------------------------------------*/
/*-------------------CUSTOM API ENDPOINT-----------------------*/
/*-------------------------------------------------------------*/

//require_once(dirname(__FILE__).'/extensions/api/post.api.php');

