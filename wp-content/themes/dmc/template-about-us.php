<?php
/*
* Template Name: About Us Template
*/

get_header(); ?>
<div id="main-content">
    <section class="sec-spacing bg">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title"><?php echo the_field('heading');?></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="text-wrap">
                        <?php echo the_field('description');?>
                    </div>
                </div>
            </div>
            <?php
      $rows = get_field('more_information');
    
        foreach($rows as $info){
            ?>
           <div class="row sec-spacing gx-5">
                <div class="col-md-6">
                    <div class="text-wrap">
                        <h2 class="heading">
                            <?php echo $info['title'];?>
                        </h2>
                        <?php echo $info['description'];?>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="<?php echo $info['banner']['url'];?>" class="img-fluid">
                </div>
            </div>
            <?php } 
            ?>
        </div>
    </section>
	
    <section class="about-gallery sec-spacing position-relative pb-0">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title">
                          <?php echo the_field('gallery_title');?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <!-- Swiper -->
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
<?php 
                $rows_gallery = get_field('gallery_list');
               
                   foreach($rows_gallery as $gallery_list){
                    $post_id=$gallery_list['select_gallery']->ID;
                    $featured_img_url = get_the_post_thumbnail_url($post_id,'full'); 
                        	?>
                            <div class="swiper-slide">
                                <div class="card">
                                    <div class="image">
                                        <img src="<?php echo esc_url($featured_img_url);?>" class="img-fluid">
                                    </div>
                                    <div class="content">
                                        <h3 class="col-heading"><?php echo $gallery_list['select_gallery']->post_title;?></h3>
                                        <a href="<?php echo get_the_permalink($post_id);?>" class="link">View More <span><img src="<?php echo get_stylesheet_directory_uri();?>/images/arrow-red.png" class="img-fluid"></span></a>
                                    </div>
                                </div>
                            </div>
                           <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <div class="row my-5">
                <div class="col text-center">
                    <a href="<?php  the_field('gallery_link');?>" class="btn btn-primary">View Gallery <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
</div>
	<?php

get_footer();