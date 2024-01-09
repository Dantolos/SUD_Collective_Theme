<?php

//CALLBACK DATA
function partner_api($request) {
    $after = $request->get_param( 'after' );
    $before = $request->get_param( 'before' );

    //query
    $args = array(
        'post_type' => 'partner',
        'posts_per_page' => -1
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
            foreach( $partner_categories as $key => $category ){
					$terms['partner_categories'][$key][id] = $category->term_id;
					$terms['partner_categories'][$key][name] = $category->name; 
					$terms['partner_categories'][$key][slug] = $category->slug;
            }
        }

        $ressources = wp_get_post_terms($post->ID, 'ressources');

        if( !empty($ressources) ){
            foreach( $ressources as $key => $ressource ){
					$terms['ressources'][$key][id] = $ressource->term_id;
					$terms['ressources'][$key][name] = $ressource->name;
					$terms['ressources'][$key][slug] = $ressource->slug;
            }
        }

        $type_of_businesses = wp_get_post_terms($post->ID, 'type_of_business');

        if( !empty($type_of_businesses) ){
            foreach( $type_of_businesses as $key => $type_of_business ){ 
					$terms['type_of_business'][$key][id] = $type_of_business->term_id;
					$terms['type_of_business'][$key][name] = $type_of_business->name;
					$terms['ressources'][$key][slug] = $ressource->slug;
            }
        }

        $stages = wp_get_post_terms($post->ID, 'stage');

        if( !empty($stages) ){
            foreach( $stages as $key => $stage ){
					$terms['stage'][$key][id] = $stage->term_id;
					$terms['stage'][$key][name] = $stage->name;
					$terms['stage'][$key][slug] = $stage->slug;
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