<?php
/**
   Template Name: Tenders Template
 **/

 get_header();

?>
<?php  
     
     $tenders_args = array(
          'posts_per_page' => -1,
            'post_type' => 'tenders',
            'post_status' => 'publish',
                'orderby' => 'post_date',
                'order'   => 'DESC',
        
      );
      $tenderItems = new WP_Query( $tenders_args );


?>
<style>
    table tr, table th, table td{border-top: none;border-left: none;border-right: none;}
</style>
<div id="main-content">
<section class="downloads sec-spacing bg">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title">
                           <?php the_field('enter_heading_name');?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>FIle</th>
                                </thead>
                                <tbody>
                                    <?php
                         if( $tenderItems->have_posts() ) {
while ( $tenderItems->have_posts()){ $tenderItems->the_post();
    ?>
                                	<tr>
                                        <td><?php the_title();?></td>
                                        <td><?php the_content();?></td>
                                        <td><?php the_field('start_date');?></td>
                                        <td><?php the_field('start_date');?></td>
                                        <td>
                                            <?php 
                                            $tender_file='';
                                            $upload_file = get_field('upload_file');
                                            if($upload_file){
                                                $tender_file = $upload_file['url'];
                                            }
                                            ?>
                                            <a href="<?php echo $tender_file;?>" download class="file-name">
                                                <span><img src="<?php echo get_stylesheet_directory_uri();?>/images/pdf.png" class="img-fluid" ></span> View .pdf</a>
                                        </td>
                                    </tr>
                                <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
<?php 

get_footer();
?>