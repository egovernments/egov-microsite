<?php 

get_header();

?>

  <?php  
      $current_page_id=get_the_ID();
     $documents_args = array(
          'posts_per_page' => -1,
            'post_type' => 'documents',
            'post_status' => 'publish',
                'orderby' => 'ID',
                'order'   => 'ASC',
        
      );
      $documentItems = new WP_Query( $documents_args );


?>
<div id="main-content">
 <section class="tenders sec-spacing bg pb-5 <?php echo 'page-id-'.$current_page_id;?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <aside class="sidebar">
                        <ul style="margin:0px;"> 
                            <?php
                         if( $documentItems->have_posts() ) {
   
    $data=array();
while ( $documentItems->have_posts()){ $documentItems->the_post();

    if($current_page_id==get_the_ID()){
        $active='current';
        
       $data=array(
            'title'=>get_the_title(get_the_ID()),
            'document_id' =>get_the_ID()
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
                    
                        <?php
                        $documentlist = get_field('add_document_details', $data['document_id']);
                        if($documentlist){
                        foreach($documentlist as $docitem){
                            
                    // print_r($docitem);
                        ?>
                       
                    <div class="row align-item-center">
                        <div class="col-lg-8">
                            <div class="left">
                                <div>
                                    <img src="<?php echo get_stylesheet_directory_uri();?>/images/pdf.png" class="img-fluid icon">
                                </div>
                                <div class="content">
                                    <h2 class="heading"><?php echo $docitem['document_heading']?> <span class="file-size"><?php $size=$docitem['upload_document_pdf']['filesize'];
                                $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $power = $size > 0 ? floor(log($size, 1024)) : 0;
  echo number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];?></span></h2>
                                    <h3 class="subheading"><?php echo $docitem['document_subheading']?></h3>
                                    <?php echo $docitem['description']?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center right">
                            <a href=" <?php echo $docitem['upload_document_pdf']['url'];?>" download  class="btn btn-primary download-btn">Download <i class="fas fa-arrow-down"></i></a>
                        </div>
                    </div>

                        <?php }}else{echo "<p>No content available</p>";} ?>
                   
                <?php } ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?php

get_footer();