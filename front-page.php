<?php
/**
 * The front page template file
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 */
get_header(); ?>

<?php 
    $hide_full_width_billboard_section = get_field('hide_full_width_billboard_section');
?>
<?php if(!$hide_full_width_billboard_section) { ?>
    <?php if(have_rows('bfws_slider')) { ?>
        <!--Billboard--> 
        <section class="billboard full_slider">
            <div id="home_slider" class="owl-carousel owl-theme white_arrow">
                <?php while(have_rows('bfws_slider')) { the_row();
                    $slide_image = get_sub_field('slide_image');
                    $slide_subtitle = get_sub_field('slide_subtitle');
                    $slide_title = get_sub_field('slide_title');
                    $slide_description = get_sub_field('slide_description');
                    $slide_button = get_sub_field('slide_button');
                    if(empty($slide_image)) continue;
                ?>
                    <div class="item" style="background-image: url(<?php echo $slide_image['url']; ?>);">
                        <div class="container">
                            <div class="caption white">
                                <?php if(!empty($slide_subtitle)) { ?>
                                    <span><?php echo $slide_subtitle; ?></span>
                                <?php } ?>
                                <?php if(!empty($slide_title)) { ?>
                                    <h1><?php echo $slide_title; ?></h1>
                                <?php } ?>
                                <?php if(!empty($slide_description)) { ?>
                                    <p><?php echo $slide_description; ?></p>
                                <?php } ?>
                                <?php if(!empty($slide_button)) { 
                                    $target = !empty($slide_button['target']) ? '_blank' : '_self';
                                ?> 
                                    <div class="btn_holder"><a class="my_btn white bdr_hover" href="<?php echo $slide_button['url']; ?>" target="<?php echo $target; ?>"><?php echo $slide_button['title']; ?></a></div>
                                <?php } ?>
                            </div> 
                        </div>
                    </div>  
                <?php } ?>              
            </div>
        </section>
        <!--/Billboard-->
    <?php } ?>
<?php } ?>

<?php 
    $hide_billboard_section = get_field('hide_billboard_section');
    $bs_title = get_field('bs_title');
    $bs_subtitle = get_field('bs_subtitle');
    $bs_button = get_field('bs_button');
