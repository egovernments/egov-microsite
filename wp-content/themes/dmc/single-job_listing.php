<?php
get_header(); ?>
<div id="main-content">
    <section class="sec-spacing bg">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title"><?php echo the_title();?></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="text-wrap">
                        <?php the_content();?>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top:30px;">
                <div class="apply_job text-center">
                <a href="<?php echo get_field('job_apply_link');?>" class="btn btn-primary download-btn">Apply</a>
            </div>
            </div>
          
        </div>
    </section>
	
   
</div>
	<?php

get_footer();

