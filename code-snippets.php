<?php
Author: Hubbard Labs
/**
 * Plugin Name: HubbardLabs - Code Snippets
 * Plugin URI: https://github.com/hubbardlabs/code-snippets/
 * Description: A simple plugin to create a code snippets Custom Post Type.
 * Version: 0.0.1
 * Requires at least: 4.0
 * Requires PHP: 7.0
 * Author: Hubbard Labs
 * Author URI: https://hubbardlabs.com
 * License: GPL-2.0+
 * Update URI: https://github.com/hubbardlabs/code-snippets/
 * Text Domain: hubbardlabs
 * Domain Path: /languages
 *
 * @package hlabs-code-snippets
 */

if ( ! class_exists( 'HLabs_Code_Snippets' ) ) {

	/**
	 * Undocumented class
	 */
	class HLabs_Code_Snippets {

		/**
		 * Undocumented function
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'create_cpt' ), 0 );
			add_action( 'init', array( $this, 'create_categories' ), 0 );
			add_action( 'init', array( $this, 'create_tags' ), 0 );
		}

		/**
		 * Undocumented function
		 *
		 * @return void
		 */
		public function create_cpt() {

			$labels  = array(
				'name'                  => _x( 'Code Snippets', 'Post Type General Name', 'hubbardlabs' ),
				'singular_name'         => _x( 'Code Snippet', 'Post Type Singular Name', 'hubbardlabs' ),
				'menu_name'             => __( 'Code Snippets', 'hubbardlabs' ),
				'name_admin_bar'        => __( 'Code Snippet', 'hubbardlabs' ),
				'archives'              => __( 'Code Snippet Archives', 'hubbardlabs' ),
				'attributes'            => __( 'Snippet Attributes', 'hubbardlabs' ),
				'parent_item_colon'     => __( 'Parent Snippet:', 'hubbardlabs' ),
				'all_items'             => __( 'All Snippets', 'hubbardlabs' ),
				'add_new_item'          => __( 'Add New Snippet', 'hubbardlabs' ),
				'add_new'               => __( 'Add Snippet', 'hubbardlabs' ),
				'new_item'              => __( 'New Snippet', 'hubbardlabs' ),
				'edit_item'             => __( 'Edit Snippet', 'hubbardlabs' ),
				'update_item'           => __( 'Update Snippet', 'hubbardlabs' ),
				'view_item'             => __( 'View Snippet', 'hubbardlabs' ),
				'view_items'            => __( 'View Snippets', 'hubbardlabs' ),
				'search_items'          => __( 'Search Snippets', 'hubbardlabs' ),
				'not_found'             => __( 'Not found', 'hubbardlabs' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'hubbardlabs' ),
				'featured_image'        => __( 'Featured Image', 'hubbardlabs' ),
				'set_featured_image'    => __( 'Set featured image', 'hubbardlabs' ),
				'remove_featured_image' => __( 'Remove featured image', 'hubbardlabs' ),
				'use_featured_image'    => __( 'Use as featured image', 'hubbardlabs' ),
				'insert_into_item'      => __( 'Insert into Snippet', 'hubbardlabs' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Snippet', 'hubbardlabs' ),
				'items_list'            => __( 'Snippets list', 'hubbardlabs' ),
				'items_list_navigation' => __( 'Snippets list navigation', 'hubbardlabs' ),
				'filter_items_list'     => __( 'Filter Snippets list', 'hubbardlabs' ),
			);
			$rewrite = array(
				'slug'       => 'code',
				'with_front' => false,
				'pages'      => true,
				'feeds'      => true,
			);
			$args    = array(
				'label'               => __( 'Code Snippet', 'hubbardlabs' ),
				'description'         => __( 'A code Snippet', 'hubbardlabs' ),
				'labels'              => $labels,
				'supports'            => array( 'title', 'editor', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'post-formats' ),
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'menu_position'       => 5,
				'show_in_admin_bar'   => true,
				'show_in_nav_menus'   => true,
				'can_export'          => true,
				'has_archive'         => true,
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'query_var'           => 'snippets',
				'rewrite'             => $rewrite,
				'capability_type'     => 'page',
				'show_in_rest'        => true,
				'rest_base'           => 'snippets',
			);
			register_post_type( 'hlabs-snippet', $args );
		}

		/**
		 * Undocumented function
		 *
		 * @return void
		 */
		public function create_categories() {

			$labels  = array(
				'name'                       => _x( 'Categories', 'Taxonomy General Name', 'hubbardlabs' ),
				'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'hubbardlabs' ),
				'menu_name'                  => __( 'Categories', 'hubbardlabs' ),
				'all_items'                  => __( 'All Categories', 'hubbardlabs' ),
				'parent_item'                => __( 'Parent Category', 'hubbardlabs' ),
				'parent_item_colon'          => __( 'Parent Category:', 'hubbardlabs' ),
				'new_item_name'              => __( 'New Category Name', 'hubbardlabs' ),
				'add_new_item'               => __( 'Add New Category', 'hubbardlabs' ),
				'edit_item'                  => __( 'Edit Category', 'hubbardlabs' ),
				'update_item'                => __( 'Update Category', 'hubbardlabs' ),
				'view_item'                  => __( 'View Category', 'hubbardlabs' ),
				'separate_items_with_commas' => __( 'Separate Categories with commas', 'hubbardlabs' ),
				'add_or_remove_items'        => __( 'Add or remove categories', 'hubbardlabs' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'hubbardlabs' ),
				'popular_items'              => __( 'Popular categories', 'hubbardlabs' ),
				'search_items'               => __( 'Search categories', 'hubbardlabs' ),
				'not_found'                  => __( 'Not Found', 'hubbardlabs' ),
				'no_terms'                   => __( 'No categories', 'hubbardlabs' ),
				'items_list'                 => __( 'Categories list', 'hubbardlabs' ),
				'items_list_navigation'      => __( 'Categories list navigation', 'hubbardlabs' ),
			);
			$rewrite = array(
				'slug'         => 'code/categories',
				'with_front'   => false,
				'hierarchical' => true,
			);
			$args    = array(
				'labels'            => $labels,
				'hierarchical'      => true,
				'public'            => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud'     => true,
				'query_var'         => 'code-category',
				'rewrite'           => $rewrite,
				'show_in_rest'      => true,
			);
			register_taxonomy( 'hlabs-code-category', array( 'hlabs-snippet' ), $args );
		}

		/**
		 * Undocumented function
		 *
		 * @return void
		 */
		public function create_tags() {

			$labels  = array(
				'name'                       => _x( 'Tags', 'Taxonomy General Name', 'hubbardlabs' ),
				'singular_name'              => _x( 'Tag', 'Taxonomy Singular Name', 'hubbardlabs' ),
				'menu_name'                  => __( 'Tags', 'hubbardlabs' ),
				'all_items'                  => __( 'All Tags', 'hubbardlabs' ),
				'parent_item'                => __( 'Parent Tag', 'hubbardlabs' ),
				'parent_item_colon'          => __( 'Parent Tag:', 'hubbardlabs' ),
				'new_item_name'              => __( 'New Tag Name', 'hubbardlabs' ),
				'add_new_item'               => __( 'Add New Tag', 'hubbardlabs' ),
				'edit_item'                  => __( 'Edit Tag', 'hubbardlabs' ),
				'update_item'                => __( 'Update Tag', 'hubbardlabs' ),
				'view_item'                  => __( 'View Tag', 'hubbardlabs' ),
				'separate_items_with_commas' => __( 'Separate tags with commas', 'hubbardlabs' ),
				'add_or_remove_items'        => __( 'Add or remove tags', 'hubbardlabs' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'hubbardlabs' ),
				'popular_items'              => __( 'Popular tags', 'hubbardlabs' ),
				'search_items'               => __( 'Search tags', 'hubbardlabs' ),
				'not_found'                  => __( 'Not Found', 'hubbardlabs' ),
				'no_terms'                   => __( 'No tags', 'hubbardlabs' ),
				'items_list'                 => __( 'Tags list', 'hubbardlabs' ),
				'items_list_navigation'      => __( 'Tags list navigation', 'hubbardlabs' ),
			);
			$rewrite = array(
				'slug'         => 'code/tags',
				'with_front'   => false,
				'hierarchical' => false,
			);
			$args    = array(
				'labels'            => $labels,
				'hierarchical'      => false,
				'public'            => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud'     => true,
				'query_var'         => 'code-tag',
				'rewrite'           => $rewrite,
				'show_in_rest'      => true,
			);
			register_taxonomy( 'hlabs-code-tag', array( 'hlabs-snippet' ), $args );
		}
	}

	new HLabs_Code_Snippets();

}
