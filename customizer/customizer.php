<?php
/**
 * Theme customizer with real-time update
 *
 * Very helpful: http://ottopress.com/2012/theme-customizer-part-deux-getting-rid-of-options-pages/
 *
 * @package Block Lite
 * @since Block Lite 1.0
 */

/**
 * Begin the customizer functions.
 *
 * @param array $wp_customize Returns classes and sanitized inputs.
 */
function block_lite_theme_customizer( $wp_customize ) {

	include( get_template_directory() . '/customizer/customizer-controls.php');

	include( get_template_directory() . '/customizer/customizer-sanitize.php');

	/**
	 * Render the site title for the selective refresh partial.
	 *
	 * @since Block Lite 1.0
	 * @see block_lite_customize_register()
	 *
	 * @return void
	 */
	function block_lite_customize_partial_blogname() {
		bloginfo( 'name' );
	}

	/**
	 * Render the site tagline for the selective refresh partial.
	 *
	 * @since Block Lite 1.0
	 * @see block_lite_customize_register()
	 *
	 * @return void
	 */
	function block_lite_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}

	/**
	 * Return an array of all categories.
	 */
	function block_lite_blog_categories() {
		$cats    = array();
		$cats[0] = esc_html__( 'All Categories', 'block-lite' );
		foreach ( get_categories() as $categories => $category ) {
			$cats[ $category->term_id ] = $category->name;
		}

		return $cats;
	}

	// Set site name and description text to be previewed in real-time.
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.site-title a',
			'container_inclusive' => false,
			'render_callback' => 'block_lite_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector' => '.site-description',
			'container_inclusive' => false,
			'render_callback' => 'block_lite_customize_partial_blogdescription',
		) );
	}

	/*
	-------------------------------------------------------------------------------------------------------
		Site Title Section
	-------------------------------------------------------------------------------------------------------
	*/

		// Navigation Align.
		$wp_customize->add_setting( 'block_lite_nav_align', array(
				'default' 					=> 'right',
				'sanitize_callback'	=> 'block_lite_sanitize_align',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'block_lite_nav_align', array(
				'type'			=> 'radio',
				'label' 		=> esc_html__( 'Navigation Alignment', 'block-lite' ),
				'section' 	=> 'title_tagline',
				'choices' 	=> array(
					'left' 		=> esc_html__( 'Left Align', 'block-lite' ),
					'center' 	=> esc_html__( 'Center Align', 'block-lite' ),
					'right' 	=> esc_html__( 'Right Align', 'block-lite' ),
				),
				'priority' => 20,
		) ) );

		// Site Description Align.
		$wp_customize->add_setting( 'block_lite_desc_align', array(
			'default'						=> 'center',
			'sanitize_callback'	=> 'block_lite_sanitize_align',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'block_lite_desc_align', array(
			'type' 		=> 'radio',
			'label' 	=> esc_html__( 'Logo & Description Alignment', 'block-lite' ),
			'section' => 'title_tagline',
			'choices' => array(
				'left' 		=> esc_html__( 'Left Align', 'block-lite' ),
				'center' 	=> esc_html__( 'Center Align', 'block-lite' ),
				'right' 	=> esc_html__( 'Right Align', 'block-lite' ),
			),
			'priority' => 25,
		) ) );

		/*
		-------------------------------------------------------------------------------------------------------
			Colors Section
		-------------------------------------------------------------------------------------------------------
		*/

		// Header Background.
		$wp_customize->add_setting( 'block_lite_colors_header', array(
			'default'						=> '#ffffff',
			'sanitize_callback'	=> 'sanitize_hex_color',
			'transport'					=> 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'block_lite_colors_header', array(
			'label'			=> esc_html__( 'Header Background Color', 'block-lite' ),
			'section'		=> 'colors',
			'settings'	=> 'block_lite_colors_header',
			'priority'	=> 20,
		) ) );

		// Footer Background Color.
		$wp_customize->add_setting( 'block_lite_colors_footer', array(
			'default'						=> '#f4f4f4',
			'sanitize_callback'	=> 'sanitize_hex_color',
			'transport'					=> 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'block_lite_colors_footer', array(
			'label'			=> esc_html__( 'Footer Background Color', 'block-lite' ),
			'section'		=> 'colors',
			'settings'	=> 'block_lite_colors_footer',
			'priority'	=> 30,
		) ) );

		/*
		-------------------------------------------------------------------------------------------------------
			Theme Options Panel
		-------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_panel( 'block_lite_theme_options', array(
			'priority'				=> 1,
			'capability'			=> 'edit_theme_options',
			'theme_supports'	=> '',
			'title'						=> esc_html__( 'Theme Options', 'block-lite' ),
			'description'			=> esc_html__( 'This panel allows you to customize specific areas of the theme.', 'block-lite' ),
		) );

		/*
		-------------------------------------------------------------------------------------------------------
			Layout Options
		-------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_section( 'block_lite_layout_section' , array(
			'title'			=> esc_html__( 'Layout', 'block-lite' ),
			'description' => esc_html__( 'Toggle the display and layout of various elements throughout the theme.', 'block-lite' ),
			'priority'	=> 104,
			'panel'			=> 'block_lite_theme_options',
		) );

		// Display Post Image Title Overlay.
		$wp_customize->add_setting( 'display_img_title_post', array(
			'default'						=> '1',
			'sanitize_callback'	=> 'block_lite_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'display_img_title_post', array(
			'label'			=> esc_html__( 'Overlay Post Title On Featured Image?', 'block-lite' ),
			'section'		=> 'block_lite_layout_section',
			'settings'	=> 'display_img_title_post',
			'type'			=> 'checkbox',
			'priority'	=> 80,
		) ) );

		// Display Page Image Title Overlay.
		$wp_customize->add_setting( 'display_img_title_page', array(
			'default'						=> '1',
			'sanitize_callback'	=> 'block_lite_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'display_img_title_page', array(
			'label'			=> esc_html__( 'Overlay Page Title On Featured Image?', 'block-lite' ),
			'section'		=> 'block_lite_layout_section',
			'settings'	=> 'display_img_title_page',
			'type'			=> 'checkbox',
			'priority'	=> 100,
		) ) );

		/*
		-------------------------------------------------------------------------------------------------------
			Footer Section
		-------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_section( 'block_lite_footer_section' , array(
			'title'				=> esc_html__( 'Footer', 'block-lite' ),
			'description' => esc_html__( 'Replace the footer text. The footer social media links can be added by creating a Social Menu in the Menus section.', 'block-lite' ),
			'priority'		=> 120,
		) );

		// Footer Text.
		$wp_customize->add_setting( 'block_lite_footer_text', array(
			'sanitize_callback'	=> 'sanitize_text_field',
			'transport'					=> 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'block_lite_footer_text', array(
			'label'			=> esc_html__( 'Footer Text', 'block-lite' ),
			'section'		=> 'block_lite_footer_section',
			'settings'	=> 'block_lite_footer_text',
			'type'			=> 'text',
			'priority'	=> 10,
		) ) );

}
add_action( 'customize_register', 'block_lite_theme_customizer' );

/**
 * Binds JavaScript handlers to make Customizer preview reload changes
 * asynchronously.
 */
function block_lite_customize_preview_js() {
	wp_enqueue_script( 'block-customizer', get_template_directory_uri() . '/customizer/js/customizer.js', array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'block_lite_customize_preview_js' );

/**
 * Logo Resizer
 */
require get_template_directory() . '/customizer/logo-resizer.php';
