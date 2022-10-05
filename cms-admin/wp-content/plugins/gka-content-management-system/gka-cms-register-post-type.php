<?php

add_action( 'init', 'gka_cms_register_post_types');

// Funtion Register Custom Post Types
function gka_cms_register_post_types() {

    // Create Each Custom Post Type
    $post_types = array(
        // Home
        array(  'the_type'  => 'crest_of_alexandria',
                'single'    => 'Crest of Alexandria',
                'icon'      => 'dashicons-welcome-widgets-menus'
        ),
        array(  'the_type'  => 'preserve_westfields',
                'single'    => 'Preserve at Westfields',
                'icon'      => 'dashicons-welcome-widgets-menus'
        ),
        array(  'the_type'  => 'clarksburg_town',
                'single'    => 'Clarksburg Town Center',
                'icon'      => 'dashicons-welcome-widgets-menus'
        ),
        array(  'the_type'  => 'primrose_hill',
                'single'    => 'Primrose Hill',
                'icon'      => 'dashicons-welcome-widgets-menus'
        ),
        array(  'the_type'  => 'mateny_hill',
                'single'    => 'Mateny Hill',
                'icon'      => 'dashicons-welcome-widgets-menus'
        ),
        array(  'the_type'  => 'south-alex',
                'single'    => 'Towns at South Alex®',
                'icon'      => 'dashicons-welcome-widgets-menus'
        ),
        array(  'the_type'  => 'about_craftmark',
                'single'    => 'About Craftmark',
                'icon'      => 'dashicons-welcome-widgets-menus'
        )
    );

    // Register the All Custom type 
    foreach($post_types as $type) {

        $the_type = $type['the_type'];
        $singular = $type['single'];
        $icon     = $type['icon'];

        $labels = array(
            'name'               => $singular,
            'singular_name'      => $singular,
            'add_name'			 => 'Add New',
            'add_new_item'		 => 'Add New',
            'edit'				 => 'Edit',
            'edit_item'			 => 'Edit ' . $singular,
            'new_item'			 => 'New ' . $singular,
            'view'				 => 'View',
            'view_item'          => 'View ' . $singular,
            'search_items'       => 'Search ' .$singular,
            'not_found'          => 'No ' . $singular . ' found',
            'not_found_in_trash' => 'No ' . $singular . ' in Trash',
            'parent'  			 => 'Parent' . $singular
        );
        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'menu_position'      => 25,
            'supports' 			 => array( 'title' ),
            'taxonomies' 		 => array( '' ),
            'menu_icon'			 => $icon,
            'has_archive' 	     => true,
            'show_in_rest'       => true,
            'capability_type'	 => 'page'
        );

        register_post_type( $the_type, $args );
    }
	
}
