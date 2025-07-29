<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package The_Propertymark
 */

get_header();
?>

	<!-- News Details -->
    <section class="sections">
      	<div class="container">
        	<div class="row extra_space">          		
          		<div class="col-lg-8 news_details" data-aos="fade-up" data-aos-delay="100">
          			<?php if(has_post_thumbnail()) { ?>
		            	<div class="fit_img featured_img">
		              		<?php the_post_thumbnail('full'); ?>
		            	</div>
	            	<?php } ?>
	            	<div class="date_category">
	                    <span class="date"><?php echo get_the_date('F d, Y'); ?></span>
	                    <div class="category"><?php echo get_the_term_list(get_the_id(), 'category', '', ', ', ''); ?></div>
	                </div>
	                <h2><?php the_title(); ?></h2>
            		<div class="default_typo" data-aos="fade-in" data-aos-delay="100">
	              		<?php while(have_posts()) { the_post(); the_content(); } wp_reset_query(); ?>       
	            	</div>
          		</div>
	          	<div class="col-lg-4">
	          		<?php get_sidebar(); ?>
	          	</div>
	        </div>
    	</div>
    </section>
    <!-- News Details -->

<?php
get_footer();
