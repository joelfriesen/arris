<?php
/**
 *
 * @package arrisdesign
 */
?>


			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( is_active_sidebar( 'footer' ) ) { 
					dynamic_sidebar( 'footer'); 
				}
			?>