<?php 
	$fid = get_option('page_on_front');
	$hide_news_section = get_field('hide_news_section', $fid);
	$ns_subtitle = get_field('ns_subtitle', $fid);
	$ns_title = get_field('ns_title', $fid);
	$ns_description = get_field('ns_description', $fid);
	$ns_button = get_field('ns_button', $fid);
	$args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'orderby' => 'date',
		'order' => 'desc',
    );
    $the_query = new WP_Query($args);
?>
<?php if(!$hide_news_section) { ?>
	<?php if($the_query->have_posts()) { $i = 100; ?>	
		<!-- The Blog -->
	    <section class="sections bg_gray">
	        <div class="container">
	        	<?php if(!empty($ns_subtitle) || !empty($ns_title) || !empty($ns_description)) { ?>
		            <div class="sections_title" data-aos="fade" data-aos-delay="200">
		            	<?php if(!empty($ns_subtitle)) { ?>
		                	<div class="sub_title"><?php echo $ns_subtitle; ?></div>
		                <?php } ?>
		                <?php if(!empty($ns_title)) { ?>
		                	<h2><?php echo $ns_title; ?></h2>
		                <?php } ?>
		                <?php echo get_field('ns_description', $fid); ?>
		            </div>
		        <?php } ?>
	            <div class="row extra_space tb_space justify-content-center">
	            	<?php while($the_query->have_posts()) { $the_query->the_post(); $i += 100; ?>
	            		<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $i; ?>">
	                        <div class="blog_box">
	                            <?php if(has_post_thumbnail()) { ?>
	                            	<div class="blog_img_wraper">
				                       	<a href="<?php the_permalink(); ?>" class="fit_img blog_img">
				                           <?php the_post_thumbnail('full'); ?>
				                       	</a>
			                       	</div>
		                       	<?php }else{ ?>
		                       		<div class="blog_img_wraper">
			                       		<a href="<?php the_permalink(); ?>" class="fit_img blog_img">
				                           <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/placeholder.jpg" alt="<?php the_title(); ?>">
				                       	</a>
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
		            <?php } wp_reset_query(); ?>	                
	            </div>
	            <?php if(!empty($ns_button)) { 
                    $target = !empty($ns_button['target']) ? '_blank' : '_self';
                ?> 
                    <div class="btn_holder"  data-aos="fade-up" data-aos-delay="400"><a href="<?php echo $ns_button['url']; ?>" target="<?php echo $target; ?>" class="site_btn dark"><?php echo $ns_button['title']; ?></a></div>
                <?php } ?>
	        </div>
	    </section>
	    <!-- The Blog -->
	<?php } ?>
<?php } ?>
