<?php 
/** Template Name: Surveys Template
 *****/
get_header();

?>

<div id="main-content">
     <section class="surveys sec-spacing bg pb-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title">Surveys</div>
                    </div>
                </div>
            </div>

            <?php  
     
      $surveys_args = array(
          'posts_per_page' => -1,
            'post_type' => 'surveys',
            'post_status' => 'publish',
                'orderby' => 'post_date',
                'order'   => 'DESC',
        
      );
      $surveysItems = new WP_Query( $surveys_args );

if( $surveysItems->have_posts() ) { ?>
               <div class="main-wrap">
 <?php while ( $surveysItems->have_posts()){ $surveysItems->the_post(); 

    ?>
    <?php
                          $activeDate= get_field('survey_last_date');
                        $todayDaytime= date('j M Y g:i a');

                     $diff = strtotime($activeDate) - strtotime($todayDaytime); 
            


                          if($activeDate && ($diff>0)){
                        ?>
            <div class="box-card">
                <div class="col">
                    <div class="time-log text-right" style="color: #656565;">
                        
                        <i class="far fa-clock"></i> Active till <?php echo $activeDate;?>

                 
                    </div>
                    <h2 class="heading mb-3"><?php the_title();?></h2>
                    <p><?php the_field('survey_subheading');?></p>
                    <a href="<?php the_permalink();?>" class="btn btn-primary mt-2">Enter Survey</a>
                </div>
            </div>
               <?php }?>
              <?php }
wp_reset_postdata();
             ?>
            </div>
           
       <?php }else{ ?>
  <div class="row">
                <div class="col">
                    <p class="no-data-found"><i class="fa fa-exclamation-circle"></i> No Surveys Found</p>
                     </div>
            </div>
       <?php } ?>

        </div>
    </section>

</div>
<?php

get_footer();