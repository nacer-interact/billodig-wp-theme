<?php
/**
 * Nav menu walkers.
 *
 * They reproduce the theme's existing header/footer markup so a menu built in
 * Appearance > Menus looks identical to the built-in default menu.
 *
 * Bilingual labels: the menu item's "Navigation Label" is the English text and
 * its "Description" field is the Chinese text. (If the Description box is not
 * visible in Appearance > Menus, enable it under Screen Options at the top.)
 *
 * @package Billodig
 */

/**
 * Whether a menu item should render in its "active" state.
 *
 * Besides the classes WordPress adds, this keeps parity with the default menu:
 * the Products & Services item stays active on every product page, and News &
 * Events stays active on single news posts.
 *
 * @param WP_Post $item Menu item.
 * @return bool
 */
function billodig_menu_item_is_active( $item ) {
	$active_classes = array( 'current-menu-item', 'current-menu-ancestor', 'current-menu-parent', 'current_page_item', 'current_page_ancestor' );
	if ( array_intersect( $active_classes, (array) $item->classes ) ) {
		return true;
	}

	if ( 'post_type' === $item->type && 'page' === $item->object ) {
		$slug = get_post_field( 'post_name', (int) $item->object_id );
		if ( 'products-services' === $slug && billodig_is_products_area() ) {
			return true;
		}
		if ( 'news-events' === $slug && is_singular( 'post' ) ) {
			return true;
		}
	}

	return false;
}

/**
 * Header menu: top-level items become .navitem blocks, children go in .navdrop.
 */
class Billodig_Walker_Nav extends Walker_Nav_Menu {

	/**
	 * Open the dropdown wrapper.
	 *
	 * @param string   $output Output so far.
	 * @param int      $depth  Depth of the items inside.
	 * @param stdClass $args   Menu arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		$output .= '<div class="navdrop">';
	}

	/**
	 * Close the dropdown wrapper.
	 *
	 * @param string   $output Output so far.
	 * @param int      $depth  Depth of the items inside.
	 * @param stdClass $args   Menu arguments.
	 */
	public function end_lvl( &$output, $depth = 0, $args = null ) {
		$output .= '</div>';
	}

	/**
	 * Print one menu item.
	 *
	 * @param string   $output Output so far.
	 * @param WP_Post  $item   Menu item.
	 * @param int      $depth  Depth of the item.
	 * @param stdClass $args   Menu arguments.
	 * @param int      $id     Item id.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$active = billodig_menu_item_is_active( $item );
		$title  = apply_filters( 'the_title', $item->title, $item->ID );
		$extra  = '';
		if ( ! empty( $item->target ) ) {
			$extra .= ' target="' . esc_attr( $item->target ) . '"';
		}
		if ( ! empty( $item->xfn ) ) {
			$extra .= ' rel="' . esc_attr( $item->xfn ) . '"';
		}

		$label = '<span class="en">' . esc_html( $title ) . '</span>';
		if ( '' !== trim( (string) $item->description ) ) {
			$label .= '<span class="zh">' . esc_html( $item->description ) . '</span>';
		}

		if ( 0 === $depth ) {
			$output .= '<div class="navitem' . ( $active ? ' active' : '' ) . '">';
			$output .= '<a class="navlink' . ( $active ? ' active' : '' ) . '" href="' . esc_url( $item->url ) . '"' . $extra . '>' . $label . '</a>';
		} else {
			$output .= '<a href="' . esc_url( $item->url ) . '"' . $extra . '>' . $label . '</a>';
		}
	}

	/**
	 * Close a top-level item.
	 *
	 * @param string   $output Output so far.
	 * @param WP_Post  $item   Menu item.
	 * @param int      $depth  Depth of the item.
	 * @param stdClass $args   Menu arguments.
	 */
	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		if ( 0 === $depth ) {
			$output .= '</div>';
		}
	}
}

/**
 * Footer menu: a flat list of plain links.
 */
class Billodig_Walker_Footer_Nav extends Walker_Nav_Menu {

	/**
	 * Print one link.
	 *
	 * @param string   $output Output so far.
	 * @param WP_Post  $item   Menu item.
	 * @param int      $depth  Depth of the item.
	 * @param stdClass $args   Menu arguments.
	 * @param int      $id     Item id.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$title   = apply_filters( 'the_title', $item->title, $item->ID );
		$output .= '<a href="' . esc_url( $item->url ) . '">' . esc_html( $title ) . '</a>';
	}

	/**
	 * No closing markup.
	 *
	 * @param string   $output Output so far.
	 * @param WP_Post  $item   Menu item.
	 * @param int      $depth  Depth of the item.
	 * @param stdClass $args   Menu arguments.
	 */
	public function end_el( &$output, $item, $depth = 0, $args = null ) {}
}
