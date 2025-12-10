<?php
// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define theme version (safe to run early)
$theme = wp_get_theme();
define( 'THEME_VERSION', $theme->Version );

require_once get_template_directory() . '/inc/walker.php';


/*-------------------------------------------------------------*/
/*------------------- THEME SETUP & SUPPORT -------------------*/
/*-------------------------------------------------------------*/

function sud_theme_setup() {
    // Theme supports
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );

    // Navigation menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'sud_theme' ),
        'footer'  => __( 'Footer Menu', 'sud_theme' )
    ));

    // Editor color palette
    add_theme_support( 'editor-color-palette', array(
        array( 'name' => esc_attr__( 'Primary', 'sud_theme' ), 'slug' => 'primary-color', 'color' => '#942F6D' ),
        array( 'name' => esc_attr__( 'Secondary', 'sud_theme' ), 'slug' => 'secondary-color', 'color' => '#7C70B1' ),
        array( 'name' => esc_attr__( 'Third', 'sud_theme' ), 'slug' => 'third-color', 'color' => '#C3B1D7' ),
        array( 'name' => esc_attr__( 'Dark', 'sud_theme' ), 'slug' => 'dark-color', 'color' => '#3C1438' ),
    ));
}
add_action( 'after_setup_theme', 'sud_theme_setup' );

/*-------------------------------------------------------------*/
/*---------------------- ASSET ENQUEUING ----------------------*/
/*-------------------------------------------------------------*/

function sud_enqueue_assets() {
    // Build assets (React/Vite)
    wp_enqueue_script( 'sud-main-js', get_theme_file_uri( '/build/index.js' ), array( 'wp-element' ), THEME_VERSION, true );
    wp_enqueue_style( 'sud-main-css', get_theme_file_uri( '/build/index.css' ), array(), THEME_VERSION );

    // Additional scripts
    $scripts = array(
        array( 'sud-navi-js', 'navigation.js' ),
        array( 'sud-anchor-js', 'inc/anchor.js' ),
        array( 'sud-partner-js', 'inc/partner.js' ),
        array( 'sud-main-2-js', 'main.js' ),
    );

    foreach ( $scripts as $script ) {
        wp_enqueue_script(
            $script[0],
            get_template_directory_uri() . '/src/scripts/' . $script[1],
            array( 'jquery' ),
            THEME_VERSION,
            true
        );
    }

    // Global variables
    $globals = array(
        'templateUrl' => get_template_directory_uri(),
        'sitename'    => get_bloginfo( 'name' ),
    );

    wp_enqueue_script(
            "gsap",
            get_template_directory_uri() . "/src/scripts/gsap/gsap.min.js",
            [],
            "1.0",
            true
        );
        wp_enqueue_script(
            "gsap-scroll",
            get_template_directory_uri() .
                "/src/scripts/gsap/ScrollTrigger.min.js",
            ["gsap"],
            "1.0",
            true
        );

    wp_localize_script( 'sud-main-js', 'sudGlobal', $globals );
    wp_localize_script( 'sud-partner-js', 'sudGlobal', $globals );
}
add_action( 'wp_enqueue_scripts', 'sud_enqueue_assets' );

// Frontend Dashicons
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'dashicons' );
});




/*-------------------------------------------------------------*/
/*--------------------- SAFE FILE LOADERS ---------------------*/
/*-------------------------------------------------------------*/

function sud_load_directory_files( $dir_path, $exclude_dot = true ) {
    if ( ! is_dir( $dir_path ) ) return;

    $files = glob( $dir_path . '/*.php' );
    foreach ( $files as $file ) {
        if ( $exclude_dot && basename( $file )[0] === '.' ) continue;
        require_once $file;
    }
}

add_action( 'init', function() {
    $theme_dir = dirname( __FILE__ );

    // Load theme options (safe early)
    require_once $theme_dir . '/theme/theme.config.php';

    // Load helpers
    sud_load_directory_files( $theme_dir . '/src/helper' );

    // Load components
    sud_load_directory_files( $theme_dir . '/src/components' );

    // Load CPT UI
    sud_load_directory_files( $theme_dir . '/extensions/ctpui' );

    // Load ACF extensions
    sud_load_directory_files( $theme_dir . '/extensions/acf' );

    // Load blocks

    // Register block scripts
    wp_register_script( 'sud-block-partner-grid', get_template_directory_uri() . '/extensions/blocks/partner-grid/partner-grid.js', array( 'jquery', 'acf' ) );
    wp_register_script( 'sud-block-program', get_template_directory_uri() . '/extensions/blocks/program/program.js', array( 'jquery', 'acf' ), false, true );

    // Custom API
    require_once $theme_dir . '/extensions/api/partner.api.php';
});

require_once dirname( __FILE__ ) . '/extensions/blocks/blocks-register.php';

/*-------------------------------------------------------------*/
/*---------------------- FILE TYPE SUPPORT --------------------*/
/*-------------------------------------------------------------*/

