<?php

$above_title_default   = array(
	array( 'key' => 'Cat', 'value' => __( 'Filed under', 'page-speed' ) . '&nbsp;' )
);
$below_title_default   = array(
	array( 'key' => 'Text', 'value' => __( 'Published by', 'page-speed' ) . '&nbsp;' ),
	array( 'key' => 'AuthorLink', 'value' => false ),
	array( 'key' => 'Text', 'value' => __( 'on', 'page-speed' ) . '&nbsp;' ),
	array( 'key' => 'Published', 'value' => false ),
	array( 'key' => 'Line', 'value' => false ),
);
$after_content_default = array(
	array( 'key' => 'Tags', 'value' => __( 'Tagged with', 'page-speed' ) . '&nbsp;' ),
);
global $helium;
if($helium->is_mobile()){
    $thumb_suffix='_mobile';
}else{
	$thumb_suffix='';

}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( 'above_title' == get_theme_mod( 'post_thumb_position'.$thumb_suffix, 'below_title' ) ) {
		helium_show_thumbnail( 'post_thumb' );
	} ?>

	<?php if ( ! get_post_meta( get_queried_object_id(), 'hide_page_title', true ) ): ?>
        <header class="entry-header">
			<?php if ( get_theme_mod( 'single_post_meta_above_title', $above_title_default ) ): ?>
                <div class="entry-meta meta above-title">
					<?php helium_generate_post_meta( get_theme_mod( 'single_post_meta_above_title', $above_title_default ) ) ?>
                </div>
			<?php endif ?>
			<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
			?>
			<?php if ( get_theme_mod( 'single_post_meta_below_title', $below_title_default ) ): ?>
                <div class="entry-meta meta below-title">
					<?php helium_generate_post_meta( get_theme_mod( 'single_post_meta_below_title', $below_title_default ) ) ?>
                </div>
			<?php endif ?>
        </header>

		<?php if ( 'below_title' == get_theme_mod( 'post_thumb_position'.$thumb_suffix, 'below_title' ) ) {
			helium_show_thumbnail( 'post_thumb' );
		} ?>
        <!-- .entry-header -->
	<?php endif ?>

    <div class="entry-content">
		<?php
		the_content( sprintf(
		/* translators: %s: Name of current post */
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'page-speed' ),
			get_the_title()
		) );
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

	<?php if ( get_theme_mod( 'single_post_meta_after_body', $after_content_default ) ): ?>
        <footer class="entry-footer">
            <div class="inner footer meta">
				<?php helium_generate_post_meta( get_theme_mod( 'single_post_meta_after_body', $after_content_default ) ) ?>
            </div>
        </footer>
	<?php endif; ?>
</article><!-- #post-## -->
