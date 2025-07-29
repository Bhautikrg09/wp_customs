<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package reversedout
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
		$header_logo = get_field('header_logo', 'option');
		$header_button = get_field('header_button', 'option');
	?>

	<!--Header-->
    <header class="header">
       
        <div class="main_header">
            <div class="container">
				<?php if(!empty($header_logo)) { ?>
		          	<div class="logo">
		           		<a href="<?php echo home_url(); ?>">
		              		<img src="<?php echo $header_logo['url']; ?>" alt="<?php echo $header_logo['alt']; ?>" title="<?php echo $header_logo['title']; ?>" width="300" height="56">
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
