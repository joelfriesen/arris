<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package arrisdesign
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( (has_post_thumbnail()) && ( get_theme_mod( 'arrisdesign_page_img' )) ) : ?>
		<div class="entry-thumb">
			<?php the_post_thumbnail(); ?>
		</div>	
	<?php endif; ?>	
		
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content clearfix">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'arrisdesign' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'arrisdesign' ), '<span class="edit-link">', '</span>' ); ?>
</article><!-- #post-## -->
