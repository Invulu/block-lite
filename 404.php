<?php
/**
 * This page template is used to display a 404 error message.
 *
 * @package Block Lite
 * @since Block Lite 1.0
 */

get_header(); ?>

<!-- BEGIN .row -->
<div class="row">

	<!-- BEGIN .content -->
	<div class="content">

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>

		<!-- BEGIN .eleven columns -->
		<section class="eleven columns">

			<!-- BEGIN .entry-content -->
			<article class="entry-content">

				<?php get_template_part( 'content/content', 'none' ); ?>

			<!-- END .entry-content -->
			</article>

		<!-- END .eleven columns -->
		</section>

		<!-- BEGIN .five columns -->
		<section class="five columns">

			<?php get_sidebar(); ?>

		<!-- END .five columns -->
		</section>

	<?php } else { ?>

		<!-- BEGIN .sixteen columns -->
		<section class="sixteen columns">

			<!-- BEGIN .entry-content -->
			<article class="entry-content">

				<h1><?php esc_html_e( 'Not Found, Error 404', 'block-lite' ); ?></h1>
				<p><?php esc_html_e( 'The page you are looking for no longer exists.', 'block-lite' ); ?></p>

			<!-- END .entry-content -->
			</article>

		<!-- END .sixteen columns -->
		</section>

	<?php } ?>

	<!-- END .content -->
	</div>

<!-- END .row -->
</div>

<?php get_footer(); ?>
