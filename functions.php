
function mytheme_scripts() {
	wp_enqueue_style( 'the-propertymark-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'the-propertymark-css', get_stylesheet_directory_uri() . '/css/style.css', array());

    wp_enqueue_script('jquery');

	wp_register_script('bootstrap-min-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery'), false, true);
	wp_enqueue_script('bootstrap-min-js');


	wp_register_script('magnific-popup', get_stylesheet_directory_uri() . '/js/magnific-popup.js', array('jquery'), false, true);
	wp_enqueue_script('magnific-popup');

	wp_register_script('aos-js', get_stylesheet_directory_uri() . '/js/aos.js', array('jquery'), false, true);
	wp_enqueue_script('aos-js');

	wp_register_script('owl.carousel', get_stylesheet_directory_uri() . '/js/owl.carousel.js', array('jquery'), false, true);
	wp_enqueue_script('owl.carousel');

	wp_register_script('slimmenu-min-js', get_stylesheet_directory_uri() . '/js/jquery.slimmenu.min.js', array('jquery'), false, true);
	wp_enqueue_script('slimmenu-min-js');


}
add_action( 'wp_enqueue_scripts', 'mytheme_scripts' );

// Custom Favicons

function mytheme_action_wp_admin_head(){  
    $favicon_icon = get_field('favicon_icon', 'option'); 
    if(!empty($favicon_icon)): ?>
        <link rel="shortcut icon" href="<?php echo $favicon_icon['url']; ?>">
    <?php endif;
    
add_action('wp_head','mytheme_action_wp_admin_head');
add_action('admin_head','mytheme_action_wp_admin_head');



// Allow SVG Upload
function mytheme_filter_upload_mimes($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	$mimes['ico'] = 'image/x-icon';
	$mimes['webp'] = 'image/webp';
	return $mimes;
}
add_filter('upload_mimes', 'mytheme_filter_upload_mimes');

// Current year shortcode

function mytheme_shortcode_current_year() {
	$year = date('Y');
	return $year;
}
add_shortcode('current_year', 'mytheme_shortcode_current_year');

