<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package reversedout
 */

?>

	


	</main>
	<?php
		$footer_sub_title = get_field('footer_sub_title', 'option');
		$footer_title = get_field('footer_title', 'option');
		$footer_email = get_field('footer_email', 'option');
		$footer_copyright = get_field('footer_copyright', 'option');

		$facebook_url = get_field('facebook_url', 'option');
		$twitter_url = get_field('twitter_url', 'option');
		$linkedin_url = get_field('linkedin_url', 'option');
		$instagram_url = get_field('instagram_url', 'option');
		$youtube_url = get_field('youtube_url', 'option');
	?>

	<!-- Footer -->
    <footer class="footer white"> 
		<?php if(!empty($footer_sub_title) || !empty($footer_title) || !empty($footer_email) ) { ?>
        	<div class="container">
				<div class="footer_content">
					<?php if(!empty($footer_sub_title)) {?>
						<div class="footer_sub_title"><?php echo $footer_sub_title; ?></div>
					<?php } ?>

					<?php if(!empty($footer_title)) {?>
						<h3><?php echo $footer_title; ?></h3>
					<?php } ?>

					<?php if(!empty($footer_email)) {?>
						<a href="mailto:<?php echo $footer_email; ?>"><?php echo $footer_email; ?></a>
					<?php } ?>
					
				</div>
			</div>
		<?php } ?>

		<div class="copyright">
			<div class="container">
					<?php if(!empty($footer_copyright)) { ?>
						<div class="left_copy_right">
							<?php echo $footer_copyright; ?>
						</div>
					<?php } ?>

					<?php if(!empty($facebook_url) || !empty($twitter_url) || !empty($linkedin_url) || !empty($instagram_url) || !empty($youtube_url)) {?>
						<div class="social_media">
							<ul>
								<?php if(!empty($facebook_url)) {?>
									<li>
										<a href="<?php echo $facebook_url; ?>"><i class="fa-brands fa-facebook-f"></i></a>
									</li>
								<?php } ?>

								<?php if(!empty($twitter_url)) {?>
									<li>
										<a href="<?php echo $twitter_url; ?>"><i class="fa-brands fa-x-twitter"></i></a>
									</li>
								<?php } ?>
								<?php if(!empty($linkedin_url)) {?>
									<li>
										<a href="<?php echo $linkedin_url; ?>"><i class="fa-brands fa-linkedin-in"></i></a>
									</li>
								<?php } ?>

								<?php if(!empty($instagram_url)) {?>
									<li>
										<a href="<?php echo $instagram_url; ?>"><i class="fa-brands fa-instagram"></i></a>
									</li>
								<?php } ?>
								<?php if(!empty($youtube_url)) {?>
									<li>
										<a href="<?php echo $youtube_url; ?>"><i class="fa-brands fa-youtube"></i></a>
									</li>
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