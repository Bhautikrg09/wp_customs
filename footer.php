<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Propertymark
 */

?>


	<?php 
		$cta_block_subtitle = get_field('cta_block_subtitle', 'option');
		$cta_block_title = get_field('cta_block_title', 'option');
		$cta_block_button = get_field('cta_block_button', 'option');
	?>
	<?php if(!empty($cta_block_subtitle) || !empty($cta_block_title) || !empty($cta_block_button)) { ?>
		<!-- Thank You Section Start -->
        <section class="sections bg_primary white">
            <img class="scroll_animation fill_hand left" src="<?php echo get_stylesheet_directory_uri(); ?>/images/fill-left-hand.svg" alt="Hand Shape">
            <img class="scroll_animation fill_hand right" src="<?php echo get_stylesheet_directory_uri(); ?>/images/fill-right-hand.svg" alt="Hand Shape">
            <div class="container">
                <div class="sections_title m-0"  data-aos="fade" data-aos-delay="200">
                	<?php if(!empty($cta_block_subtitle)) { ?>
                    	<div class="sub_title"><?php echo $cta_block_subtitle; ?></div>
                    <?php } ?>
                    <?php if(!empty($cta_block_title)) { ?>
                    	<h2><?php echo $cta_block_title; ?></h2>
                    <?php } ?>
                    <?php if(!empty($cta_block_button)) { 
	                    $target = !empty($cta_block_button['target']) ? '_blank' : '_self';
	                ?> 
	                    <div class="btn_holder"><a class="site_btn dark" href="<?php echo $cta_block_button['url']; ?>" target="<?php echo $target; ?>"><?php echo $cta_block_button['title']; ?></a></div>
	                <?php } ?>
                </div>
            </div>
        </section>
        <!-- Thank You Section End -->
	<?php } ?>

	</main>

	<?php 
		$footer_logo = get_field('footer_logo', 'option');
		$footer_content = get_field('footer_content', 'option');
		$footer_contact_title = get_field('footer_contact_title', 'option');
		$footer_phone = get_field('footer_phone', 'option');
		$footer_email = get_field('footer_email', 'option');
		$footer_copyright = get_field('footer_copyright', 'option');
		$instagram = get_field('instagram_url', 'option');
		$twitter = get_field('twitter_url', 'option');
		$facebook = get_field('facebook_url', 'option');	
	?>
	<!-- Footer -->
    <footer class="footer white"> 
        <div class="container">
            <div class="row extra_space justify-content-between">
                <div class="col-lg-4 col-md-4 footer_logo_info">
                   	<?php if(!empty($footer_logo)) { ?>
			          	<div class="footer_logo">
			           		<a href="<?php echo home_url(); ?>">
			              		<img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['alt']; ?>" title="<?php echo $footer_logo['title']; ?>" width="295" height="85">
			            	</a>
			          	</div>
		          	<?php } ?>  
	                <?php echo get_field('footer_content', 'option'); ?>
                </div>
                <div class="col-lg-4 col-md-4 contact_info">
                	<?php if(!empty($footer_phone) || !empty($footer_email)) { ?>
	                	<?php if(!empty($footer_contact_title)) { ?>
	                    	<h3><?php echo $footer_contact_title; ?></h3>
	                    <?php } ?> 
	                    <div class="contact_footer"> 
	                    	<?php if(!empty($footer_phone)) { ?>
		                        <a href="tel:<?php echo preg_replace('/\D/', '', $footer_phone); ?>"> 
		                            <div class="cicon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/phone.svg" alt="phone" width="24" height="24"></div> 
		                            <div class="cinfo">
		                                <span>Phone</span><?php echo $footer_phone; ?> 
		                            </div>
		                        </a> 
	                        <?php } ?>
	                        <?php if(!empty($footer_email)) { ?>
		                        <a href="mailto:<?php echo $footer_email; ?>"> 
		                            <div class="cicon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/email.svg" alt="email" width="24" height="18"></div> 
		                            <div class="cinfo">
		                                <span>Email</span><?php echo $footer_email; ?>
		                            </div>
		                        </a>
	                        <?php } ?>
	                    </div>
	                <?php } ?> 
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 quick_links">
                    <?php dynamic_sidebar('sidebar-2'); ?>
                </div>
            </div>
            <div class="copyright">
            	<?php if(!empty($footer_copyright)) { ?>
	                <div class="left_copy_right">
	                    <?php echo get_field('footer_copyright', 'option'); ?>
	                </div>
                <?php } ?>
                <?php if(!empty($instagram) || !empty($twitter) || !empty($facebook)) { ?>
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
                <?php } ?>  
            </div>
        </div>
       
    </footer>
    <div class="go-up"><i class="fa fa-chevron-up"></i></div>
    <!-- Footer -->

	
	
<?php wp_footer(); ?>

<script>
	(function($) {  
	    $('.slimmenu').slimmenu({
	        resizeWidth: '1199',
	        collapserTitle: '',
	        animSpeed: 'medium',
	        indentChildren: true,
	        childrenIndenter: '<i class="fa-solid fa-angle-right"></i>'
	    });
	    $('.collapse-button').click(function() {
	        $('.collapse-button').toggleClass('close-menu');
	    });   
	    AOS.init({
	        duration: 1200,
	    });

		// Billboard Slider
		$('#slider').owlCarousel({
                items: 1,
                loop: false,
                autoplay: false,
                autoHeight: false,
                animateIn: 'fadeIn',
                animateOut: 'fadeOut',
                smartSpeed: 500,
                autoplayTimeout: 4000,
                mouseDrag: false,
                touchDrag: true,
                autoplayHoverPause: true,
                responsive:{
                    0:{
                        nav: false,
                        dots:true
                    },
                    992:{
                        nav: false,
                        dots:true
                    },
                    1200:{
                        nav: true,
                        dots:false
                    }
                }
            });
		// Billboard Slider

		// Brand Slider
		$('#brand_slider').owlCarousel({
                items: 5,
                loop: false,
				margin: 100,
                autoplay: false,
                autoHeight: false,
                animateIn: 'fadeIn',
                animateOut: 'fadeOut',
                smartSpeed: 500,
                autoplayTimeout: 4000,
                mouseDrag: false,
                touchDrag: true,
                autoplayHoverPause: true,
                responsive:{
                    0:{
                        nav: false,
                        dots:true
                    },
                    992:{
                        nav: false,
                        dots:true
                    },
                    1200:{
                        nav: true,
                        dots:false
                    }
                }
            });
		// Brand Slider

		// case_study Slider
		$('#case_study_slider').owlCarousel({
                items: 4,
                loop: false,
				margin: 100,
                autoplay: false,
                autoHeight: false,
                animateIn: 'fadeIn',
                animateOut: 'fadeOut',
                smartSpeed: 500,
                autoplayTimeout: 4000,
                mouseDrag: false,
                touchDrag: true,
                autoplayHoverPause: true,
                responsive:{
                    0:{
                        nav: false,
                        dots:true
                    },
                    992:{
                        nav: false,
                        dots:true
                    },
                    1200:{
                        nav: true,
                        dots:false
                    }
                }
            });
		// case_study Slider
	    
})(jQuery);
</script>


<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/custom.js"></script>

</body>
</html>
