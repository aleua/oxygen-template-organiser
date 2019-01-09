<?php
/**
 * Plugin Name: Oxygen Template Organiser
 * Plugin URI:  https://github.com/wplit/oxygen-template-organiser/
 * GitHub URI:  wplit/oxygen-template-organiser/
 * Description: Allows easy organisation of Oxygen templates in categories
 * Version:     1.0.0
 * Author:      David Browne
 * Author URI:  https://wplit.com/
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 2, as published by the
 * Free Software Foundation.  You may NOT assume that you can use any other
 * version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.
 *
 * @package    OxygenTemplateOrganiser
 * @since      1.0.0
 * @copyright  Copyright (c) 2019, David Browne
 * @license    GPL-2.0+
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

// Create Category for templates
require_once("lib/new-taxonomy.php");

// Add & Remove admin controls
require_once("lib/admin.php");

/**
 * Enqueue JS when on template page in admin
 */
add_action( 'admin_enqueue_scripts', 'lit_oto_templates_admin_scripts' );
function lit_oto_templates_admin_scripts( $hook ) {

	global $post;

	if( !is_object($post) || !property_exists($post, 'post_type') ) {
		return;
	}

    if ( $hook == 'post.php' || $hook == 'edit.php' ) {
        if ( 'ct_template' === $post->post_type ) {
        	wp_register_script('template_categories_edit_add', plugin_dir_url( __FILE__ ) .'assets/template-categories.js', array( 'jquery' ), '1.0.0', true );
            wp_enqueue_script(  'template_categories_edit_add' );
        }
    }
	
}
