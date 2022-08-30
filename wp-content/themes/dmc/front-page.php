<?php
/**
 * Front Page
 *
 * @package Hotell
 */

$home_sections = array( 'about', 'cta', 'gallery', 'video', 'blog', 'footer-top' );

if ( 'posts' == get_option( 'show_on_front' ) ) { //Show Static Blog Page
    include( get_home_template() );
}elseif( $home_sections ){
    get_header();
    ?>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
     $sliders=get_field('slider_banner');
    $i=1;
foreach($sliders as $slider){
    if($i==1){
        $active='active';
    }else{
        $active='';
    }
            ?>
            <div class="carousel-item <?php echo $active;?>">
                <img src="<?php echo $slider['upload_banner']['url'];?>" class="d-block w-100" alt="<?php echo $slider['banner_title'];?>">
                <div class="carousel-caption">
                    <strong><?php echo $slider['banner_title'];?> - </strong><?php echo $slider['banner_description'];?>
                </div>
            </div>
            <?php $i++;} ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Previous</span>
         </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Next</span>
         </button>
    </div>
    <div id="main-content">
       <section class="online-services sec-spacing">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title"><?php echo get_field('online_services_title');?></div>
                        <a href="<?php echo get_field('online_service_url');?>" class="btn btn-link">View All <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
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
                          <!--  <img src="<?php echo the_field('upload_icon');?>" class="img-fluid" width="45px">-->
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
     <section class="leaders">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title">Meet our Leaders</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php  
     
     $leaders_args = array(
          'posts_per_page' => 1,
            'post_type' => 'leaders',
            'post_status' => 'publish',
            'meta_query' => array(
	    array(
			'key'   => 'leader_type',
			'value' => 'CM',
	    )
        ),
                'orderby' => 'post_date',
                'order'   => 'DESC',
        
      );
      $leadersItems = new WP_Query( $leaders_args );


if( $leadersItems->have_posts() ) {
    $i=1;
    $leader_data=array();
while ( $leadersItems->have_posts()){ $leadersItems->the_post();

$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
 ?>
                <div class="col-md-6 d-flex align-item-stretch">
                    <div class="main">
                        <div class="image">
                            <img src="<?php echo esc_url($featured_img_url);?>" class="img-fluid">
                        </div>
                        <div class="content">
                            <div class="name"><?php echo get_the_title(get_the_ID());?></div>
                            <div class="profile"><?php echo get_post_meta(get_the_ID(),'position', true);?></div>
                            <a href="<?php echo get_the_permalink(get_the_ID());?>" class="btn btn-primary mt-4">Know More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php 
            }
wp_reset_postdata();

} ?>
                <div class="col-md-6 d-flex align-item-stretch">
                    <div class="row">
                       <?php
                       
                       $leaders_args1 = array(
          'posts_per_page' => 4,
            'post_type' => 'leaders',
            'post_status' => 'publish',
            'meta_query' => array(
	    array(
			'key'   => 'leader_type',
			'value' => 'Members',
	    )
        ),
                'orderby' => 'post_date',
                'order'   => 'DESC',
        
      );
      $leadersItems1 = new WP_Query( $leaders_args1 );


if( $leadersItems1->have_posts() ) {
                       while ( $leadersItems1->have_posts()){ $leadersItems1->the_post();

$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                      
                      echo '<div class="col-lg-6">
                            <div class="card">
                                <div class="image">
                                    <img src="'.esc_url($featured_img_url).'" class="img-fluid">
                                </div>
                                <div class="content">
                                    <div class="name">'.get_the_title(get_the_ID()).'</div>
                                    <div class="profile">'.get_post_meta(get_the_ID(),'position', true).'</div>
                                    <a href="'.get_the_permalink(get_the_ID()).'" class="btn btn-primary">Know More <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>';
                      
                       }
                       wp_reset_postdata();
                       }
                       ?> 
                       
                    </div>
                </div>
            
            </div>
        </div>
    </section>
    <section class="stats sec-spacing">
        <div class="container graphic-bg">
            <div class="row">
                <div class="col-md-4">
                    <div class="box">
                        <div class="no">
                          <div class="counter" data-target="<?php echo the_field('years_of_foundation');?>"></div>
                        </div>
                        <div class="title">
                            <?php echo the_field('counter_heading_1');?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="no">
                        <div class="counter" data-target=" <?php echo the_field('people_in_the_city');?>"></div>
                        <span>k</span>
                        </div>
                        <div class="title">
                             <?php echo the_field('counter_heading_2');?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="no">
                          <div class="counter" data-target="<?php echo the_field('square_of_city');?>"></div>
                           <span>k</span>
                        </div>
                        <div class="title">
                             <?php echo the_field('counter_heading_3');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="links bg sec-spacing">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="header">
                        <div class="title"><?php echo the_field('title');?></div>
                    </div>
                    <?php echo the_field('description');?>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="row bg-white">
                        <div class="col-lg-6">
                            <div class="box">
                                <ul>
                                    <?php 

                                    $links = get_post_meta(get_the_ID(),'links',true);
                                    $totalLinks= $links;
                                    $totalcol=round(($totalLinks / 2),0);

                                    for($i=0; $i<$totalcol;$i++){
                                    $titlemetakey='links_'.$i.'_link_title';
                                    $urlmetakey='links_'.$i.'_link_url';
                                    ?>
                                    <li><a href="<?php echo get_post_meta(get_the_ID(),$urlmetakey,true)?>" target="_blank"><?php echo get_post_meta(get_the_ID(),$titlemetakey,true)?> 
                                    <span style="float: right;">
<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M16 16.5H2V2.5H9V0.5H2C0.89 0.5 0 1.4 0 2.5V16.5C0 17.6 0.89 18.5 2 18.5H16C17.1 18.5 18 17.6 18 16.5V9.5H16V16.5ZM11 0.5V2.5H14.59L4.76 12.33L6.17 13.74L16 3.91V7.5H18V0.5H11Z" fill="#1C343E"/>
</svg>
   
                                    </span>
                                    </a></li>
                                   <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box second">
                                <ul>
                                    <?php
                                   for($i=$totalcol; $i<$links;$i++){
                                    $titlemetakey='links_'.$i.'_link_title';
                                    $urlmetakey='links_'.$i.'_link_url';
                                    ?>
                                    <li><a target="_blank" href="<?php echo get_post_meta(get_the_ID(),$urlmetakey,true)?>"><?php echo get_post_meta(get_the_ID(),$titlemetakey,true)?>   <span style="float: right;">
<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M16 16.5H2V2.5H9V0.5H2C0.89 0.5 0 1.4 0 2.5V16.5C0 17.6 0.89 18.5 2 18.5H16C17.1 18.5 18 17.6 18 16.5V9.5H16V16.5ZM11 0.5V2.5H14.59L4.76 12.33L6.17 13.74L16 3.91V7.5H18V0.5H11Z" fill="#1C343E"/>
</svg>
   
                                    </span></a></li>
                                   <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <section class="news sec-spacing pb-0">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title">
                            <?php the_field('news_heading');?>
                        </div>
                    </div>
                </div>
            </div>
            
                    <!-- Swiper -->
                    <?php  
     
     $news_args = array(
          'posts_per_page' => 4,
            'post_type' => 'news',
            'post_status' => 'publish',
                'orderby' => 'post_date',
                'order'   => 'DESC',
        
      );
      $newsItems = new WP_Query( $news_args );


if( $newsItems->have_posts() ) { ?>
   

<div class="row">
                <div class="col">
                    <div class="swiper newsSwiper">
                        <div class="swiper-wrapper">
<?php while ( $newsItems->have_posts()){ $newsItems->the_post(); 

$terms = wp_get_post_terms( get_the_ID(), array( 'news_category') );
    ?>
                               <div class="swiper-slide">
                                <div class="card">
                                    <div class="date"><?php echo get_the_date('F j, Y');?></div>
                                    <div class="inner">
                                        <div class="cat">
                                            <?php foreach ( $terms as $term ){
                                                echo $term->name." ";
                                             } ?></div>
                                        <div class="heading"><?php the_title();?></div>
                                        <p><?php the_excerpt();?></p>
                                         <a href="<?php the_permalink();?>"><p class="link">Continue Reading <i class="fas fa-arrow-right"></i></p></a>
                                    </div>
                                </div>
                            </div>
                          <?php } 
wp_reset_postdata();
                          ?>
                        </div>
                    </div>
              <div class="news-swiper swiper-button-prev"></div>
              <div class="news-swiper swiper-button-next"></div>
              </div>
            </div>

            <div class="row my-5">
                <div class="col text-center">
                    <a href=" <?php the_field('news_read_more_url');?>" class="btn btn-primary">Read More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
             <?php }else{?>
                <div class="row">
                <div class="col">
                    <p class="no-data-found"><i class="fa fa-exclamation-circle"></i> No News Available</p>
                     </div>
            </div>
               <?php } ?> 

        </div>
    </section>
    <section class="upcoming-events sec-spacing bg">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title">
                            <?php the_field('event_heading');?>
                        </div>
                    </div>
                </div>
            </div>

            
                <?php  
     
     $events_args = array(
          'posts_per_page' => 3,
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
                                <div class="shorteventdesc<?php echo $countevent;?>" style="padding: 15px 0px 0px;">
                                    <?php the_excerpt();?>
                                </div>
                                  <a href="javascript:void(0);" data-id="<?php echo $countevent;?>" type="button" data-bs-toggle="collapse" class="eread-more eread-more<?php echo $countevent;?>" data-bs-target="#collapse<?php echo $countevent;?>" aria-expanded="false" style="margin-top:0px;">Read More <i class="fas fa-arrow-right"></i></a>
                                <div class="accordion-item">
                     <div id="collapse<?php echo $countevent;?>"  class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#accordionEvent" style="background-color:#f8f8f8;">
                        <div class="accordion-body" style="background-color:#f8f8f8;padding: 15px 0px 0px;">
                           <?php the_content();?>
                           <p>
                            <a href="javascript:void(0);" data-id="<?php echo $countevent;?>" type="button" data-bs-toggle="collapse" class="eread-less" data-bs-target="#collapse<?php echo $countevent;?>" >Read Less <i class="fas fa-arrow-right"></i></a></p>
                        </div>
                       
                    </div></div>
                            </div>
                            <div class="col-lg-5 text-right">
                                 <a href="<?php the_field('registration_url');?>" class="btn btn-primary">REGISTER NOW<i class="fas fa-arrow-right"></i></a>
                            
                            </div>
                        </div>
                    </div>
                </div>
            <?php $countevent++;}
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
   <?php }else{

    ?>
            <div class="row text-center">
            <div class="col">
                <a href="<?php the_field('view_all_events_url');?>" class="btn-link">View All Events <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    <?php } ?>
       <?php }else{ ?>
  <div class="row">
                <div class="col">
                    <p class="no-data-found"><i class="fa fa-exclamation-circle"></i> No Events & Activities</p>
                     </div>
            </div>
       <?php } ?>
        </div>
        
    </section>
    <section class="quick-contact sec-spacing">
        <div class="container">
            <div class="row gx-5">
                <div class="col-md-3 col-xs-6">
                   <a class="desc" href="tel:<?php echo str_replace(array(" ",'-'),array('',''),get_field('call_on','437'));?>">
                     <div class="card">
                        <div class="icon">
                            <i class="fa fa-phone-volume" style="transform: rotate(-50deg);"></i>
                        </div>
                        <div class="content">
                            <div class="title">
                                Call on
                            </div>
                            <div class="desc">
                               
                               <?php the_field('call_on','437');?>
                            </div>
                        </div>
                    </div></a>
                </div>
                <div class="col-md-3 col-xs-6">
                     <a class="desc" href="mailto:<?php  echo get_field('mail_at','437');?>">
                               <div class="card">
                        <div class="icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="content">
                            <div class="title">
                                Mail At
                            </div>
                            <div class="desc">
                                <?php  the_field('mail_at','437');?>
                            </div>
                        </div>
                    </div></a>
                </div>
                <div class="col-md-3 col-xs-6">
                   <a href="javascript:void(0);"> <div class="card">
                        <div class="icon">
                            <i class="fa fa-clock"></i>
                        </div>
                        <div class="content">
                            <div class="title">
                                 Office Hours
                            </div>
                            <div class="desc">
                             <?php the_field('office_hours','437');?>
                            </div>
                        </div>
                    </div></a>
                </div>
                <div class="col-md-3 col-xs-6">
                   <a class="desc" target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo str_replace(array(" ",'-','+'),array('','',''),get_field('whatsapp_number','437'));?>">
                     <div class="card">
                        <div class="icon">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div class="content">
                            <div class="title">
                                Whatsapp
                            </div>
                            <div class="desc">
                              
                                 <?php the_field('whatsapp_number','437');?>
                          
                            </div>
                        </div>
                    </div>   </a>
                </div>
            </div>
        </div>
    </section>
     <section class="sec-spacing bg">
        <div class="container">
            <div class="row gx-5">
                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="photo-gallery text-center">
                        <div class="title">
                           <?php the_field('gallery_heading');?>
                        </div>
                        <div class="row mb-4">
                                     <?php  
     
     $gallery_args = array(
          'posts_per_page' => 6,
            'post_type' => 'gallery',
            'post_status' => 'publish',
                'orderby' => 'post_date',
                'order'   => 'ASC',
        
      );
      $galleryItems = new WP_Query( $gallery_args );


if( $galleryItems->have_posts() ) {
    $buttonStatus="";
   
while ( $galleryItems->have_posts()){ $galleryItems->the_post();

$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');

 ?>
                            <div class="col-md-4 col-xs-6 ">
                                <img src="<?php echo esc_url($featured_img_url);?>" class="img-fluid">
                            </div>
                           
                           <?php
                       }
wp_reset_postdata();
                   }else{ 
$buttonStatus="disabled";
                    ?>
 <div class="row">
                <div class="col">
                    <p class="no-data-found" style="padding: 90px 10px;"><i class="fa fa-exclamation-circle"></i> No Images Available</p>
                     </div>
            </div>

                 <?php  }
                           ?>

                        </div>
                        <?php
                      if($buttonStatus !=''){ ?>
                  <a  class="btn btn-secondary" style="margin-bottom:10px;">View Gallery  <i class="fas fa-arrow-right"></i></a>
                   <?php   }else{ ?>
                 <a href="<?php the_field('gallery_page');?>" class="btn btn-primary">View Gallery  <i class="fas fa-arrow-right"></i></a>
                   <?php   }
                        ?>
                      
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="social-card ">
                        <div class="meta">
                            <div>
                                <img src="<?php echo get_stylesheet_directory_uri();?>/images/facebook-logo.png" class="img-fluid" width="70px">
                            </div>
                            <div class="name">
                                 <?php echo get_field('facebook_feed_heading');?>
                            </div>
                        </div>
                        <div class="feed change-scrollbar">
                            <?php echo get_field('facebook_feed');?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="social-card ">
                        <div class="meta">
                            <div>
                                <img src="<?php echo get_stylesheet_directory_uri();?>/images/twitter-logo.png" class="img-fluid" width="46px">
                            </div>
                            <div class="name">
                                <?php echo get_field('twitter_feed_heading');?>
                            </div>
                        </div>
                        <div class="feed change-scrollbar">
                            <?php echo get_field('twitter_feed');?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="client-slider sec-spacing">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="swiper clientSwiper">
                        <div class="swiper-wrapper">
                            <?php 
                                    $logos = get_post_meta(get_the_ID(),'logos',true);
                               for($i=0; $i<$logos;$i++){
                              $upload_logo='logos_'.$i.'_upload_logo';
                              $logo_url='logos_'.$i.'_url';
                              $image_logo=get_post_meta(get_the_ID(), $upload_logo,true);
                              $image_attributes = wp_get_attachment_image_src( $image_logo,'full');
                              $geturl=get_post_meta(get_the_ID(), $logo_url,true)
                                    ?>
                            <div class="swiper-slide">
                              <a href="<?php echo $geturl;?>" target="_blank">  <img src="<?php echo $image_attributes[0];?>" class="img-fluid"></a>
                            </div>
                        <?php } 
                        ?>
                        </div>
                    </div>
                    
                    <div class="client-swiper swiper-button-prev">
                    </div>
                    <div class="client-swiper swiper-button-next">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

    <?php
    //If any one section are enabled then show custom home page.
    foreach( $home_sections as $section ){
        get_template_part( 'sections/' . $section );
    }
    get_footer();
}else{
    //If all section are disabled then show respective page template.
    include( get_page_template() );
}