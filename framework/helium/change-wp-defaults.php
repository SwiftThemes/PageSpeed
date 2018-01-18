<?php
add_filter( 'comment_form_fields', 'he_move_comment_field_to_bottom' );

/**
 * Change the WordPress comemnt box default position
 *
 * @param $fields
 *
 * @return mixed
 */
if ( ! function_exists( 'he_move_comment_field_to_bottom' ) ) {
	function he_move_comment_field_to_bottom( $fields ) {
		$comment_field = $fields['comment'];
		unset( $fields['comment'] );

		$fields['comment'] = $comment_field;

		$commenter        = wp_get_current_commenter();
		$req              = get_option( 'require_name_email' );
		$aria_req         = ( $req ? " aria-required='true'" : '' );
		$html_req         = ( $req ? " required='required'" : '' );

		$fields['author'] = '<p class="comment-form-author">' . '<label for="author">' . __( 'Name','page-speed') . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' . '<input id="author" name="author" type="text" placeholder="' . __( 'Name','page-speed') . ( $req ? ' *' : '' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $aria_req . $html_req . ' /></p>';
		$fields['email']  = '<p class="comment-form-email"><label for="email">' . __( 'Email','page-speed') . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		                    '<input id="email" name="email" placeholder="' . __( 'Email address', 'page-speed') . ( $req ? ' *' : '' ) . '"' . ( 1 ? 'type="email"' : 'type="text"' ) . ' value="' . sanitize_text_field( $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes"' . $aria_req . $html_req . ' /></p>';
		$fields['url'] = '<p class="comment-form-url"><label for="url">' . __( 'Website','page-speed') . '</label> ' .
		                 '<input id="url"  placeholder="'.__('Your website url','page-speed').'" name="url" type="url" value="' . sanitize_text_field( $commenter['comment_author_url'] ) . '" size="30" maxlength="200" /></p>';

//		$fields['class_form'] = 'cf';
		return $fields;
	}
}

