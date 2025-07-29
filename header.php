<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Propertymark
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php echo get_field('header_code', 'option'); ?>
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<?php echo get_field('body_code', 'option'); ?>

	<?php 
		$default_page_banner = get_field('default_page_banner', 'option');
		$header_logo = get_field('header_logo', 'option');
		$header_phone = get_field('header_phone', 'option');
		$header_email = get_field('header_email', 'option');
		$header_button = get_field('header_button', 'option');
		$instagram = get_field('instagram_url', 'option');
		$twitter = get_field('twitter_url', 'option');
		$facebook = get_field('facebook_url', 'option');
	?>
	<!--Header-->
    <header class="header">
        <div class="top_header">
            <div class="container">
				<?php if(!empty($header_phone) || !empty($header_email)) { ?>
	                <div class="top_header_left">
	                    <div class="contact_us"> 
	                    	<?php if(!empty($header_phone)) { ?>
				                <a href="tel:<?php echo preg_replace('/\D/', '', $header_phone); ?>"><div class="cicon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/phone.svg" alt="phone" width="16" height="16"></div><span> <?php echo $header_phone; ?></span></a>
			                <?php } ?>
			                <?php if(!empty($header_email)) { ?>
				                <a href="mailto:<?php echo $header_email; ?>"><div class="cicon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/email.svg" alt="email" width="16" height="12"></div><span> <?php echo $header_email; ?></span></a>
			                <?php } ?>
	                    </div> 
	                </div>
                <?php } ?>
                <?php if(!empty($instagram) || !empty($twitter) || !empty($facebook)) { ?>
	                <div class="top_header_right">
	                    <div class="top_social_media">
	                        <ul>
	                        	<?php if(!empty($instagram)) { ?>
	                            	<li><a href="<?php echo $instagram; ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
	                            <?php } ?>
	                            <?php if(!empty($twitter)) { ?>
	                            	<li><a href="<?php echo $twitter; ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
	                            <?php } ?>
	                            <?php if(!empty($facebook)) { ?>
	                            	<li><a href="<?php echo $facebook; ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
	                            <?php } ?>
	                        </ul>
	                    </div>
	                </div>
                <?php } ?>
            </div>
        </div>
        <div class="main_header">
            <div class="container">
                <?php if(!empty($header_logo)) { ?>
		          	<div class="logo">
		           		<a href="<?php echo home_url(); ?>">
		              		<img src="<?php echo $header_logo['url']; ?>" alt="<?php echo $header_logo['alt']; ?>" title="<?php echo $header_logo['title']; ?>" width="160" height="44">
		            	</a>
		          	</div>
	          	<?php } ?>   
                <div class="mainmenu">
                    <?php wp_nav_menu(array(
						'theme_location' => 'primary',
						'menu_class' => 'slimmenu'
				  	)); ?>
				  	<?php if(!empty($header_button)) { 
	                    $target = !empty($header_button['target']) ? '_blank' : '_self';
	                ?> 
	                    <a class="site_btn" href="<?php echo $header_button['url']; ?>" target="<?php echo $target; ?>"><?php echo $header_button['title']; ?></a>
	                <?php } ?>
                </div>
            </div>
        </div>
    </header>
    <div class="clearfix"></div>
    <!--/Header-->
    <main class="main_wrapper">

	<?php if(!is_front_page() && 'page' == get_post_type() && !is_search() && !is_page_template('tpl-donate.php')) { 
		$page_banner = get_field('page_banner');
		$page_subtitle = get_field('page_subtitle');
        $page_title = get_field('page_title');
        $page_button = get_field('page_button');
        $banner_url = !empty($page_banner) ? $page_banner['url'] : $default_page_banner['url'];
    ?> 
    	<!--Billboard-->
	    <section class="internal_cover white header_gap" style="background-image:url(<?php echo $banner_url; ?>);">
            <div class="container">
            	<?php echo !empty($page_subtitle) ? '<div data-aos="fade-down" data-aos-delay="200" class="sub_title">'.$page_subtitle.'</div>' : ''; ?>
				<h1 data-aos="fade-down" data-aos-delay="100" class="h2"><?php echo !empty($page_title) ? $page_title : get_the_title(); ?></h1>
            	<?php echo get_field('page_description'); ?>
                <?php if(!empty($page_button)) { 
                    $target = !empty($page_button['target']) ? '_blank' : '_self';
                ?> 
                    <a class="site_btn" href="<?php echo $page_button['url']; ?>" target="<?php echo $target; ?>" data-aos="fade-up"><?php echo $page_button['title']; ?></a>
                <?php } ?>
            </div>
			<?php if ( is_page('what-we-do') ) { ?>
				<a href="#scrollsection" class="down_scoll"><img src="<?php echo get_stylesheet_directory_uri();?>/images/down-arrow.svg" alt=""></a>
			<?php } ?>
	    </section>
	    <!--/Billboard-->	    
    <?php } ?>
    <?php if(is_404()) { ?> 
        <!--Billboard-->
        <section class="internal_cover white header_gap" style="background-image:url(<?php echo $default_page_banner['url']; ?>);">
            <div class="container">
            	<h1 data-aos="fade-down" data-aos-delay="100" class="h2">404</h1>
            </div>
	    </section>
	    <!--/Billboard-->
    <?php } ?>
    <?php if(is_blog()) {
        $home_id = get_option('page_for_posts');
        $page_banner = get_field('page_banner', $home_id);
        $page_subtitle = get_field('page_subtitle', $home_id);
        $page_title = get_field('page_title', $home_id);
        $page_button = get_field('page_button', $home_id);
        $banner_url = !empty($page_banner) ? $page_banner['url'] : $default_page_banner['url'];
    ?>
    	<!--Billboard-->
	    <section class="internal_cover white header_gap" style="background-image:url(<?php echo $banner_url; ?>);">
            <div class="container">
            	<?php echo !empty($page_subtitle) ? '<div data-aos="fade-down" data-aos-delay="200" class="sub_title">'.$page_subtitle.'</div>' : ''; ?>
            	<h1 data-aos="fade-down" data-aos-delay="100" class="h2"><?php echo !empty($page_title) ? $page_title : get_the_title($home_id); ?></h1>
            	<?php echo get_field('page_description', $home_id); ?>
                <?php if(!empty($page_button)) { 
                    $target = !empty($page_button['target']) ? '_blank' : '_self';
                ?> 
                    <a class="site_btn" href="<?php echo $page_button['url']; ?>" target="<?php echo $target; ?>" data-aos="fade-up"><?php echo $page_button['title']; ?></a>
                <?php } ?>
            </div>
	    </section>
	    <!--/Billboard-->	
    <?php } ?>
    <?php if(is_search()) { ?> 
        <!--Billboard-->
        <section class="internal_cover white header_gap" style="background-image:url(<?php echo $default_page_banner['url']; ?>);">
            <div class="container">
            	<h1 data-aos="fade-down" data-aos-delay="100" class="h2">Search results for "<?php the_search_query(); ?>"</h1>
            </div>
	    </section>
	    <!--/Billboard-->
    <?php } ?>
