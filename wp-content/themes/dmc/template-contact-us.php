<?php 
/****
Template Name: Contact Us Template
 ***/

get_header();

?>
<style>
.wpforms-submit-container{text-align: center;}
</style>
  
<div id="main-content">
<section class="department sec-spacing bg pb-5">
        <div class="container">
            <div class="row">
               
                <div class="col-lg-12">
                	
                    <div class="header">
                        <div class="title"><?php echo get_field('form_title');?></div>
                    </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="description">
                            <?php the_content();?>
                        </div>
                    </div>
                
            </div>
        </div>
    </section>
</div>
<?php

get_footer();