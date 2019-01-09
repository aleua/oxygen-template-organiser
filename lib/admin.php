<?php
/**
 *
 * This file adds the category filter to the admin & removes some unneccessary links.
 *
 * @package   OxygenTemplateOrganiser
 * @link      https://github.com/wplit/oxygen-template-organiser/
 * @author    wplit
 * @license   GPL-2.0+
 */

/**
 * Display Template Category Taxonomy dropdown
 */
add_action( 'restrict_manage_posts', 'lit_oto_filter_post_type_by_taxonomy' );
function lit_oto_filter_post_type_by_taxonomy() {
    
	global $typenow;
    
	$post_type = 'ct_template';
	$taxonomy  = 'lit_oxygen_template_category';
    
	if ($typenow == $post_type) {
            $selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
            $info_taxonomy = get_taxonomy($taxonomy);
            wp_dropdown_categories (
		  		array(
					'show_option_all' => "All {$info_taxonomy->label}",
					'taxonomy'        => $taxonomy,
					'name'            => $taxonomy,
					'orderby'         => 'name',
					'selected'        => $selected,
					'show_count'      => false,
					'hide_empty'      => false,
					'value_field' => 'slug'
				)
		  );
	  
	  };
}

/**
 * Filter posts by Template Category Taxonomy
 */
add_filter( 'parse_query', 'lit_oto_convert_id_to_term_in_query' );
function lit_oto_convert_id_to_term_in_query( $query ) {
    
	global $pagenow;
    
	$post_type = 'ct_template';
	$taxonomy  = 'lit_oxygen_template_category';
    
	$q_vars    = &$query->query_vars;
    
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}

/**
 * Remove 'view' from the list of actions available when viewing templates.
 */
add_filter( 'post_row_actions', 'lit_oto_template_row_actions', 10, 2);
function lit_oto_template_row_actions( $action ) {
    
    if ('ct_template' == get_post_type()) {
        unset($action['view']);
    }
    
    return $action;
}

/**
 * Remove 'view' from the list of actions available when viewing template categories
 */
add_filter( 'lit_oxygen_template_category_row_actions', 'lit_oto_template_cat_row_actions', 10, 2 );
function lit_oto_template_cat_row_actions( $action ) {
    
    unset($action['view']);
    
    return $action;
}
