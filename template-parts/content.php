<?php
global $helium;
if ( $helium->is_mobile() ) {
	$suffix = '_mobile';
} else {
	$suffix = '';
}
$is_full_length = $wp_query->current_post == 0 && is_front_page() && !get_theme_mod( 'use_masonry', false ) && get_theme_mod( 'show_first_post_in_full', false ) || ! get_theme_mod( 'home_show_excerpts', true ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?>>


	<?php
	if ( ! $is_full_length && 'aligncenter' === get_theme_mod( 'home_thumb_alignment' . $suffix, 'alternate' ) ) {
		helium_show_thumbnail( 'home_thumb' );
	}

	?>

    <header class="entry-header">

		<?php if ( get_theme_mod( 'home_meta_above_title' ) ): ?>
            <div class="entry-meta meta above-title">
				<?php helium_generate_post_meta( get_theme_mod( 'home_meta_above_title' ) ) ?>
            </div>
		<?php endif ?>
		<?php
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		?>
		<?php if ( get_theme_mod( 'home_meta_below_title' ) ): ?>
            <div class="entry-meta meta below-title">
				<?php helium_generate_post_meta( get_theme_mod( 'home_meta_below_title' ) ) ?>
            </div>
		<?php endif ?>
    </header><!-- .entry-header -->

	<?php
	if ( ! $is_full_length &&
	     'aligncenter' !== get_theme_mod( 'home_thumb_alignment' . $suffix, 'alternate' ) ) {
		helium_show_thumbnail( 'home_thumb' );
	}
	?>

    <div class="entry-content">
		<?php
		/* translators: %s: Name of current post */
		if ( $is_full_length ) {
			the_content();
		} else {
			the_excerpt();
		}
		?>
        <div class="clear"></div>
		<?php
		wp_link_pages( array(
			'before'      => '<div class="page-links">' . __( 'Pages:', 'page-speed' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) );
		?>
    </div><!-- .entry-content -->
    <div class="clear"></div>


	<?php
	$default = array(
		array( 'key' => 'Tags', 'value' => __( 'Tagged with', 'page-speed' ) . '&nbsp;' ),
	);
	$meta    = get_theme_mod( 'home_meta_after_body', $default );
	if ( 1 == count( $meta ) && $meta[0]['key'] == 'Line' ) {
		echo '<hr class="separator">';
	} else {
		?>


		<?php helium_generate_post_meta( $meta, '<footer class="entry-footer">
            <div class="inner footer meta">', '</div>
        </footer>' ) ?>

	<?php }
	?>
</article><!-- #post-## -->
