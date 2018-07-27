<?php
global $helium;

if ( $helium->is_mobile() ) {
	$suffix = '_mobile';
} else {
	$suffix = '';
}
$img_width = absint( $width / 3 );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf pull-left pad10' ); ?> style="width:33.33%">
    <div class="pad10 card cf">
        <a href="<?php the_permalink(); ?>">
			<?php
			the_post_thumbnail( array( $img_width, $img_width ), array( 'class' => 'alignleft' ) );
			?></a>
			<?php
			the_title( '<h5><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );
			?>

    </div>
</article><!-- #post-## -->
