<?php 

get_header();

?>
<div id="main-content">
  <section class="sec-spacing pb-5">
        <div class="container">
         

            <div class="row gx-5">
                <div class="col-md-6">
                	<?php
                	$banner=get_field('upload_banner');
                	if($banner){
                	?>
                    <img src="<?php echo $banner['url'];?>" class="img-fluid w-100 mb-4" style="max-height: 478px; object-fit: cover;">
                <?php } ?>
                </div>
                <div class="col-md-6">
                    <h2 class="heading"><?php the_title()?></h2>
                    <p class="font-12 fw-600 mb-2"><?php echo get_the_date('F j, Y');?></p>
                    <?php the_content();?>
                </div>
            </div>
        </div>
    </section>

<?php  
     
     $news_args = array(
          'posts_per_page' => -1,
            'post_type' => 'news',
            'post_status' => 'publish',
            'post__not_in' => array( get_the_ID()),
                'orderby' => 'post_date',
                'order'   => 'DESC',
        
      );
      $newsItems = new WP_Query( $news_args );


if( $newsItems->have_posts() ) { ?>
    <section class="news stories bg sec-spacing pb-2 pos-rel">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title">
                            More Stories
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5 pb-3">
                <div class="col">
                    <!-- Swiper -->
                    <div class="swiper newsCard">
                        <div class="swiper-wrapper">
                        	 
   <?php while ( $newsItems->have_posts()){ $newsItems->the_post(); 

$terms = wp_get_post_terms( get_the_ID(), array( 'news_category') );
$getbanner=get_field('upload_banner');
    ?>
                            <div class="swiper-slide">
                                <div class="card">
                                    <div class="image">
                                        <a href="<?php the_permalink();?>">  <img src="<?php echo $getbanner['url'];?>" class="img-fluid"></a>
                                    </div>
                                    <div class="date"><?php echo get_the_date('F j, Y');?></div>
                                    <div class="inner">
                                        <div class="cat">
                                            <?php foreach ( $terms as $term ){
                                                echo $term->name." ";
                                             } ?></div>
                                        <div class="heading"> <?php the_title();?></div>
                                        <a href="<?php the_permalink();?>" class="link">Continue Reading <span><img src="<?php echo get_stylesheet_directory_uri();?>/images/arrow-red.png" class="img-fluid"></span></a>
                                    </div>
                                </div>
                            </div>
                           <?php } ?>

                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
</div>

<?php

get_footer();