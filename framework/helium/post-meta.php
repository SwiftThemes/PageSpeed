<?php
/**
 * Created by Satish Gandham.
 * User: satish
 * Date: 29/12/17
 * Time: 1:32 AM
 */

//@todo Some unnecessary escaping?

function helium_generate_post_meta( $metas = array() ) {
	ob_start();
	$allowed_tags = wp_kses_allowed_html( 'post' );
	foreach ( $metas as $meta ) {


		switch ( $meta['key'] ) {
			case 'AuthorLink':
				echo get_the_author();
				echo '&nbsp';
				break;
			case 'AuthorPosts':
				echo get_the_author_posts_link();
				echo '&nbsp';
				break;
			case 'Text':
				echo wp_kses( $meta['value'], $allowed_tags );
				break;
			case 'Line':
				echo '<hr class="separator">';
				break;
			case 'Cat':
				if ( has_category() ) {
					echo wp_kses( $meta['value'], $allowed_tags ) . get_the_category_list( ', ' );
					echo '&nbsp';
				}
				break;
			case 'Tags':
				if ( has_tag() ) {
					echo wp_kses( $meta['value'], $allowed_tags ) . get_the_tag_list( '<div class="tags">', ' ', '</div>' );
					echo '&nbsp';

				}
				break;
			case 'Published':
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

			case 'Updated':
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
				if ( current_user_can( 'customize' ) ) {
					echo _e( 'Something went wrong, please contact support', 'page-speed' ) + '!!! #' + $meta['key'];
				}
				break;


		}
	}

	$content = ob_get_contents();
	ob_end_clean();

	echo $content;

}