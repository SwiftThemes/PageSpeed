<?php
global $helium;

if ( $helium->is_mobile() ) {
	$suffix = '_mobile';
} else {
	$suffix = '';
}
$img_width = absint( 1200 / 3 );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf pull-left pad10' ); ?> style="width:33.33%">
    <div class="pad10 card cf">
        <a href="<?php the_permalink(); ?>">
			<?php
			the_post_thumbnail( array( $img_width, $img_width ), array( 'class' => 'alignleft pad-b' ) );
			?></a>


			<?php
			the_title( '<h4><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
			?>
        <div>

	    <?php
	    $pieces = explode(" ", get_the_excerpt());

	    echo implode(" ", array_splice($pieces, 0, 18));?>
        </div>

    </div>
</article><!-- #post-## -->