add_filter( 'wp_check_filetype_and_ext', 'sud_svgs_disable_real_mime_check', 10, 4 );
function sud_svgs_disable_real_mime_check( $data, $file, $filename, $mimes ) {
    $wp_filetype = wp_check_filetype( $filename, $mimes );
    return compact( 'ext', 'type', 'proper_filename' );
}

add_filter( 'upload_mimes', function( $mime_types ) {
    return array_merge( $mime_types, array(
        'svg'  => 'image/svg+xml',
        'eps'  => 'application/postscript',
        'json' => 'application/json',
        'obj'  => 'model/obj',
        'fbx'  => 'model/fbx',
    ));
});

/*-------------------------------------------------------------*/
/*---------------------- ADMIN CUSTOMIZATIONS -----------------*/
/*-------------------------------------------------------------*/

add_action( 'admin_head', 'sud_admin_favicon' );
function sud_admin_favicon() {
    $icon = get_field( 'icon', 'option' );
    if ( $icon && isset( $icon['url'] ) ) {
        echo '<link rel="icon" type="image/x-icon" href="' . esc_url( $icon['url'] ) . '" />';
    }
}

// Remove welcome panel
remove_action( 'welcome_panel', 'wp_welcome_panel' );

/*-------------------------------------------------------------*/
/*---------------------- FORM PROCESSING ----------------------*/
/*-------------------------------------------------------------*/

function sud_acf_save_post( $post_id ) {
    if ( get_post_type( $post_id ) === 'acf' ) return;

    $new_title = '';
    $new_slug  = '';
    $type      = '';

    switch ( get_post_type( $post_id ) ) {
        case 'event':
            $content = get_field( 'content', $post_id );
            $new_title = $content['title'] ?? '';
            break;
        case 'partner':
            $new_title = get_field( 'company', $post_id ) ?: '';
            $type = 'Partner';
            break;
        case 'contact':
            $new_title = trim( get_field( 'first_name', $post_id ) . ' ' . get_field( 'last_name', $post_id ) );
            $type = 'Contact';
            break;
    }

    if ( ! $new_title ) return;

    $new_slug = sanitize_title( $new_title );

    // Prevent infinite loop
    remove_action( 'acf/save_post', 'sud_acf_save_post' );

    wp_update_post( array(
        'ID'          => $post_id,
        'post_title'  => $new_title,
        'post_name'   => $new_slug,
    ));

    add_action( 'acf/save_post', 'sud_acf_save_post' );

    // Email notification for partner/event
    if ( in_array( get_post_type( $post_id ), array( 'partner', 'event' ) ) ) {
        $to      = 'mko@startupdays.ch';
        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'Cc: agi@livelearninglabs.ch'
        );
        $subject = sprintf( 'SUD Collective | New %s: %s', $type, $new_title );
        $link    = get_edit_post_link( $post_id );

        $body = sud_email_template( $type, $new_title, $link );
        wp_mail( $to, $subject, $body, $headers );
    }
}
add_action( 'acf/save_post', 'sud_acf_save_post', 10, 1 );

function sud_email_template( $type, $title, $link ) {
    return '<div style="padding:50px 40px;border-radius:30px;width:500px;display:flex;flex-direction:column;justify-content:center;align-items:center;background:#F4F4F4;color:#3C1438;">
        <h3 style="text-align:center;"><b>Ein neuer ' . esc_html( $type ) . '-Post wurde eingereicht.</b></h3>
        <p style="text-align:center;">Bitte überprüfen und publizieren:</p>
        <a href="' . esc_url( $link ) . '"><div style="padding:10px 20px;background:#942F6D;color:white;text-align:center;">Direkt zum neuen Beitrag -></div></a>
    </div>';
}

/*-------------------------------------------------------------*/
/*---------------------- DISABLE COMMENTS ---------------------*/
/*-------------------------------------------------------------*/

add_action( 'admin_init', 'sud_disable_comments_admin' );
function sud_disable_comments_admin() {
    global $pagenow;

    if ( $pagenow === 'edit-comments.php' ) {
        wp_safe_redirect( admin_url() );
        exit;
    }

    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );

    foreach ( get_post_types() as $post_type ) {
        if ( post_type_supports( $post_type, 'comments' ) ) {
            remove_post_type_support( $post_type, 'comments' );
            remove_post_type_support( $post_type, 'trackbacks' );
        }
    }
}

add_filter( 'comments_open', '__return_false', 20, 2 );
add_filter( 'pings_open', '__return_false', 20, 2 );
add_filter( 'comments_array', '__return_empty_array', 10, 2 );

add_action( 'admin_menu', function() {
    remove_menu_page( 'edit-comments.php' );
});

add_action( 'init', function() {
    if ( is_admin_bar_showing() ) {
        remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
    }
});

/*-------------------------------------------------------------*/
/*------------------------- AJAX NONCE -----------------------*/
/*-------------------------------------------------------------*/

add_action( 'wp_ajax_process_form_submission', 'sud_process_form_submission' );
function sud_process_form_submission() {
    if ( ! wp_verify_nonce( $_POST['my_nonce_field'] ?? '', 'my_form_nonce' ) ) {
        wp_die( 'Security check failed' );
    }
    // Process form here
    wp_die();
}
