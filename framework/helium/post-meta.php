<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 29/12/17
 * Time: 1:32 AM
 */

function helium_generate_post_meta( $metas = array() ) {
	ob_start();
	foreach ( $metas as $meta ) {


		foreach ( $meta as $key => $value ) {
			$key = $key;
		}

		switch ( $key ) {
			case 'author_link':
				echo get_the_author();
				echo '&nbsp';
				break;
			case 'author_posts':
				echo get_the_author_posts_link();
				echo '&nbsp';
				break;
			case 'text':
				echo $value;
				break;
			case 'seperator':
				echo '<hr class="separator">';
				break;
			case 'categories':
				if ( has_category() ) {
					echo $value . get_the_category_list( ', ' );
					echo '&nbsp';
				}
				break;
			case 'tags':
				if ( has_tag() ) {
					return $value . get_the_tag_list( '<div class="tags">', ' ', '</div>' );
				}
				break;
			case 'published':
				if ( ( current_time( 'timestamp', 1 ) - get_the_date( 'U' ) ) < 86400 ) {
					$date = human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) . ' ' . __( 'ago', 'page-speed' );
				} else {
					$date = get_the_date();
				}

				$out = '<span class="date updated fa-clock-o"><a class="" href="' . esc_url( get_permalink() ) . '" title="' . esc_attr( get_the_time() ) . '" rel="bookmark">';
				$out .= '<time class="entry-date" datetime="' . esc_attr( get_the_date( 'c' ) ) . '">' . esc_html( $date ) . '</time></a></span> ';
				echo $out;
				echo '&nbsp';
				break;

			case 'updated':
				if ( ( current_time( 'timestamp', 1 ) - get_the_modified_date( 'U' ) ) < 86400 ) {
					$date = human_time_diff( get_post_modified_time( 'U' ), current_time( 'timestamp' ) ) . ' ' . __( 'ago', 'page-speed' );
				} else {
					$date = get_the_modified_date();
				}

				$out = '<span class="date updated fa-clock-o"><a href="' . esc_url( get_permalink() ) . '" title="' . esc_attr( get_post_modified_time() ) . '" rel="bookmark">';
				$out .= '<time class="entry-date" datetime="' . esc_attr( get_the_modified_date( 'c' ) ) . '">' . esc_html( $date ) . '</time></a></span> ';

				echo $out;
				echo '&nbsp';
				break;
			default:
				echo $key;

		}
	}

	$content = ob_get_contents();
	ob_end_clean();

	echo $content;

}