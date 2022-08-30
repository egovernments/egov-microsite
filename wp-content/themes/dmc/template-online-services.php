<?php 
/**
 * Template Name: Online Services Template
 * */
get_header();
?>
<div id="main-content">
 <section class="online-services sec-spacing bg">
        <div class="container">
            <div class="row">
            	<?php  
     
     $service_args = array(
          'posts_per_page' => -1,
            'post_type' => 'services',
            'post_status' => 'publish',
                'orderby' => 'post_date',
                'order'   => 'ASC',
        
      );
      $serviceItems = new WP_Query( $service_args );


if( $serviceItems->have_posts() ) {
    
while ( $serviceItems->have_posts()){ $serviceItems->the_post();

 ?>
                <div class="col-lg-2 col-sm-4 col-xs-6 align-items-stretch">
                	<a href="<?php the_permalink();?>"> 
                    <div class="card text-center">
                        <div class="icon">
                            <?php echo the_field('upload_icon');?>
                            <!--<img src="<?php echo the_field('upload_icon');?>" class="img-fluid" width="45px">-->
                        </div>
                        <div class="title">
                            <?php the_title();?>
                        </div>
                    </div>
                </a>
                </div>
                <?php }
wp_reset_postdata();
                 } ?>
               
            </div>
        </div>
    </section>


    <section class="sec-spacing">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title"><?php echo get_field('title');?></div>
                    </div>
                </div>
            </div>
            <?php 
            $faqs = get_field('add_multiple_faq');
            if($faqs){
            ?>
            <div class="accordion" id="accordionFaqs">
            <?php 
            $i=1;
            foreach($faqs as $faq){
           
            ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo$i;?>">
                            <?php echo $faq['question'];?> 
                    </button>
                    </h2>
                    <div id="collapse<?php echo$i;?>" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#accordionFaqs">
                        <div class="accordion-body">
                            <p><?php echo $faq['answer'];?></p>
                        </div>
                    </div>
                </div>
               <?php $i++; } ?>
            </div>
        <?php } ?>
        </div>
    </section>

    <section class="citizen-speaks position-relative bg sec-spacing">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title">
                            <?php the_field('heading');?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <!-- Swiper -->
                    <?php 
            $testimonials = get_field('add_citizen_testimonials');
            if($testimonials){
            ?>
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                        <?php 
            $i=1;
            foreach($testimonials as $testimonial){
           
            ?> 	
                            <div class="swiper-slide">
                                <div class="card">
                                    <div class="image">
                                        <img src="<?php echo $testimonial['image']['url']?>" class="img-fluid">
                                    </div>
                                    <div class="info">
                                        <h3 class="name text-white"><?php echo $testimonial['name']?></h3>
                                        <h4 class="place text-white"><?php echo $testimonial['city']?></h4>
                                    </div>
                                    <div class="content">
                                        <p>"<?php echo $testimonial['feedback']?>"</p>
                                    </div>
                                </div>
                            </div>
                           <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
             <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
        </div>
    </section>
</div>
<?php 

get_footer();