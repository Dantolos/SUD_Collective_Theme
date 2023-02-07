<?php 
function cptui_register_my_cpts_event() {

/**
 * Post Type: Events.
 */

$labels = [
    "name" => esc_html__( "Events", "SUD_Theme" ),
    "singular_name" => esc_html__( "Event", "SUD_Theme" ),
    "menu_name" => esc_html__( "Events", "SUD_Theme" ),
    "all_items" => esc_html__( "All Events", "SUD_Theme" ),
    "add_new" => esc_html__( "Add new", "SUD_Theme" ),
    "add_new_item" => esc_html__( "Add new Event", "SUD_Theme" ),
    "edit_item" => esc_html__( "Edit Event", "SUD_Theme" ),
    "new_item" => esc_html__( "New Event", "SUD_Theme" ),
    "view_item" => esc_html__( "View Event", "SUD_Theme" ),
    "view_items" => esc_html__( "View Events", "SUD_Theme" ),
    "search_items" => esc_html__( "Search Events", "SUD_Theme" ),
    "not_found" => esc_html__( "No Events found", "SUD_Theme" ),
    "not_found_in_trash" => esc_html__( "No Events found in trash", "SUD_Theme" ),
    "parent" => esc_html__( "Parent Event:", "SUD_Theme" ),
    "featured_image" => esc_html__( "Featured image for this Event", "SUD_Theme" ),
    "set_featured_image" => esc_html__( "Set featured image for this Event", "SUD_Theme" ),
    "remove_featured_image" => esc_html__( "Remove featured image for this Event", "SUD_Theme" ),
    "use_featured_image" => esc_html__( "Use as featured image for this Event", "SUD_Theme" ),
    "archives" => esc_html__( "Event archives", "SUD_Theme" ),
    "insert_into_item" => esc_html__( "Insert into Event", "SUD_Theme" ),
    "uploaded_to_this_item" => esc_html__( "Upload to this Event", "SUD_Theme" ),
    "filter_items_list" => esc_html__( "Filter Events list", "SUD_Theme" ),
    "items_list_navigation" => esc_html__( "Events list navigation", "SUD_Theme" ),
    "items_list" => esc_html__( "Events list", "SUD_Theme" ),
    "attributes" => esc_html__( "Events attributes", "SUD_Theme" ),
    "name_admin_bar" => esc_html__( "Event", "SUD_Theme" ),
    "item_published" => esc_html__( "Event published", "SUD_Theme" ),
    "item_published_privately" => esc_html__( "Event published privately.", "SUD_Theme" ),
    "item_reverted_to_draft" => esc_html__( "Event reverted to draft.", "SUD_Theme" ),
    "item_scheduled" => esc_html__( "Event scheduled", "SUD_Theme" ),
    "item_updated" => esc_html__( "Event updated.", "SUD_Theme" ),
    "parent_item_colon" => esc_html__( "Parent Event:", "SUD_Theme" ),
];

$args = [
    "label" => esc_html__( "Events", "SUD_Theme" ),
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
    "hierarchical" => true,
    "can_export" => false,
    "rewrite" => [ "slug" => "event", "with_front" => true ],
    "query_var" => true,
    "menu_icon" => "dashicons-tickets-alt",
    "supports" => [ "title" ],
    "show_in_graphql" => false,
];

register_post_type( "event", $args );
}

add_action( 'init', 'cptui_register_my_cpts_event' );
