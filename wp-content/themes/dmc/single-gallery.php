<?php 

get_header();

?>

  <?php  
	 $current_page_id=get_the_ID();
	 $gallery_args = array(
	      'posts_per_page' => -1,
        	'post_type' => 'gallery',
        	'post_status' => 'publish',
        	    'orderby' => 'ID',
        	    'order'   => 'ASC',
        
      );
      $galleryItems = new WP_Query( $gallery_args );


?>
<div id="main-content">
<section class="sec-spacing bg pb-5 <?php echo 'page-id-'.$current_page_id;?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <aside class="sidebar">
                        <ul style="margin:0px;"> 
                        	<?php
                         if( $galleryItems->have_posts() ) {
    
    $data=array();
while ( $galleryItems->have_posts()){ $galleryItems->the_post();
	if($current_page_id==get_the_ID()){
		$active='current';
		
		$data=array(
            'title'=>get_the_title(get_the_ID()),
            'gallery_id' =>get_the_ID()
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
                    

                    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/css/jquery.fancybox.min.css" media="screen">
                    <div class="row gallery fancy-gallery">
                        <?php
                        $gallerylist = get_post_meta($data['gallery_id'],'upload_gallery_image', true);
                        foreach($gallerylist as $galleryitem){
                            $img=get_the_guid($galleryitem);

                        ?>
                       
                           <a href="<?php echo $img;?>" class="col-md-4 img-fluid" data-fancybox="images" data-caption=""> <img src="<?php echo $img;?>" class="img-fluid mb-4">
        </a>
                    
                        <?php } ?>
                    </div>
                    <script src="<?php echo get_stylesheet_directory_uri();?>/js/jquery.fancybox.js"></script>
                <?php } ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?php

get_footer();