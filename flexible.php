

<?php get_header() ?>
      
<?php if( have_rows('flexible_sections') ) { ?>
    <?php while( have_rows('flexible_sections') ) { the_row(); ?>

        <?php if( get_row_layout() == 'billboard_section' ) { ?>
            <!--Billboard-->
            <?php if( have_rows('billboard_slider') ){ ?>
                <section class="billboard header_gap">
                    <img src="<?php echo  get_template_directory_uri();?>/images/section-shape.png" class="edge_shape bottom_shape white" alt="shape">
                    <div id="slider" class="owl-carousel owl-theme">
                        <?php while( have_rows('billboard_slider') ){ the_row(); ?>
                            <?php 
                                $slide_image = get_sub_field('slide_image'); 
                                $slide_sub_title = get_sub_field('slide_sub_title'); 
                                $slide_title = get_sub_field('slide_title'); 
                                $slide_description = get_sub_field('slide_description');
                                $slide_button_1= get_sub_field('slide_button_1');
                                $slide_button_2= get_sub_field('slide_button_2');
                            ?>
                            <div class="item" style="background-image:url(<?php echo $slide_image['url'] ?>);">
                                <div class="container">
                                    <div class="caption white">
                                        <?php if(!empty($slide_sub_title)) { ?>
                                            <span><?php echo $slide_sub_title ?></span>
                                        <?php } ?>

                                        <?php if(!empty( $slide_title)) { ?>
                                            <h1><?php echo $slide_title ?></h1>
                                        <?php } ?>

                                        <?php echo  $slide_description ?>

                                        <?php if(!empty($slide_button_1) || (!empty( $slide_button_2)))  { ?>
                                            <div class="btn_holder left">
                                                <?php if(!empty($slide_button_1)) { ?>
                                                    <a class="my_btn yellow" href="<?php echo $slide_button_1['url'] ?>"><?php echo $slide_button_1['title']?></a>
                                                <?php } ?>
                                                <?php if(!empty($slide_button_2)) { ?>
                                                    <a class="my_btn" href="<?php echo $slide_button_2['url'] ?>"><?php echo $slide_button_2['title']?></a>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </section>
                <?php } ?>
            <!-- Billboard -->

            <!-- News -->
            <?php } elseif( get_row_layout() == 'news_section' ){ ?>
            <?php 
                  $news_title = get_sub_field('news_title'); 
                  $news_description = get_sub_field('news_description'); 
                  $view_all_button = get_sub_field('view_all_button'); 
            ?>
            <section class="sections">
                <div class="container">
                    <?php if(!empty($news_title) || !empty($news_description)) { ?>
                        <div class="section_title">
                            <div class="title_img">
                                <img src="<?php echo  get_template_directory_uri();?>/images/title_img.png" alt="title_img">
                            </div>
                            <?php if(!empty($news_title)) { ?>
                                <h2><?php echo $news_title ?></h2>
                            <?php } ?>
                            <?php echo $news_description ?>
                        </div>
                    <?php } ?>

                    <?php
                    $news_posts = get_sub_field('recent_news');
                    if( $news_posts ){ ?>
                       <div class="row justify-content-center tb_space">
                        <?php foreach( $news_posts as $news_post ) {
                                $news_post_thumbnail_url = get_the_post_thumbnail_url( $news_post->ID, 'full' );
                                $news_post_permalink = get_permalink( $news_post->ID );
                                $news_post_title = get_the_title( $news_post->ID );
                                $news_post_date = get_the_date( 'M j, Y', $news_post->ID ); 
                            ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="news_box">
                                        <?php if(!empty($news_post_thumbnail_url)) { ?>
                                            <a href="<?php echo esc_url($news_post_permalink); ?>" class="fit_img">
                                                <img src="<?php echo esc_url($news_post_thumbnail_url); ?>" alt="<?php echo esc_attr($news_post_title); ?>">
                                            </a>
                                        <?php } ?>

                                        <div class="news_content">
                                            <span class="post_date"><i class="fa-regular fa-calendar-days"></i> <?php echo esc_html($news_post_date); ?></span>
                                            <h3><a href="<?php echo esc_url($news_post_permalink); ?>"><?php echo esc_html($news_post_title); ?></a></h3>
                                            <a href="<?php echo esc_url($news_post_permalink); ?>" class="my_btn sm light_btn">Read More</a>
                                        </div>
                                       
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <?php if(!empty($view_all_button)) { ?>
                        <div class="btn_holder">
                            <a href="<?php echo $view_all_button['url'] ?>" class="my_btn"><?php echo $view_all_button['title'] ?></a>
                        </div>
                    <?php } ?>
                </div>
            </section>
            <!-- News -->

           
            <!-- Event -->
            <?php }elseif( get_row_layout() == 'event_section' ){ ?>
            <?php 
                    $event_title = get_sub_field('event_title'); 
                    $event_description = get_sub_field('event_description'); 
                    $view_all_event_button = get_sub_field('view_all_event_button'); 
            ?>
            <section class="sections bg_primary line_bg">
                <div class="container">
                   
                    <?php if(!empty($news_title) || !empty($news_description)) { ?>
                        <div class="section_title white">
                            <div class="title_img">
                                <img src="<?php echo  get_template_directory_uri();?>/images/title_img.png" alt="title_img">
                            </div>
                            <?php if(!empty($event_title)) { ?>
                                <h2><?php echo $event_title ?></h2>
                            <?php } ?>
                            <?php echo $event_description ?>
                        </div>
                    <?php } ?>


                    <?php
                    $events_posts = get_sub_field('recent_events');
                    if( $events_posts ){ ?>
                       <div class="event_wrap">
                        <?php foreach( $events_posts as $event_post ){

                                $event_thumbnail = get_the_post_thumbnail_url($event_post->ID, 'full');
                                $event_post_title = get_the_title($event_post->ID);
                                $event_post_permalink = get_permalink($event_post->ID);


                                $event_day = tribe_get_start_date($event_post->ID, false, 'j');
                                $event_month = tribe_get_start_date($event_post->ID, false, 'F');
                                $event_date = tribe_get_start_date($event_post->ID, false, 'l, j F Y');

                                $venue_name = tribe_get_venue($event_post->ID);
                                $event_address = tribe_get_address($event_post->ID);
                                $event_city = tribe_get_city($event_post->ID);
                                $event_state = tribe_get_province($event_post->ID); 
                                $event_zip = tribe_get_zip($event_post->ID);
                                $event_country = tribe_get_country($event_post->ID);
                              
                            ?>
                                <div class="event_box">
                                    <div class="event_date">
                                        <p><span><?php echo  $event_day ?></span><br><?php echo  $event_month ?></p>
                                    </div>
                                    <div class="event_desc">
                                        <h3><a href="<?php echo  $event_post_permalink ?>"><?php echo $event_post_title?></a></h3>
                                        <p><?php echo esc_html($event_date . ', ' . $event_address . ', ' . $event_city . ', ' .  $event_state . ', ' . $event_zip . ', ' . $event_country); ?></p>
                                    </div>
                                    <a href="<?php echo  $event_post_permalink ?>" class="my_btn sm yellow">View Event</a>
                                </div>

                            <?php } ?>
                        </div>
                    <?php } ?>

                    <?php if(!empty($view_all_event_button)) { ?>
                        <div class="btn_holder">
                            <a href="<?php echo $view_all_event_button['url'] ?>" class="my_btn yellow"><?php echo $view_all_event_button['title'] ?></a>
                        </div>
                    <?php } ?>

                </div>
            </section>
            <!-- Event -->

            <!-- Membership Boxes -->
            <?php } elseif( get_row_layout() == 'cta_section' ){ ?>
            
            <?php if( have_rows('cta_boxes') ){ ?>
                <?php 
                    $i = 0; 
                    $bg_classes = ['bg_primary', 'bg_secondary', 'bg_black'];
                ?>
                <section class="sections pb-3">
                    <div class="container">
                        <div class="row justify-content-center tb_space">
                            <?php while( have_rows('cta_boxes') ){ the_row(); ?>
                                <?php 
                                    $cta_icon = get_sub_field('cta_icon'); 
                                    $cta_title = get_sub_field('cta_title'); 
                                    $cta_button= get_sub_field('cta_button');
                                    $bg_class = $bg_classes[$i % 3]; 

                                    
                                ?>
                                <div class="col-lg-4">
                                    <div class="membership_box <?php echo $bg_class; ?>">
                                        <?php if(!empty($cta_icon)) { ?>
                                            <div class="member_icon">
                                                <img src="<?php echo $cta_icon['url']?>" alt="<?php echo $cta_icon['alt']?>">
                                            </div>
                                        <?php } ?>
                                        <?php if(!empty($cta_title)) { ?>
                                            <h3><?php echo $cta_title ?></h3>
                                        <?php } ?>

                                        <?php if(!empty($cta_title)) { ?>
                                            <a href="<?php echo $cta_button['url'] ?>" class="my_btn"><?php echo $cta_button['title'] ?></a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php $i++;  ?>
                            <?php } ?>
                        </div>
                    </div>
                </section>
            <?php } ?>
            <!-- Membership Boxes -->

            <!-- OutReach -->
            <?php }elseif( get_row_layout() == 'outreach_section' ){ ?>
            <?php 
                $outreach_title = get_sub_field('outreach_title'); 
                $outreach_description = get_sub_field('outreach_description'); 
                $outreach_view_all_button = get_sub_field('outreach_view_all_button'); 
            ?>
            <section class="sections">
                <div class="container">
                    <?php if(!empty($outreach_title) || !empty($outreach_description)) { ?>
                        <div class="section_title">
                            <div class="title_img">
                                <img src="<?php echo  get_template_directory_uri();?>/images/title_img.png" alt="title_img">
                            </div>
                            <?php if(!empty($outreach_title)) { ?>
                                <h2><?php echo $outreach_title ?></h2>
                            <?php } ?>
                            <?php echo $outreach_description ?>
                        </div>
                    <?php } ?>
                    

                    <?php $news_posts = get_sub_field('recent_news'); if( $news_posts ){ ?>

                        <div id="outreach" class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="outreach_box">
                                    <a href="#1" class="fit_img">
                                        <img src="<?php echo  get_template_directory_uri();?>/images/outreach-1.jpg" alt="outreach">
                                    </a>
                                    <div class="outreach_content">
                                        <h3><a href="#1">Geological Highway Map of Saskatchewan</a></h3>
                                        <a href="#1" class="my_btn sm light_btn">read more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="outreach_box">
                                    <a href="#1" class="fit_img">
                                        <img src="<?php echo  get_template_directory_uri();?>/images/outreach-2.jpg" alt="outreach">
                                    </a>
                                    <div class="outreach_content">
                                        <h3><a href="#1">GeoExplore Saskatchewan</a></h3>
                                        <a href="#1" class="my_btn sm light_btn">read more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="outreach_box">
                                    <a href="#1" class="fit_img">
                                        <img src="<?php echo  get_template_directory_uri();?>/images/outreach-3.jpg" alt="outreach">
                                    </a>
                                    <div class="outreach_content">
                                        <h3><a href="#1">Geoscape Saskatchewan</a></h3>
                                        <a href="#1" class="my_btn sm light_btn">read more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="outreach_box">
                                    <a href="#1" class="fit_img">
                                        <img src="<?php echo  get_template_directory_uri();?>/images/outreach-4.jpg" alt="outreach">
                                    </a>
                                    <div class="outreach_content">
                                        <h3><a href="#1">GEOrock Garden at Campbell Collegiate</a></h3>
                                        <a href="#1" class="my_btn sm light_btn">read more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="outreach_box">
                                    <a href="#1" class="fit_img">
                                        <img src="<?php echo  get_template_directory_uri();?>/images/outreach-1.jpg" alt="outreach">
                                    </a>
                                    <div class="outreach_content">
                                        <h3><a href="#1">Geological Highway Map of Saskatchewan</a></h3>
                                        <a href="#1" class="my_btn sm light_btn">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php  if(!empty($outreach_view_all_button)) { ?>
                        <div class="btn_holder">
                            <a href="<?php echo $outreach_view_all_button['url'] ?>" class="my_btn"><?php echo $outreach_view_all_button['title'] ?></a>
                        </div>
                    <?php } ?>
                </div>
            </section> 
            <!-- OutReach -->

            <section class="sections">
                <div class="container">
                <svg version="1.1"
     width="300" height="200"
     xmlns="http://www.w3.org/2000/svg">

  <rect width="100%" height="100%" fill="red" />

  <circle cx="150" cy="100" r="80" fill="green" />

  <text x="150" y="125" font-size="60" text-anchor="middle" fill="white">SVG</text>

</svg>
                </div>
            </section>
         
        <?php } ?>
    <?php } ?>
<?php } ?>

<?php get_footer() ?>