<?php 
/** Template Name: Notifications Template
 *****/
get_header();

?>

<div id="main-content">
     <section class="surveys sec-spacing bg pb-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title"><?php the_title();?></div>
                    </div>
                </div>
            </div>

            <?php  
     
      $notification_args = array(
          'posts_per_page' => -1,
            'post_type' => 'notification',
            'post_status' => 'publish',
                'orderby' => 'post_date',
                'order'   => 'DESC',
        
      );
      $notificationItems = new WP_Query( $notification_args );

if( $notificationItems->have_posts() ) { ?>
               <div class="main-wrap">
 <?php while ( $notificationItems->have_posts()){ $notificationItems->the_post(); 

    ?>
            <div class="box-card">
                <div class="col">
                    <div class="time-log text-right" style="color: #656565;">
                        <?php
                          $activeDate= get_the_date( 'Y-m-d' );
                         $todayDaytime= date('Y-m-d');

                     $diff = round((strtotime($todayDaytime) - strtotime($activeDate))/(60 * 60 * 24)); 
                    


                          if($activeDate){
                              $month=round(($diff/30),0);
                              $year=round(($diff/365),0);
                            if($diff==0){
                                $days="Today";
                            }elseif($diff<=30){
                                $days= $diff." Days ago";
                            }elseif( $month <=12 && $month>0){
                                 $days=$month." Months ago";
                            }elseif($year >0){
                                 $days=$year." Years ago";
                            }else{
                                $days= $diff." Days ago";
                            }
                        ?>
                        <i class="far fa-clock"></i> <?php echo $days;?>

                    <?php }else{ ?>
                       <i class="far fa-clock"></i> Closed
                   <?php } ?>
                    </div>
                    <h2 class="heading mb-3"><?php the_title();?></h2>
                    <p><?php the_content();?></p>
                    <?php 
                    if(get_field('notification_button_url') !=='' && get_field('notification_button_title') !==''){
                    ?>
                    <a href="<?php the_field('notification_button_url');?>" class="btn btn-primary mt-2"><?php the_field('notification_button_title');?></a>
                <?php } ?>
                </div>
            </div>
              <?php }
wp_reset_postdata();
             ?>
            </div>
           
       <?php }else{ ?>
  <div class="row">
                <div class="col">
                    <p class="no-data-found"><i class="fa fa-exclamation-circle"></i> No Notifications Found</p>
                     </div>
            </div>
       <?php } ?>

        </div>
    </section>

</div>
<?php

get_footer();