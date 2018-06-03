<?php
/**
 * This template is used to display archive posts, e.g. tag post indexes.
 * This template is also the fallback template to 'category.php'.
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

				<!-- BEGIN #infinite-container -->
				<div id="infinite-container">

					<?php get_template_part( 'content/loop', 'archive' ); ?>

				<!-- END #infinite-container -->
				</div>

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

				<!-- BEGIN #infinite-containerr -->
				<div id="infinite-container">

					<?php get_template_part( 'content/loop', 'archive' ); ?>

				<!-- END #infinite-container -->
				</div>

			<!-- END .sixteen columns -->
			</section>

		<?php } ?>

		<!-- END .content -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>
