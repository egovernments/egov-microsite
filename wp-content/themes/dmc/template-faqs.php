<?php 
/**
 * Template Name: FAQs Template
 * */
get_header();
?>
<style>
.accordion-button:not(.collapsed)::after {
    transform: rotate(0deg);
}
</style>
<div id="main-content">
    <section class="sec-spacing">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title"><?php echo get_field('enter_your_subtitle');?></div>
                    </div>
                </div>
            </div>

            
            <div class="accordion" id="accordionFaqs">
          <?php  
     
     $service_args = array(
          'posts_per_page' => -1,
            'post_type' => 'faqs',
            'post_status' => 'publish',
                'orderby' => 'post_date',
                'order'   => 'ASC',
        
      );
      $serviceItems = new WP_Query( $service_args );


if( $serviceItems->have_posts() ) {
    $i=1;
while ( $serviceItems->have_posts()){ $serviceItems->the_post();

 ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i;?>">
                            <?php the_title();?> 
                    </button>
                    </h2>
                    <div id="collapse<?php echo $i;?>" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#accordionFaqs">
                        <div class="accordion-body">
                           <?php the_content();?>
                        </div>
                    </div>
                </div>
              <?php 
          $i++;
      }
wp_reset_postdata();
                 } ?>
            </div>
      
        </div>
    </section>

</div>
<?php 

get_footer();