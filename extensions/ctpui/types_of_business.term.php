<?php
function cptui_register_my_taxes_type_of_business() {

/**
 * Taxonomy: Types of Business.
 */

$labels = [
     "name" => esc_html__( "Types of Business", "custom-post-type-ui" ),
     "singular_name" => esc_html__( "Type of Business", "custom-post-type-ui" ),
     "menu_name" => esc_html__( "Types of Business", "custom-post-type-ui" ),
     "all_items" => esc_html__( "Alle Types of Business", "custom-post-type-ui" ),
     "edit_item" => esc_html__( "Type of Business bearbeiten", "custom-post-type-ui" ),
     "view_item" => esc_html__( "Type of Business anzeigen", "custom-post-type-ui" ),
     "update_item" => esc_html__( "Name von Type of Business aktualisieren", "custom-post-type-ui" ),
     "add_new_item" => esc_html__( "Neue Type of Business hinzufügen", "custom-post-type-ui" ),
     "new_item_name" => esc_html__( "Neuer Type of Business Name", "custom-post-type-ui" ),
     "parent_item" => esc_html__( "Übergeordnet Type of Business", "custom-post-type-ui" ),
     "parent_item_colon" => esc_html__( "Übergeordnet Type of Business:", "custom-post-type-ui" ),
     "search_items" => esc_html__( "Types of Business durchsuchen", "custom-post-type-ui" ),
     "popular_items" => esc_html__( "Beliebte Types of Business", "custom-post-type-ui" ),
     "separate_items_with_commas" => esc_html__( "Types of Business mit Kommas trennen", "custom-post-type-ui" ),
     "add_or_remove_items" => esc_html__( "Types of Business hinzufügen oder entfernen", "custom-post-type-ui" ),
     "choose_from_most_used" => esc_html__( "Aus den am häufigsten verwendeten Types of Business auswählen", "custom-post-type-ui" ),
     "not_found" => esc_html__( "Keine Types of Business gefunden", "custom-post-type-ui" ),
     "no_terms" => esc_html__( "Keine Types of Business", "custom-post-type-ui" ),
     "items_list_navigation" => esc_html__( "Navigation der Types of Business-Liste", "custom-post-type-ui" ),
     "items_list" => esc_html__( "Types of Business-Liste", "custom-post-type-ui" ),
     "back_to_items" => esc_html__( "Back to Types of Business", "custom-post-type-ui" ),
     "name_field_description" => esc_html__( "The name is how it appears on your site.", "custom-post-type-ui" ),
     "parent_field_description" => esc_html__( "Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.", "custom-post-type-ui" ),
     "slug_field_description" => esc_html__( "The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.", "custom-post-type-ui" ),
     "desc_field_description" => esc_html__( "The description is not prominent by default; however, some themes may show it.", "custom-post-type-ui" ),
];


$args = [
     "label" => esc_html__( "Types of Business", "custom-post-type-ui" ),
     "labels" => $labels,
     "public" => true,
     "publicly_queryable" => true,
     "hierarchical" => false,
     "show_ui" => true,
     "show_in_menu" => true,
     "show_in_nav_menus" => true,
     "query_var" => true,
     "rewrite" => [ 'slug' => 'type_of_business', 'with_front' => true, ],
     "show_admin_column" => false,
     "show_in_rest" => true,
     "show_tagcloud" => false,
     "rest_base" => "type_of_business",
     "rest_controller_class" => "WP_REST_Terms_Controller",
     "rest_namespace" => "wp/v2",
     "show_in_quick_edit" => false,
     "sort" => false,
     "show_in_graphql" => false,
];
register_taxonomy( "type_of_business", [ "partner" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_type_of_business' );