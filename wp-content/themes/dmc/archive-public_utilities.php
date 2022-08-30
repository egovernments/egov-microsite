<?php 


get_header();

?>

  <?php  
	 
	 $putilities_args = array(
	      'posts_per_page' => -1,
        	'post_type' => 'public_utilities',
        	'post_status' => 'publish',
        	    'orderby' => 'post_date',
        	    'order'   => 'ASC',
        
      );
      $putilitiesItems = new WP_Query( $putilities_args );

?>
<div id="main-content">
<section class="sec-spacing bg pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <aside class="sidebar">
                        <ul style="margin:0px;"> 
                        	<?php
                         if( $putilitiesItems->have_posts() ) {
    $i=1;
    $data=array();
while ( $putilitiesItems->have_posts()){ $putilitiesItems->the_post();
	if($i==1){
		$active='current';
		
		$data=array(
            'title'=>get_the_title(get_the_ID()),
            'putilities_id' =>get_the_ID()
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
                    <?php if($data){?>
                    <div class="row">
                        <div class="col">
                            <div class="header">
                                <div class="title"><?php echo $data['title'];?></div>
                            </div>
                        </div>
                    </div>
                    <?php 
               $utilities = get_field('add_public_utilities',$data['putilities_id']);
            foreach($utilities as $utilitie){
                    ?>
                    <div class="box-card">
                        <div class="image">
                            <img src="<?php echo $utilitie['image']['url'];?>" class="img-fluid">
                        </div>
                        <div class="content">
                            <h2 class="heading mb-4"><?php echo $utilitie['title'];?></h2>
                           <?php echo $utilitie['description'];?>
                            <div class="meta">
                                <div class="location"><i class="fas fa-map-marker-alt me-2"></i> <?php echo $utilitie['address'];?></div>
                                  <a href="https://maps.google.com/?q=<?php echo $utilitie['address'];?>" class="btn-link view-loation" target="_blank"> View Location in Map <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    
                <?php } } ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?php

get_footer();