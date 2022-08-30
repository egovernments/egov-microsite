<?php 
/***
 Template Name: Awards Template
 **/

 get_header();

?>
<style>
.box-card .btn {
    margin-top: 0px; 
    }
</style>

<div id="main-content">
    <section class="tourist sec-spacing bg pb-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title"><?php echo get_field('heading');?></div>
                    </div>
                </div>
            </div>
            <?php 

            $award_details = get_field('award_details');
            $totalAward=1;
          if($award_details){
            //print_r( $places);
         
          foreach($award_details as $award_detail){

            ?>
         <div class="box-card">
                <div class="image">
                    <img src="<?php echo $award_detail['banner']['url'];?>" class="img-fluid">
                </div>
                <div class="content">
                    <h2 class="heading mb-4"><?php echo $award_detail['award_name'];?></h2>
                   <?php echo $award_detail['description'];?>
                   <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/css/jquery.fancybox.min.css" media="screen">

      <div class="">
      <div class="fancy-gallery">
    <div class="">
      <?php 

        $galleries=$award_detail['image_gallery'];
        $i=1;
      foreach($galleries as $gallery){
       
      $image_url =  $gallery['url'];
     $thumb_url=$gallery['url'];
     if($i==1){
      ?>
<a href="<?php echo $image_url;?>"
            data-fancybox="images<?php echo $totalAward;?>" data-caption="" class="btn btn-primary view-img">View Images</a>
<?php }else{ ?>
 <a href="<?php echo $image_url;?>" class="mb-3 col-6 col-sm-3 img-fluid"
            data-fancybox="images<?php echo $totalAward;?>" data-caption="" style="display:none;">
            <img class="rounded" src="<?php echo $thumb_url;?>" alt="gallery" />
        </a>

      <?php }

      $i++;} ?>
      </div>
</div>
      </div>
      <script src="<?php echo get_stylesheet_directory_uri();?>/js/jquery.fancybox.js"></script>

                </div>
            </div>
         <?php $totalAward++; } }else{echo "<p>No content available</p>";} ?>
        </div>
        </div>
    </section>
</div>
<?php 
get_footer();
?>