?>
<?php if(!$hide_billboard_section) { ?>
    <!--Billboard--> 
    <section class="billboard">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                    <?php if(have_rows('bs_slider')) { ?>
                        <div id="main_slider" class="owl-carousel owl-theme">
                            <?php while(have_rows('bs_slider')) { the_row();
                                $slide_image = get_sub_field('bs_slide_image');
                                if(empty($slide_image)) continue;
                            ?>
                                <div class="item">
                                    <img src="<?php echo $slide_image['url']; ?>" alt="<?php echo $slide_image['alt']; ?>">
                                </div>
                            <?php } ?>   
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                    <div class="caption">
                        <?php echo !empty($bs_subtitle) ? '<span>'.$bs_subtitle.'</span>' : ''; ?>
                        <?php echo !empty($bs_title) ? '<h1>'.$bs_title.'</h1>' : ''; ?>
                        <?php the_field('bs_description'); ?>
                        <?php if(!empty($bs_button)) { 
                            $target = !empty($bs_button['target']) ? '_blank' : '_self';
                        ?> 
                            <div class="btn_holder"><a class="my_btn" href="<?php echo $bs_button['url']; ?>" target="<?php echo $target; ?>"><?php echo $bs_button['title']; ?></a></div>
                        <?php } ?>
                    </div> 
                </div>
            </div>
        </div>
    </section>
    <!--/Billboard-->
<?php } ?>

<?php 
    $hide_welcome_section = get_field('hide_welcome_section');
    $ws_image_1 = get_field('ws_image_1');
    $ws_image_2 = get_field('ws_image_2');
    $ws_image_3 = get_field('ws_image_3');
    $ws_title = get_field('ws_title');
    $ws_button = get_field('ws_button');
?>
<?php if(!$hide_welcome_section) { ?>

    <!-- Welcome to Station Loft Works -->
    <section class="sections">
        <div class="container">
            <div class="row align-items-end mouse_react" data-id="0">
                <div class="col-lg-6">
                    <?php if(!empty($ws_image_1) || !empty($ws_image_2) || !empty($ws_image_3)) { ?>
                        <div class="slw_left">
                            <div class="row align-items-end">
                                <?php if(!empty($ws_image_1) || !empty($ws_image_2)) { ?>
                                    <div class="col-6 slw_col wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                                        <?php if(!empty($ws_image_1)) { ?>
                                            <div class="fit_img slw_img_1 react_element1">
                                                <img src="<?php echo $ws_image_1['url']; ?>" alt="<?php echo $ws_image_1['alt']; ?>">
                                            </div>
                                        <?php } ?>
                                        <?php if(!empty($ws_image_2)) { ?>
                                            <div class="fit_img slw_img_2 react_element2">
                                                <img src="<?php echo $ws_image_2['url']; ?>" alt="<?php echo $ws_image_2['alt']; ?>">
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                <?php if(!empty($ws_image_3)) { ?>
                                    <div class="col-6 slw_col wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                                        <div class="fit_img slw_img_3 react_element3">
                                            <img src="<?php echo $ws_image_3['url']; ?>" alt="<?php echo $ws_image_3['alt']; ?>">
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-6 slw_right wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                    <?php echo !empty($ws_title) ? '<div class="sections_title left"><h2>'.$ws_title.'</h2></div>' : ''; ?>
                    <?php the_field('ws_description'); ?>
                    <?php if(!empty($ws_button)) { 
                        $target = !empty($ws_button['target']) ? '_blank' : '_self';
                    ?> 
                        <div class="btn_holder"><a class="my_btn" href="<?php echo $ws_button['url']; ?>" target="<?php echo $target; ?>"><?php echo $ws_button['title']; ?></a></div>
                    <?php } ?>
                </div>
            </div>
            <?php if(have_rows('ws_boxes')) { $i = 1; ?>
                <div class="slw_bottom_box">
                    <div class="row">
                        <?php while(have_rows('ws_boxes')) { the_row();
                            $wsb_image = get_sub_field('wsb_image');
                            $wsb_title = get_sub_field('wsb_title');
                            $wsb_description = get_sub_field('wsb_description');
                            $wsb_link = get_sub_field('wsb_link');
                            if(empty($wsb_link)) continue;
                        ?>
                            <div class="col-lg-4 col-md-6 sr_col wow fadeIn" data-wow-duration="1s" data-wow-delay=".<?php echo ++$i; ?>s">
                                <div class="sr_box">
                                    <?php if(!empty($wsb_image)) { ?>
                                        <a href="<?php echo $wsb_link; ?>" class="sr_img">
                                            <img src="<?php echo $wsb_image['url']; ?>" alt="<?php echo $wsb_image['alt']; ?>">
                                        </a>
                                    <?php } ?>
                                    <div class="sr_content">
                                        <?php if(!empty($wsb_title)) { ?>
                                            <h3><a href="<?php echo $wsb_link; ?>"><?php echo $wsb_title; ?></a></h3>
                                        <?php } ?>
                                        <?php the_sub_field('wsb_description'); ?>
                                    </div>
                                    <a href="<?php echo $wsb_link; ?>" class="read_more">Read More</a>
                                </div>                                    
                            </div>
                        <?php } ?>
                    </div>   
                </div>
            <?php } ?>
        </div>
    </section>
    <!-- /Welcome to Station Loft Works -->
<?php } ?>

<?php get_template_part('content', 'counter'); ?>

<?php 
    $hide_private_office_section = get_field('hide_private_office_section');
    $pos_image = get_field('pos_image');
    $pos_title = get_field('pos_title');
    $pos_subtitle = get_field('pos_subtitle');
    $pos_button = get_field('pos_button');
?>
<?php if(!$hide_private_office_section) { ?>
    <!-- Private Offices -->
    <section class="sections">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-lg-6 wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                    <?php if(!empty($pos_image)) { ?>
                        <div class="office_img">
                            <div class="fit_img mouse_react_1">
                                <img src="<?php echo $pos_image['url']; ?>" alt="<?php echo $pos_image['alt']; ?>">
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                    <div class="office_left">
                        <?php if(!empty($pos_title) || !empty($pos_subtitle)) { ?>
                            <div class="sections_title left">
                                <?php echo !empty($pos_title) ? '<h2>'.$pos_title.'</h2>' : ''; ?>
                                <?php echo !empty($pos_subtitle) ? '<span>'.$pos_subtitle.'</span>' : ''; ?>
                            </div>
                        <?php } ?>
                        <?php the_field('pos_description'); ?>
                        <?php if(!empty($pos_button)) { 
                            $target = !empty($pos_button['target']) ? '_blank' : '_self';
                        ?> 
                            <div class="btn_holder"><a class="my_btn" href="<?php echo $pos_button['url']; ?>" target="<?php echo $target; ?>"><?php echo $pos_button['title']; ?></a></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Private Offices -->
<?php } ?>

<?php 
    $hide_meeting_section = get_field('hide_meeting_section');
    $ms_image_1 = get_field('ms_image_1');
    $ms_image_2 = get_field('ms_image_2');
    $ms_image_3 = get_field('ms_image_3');
    $ms_title = get_field('ms_title');
    $ms_subtitle = get_field('ms_subtitle');
    $ms_button = get_field('ms_button');
?>
<?php if(!$hide_meeting_section) { ?>
    <!-- Meeting Rooms -->
    <section class="sections p-0">
        <div class="meeting_room">
            <div class="container">
                <div class="row align-items-end mouse_react" data-id="3">
                    <div class="col-lg-6">
                        <?php if(!empty($ms_image_1) || !empty($ms_image_2) || !empty($ms_image_3)) { ?>
                            <div class="slw_left">
                                <div class="row align-items-end">
                                    <?php if(!empty($ms_image_1) || !empty($ms_image_2)) { ?>
                                        <div class="col-6 slw_col wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                                            <?php if(!empty($ms_image_1)) { ?>
                                                <div class="fit_img slw_img_1 react_element4">
                                                    <img src="<?php echo $ms_image_1['url']; ?>" alt="<?php echo $ms_image_1['alt']; ?>">
                                                </div>
                                            <?php } ?>
                                            <?php if(!empty($ms_image_2)) { ?>
                                                <div class="fit_img slw_img_2 react_element5">
                                                    <img src="<?php echo $ms_image_2['url']; ?>" alt="<?php echo $ms_image_2['alt']; ?>">
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                    <?php if(!empty($ms_image_3)) { ?>
                                        <div class="col-6 slw_col wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                                            <div class="fit_img slw_img_3 react_element6">
                                                <img src="<?php echo $ms_image_3['url']; ?>" alt="<?php echo $ms_image_3['alt']; ?>">
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-6 white wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                        <?php if(!empty($ms_title) || !empty($ms_subtitle)) { ?>
                            <div class="sections_title left">
                                <?php echo !empty($ms_title) ? '<h2>'.$ms_title.'</h2>' : ''; ?>
                                <?php echo !empty($ms_subtitle) ? '<span>'.$ms_subtitle.'</span>' : ''; ?>
                            </div>
                        <?php } ?>
                        <?php the_field('ms_description'); ?>
                        <?php if(!empty($ms_button)) { 
                            $target = !empty($ms_button['target']) ? '_blank' : '_self';
                        ?> 
                            <div class="btn_holder"><a class="my_btn white" href="<?php echo $ms_button['url']; ?>" target="<?php echo $target; ?>"><?php echo $ms_button['title']; ?></a></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Meeting Rooms -->
<?php } ?>

<?php 
    $hide_virtual_office_section = get_field('hide_virtual_office_section');
    $vos_image = get_field('vos_image');
    $vos_title = get_field('vos_title');
    $vos_subtitle = get_field('vos_subtitle');
    $vos_button = get_field('vos_button');
?>
<?php if(!$hide_virtual_office_section) { ?>
    <!-- Virtual Offices -->
    <section class="sections">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-lg-6 wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                    <?php if(!empty($vos_image)) { ?>
                        <div class="office_img">
                            <div class="fit_img">
                                <img src="<?php echo $vos_image['url']; ?>" alt="<?php echo $vos_image['alt']; ?>">
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                    <div class="office_left">
                        <?php if(!empty($vos_title) || !empty($vos_subtitle)) { ?>
                            <div class="sections_title left">
                                <?php echo !empty($vos_title) ? '<h2>'.$vos_title.'</h2>' : ''; ?>
                                <?php echo !empty($vos_subtitle) ? '<span>'.$vos_subtitle.'</span>' : ''; ?>
                            </div>
                        <?php } ?>
                        <?php the_field('vos_description'); ?>
                        <?php if(!empty($vos_button)) { 
                            $target = !empty($vos_button['target']) ? '_blank' : '_self';
                        ?> 
                            <div class="btn_holder"><a class="my_btn" href="<?php echo $vos_button['url']; ?>" target="<?php echo $target; ?>"><?php echo $vos_button['title']; ?></a></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Virtual Offices -->
<?php } ?>

<?php get_template_part('content', 'testimonial'); ?>

<?php 
    $hide_how_it_works_section = get_field('hide_how_it_works_section');
    $hiws_title = get_field('hiws_title');
    $hiws_description = get_field('hiws_description');
    $hiwsb_button = get_field('hiwsb_button');
?>
<?php if(!$hide_how_it_works_section) { ?>
    <?php if(have_rows('hiws_boxes')) { $i = 0.2; ?>
        <!-- How it works? -->
        <section class="sections">
            <div class="container">
                <?php if(!empty($hiws_title) || !empty($hiws_description)) { ?>
                    <div class="sections_title wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                        <?php echo !empty($hiws_title) ? '<h2>'.$hiws_title.'</h2>' : ''; ?>
                        <?php the_field('hiws_description'); ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <?php while(have_rows('hiws_boxes')) { the_row(); 
                        $hiwsb_image = get_sub_field('hiwsb_image'); 
                        $hiwsb_step_title = get_sub_field('hiwsb_step_title'); 
                        $hiwsb_title = get_sub_field('hiwsb_title'); 
                        $hiwsb_description = get_sub_field('hiwsb_description'); 
                        $hiwsb_link = get_sub_field('hiwsb_link'); 
                    ?>
                        <div class="col-lg-3 col-md-6 hw_col wow fadeIn" data-wow-duration="1.5s" data-wow-delay="<?php echo $i; ?>s">
                            <div class="hw_box">
                                <?php if(!empty($hiwsb_image)) { ?>
                                    <div class="fit_img">
                                        <img src="<?php echo $hiwsb_image['url']; ?>" alt="<?php echo $hiwsb_image['alt']; ?>">
                                    </div>
                                <?php } ?>
                                <div class="hw_content">
                                    <?php if(!empty($hiwsb_step_title)) { ?>
                                        <span class="step_title"><?php echo $hiwsb_step_title; ?></span>
                                    <?php } ?>
                                    <?php if(!empty($hiwsb_title)) { ?>
                                        <h3><a href="<?php echo $hiwsb_link; ?>"><?php echo $hiwsb_title; ?></a></h3>
                                    <?php } ?>
                                    <?php the_sub_field('tsb_description'); ?>
                                </div>
                            </div>
                        </div>
                    <?php $i = $i + 0.3; } ?> 
                </div>
                <?php if(!empty($hiwsb_button)) { 
                    $target = !empty($hiwsb_button['target']) ? '_blank' : '_self';
                ?> 
                    <div class="btn_holder text-center wow fadeIn" data-wow-duration="1s" data-wow-delay="1.4s"><a class="my_btn" href="<?php echo $hiwsb_button['url']; ?>" target="<?php echo $target; ?>"><?php echo $hiwsb_button['title']; ?></a></div>
                <?php } ?>
            </div>
        </section>
        <!-- How it works? -->
    <?php } ?>
<?php } ?>

<?php get_template_part('content', 'companies'); ?>

<?php get_footer(); 

