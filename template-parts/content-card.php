<?php
global $helium;

if ( $helium->is_mobile() ) {
	$suffix = '_mobile';
} else {
	$suffix = '';
}
$img_width = absint( 1200 / 3 );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf alignleft pad10 col3 col' ); ?>>
    <div class="card cf">
        <a href="<?php the_permalink(); ?>">
			<?php
			the_post_thumbnail( array(
				$img_width,
				(int) ( $img_width / 1.618 )
			), array( 'class' => 'alignleft full' ) );
			?></a>


        <div class="pad-10 pad10">
			<?php
			the_title( '<h4><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
			$pieces = explode( " ", get_the_excerpt() );

			echo implode( " ", array_splice( $pieces, 0, 18 ) ); ?>
        </div>

    </div>
</article><!-- #post-## -->
