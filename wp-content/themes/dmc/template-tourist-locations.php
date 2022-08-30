<?php 
/***
 Template Name: Tourist Locations Template
 **/

 get_header();

?>
<style>
.box-card {
    align-items: flex-start;
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

            $places = get_field('tourist_spots_of_dehradun');

            //print_r( $places);
            $totalplace=1;
         if($places){

          foreach($places as $place){

            ?>
         <div class="box-card">
                <div class="image">
                    <img src="<?php echo $place['banner']['url'];?>" class="img-fluid">
                </div>
                <div class="content">
                    <h2 class="heading mb-4"><?php echo $place['tourist__place_name'];?></h2>
                   <?php echo $place['description'];?>
                    <div class="meta">
                        <div class="location"><i class="fas fa-map-marker-alt me-2"></i> <?php echo $place['address'];?></div>
                        <div>
                            <a href="https://maps.google.com/?q=<?php echo $place['address'];?>" class="btn-link view-loation" target="_blank"> View Location in Map <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    
                    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/css/jquery.fancybox.min.css" media="screen">

      <div class="">
      <div class="fancy-gallery">
    <div class="">
      <?php 

        $galleries=$place['image_gallery'];
        $i=1;
      foreach($galleries as $gallery){
       
      $image_url =  $gallery['url'];
     $thumb_url=$gallery['url'];
     if($i==1){
      ?>
<a href="<?php echo $image_url;?>"
            data-fancybox="images<?php echo $totalplace;?>" data-caption="" class="btn btn-primary view-img">View Images</a>
<?php }else{ ?>
 <a href="<?php echo $image_url;?>" class="mb-3 col-6 col-sm-3 img-fluid"
            data-fancybox="images<?php echo $totalplace;?>" data-caption="" style="display:none;">
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
         <?php $totalplace++;} }else{ echo "<p>No content available</p>";}?>
        </div>
        </div>
    </section>
</div>
<?php 
get_footer();
?>