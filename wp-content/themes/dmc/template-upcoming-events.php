<?php 
/** Template Name: Upcoming Events Template
 *****/
get_header();

?>

<div id="main-content">
<section class="upcoming-events sec-spacing bg">
        <div class="container">
             <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title">All Upcoming Events</div>
                    </div>
                </div>
            </div>
                <?php  
     
      $events_args = array(
          'posts_per_page' => -1,
            'post_type' => 'events',
            'post_status' => 'publish',
            'meta_key' => 'event_date',
    'orderby' => 'meta_value',
                'order'   => 'DESC',
        
      );
      $eventsItems = new WP_Query( $events_args );

$countevent=1;
if( $eventsItems->have_posts() ) { ?>
               <div class="main-wrap">
 <?php while ( $eventsItems->have_posts()){ $eventsItems->the_post(); 
$date=get_post_meta(get_the_ID(),'event_date',true);
$currentDate=date('Ymd');
if($currentDate<=$date){
    ?>
                <div class="row card-wrap">
                    <div class="col-xl-2 col-lg-3 col-md-4 left">
                        <div class="timestamp">
                            <div class="date"><?php echo date('j', strtotime($date));?></div>
                            <div class="month"><?php echo date('F', strtotime($date));?></div>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-9 col-md-8 col-xs-6 info">
                        <div class="row align-item-center">
                            <div class="col-lg-7 accordion" id="accordionEvent">
                                <div class="heading">
                                   <?php the_title();?>
                                </div>
                                <div class="subheading">
                                    <?php the_field('event_sub_heading');?>
                                </div>
                                <div class="meta">
                                    <div class="location">
                                        <i class="fas fa-map-marker-alt"></i> <?php the_field('event_venue');?>
                                    </div>
                                    <div class="time">
                                        <i class="fas fa-clock"></i> <?php the_field('event_time_from');?> - <?php the_field('event_time_to');?>
                                    </div>
                                </div>
                                <div class="upshorteventdesc<?php echo $countevent;?>" style="margin-top:10px;">
                                    <?php the_excerpt();?>
                                </div>
                                <a href="javascript:void(0);" data-id="<?php echo $countevent;?>" type="button" data-bs-toggle="collapse" class="upread-more upread-more<?php echo $countevent;?>" data-bs-target="#collapse<?php echo $countevent;?>" >Read More <i class="fas fa-arrow-right"></i></a>
                                <div class="accordion-item">
                     <div id="collapse<?php echo $countevent;?>"  class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#accordionEvent" style="background-color:#f8f8f8;">
                        <div class="accordion-body" style="background-color:#f8f8f8;padding: 15px 0px 0px;">
                           <?php the_content();?>
                           <p>
                            <a href="javascript:void(0);" data-id="<?php echo $countevent;?>" type="button" data-bs-toggle="collapse" class="upread-less" data-bs-target="#collapse<?php echo $countevent;?>" >Read Less <i class="fas fa-arrow-right"></i></a></p>
                            
                                
                        </div>
                       
                    </div></div>
                            </div>
                            <div class="col-lg-5 text-right">
                                
                                 <a href="<?php the_field('registration_url');?>" class="btn btn-primary">REGISTER NOW<i class="fas fa-arrow-right"></i></a>
                          
                              
                            </div>
                        </div>
                    </div>
                </div>
            <?php 
            $countevent++;
}
            }
wp_reset_postdata();
             ?>
            </div>
           <?php
    if($countevent<=1){ ?>
<div class="row">
                <div class="col">
                    <p class="no-data-found"><i class="fa fa-exclamation-circle"></i> No Events & Activities</p>
                     </div>
            </div>
   <?php }
    ?>
       <?php }else{ ?>
  <div class="row">
                <div class="col">
                    <p class="no-data-found"><i class="fa fa-exclamation-circle"></i> No Events & Activities</p>
                     </div>
            </div>
       <?php } ?>
        </div>
        
    </section>
</div>

 <script>
jQuery(document).ready(function(){
  jQuery(".upread-more").click(function(){
    var dataid=jQuery(this).data("id");
   jQuery(".upread-more.collapsed").show();
 
   jQuery(".upshorteventdesc"+dataid).hide();
    jQuery(".upread-more"+dataid).hide();
    
  });

  jQuery(".upread-less").click(function(){
    var dataid=jQuery(this).data("id");
     jQuery(".upread-more"+dataid).show();
     jQuery(".upshorteventdesc"+dataid).show();
  });
});
</script>
<?php

get_footer();