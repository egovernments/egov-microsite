<?php 
/****
Template Name: Dashboards Template
 ***/

get_header();

?>

  <?php  
	 
	 $dashboards_args = array(
	      'posts_per_page' => -1,
        	'post_type' => 'dashboards',
        	'post_status' => 'publish',
        	    'orderby' => 'post_date',
        	    'order'   => 'ASC',
        
      );
      $dashboardItems = new WP_Query( $dashboards_args );


?>
<div id="main-content">
<section class="sec-spacing bg pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <aside class="sidebar">
                        <ul style="margin:0px;"> 
                        	<?php
                         if( $dashboardItems->have_posts() ) {
    $i=1;
    $data=array();
while ( $dashboardItems->have_posts()){ $dashboardItems->the_post();
	if($i==1){
		$active='current';
		
		$data=array(
            'title'=>get_the_title(get_the_ID()),
            'dashboard_id' =>get_the_ID()
		);
	}else{
		$active='';
	}
                        	?>

                            <li class="<?php echo $active;?>"><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
                        <?php $i++;}
                        } ?>
                        </ul>
                    </aside>
                </div>
                <div class="col-lg-9">
                	<?php
                	if($data){
                		?>
                    <div class="header">
                        <div class="title"><?php echo $data['title'];?></div>
                    </div>
                      <div class="box-card">
                        <div class="content">
                           <?php echo get_the_content($data['dashboard_id']);?>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?php

get_footer();