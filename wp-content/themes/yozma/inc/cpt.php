<?php
	add_action( 'init', 'create_post_type' );
	function create_post_type() {
		register_post_type( 'subscriber', [
			'taxonomies'    => [],
			// post related taxonomies
			'label'         => null,
			'labels'        => [
				'name'              => 'Subscribers', // name for the post type.
				'singular_name'     => 'Subscriber', // name for single post of that type.
				'add_new'           => 'Add Subscriber', // to add a new post.
				'add_new_item'      => 'Adding Subscriber', // title for a newly created post in the admin panel.
				'edit_item'         => 'Edit Subscriber', // for editing post type.
				'new_item'          => 'New Subscriber', // new post's text.
				'view_item'         => 'See Subscriber', // for viewing this post type.
				'search_items'      => 'Search Subscriber', // search for these post types.
				'not_found'         => 'Not Found', // if search has not found anything.
				'parent_item_colon' => '', // for parents (for hierarchical post types).
				'menu_name'         => 'Subscribers', // menu name.
			],
			'description'   => '',
			'public'        => false,
			//'publicly_queryable'  => null, // depends on public
			//'exclude_from_search' => null, // depends on public
			'show_ui'               => true, // depends on public
			//'show_in_nav_menus'   => null, // depends on public
			'show_in_menu'  => null,
			// whether to in admin panel menu
			//'show_in_admin_bar'   => null, // depends on show_in_menu.
			'show_in_rest'  => null,
			// Add to REST API. WP 4.7.
			'rest_base'     => null,
			// $post_type. WP 4.7.
			'menu_position' => null,
			'menu_icon'     => 'dashicons-email',
			//'capability_type'   => 'post',
			//'capabilities'      => 'post', // Array of additional rights for this post type.
			//'map_meta_cap'      => null, // Set to true to enable the default handler for meta caps.
			'hierarchical'  => false,
			// [ 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats' ]
			'supports'      => [ 'title' ],
			'has_archive'   => false,
			'rewrite'       => false,
			'query_var'     => true,
		] );
	}