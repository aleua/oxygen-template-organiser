<?php
/**
 *
 * This file adds the Category taxonomy for Oxygen templates.
 *
 * @package   OxygenTemplateOrganiser
 * @link      https://github.com/wplit/oxygen-template-organiser/
 * @author    wplit
 * @license   GPL-2.0+
 */

/**
 * Register Template Category Taxonomy
 */
add_action( 'init', 'lit_otc_register_template_cat' );
function lit_otc_register_template_cat() {

	$labels = array(
		"name" => "Template Categories",
		"singular_name" => "Template Category",
	);

	$args = array(
		"label" => "Template Categories",
		"labels" => $labels,
		"public" => false,
		"publicly_queryable" => false,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => false,
		"show_in_nav_menus" => false,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'lit_oxygen_template_organiser', 'with_front' => false, ),
		"show_admin_column" => true,
		"show_in_rest" => false,
		"rest_base" => "lit_oxygen_template_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		);
    
	register_taxonomy( "lit_oxygen_template_category", array( "ct_template" ), $args );
}
