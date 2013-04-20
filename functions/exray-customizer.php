<?php
	
add_action( 'customize_register', 'exray_customize_register');

function exray_customize_register($wp_customize){
	// Logo Section
	$wp_customize->add_section('exray_logo', array(
		'title' => __('Logo', 'exray-framework'),
		'description' => __('Upload your Website logo below', 'exray-framework'),
		'priority' => '35'
	));
	
	$wp_customize->add_setting('exray_custom_settings[exray_theme_logo]', array(
		'default' => THEME_IMAGES.'/logo.png',
		'type' => 'option'
	));
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'exray_theme_logo', array(
		'label' => __('Upload Website logo', 'exray_framework'),
		'section' => 'exray_logo',
		'settings' => 'exray_custom_settings[exray_theme_logo]'
	)));
	
	//Top Ad Section on Theme Customizer
	$wp_customize->add_section('exray_ad', array(
		'title' => __('Top Ad', 'exray-framework'),
		'description' => __('Allow you to upload ad Banner on the top of the page', 'exray-framework'),
		'priority' => '36' 
	));

	// Add setting for checkbox enable displaying Top Ad (setting saved to db).
	$wp_customize->add_setting('exray_custom_settings[display_top_ad]', array(
			'default' => '0',
			'type' => 'option'
	));

	// Add checkbox field/control to Theme Customizer
	$wp_customize->add_control('exray_custom_settings[display_top_ad]',array(
		'label' => __('Display Top Ad?', 'exray-framework'),
		'section' =>  'exray_ad',
		'settings' => 'exray_custom_settings[display_top_ad]',
		'type' => 'checkbox'

	));

	// Setting for Banner Ad
	$wp_customize->add_setting('exray_custom_settings[top_ad]', array(
			'default' => 'http://lorempixel.com/468/60',
			'type' => 'option'
	));

	// Add Image upload field/control to Theme Customizer
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'top_ad', array(
		'label' => __('Upload Top Banner Image', 'exray-framework'),
		'section' => 'exray_ad',
		'settings' => 'exray_custom_settings[top_ad]'

	
	)));

	// Add setting for Ad link.
	$wp_customize->add_setting('exray_custom_settings[top_ad_link]', array(
			'default' => 'http://google.com',
			'type' => 'option'
	));

	// Add Ad link textbox field/control to Theme Customizer
	$wp_customize->add_control('exray_custom_settings[top_ad_link]',array(
		'label' => __('Link for Ad', 'exray-framework'),
		'section' =>  'exray_ad',
		'settings' => 'exray_custom_settings[top_ad_link]',
		'type' => 'text'

	));
	
	$wp_customize->add_section('exray_theme_color', array(
		'title' => __('Customize Color Scheme', 'exray-framework'),
		'description' => __('Allow you to customize website color', 'exray-framework'),
		'priority' => '37' 
	));
	
    $wp_customize->add_setting('exray_custom_settings[link_color]', array(
        'default'           => '0d72c7',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
    ));
	
	 $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link_color', array(
        'label'    => __('Link Color', 'exray-framework'),
        'section'  => 'exray_theme_color',
        'settings' => 'exray_custom_settings[link_color]',
    )));
 

}

?>