<?php
/**
 * This template is used to display author information, when clicking on an authors name.
 *
 * @package Block Lite
 * @since Block Lite 1.0
 */

get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .content -->
		<div class="content">

		<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>

			<!-- BEGIN .eleven columns -->
			<section class="eleven columns">

				<?php get_template_part( 'content/author', 'page' ); ?>

			<!-- END eleven columns -->
			</section>

			<!-- BEGIN .five columns -->
			<section class="five columns">

				<?php get_sidebar(); ?>

			<!-- END .five columns -->
			</section>

		<?php } else { ?>

			<!-- BEGIN .sixteen columns -->
			<section class="sixteen columns">

				<?php get_template_part( 'content/author', 'page' ); ?>

			<!-- END sixteen columns -->
			</section>

		<?php } ?>

		<!-- END .content -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>
