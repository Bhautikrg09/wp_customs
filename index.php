<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Propertymark
 */

get_header();
?>

	<?php 
		$id = get_queried_object_id();
		$posts_per_page = get_option('posts_per_page');
    	$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
    	$args = array(
	        'post_type' => 'post',
	        'posts_per_page' => $posts_per_page,
	        'post_status' => 'publish',
	        'paged' => $paged
	    );
	    if(is_search()) {
	    	$args['s'] = get_search_query();
	    }
	    if(is_category()) {
	    	$args['cat'] = $id;
	    }
	    if(is_tag()) {
	    	$args['tag_id'] = $id;
	    }
	    if(is_month()) {
			$year  = get_query_var('year');
			$monthnum = get_query_var('monthnum');
			$args['year'] = $year;
			$args['monthnum'] = $monthnum;
		}
	    $the_query = new WP_Query($args);
	?>
	<?php if($the_query->have_posts()) : $i = 0; $j = 100; ?>
		<!-- The Blog -->
	    <section class="sections">
	        <div class="container">	        	
	            <div class="row tb_space">
	            	<?php while($the_query->have_posts()) :	$the_query->the_post(); $i++; ?>
	            		<div class="col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo $j; ?>">
				            <div class="blog_box">
				                <?php if(has_post_thumbnail()) { ?>
	                            	<div class="blog_img_wraper">
				                       	<a href="<?php the_permalink(); ?>" class="fit_img blog_img">
				                           <?php the_post_thumbnail('full'); ?>
				                       	</a>
				                       	<div class="cat_wraper"><?php echo get_the_term_list(get_the_id(), 'category', '', ', ', ''); ?></div>
			                       	</div>
		                       	<?php }else{ ?>
		                       		<div class="blog_img_wraper">
			                       		<a href="<?php the_permalink(); ?>" class="fit_img blog_img">
				                           <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/placeholder.jpg" alt="<?php the_title(); ?>">
				                       	</a>
				                       	<div class="cat_wraper"><?php echo get_the_term_list(get_the_id(), 'category', '', ', ', ''); ?></div>
				                    </div>		                       		
		                       	<?php } ?>
				                <div class="blog_content">
	                            	<div class="post_data">
		                                <div class="date"><?php echo get_the_date('F d, Y'); ?></div>
		                            </div>
	                                <h3 class="f30"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	                                <a href="<?php the_permalink(); ?>" class="site_btn sm">Read More</a>
	                            </div>
				            </div>
				        </div>
					<?php $j = $i % 3 ? $j + 100 : 100; endwhile; wp_reset_query(); ?>
				</div>
				<?php 
		      		$big = 999999999; 
					$pagination = paginate_links( array(
					    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					    'format' => '?paged=%#%',
					    'current' => max( 1, get_query_var('paged') ),
					    'total' => $the_query->max_num_pages,
					    'prev_text' => '<i class="fa fa-angle-left"></i>',
					    'next_text' => '<i class="fa fa-angle-right"></i>',
					) );
		      	?>
		      	<?php if(!empty($pagination)) { ?>
	      			<div class="pagination">
		      			<?php echo $pagination; ?>
		      		</div>
		      	<?php } ?>
			</div>
		</section>
	<?php else: ?>
		<section class="sections">
	        <div class="container">	
	        	<h3>Nothing found!</h3>
	        </div>
		</section>
	<?php endif; ?>

<?php
get_footer();
