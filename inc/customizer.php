<?php
/**
 * Gannett Training Theme Customizer
 *
 * @package Gannett_Training
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gannett_training_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'gannett_training_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'gannett_training_customize_partial_blogdescription',
			)
		);
	}

	// Site Logo uploader
	$wp_customize->add_setting('site-logo',
		array(
			'default'     		=> '',
			'transport'   		=> 'postMessage',
		)
	);
	$wp_customize->add_section('site-logo',
		array(
			'title'      			=> __('Site Logo', 'USA TODAY Training'),
			'priority'   			=> 1,
			'panel'						=> 'site-images',
		)
	);
	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize,
			'site-logo',
				array(
					'label'   		=> __('Site Logo', 'USA TODAY Training'),
					'section' 		=> 'site-logo',
					'settings'		=> 'site-logo',
	) ) );



	// Home background uploader
	$wp_customize->add_setting('home-background',
		array(
			'default'     		=> '',
			'transport'   		=> 'postMessage',
		)
	);
	$wp_customize->add_section('home-background',
		array(
			'title'      			=> __('Home Background', 'USA TODAY Training'),
			'priority'   			=> 1,
			'panel'						=> 'site-images',
		)
	);
	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize,
			'home-background',
				array(
					'label'   		=> __('Home Background', 'USA TODAY Training'),
					'section' 		=> 'home-background',
					'settings'		=> 'home-background',
	) ) );

	// Skills background uploader
	$wp_customize->add_setting('skills-background',
		array(
			'default'     		=> '',
			'transport'   		=> 'postMessage',
		)
	);
	$wp_customize->add_section('skills-background',
		array(
			'title'      			=> __('Skills Background', 'USA TODAY Training'),
			'priority'   			=> 2,
			'panel'						=> 'site-images',
		)
	);
	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize,
			'skills-background',
				array(
					'label'   		=> __('Skills Background', 'USA TODAY Training'),
					'section' 		=> 'skills-background',
					'settings'		=> 'skills-background',
	) ) );

	// Training background uploader
	$wp_customize->add_setting('training-background',
		array(
			'default'     		=> '',
			'transport'   		=> 'postMessage',
		)
	);
	$wp_customize->add_section('training-background',
		array(
			'title'      			=> __('Training Background', 'USA TODAY Training'),
			'priority'   			=> 3,
			'panel'						=> 'site-images',
		)
	);
	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize,
			'training-background',
				array(
					'label'   		=> __('Training Background', 'USA TODAY Training'),
					'section' 		=> 'training-background',
					'settings'		=> 'training-background',
	) ) );

	// About background uploader
	$wp_customize->add_setting('about-background',
		array(
			'default'     		=> '',
			'transport'   		=> 'postMessage',
		)
	);
	$wp_customize->add_section('about-background',
		array(
			'title'      			=> __('About Background', 'USA TODAY Training'),
			'priority'   			=> 4,
			'panel'						=> 'site-images',
		)
	);
	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize,
			'about-background',
				array(
					'label'   		=> __('AboutBackground', 'USA TODAY Training'),
					'section' 		=> 'about-background',
					'settings'		=> 'about-background',
	) ) );

	// Feedback background uploader
	$wp_customize->add_setting('feedback-background',
		array(
			'default'     		=> '',
			'transport'   		=> 'postMessage',
		)
	);
	$wp_customize->add_section('feedback-background',
		array(
			'title'      			=> __('Feedback Background', 'USA TODAY Training'),
			'priority'   			=> 5,
			'panel'						=> 'site-images',
		)
	);
	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize,
			'feedback-background',
				array(
					'label'   		=> __('Feedback Background', 'USA TODAY Training'),
					'section' 		=> 'feedback-background',
					'settings'		=> 'feedback-background',
	) ) );

	// No results background uploader
	$wp_customize->add_setting('no-results-background',
		array(
			'default'     		=> '',
			'transport'   		=> 'postMessage',
		)
	);
	$wp_customize->add_section('no-results-background',
		array(
			'title'      			=> __('No Results Background', 'USA TODAY Training'),
			'priority'   			=> 6,
			'panel'						=> 'site-images',
		)
	);
	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize,
			'no-results-background',
				array(
					'label'   		=> __('No Results Background', 'USA TODAY Training'),
					'section' 		=> 'no-results-background',
					'settings'		=> 'no-results-background',
	) ) );

	// Error 404 background uploader
	$wp_customize->add_setting('error-404-background',
		array(
			'default'     		=> '',
			'transport'   		=> 'postMessage',
		)
	);
	$wp_customize->add_section('error-404-background',
		array(
			'title'      			=> __('Error 404 background', 'USA TODAY Training'),
			'priority'   			=> 7,
			'panel'						=> 'site-images',
		)
	);
	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize,
			'error-404-background',
				array(
					'label'   		=> __('Error 404 Background', 'USA TODAY Training'),
					'section' 		=> 'error-404-background',
					'settings'		=> 'error-404-background',
	) ) );

	// Bulletin illo uploader
	$wp_customize->add_setting('bulletin-illo',
		array(
			'default'     		=> '',
			'transport'   		=> 'postMessage',
		)
	);
	$wp_customize->add_section('bulletin-illo',
		array(
			'title'      			=> __('Bulletin Illustration', 'USA TODAY Training'),
			'priority'   			=> 14,
			'panel'						=> 'site-images',
		)
	);
	$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize,
			'bulletin-illo',
				array(
					'label'   		=> __('Bulletin Illustration', 'USA TODAY Training'),
					'section' 		=> 'bulletin-illo',
					'settings'		=> 'bulletin-illo',
	) ) );

	// Page backgrounds panel

	$wp_customize->add_panel( 'site-images', array(
    'priority' => 10,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __( 'Site Images', 'USA TODAY Training' ),
    'description' => __( 'Allows you to edit the logos, illustrations and backgrounds of static pages', 'USA TODAY Training' ),
    ) );

		//bio text input



		$wp_customize->add_section( 'bulletin-title',
			array(
				'title'						=> __('Bulletin Title', 'USA TODAY Network Training'),
				'priority'				=> 11,
				'panel'						=> 'bulletin',
			) );

		$wp_customize->add_setting( 'bulletin-title',
			array(
				'capability'			=> 'edit_theme_options',
				'default'					=> 'Lorem Ipsum',
				'sanitize_callback' => 'sanitize_text_field',
			) );

		$wp_customize->add_control( 'bulletin-title',
			array(
				'type'						=> 'text',
				'section'					=> 'bulletin_settings', // Add a default or your own section
		//		'panel' => 'bulletin',
				'setting'					=> 'bulletin-title',
				'label'						=> __( 'Bulletin Title' ),
				'description'			=> __( 'Edit the title of the homepage bulletin' ),
			) );

			$wp_customize->add_setting( 'bulletin-body',
				array(
					'capability'			=> 'edit_theme_options',
					'default'					=> 'Lorem Ipsum',
					'sanitize_callback' => 'sanitize_text_field',
				) );

			$wp_customize->add_control( 'bulletin-body',
				array(
					'type'						=> 'textarea',
					'section'					=> 'bulletin_settings', // Add a default or your own section
			//		'panel' => 'bulletin',
					'setting'					=> 'bulletin-body',
					'label'						=> __( 'Bulletin Body' ),
					'description'			=> __( 'Edit the body text of the homepage bulletin' ),
					) );

			$wp_customize->add_setting( 'bulletin-link-text',
				array(
					'capability'			=> 'edit_theme_options',
					'default'					=> 'Lorem Ipsum',
					'sanitize_callback' => 'sanitize_text_field',
				) );

			$wp_customize->add_control( 'bulletin-link-text',
				array(
					'type'						=> 'text',
					'section'					=> 'bulletin_settings', // Add a default or your own section
			//		'panel' => 'bulletin',
					'setting'					=> 'bulletin-link-text',
					'label'						=> __( 'Bulletin Link Text' ),
					'description'			=> __( 'Edit the text of the homepage bulletin link' ),
				) );

				$wp_customize->add_setting( 'bulletin-link-url',
					array(
						'capability'			=> 'edit_theme_options',
						'default'					=> '',
						'sanitize_callback' => 'sanitize_text_field',
					) );

				$wp_customize->add_control( 'bulletin-link-url',
					array(
						'type'						=> 'text',
						'section'					=> 'bulletin_settings', // Add a default or your own section
				//		'panel' => 'bulletin',
						'setting'					=> 'bulletin-link-url',
						'label'						=> __( 'Bulletin Link URL' ),
						'description'			=> __( 'Paste the URL for the bulletin link here' ),
					) );

			$wp_customize->add_section( 'bulletin_settings',
				array(
					'title'						=> __('Bulletin Settings', 'USA TODAY Network Training'),
					'priority'				=> 11,
				//	'panel'						=> 'bulletin',
				) );



					$wp_customize->add_setting( 'bulletin-link-toggle', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
					 array(
							'default'    => 'default', //Default setting/value to save
							'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
					//		'capability' => 'toggle', //Optional. Special permissions for accessing this setting.
							//'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
					 )
					);

					$wp_customize->add_control( new WP_Customize_Control(
					 $wp_customize, //Pass the $wp_customize object (required)
					 'bulletin-link-toggle', //Set a unique ID for the control
					 array(
							'label'      => __( 'Toggle Bulletin Link', 'Gannett Training' ), //Admin-visible name of the control
							'description' => __( 'You can show or hide the bulletin link' ),
							'settings'   => 'bulletin-link-toggle', //Which setting to load and manipulate (serialized is okay)
							'priority'   => 20, //Determines the order this control appears in for the specified section
							'section'    => 'bulletin_settings', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
							'type'    => 'radio',
							'choices' => array(
									'on' => 'On',
									'default' => 'Off',
							)
					)
					) );


		/*
	// Bulletin panel

		$wp_customize->add_panel( 'bulletin', array(
			'priority' => 11,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Bulletin', 'USA TODAY Training' ),
			'description' => __( 'Edit the homepage bulletin text.' ),
			) );
	*/


			//Calendar toggle
		$wp_customize->add_section( 'calendar_settings',
		 array(
				'title'       => __( 'Calendar Settings', 'Gannett Training' ), //Visible title of section
				'priority'    => 12, //Determines what order this appears in
				'capability'  => 'edit_theme_options', //Capability needed to tweak
				'description' => __('', 'Gannett Training'), //Descriptive tooltip
		 )
		);

		$wp_customize->add_setting( 'calendar_toggle', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
		 array(
				'default'    => 'default', //Default setting/value to save
				'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
		//		'capability' => 'toggle', //Optional. Special permissions for accessing this setting.
				//'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
		 )
		);

		$wp_customize->add_control( new WP_Customize_Control(
		 $wp_customize, //Pass the $wp_customize object (required)
		 'calendar_toggle', //Set a unique ID for the control
		 array(
				'label'      => __( 'Calendar section', 'Gannett Reaining' ), //Admin-visible name of the control
				'description' => __( 'You can show or hide the calendar list of upcoming training' ),
				'settings'   => 'calendar_toggle', //Which setting to load and manipulate (serialized is okay)
				'priority'   => 15, //Determines the order this control appears in for the specified section
				'section'    => 'calendar_settings', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
				'type'    => 'radio',
				'choices' => array(
						'default' => 'On',
						'off' => 'Off',
				)
		)
		) );

		$wp_customize->add_setting( 'bulletin_toggle', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
		 array(
				'default'    => 'default', //Default setting/value to save
				'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
		//		'capability' => 'toggle', //Optional. Special permissions for accessing this setting.
				//'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
		 )
		);

		$wp_customize->add_control( new WP_Customize_Control(
		 $wp_customize, //Pass the $wp_customize object (required)
		 'bulletin_toggle', //Set a unique ID for the control
		 array(
				'label'      => __( 'Bulletin section' ), //Admin-visible name of the control
				'description' => __( 'You can show or hide the bulletin section' ),
				'settings'   => 'bulletin_toggle', //Which setting to load and manipulate (serialized is okay)
				'priority'   => 1, //Determines the order this control appears in for the specified section
				'section'    => 'bulletin_settings', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
				'type'    => 'radio',
				'choices' => array(
						'default' => 'On',
						'off' => 'Off',
				)
		)
		) );

		// text entry for homepage headers
		// Calendar header
		$wp_customize->add_setting( 'calendar-header',
			array(
				'capability'			=> 'edit_theme_options',
				'default'					=> 'Lorem Ipsum',
				'sanitize_callback' => 'sanitize_text_field',
			) );

		$wp_customize->add_control( 'calendar-header',
			array(
				'type'						=> 'textbox',
				'section'					=> 'calendar_settings', // Add a default or your own section
		//		'panel' => 'bulletin',
				'setting'					=> 'calendar-header',
				'label'						=> __( 'Calendar Heading' ),
				'description'			=> __( 'Edit the calendar heading' ),
				) );

				//Latest posts section
			$wp_customize->add_section( 'latest_settings',
			 array(
					'title'       => __( 'Latest Posts Settings', 'Gannett Training' ), //Visible title of section
					'priority'    => 12, //Determines what order this appears in
					'capability'  => 'edit_theme_options', //Capability needed to tweak
					'description' => __('', 'Gannett Training'), //Descriptive tooltip
			 )
			);
			// latest header
			$wp_customize->add_setting( 'latest-header',
				array(
					'capability'			=> 'edit_theme_options',
					'default'					=> 'Lorem Ipsum',
					'sanitize_callback' => 'sanitize_text_field',
				) );

			$wp_customize->add_control( 'latest-header',
				array(
					'type'						=> 'textbox',
					'section'					=> 'latest_settings', // Add a default or your own section
			//		'panel' => 'bulletin',
					'setting'					=> 'latest-header',
					'label'						=> __( 'Latest Posts Heading' ),
					'description'			=> __( 'Edit the latest posts heading' ),
					) );

					// latest number
					$wp_customize->add_setting( 'latest-number',
						array(
							'capability'			=> 'edit_theme_options',
							'default'					=> '15',
							'sanitize_callback' => 'sanitize_text_field',
						) );

					$wp_customize->add_control( 'latest-number',
						array(
							'type'						=> 'textbox',
							'section'					=> 'latest_settings', // Add a default or your own section
					//		'panel' => 'bulletin',
							'setting'					=> 'latest-number',
							'label'						=> __( 'Latest Posts Heading' ),
							'description'			=> __( 'Edit the number of latest posts that show on the homepage' ),
							) );

							// error 404 page
							//error 404 section
						$wp_customize->add_section( 'error-404-settings',
						 array(
								'title'       => __( 'Error 404', 'Gannett Training' ), //Visible title of section
								'priority'    => 42, //Determines what order this appears in
								'capability'  => 'edit_theme_options', //Capability needed to tweak
								'description' => __('', 'Gannett Training'), //Descriptive tooltip
						 )
						);
						// error 404 header
						$wp_customize->add_setting( 'error-404-header',
							array(
								'capability'			=> 'edit_theme_options',
								'default'					=> 'Lorem Ipsum',
								'sanitize_callback' => 'sanitize_text_field',
							) );

						$wp_customize->add_control( 'error-404-header',
							array(
								'type'						=> 'textbox',
								'section'					=> 'error-404-settings', // Add a default or your own section
						//		'panel' => 'bulletin',
								'setting'					=> 'error-404-header',
								'label'						=> __( 'Error 404 Heading' ),
								'description'			=> __( 'Edit the heading for the Error 404 (page not found) page'),
								) );

								// error 404 body
								$wp_customize->add_setting( 'error-404-body',
									array(
										'capability'			=> 'edit_theme_options',
										'default'					=> 'Lorem Ipsum',
										'sanitize_callback' => 'sanitize_text_field',
									) );

								$wp_customize->add_control( 'error-404-body',
									array(
										'type'						=> 'textarea',
										'section'					=> 'error-404-settings', // Add a default or your own section
								//		'panel' => 'bulletin',
										'setting'					=> 'error-404-body',
										'label'						=> __( 'Error 404 Body' ),
										'description'			=> __( 'Edit the body for the Error 404 (page not found) page'),
										) );

}
add_action( 'customize_register', 'gannett_training_customize_register' );

function mytheme_customize_register( $wp_customize ) {
  //All our sections, settings, and controls will be added here

  $wp_customize->remove_section( 'title_tagline');
  $wp_customize->remove_section( 'colors');
  $wp_customize->remove_section( 'header_image');
  $wp_customize->remove_section( 'background_image');
  $wp_customize->remove_panel( 'nav_menus');
  //$wp_customize->remove_section( 'static_front_page');
	$wp_customize->remove_panel( 'tribe_customizer');
  $wp_customize->remove_panel( 'widgets');

}
add_action( 'customize_register', 'mytheme_customize_register',50 );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function gannett_training_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function gannett_training_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function gannett_training_customize_preview_js() {
	wp_enqueue_script( 'gannett-training-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'gannett_training_customize_preview_js' );
