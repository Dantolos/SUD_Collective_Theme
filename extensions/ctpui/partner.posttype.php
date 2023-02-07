<?php
function cptui_register_my_cpts_partner() {

/**
 * Post Type: Partners.
 */

$labels = [
    "name" => esc_html__( "Partners", "SUD_Theme" ),
    "singular_name" => esc_html__( "Partner", "SUD_Theme" ),
    "menu_name" => esc_html__( "Partners", "SUD_Theme" ),
    "all_items" => esc_html__( "All Partners", "SUD_Theme" ),
    "add_new" => esc_html__( "Add new", "SUD_Theme" ),
    "add_new_item" => esc_html__( "Add new Partner", "SUD_Theme" ),
    "edit_item" => esc_html__( "Edit Partner", "SUD_Theme" ),
    "new_item" => esc_html__( "New Partner", "SUD_Theme" ),
    "view_item" => esc_html__( "View Partner", "SUD_Theme" ),
    "view_items" => esc_html__( "View Partners", "SUD_Theme" ),
    "search_items" => esc_html__( "Search Partners", "SUD_Theme" ),
    "not_found" => esc_html__( "No Partners found", "SUD_Theme" ),
    "not_found_in_trash" => esc_html__( "No Partners found in trash", "SUD_Theme" ),
    "parent" => esc_html__( "Parent Partner:", "SUD_Theme" ),
    "featured_image" => esc_html__( "Featured image for this Partner", "SUD_Theme" ),
    "set_featured_image" => esc_html__( "Set featured image for this Partner", "SUD_Theme" ),
    "remove_featured_image" => esc_html__( "Remove featured image for this Partner", "SUD_Theme" ),
    "use_featured_image" => esc_html__( "Use as featured image for this Partner", "SUD_Theme" ),
    "archives" => esc_html__( "Partner archives", "SUD_Theme" ),
    "insert_into_item" => esc_html__( "Insert into Partner", "SUD_Theme" ),
    "uploaded_to_this_item" => esc_html__( "Upload to this Partner", "SUD_Theme" ),
    "filter_items_list" => esc_html__( "Filter Partners list", "SUD_Theme" ),
    "items_list_navigation" => esc_html__( "Partners list navigation", "SUD_Theme" ),
    "items_list" => esc_html__( "Partners list", "SUD_Theme" ),
    "attributes" => esc_html__( "Partners attributes", "SUD_Theme" ),
    "name_admin_bar" => esc_html__( "Partner", "SUD_Theme" ),
    "item_published" => esc_html__( "Partner published", "SUD_Theme" ),
    "item_published_privately" => esc_html__( "Partner published privately.", "SUD_Theme" ),
    "item_reverted_to_draft" => esc_html__( "Partner reverted to draft.", "SUD_Theme" ),
    "item_scheduled" => esc_html__( "Partner scheduled", "SUD_Theme" ),
    "item_updated" => esc_html__( "Partner updated.", "SUD_Theme" ),
    "parent_item_colon" => esc_html__( "Parent Partner:", "SUD_Theme" ),
];

$args = [
    "label" => esc_html__( "Partners", "SUD_Theme" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "rest_namespace" => "wp/v2",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "can_export" => false,
    "rewrite" => [ "slug" => "partner", "with_front" => true ],
    "query_var" => true,
    "menu_icon" => "dashicons-admin-links",
    "supports" => [ "title" ],
    "show_in_graphql" => false,
];

register_post_type( "partner", $args );
}

add_action( 'init', 'cptui_register_my_cpts_partner' );
