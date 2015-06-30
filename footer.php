<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package arrisdesign
 */
?>

	</div><!-- #content -->
	
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="leftfootbar"></div>
		<div class="footcontanier">
			<?php get_sidebar('footer'); ?>
			<a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
