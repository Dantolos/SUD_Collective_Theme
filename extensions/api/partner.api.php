
<?php

//CALLBACK DATA
function partner_api($request) {
    $after = $request->get_param( 'after' );
    $before = $request->get_param( 'before' );

    //query
    $args = array(
        'post_type' => 'partner',
        'numberposts' => -1
   );

    $query = new WP_Query( $args );
    $posts = $query->get_posts();

    $data = array();

    foreach ( $posts as $post ) {
        $published = str_replace( ' ', 'T', $post->post_date);
        $updated = str_replace( ' ', 'T', $post->post_date);
      
        $terms = [];

        $partner_categories = wp_get_post_terms($post->ID, 'partner_category');

        if( !empty($partner_categories) ){
            foreach( $partner_categories as $category ){
                    $terms['partner_categories'][$category->slug] = [$category->term_id, $category->name];
            }
        }

        $ressources = wp_get_post_terms($post->ID, 'ressources');

        if( !empty($ressources) ){
            foreach( $ressources as $ressource ){
                    $terms['ressources'][$ressource->slug] = [$ressource->term_id, $ressource->name];
            }
        }

        $type_of_businesses = wp_get_post_terms($post->ID, 'type_of_business');

        if( !empty($type_of_businesses) ){
            foreach( $type_of_businesses as $type_of_business ){
                    $terms['type_of_business'][$type_of_business->slug] = [$type_of_business->term_id, $type_of_business->name];
            }
        }

        $stages = wp_get_post_terms($post->ID, 'stage');

        if( !empty($stages) ){
            foreach( $stages as $stage ){
                    $terms['stage'][$stage->slug] = [$stage->term_id, $stage->name];
            }
        }

        $data[] = array(
            'id' => $post->ID,
            'company' => get_field('company', $post->ID),
            'description' => get_field('description', $post->ID),
            'logo' => get_field('logo', $post->ID)['url'],
            'website' => get_field('website', $post->ID),
            'terms' => $terms,
            
            //'raw' => parse_blocks($post->post_content), //TO DELETE
        );
    }
    return rest_ensure_response( $data );
}

//HOOK
add_action( 'rest_api_init', function () {
    register_rest_route( 'sud/v1', '/partner/', array(
        'methods' => 'GET',
        'callback' => 'partner_api',
        'args' => array(
            'after' => array(
                'type' => 'string',
                'description' => 'Limit results to those after a certain date and time (ISO8601 format)',
                'required' => false,
            ),
            'before' => array(
                'type' => 'string',
                'description' => 'Limit results to those before a certain date and time (ISO8601 format)',
                'required' => false,
            ),
        ),
    ) );
} );