<?
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
      'page_title'    => 'Collective Theme Options',
      'menu_title'    => 'Collective Theme',
      'menu_slug'     => 'collective-theme-settings',
      'capability'    => 'edit_posts',
      'redirect'      => false,
      'position'      => 1,
      'icon_url'      => 'dashicons-superhero-alt'
    ));
  
    acf_add_options_sub_page(array(
      'page_title'    => 'Theme Header Settings',
      'menu_title'    => 'Header',
      'menu_slug'     => 'theme-header-settings',
      'parent_slug'   => 'collective-theme-settings',
    ));
  
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'menu_slug'     => 'theme-footer-settings',
        'parent_slug'   => 'collective-theme-settings',
    ));
    
}


/*-------------------------------------------------------------*/
/*--------------------------- ACF -----------------------------*/
/*-------------------------------------------------------------*/

//check directory ./acf for files

$acfFolder = opendir(dirname(__FILE__).'/acf');
if ( $acfFolder ) {
    while (($entry = readdir($acfFolder)) !== FALSE  ) {
      if($entry[0] !== '.'){
        require_once( dirname(__FILE__).'/acf/'.$entry );
      }
    }
}
closedir($acfFolder);