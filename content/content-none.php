<?php
/**
 * This template is used when no content is present.
 *
 * @package Block Lite
 * @since Block Lite 1.0
 */

?>

<!-- BEGIN .no-results -->
<div class="no-results">

<?php if ( class_exists( 'Jetpack' ) && is_page_template( 'template-portfolio.php' ) && current_user_can( 'publish_posts' ) ) { ?>

	<h1><?php esc_html_e( 'No Projects Found', 'block-lite' ); ?></h1>
	<p><?php printf( wp_kses( __( '<a href="%1$s">Add New</a> Projects to display on this page template.', 'block-lite' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php?post_type=jetpack-portfolio' ) ) ); ?></p>

<?php } elseif ( ! class_exists( 'Jetpack' ) && is_page_template( 'template-portfolio.php' ) && current_user_can( 'publish_posts' ) ) { ?>

	<h1><?php esc_html_e( 'No Projects Found', 'block-lite' ); ?></h1>
	<p><?php printf( wp_kses( __( 'Projects can be added to the Portfolio page template one of two ways. Select a post category within the <a href="%1$s">Customizer</a>, or Install and Activate the <a href="%2$s">Jetpack</a> plugin and <a href="%3$s">Add New</a> Projects.', 'block-lite' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'customize.php?autofocus[section]=block_lite_templates_section' ) ), esc_url( admin_url( 'plugin-install.php?tab=search&s=jetpack' ) ), esc_url( admin_url( 'post-new.php?post_type=jetpack-portfolio' ) ) ); ?></p>

<?php } elseif ( class_exists( 'Jetpack' ) && is_page_template( 'template-testimonials.php' ) && current_user_can( 'publish_posts' ) ) { ?>

	<h1><?php esc_html_e( 'No Testimonials Found', 'block-lite' ); ?></h1>
	<p><?php printf( wp_kses( __( '<a href="%1$s">Add New</a> Testimonials to display on this page template.', 'block-lite' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php?post_type=jetpack-testimonial' ) ) ); ?></p>

<?php } elseif ( ! class_exists( 'Jetpack' ) && is_page_template( 'template-testimonials.php' ) && current_user_can( 'publish_posts' ) ) { ?>

	<h1><?php esc_html_e( 'No Testimonials Found', 'block-lite' ); ?></h1>
	<p><?php printf( wp_kses( __( 'Testimonials can be added to the Testimonials page template one of two ways. Select a post category within the <a href="%1$s">Customizer</a>, or Install and Activate the <a href="%2$s">Jetpack</a> plugin and <a href="%3$s">Add New</a> Testimonials.', 'block-lite' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'customize.php?autofocus[section]=block_lite_templates_section' ) ), esc_url( admin_url( 'plugin-install.php?tab=search&s=jetpack' ) ), esc_url( admin_url( 'post-new.php?post_type=jetpack-testimonial' ) ) ); ?></p>

<?php } else { ?>

	<h1><?php esc_html_e( 'No Results Found', 'block-lite' ); ?></h1>
	<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching will help.', 'block-lite' ); ?></p>
	<div class="no-result-search"><?php get_search_form(); ?></div>

<?php } ?>

<!-- END .no-results -->
</div>
