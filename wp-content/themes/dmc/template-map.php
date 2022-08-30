<?php
/*
* Template Name: Map Template
*/

get_header(); ?>
<div id="main-content">
     <section class="sec-spacing bg">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title"><?php the_field('city_map_heading');?></div>
                    </div>
                </div>
            </div>
            <div class="row wrap-reverse gx-5">
                <div class="col-lg-7">
                     <?php the_field('city_map_iframe');?>
                </div>
                <div class="col-lg-5">
                   <?php the_field('city_map_description');?>
                </div>
            </div>
        </div>
    </section>
    <section class="sec-spacing pt-0 bg">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title"><?php the_field('topograhical_map_heading');?></div>
                    </div>
                </div>
            </div>
            <div class="row gx-5">
                <div class="col-lg-5">
                  <?php the_field('topograhical_map_description');?>
                </div>
                <div class="col-lg-7 text-right">
                    <?php 
                     $image =get_field('topograhical_map_image');
                    if($image){?>
                    <img src="<?php echo $image['url']?>" class="img-fluid topograhical-map">
                <?php } ?>
                </div>
            </div>
        </div>
    </section>
</div>
	<?php

get_footer();

