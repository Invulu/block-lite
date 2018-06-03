<?php
/**
 * The default sidebar template for our theme.
 * This template is used to display the sidebar on pages.
 *
 * @package Block Lite
 * @since Block Lite 1.0
 */

?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>

	<section class="sidebar">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</section>

<?php } ?>
