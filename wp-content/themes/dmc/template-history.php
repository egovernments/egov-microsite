<?php
/*
* Template Name: History Template
*/

get_header(); ?>
<div id="main-content">
    <section class="sec-spacing bg">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title"><?php echo the_field('heading');?></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="text-wrap">
                        <?php echo the_content();?>
                    </div>
                </div>
            </div>
            <?php
      $rows = get_field('extra_information');
    if($rows){
        foreach($rows as $info){
            ?>
           <div class="row sec-spacing gx-5">
                <div class="col-md-6">
                    <div class="text-wrap">
                        <h2 class="heading">
                            <?php echo $info['title'];?>
                        </h2>
                        <?php echo $info['description'];?>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="<?php echo $info['banner']['url'];?>" class="img-fluid">
                </div>
            </div>
            <?php } }else{echo "<p>No content available</p>";}
            ?>
        </div>
    </section>
	</div>
   
	<?php

get_footer();

