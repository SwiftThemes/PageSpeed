<?php
/*
    Copyright 2009-2018  Satish Gandham  (email : hello@satishgandham.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License version 2,
    as published by the Free Software Foundation.

    You may NOT assume that you can use any other version of the GPL.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    The license for this software can likely be found here:
    http://www.gnu.org/licenses/gpl-2.0.html
 */

//$sc = 'add_shortcode';
//$sc( 'author', 'he_author' );
//$sc( 'cat', 'he_categories' );
//$sc( 'cats', 'he_categories' );
//$sc( 'tag', 'he_tags' );
//$sc( 'tags', 'he_tags' );
//$sc( 'date_published', 'he_published_date' );
//$sc( 'date_updated', 'he_updated_date' );
//$sc( 'tags', 'he_tags' );


/**
 * Print the author name or the author posts link depending on $attr['link'] value
 *
 * @param $attr array
 *
 * @return string
 */
function he_author( $attr ) {
	if ( isset( $attr['link'] ) && 'false' === $attr['link'] ) {
		return get_the_author();
	} else {
		return get_the_author_posts_link();
	}
}

/**
 * Print the list of categories
 *
 * @return string
 */
function he_categories( $attr, $content = null ) {
	if ( has_category() ) {
		return $content . get_the_category_list( ', ' );
	}

}

/**
 * Print the list of tags
 *
 * @return string
 */
function he_tags( $attr, $content = null ) {
	if ( has_tag() ) {
		return $content . get_the_tag_list( '<div class="tags">', ' ', '</div>' );
	}
}

/**
 * Print hyperlinked publish date
 * @todo Make link optional
 * @todo Refine html
 * @todo make human readable optional.
 *
 * @return string
 */
function he_published_date() {
	if ( ( current_time( 'timestamp', 1 ) - get_the_date( 'U' ) ) < 86400 ) {
		$date = human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) . ' ' . __( 'ago', 'page-speed');
	} else {
		$date = get_the_date();
	}

	$out = '<span class="date updated fa-clock-o"><a class="" href="' . esc_url( get_permalink() ) . '" title="' . esc_attr( get_the_time() ) . '" rel="bookmark">';
	$out .= '<time class="entry-date" datetime="' . esc_attr( get_the_date( 'c' ) ) . '">' . esc_html( $date ) . '</time></a></span> ';

	return $out;
}

/**
 * Print hyperlinked updated date
 * @todo Make link optional
 * @todo Refine html
 * @todo make human readable optional.
 *
 * @return string
 */
function he_updated_date() {
	if ( ( current_time( 'timestamp', 1 ) - get_the_modified_date( 'U' ) ) < 86400 ) {
		$date = human_time_diff( get_post_modified_time( 'U' ), current_time( 'timestamp' ) ) . ' ' . __( 'ago', 'page-speed');
	} else {
		$date = get_the_modified_date();
	}

	$out = '<span class="date updated fa-clock-o"><a href="' . esc_url( get_permalink() ) . '" title="' . esc_attr( get_post_modified_time() ) . '" rel="bookmark">';
	$out .= '<time class="entry-date" datetime="' . esc_attr( get_the_modified_date( 'c' ) ) . '">' . esc_html( $date ) . '</time></a></span> ';

	return $out;
}