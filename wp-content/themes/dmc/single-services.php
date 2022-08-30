<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Hotell
 */

get_header();

    /**
     * Before Posts hook
     * @hooked hotell_content_wrapper_start
    */

    while ( have_posts() ) : the_post();?>
    <style>
	.accordion-button:not(.collapsed) img {
    	transform: rotate(90deg);
	}    
    </style>
<div id="main-content">
    <section class="sec-spacing bg way-to-apply" id="accordionWayToApply">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title">Other ways to apply</div>
                    </div>
                </div>
            </div>
            <div class="wrap">
                <div>
                    <img src="<?php echo get_stylesheet_directory_uri();?>/images/whatsapp-icon.png" class="img-fluid icon"> Whatsapp
                    <?php 
                      $number=get_field('whatsapp_apply');
                      $whatsapp=substr($number, -10);
                    ?>
                    <a href="https://api.whatsapp.com/send?phone=+91<?php echo $whatsapp;?>&text=Apply for <?php the_title();?>" class="btn btn-primary btn-apply mt-3" target="_blank">Apply <i class="fas fa-arrow-right"></i></a>
                </div>
                <div>
                  <a class="accordion-button collapsed"  data-bs-toggle="collapse" data-bs-target="#collapseWhatsapp" style="background: none;box-shadow: none;cursor: pointer;">
                        <img src="<?php echo get_stylesheet_directory_uri();?>/images/arrow.png" class="img-fluid arrow">
                    </a>
                </div>
            </div>
             <div class="">
                 <div id="collapseWhatsapp" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#accordionWayToApply">
                        <div class="accordion-body">
                            <p><?php echo get_field('whatsapp_apply_description');?></p>
                        </div>
                    </div>
            </div>
            <div class="wrap">
                <div>
                    <img src="<?php echo get_stylesheet_directory_uri();?>/images/playstore-icon.png" class="img-fluid icon"> Mobile App
                    <a href="<?php echo get_field('mobile_app_apply');?>" class="btn btn-primary btn-apply mt-3" target="_blank">Apply <i class="fas fa-arrow-right"></i></a>

                </div>
                <div>
                    <a class="accordion-button collapsed"  data-bs-toggle="collapse" data-bs-target="#collapseMobileApp" style="background: none;box-shadow: none;cursor: pointer;">

                        <img src="<?php echo get_stylesheet_directory_uri();?>/images/arrow.png" class="img-fluid arrow">
                    </a>
                </div>
                </div>
                <div class="">
                 <div id="collapseMobileApp" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#accordionWayToApply">
                        <div class="accordion-body">
                            <p><?php echo get_field('mobile_app_apply_description');?></p>
                        </div>
                    </div>
            </div>
            <div class="wrap">
               <div>
                    <img src="<?php echo get_stylesheet_directory_uri();?>/images/citizen-icon.png" class="img-fluid icon"> Citizen Service Centre
                </div>
                <div>
                    <a class="accordion-button collapsed"  data-bs-toggle="collapse" data-bs-target="#collapse1" style="background: none;box-shadow: none;cursor: pointer;">

                        <img src="<?php echo get_stylesheet_directory_uri();?>/images/arrow.png" class="img-fluid arrow">
                    </a>
                </div>
               
            </div>
            <style>
            .accordion-button::after{display: none;}
        </style>
              <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#accordionWayToApply">
                        <div class="accordion-body">
                            <p><?php echo get_field('citizen_service_centre_apply');?></p>
                        </div>
                    </div>
        </div>
    </section>

    <section class="sec-spacing">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title">
                            <?php 
                       if(get_field('enter_your_subtitle')){
the_field('enter_your_subtitle');
                       }else{
                       echo "About ". get_the_title();
                       }
                             ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                   <?php the_content();?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg sec-spacing">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title">
                            Documents required
                        </div>
                    </div>
                </div>
            </div>
            <div class="row doc-require">
                <div class="col-md-4 align-items-stretch">
                    <div class="card">
                        <div class="cat">ID Proof</div>
                        <div class="inner">
                            <ul>
                                <?php
                               $idproofs=get_field('id_proof');
                               foreach($idproofs as $idproof){
                                ?>

                                <li><?php echo $idproof['id_proof_document'];?></li>
                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="cat">Address Proof</div>
                        <div class="inner">
                            <ul>
                               <?php
                               $address_proof=get_field('address_proof');
                               foreach($address_proof as $address){
                                ?>

                                <li><?php echo $address['address_proof_document'];?></li>
                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="cat">Ownership Proof</div>
                        <div class="inner">
                            <ul>
                                <?php
                               $ownership_proof=get_field('ownership_proof');
                               foreach($ownership_proof as $ownership){
                                ?>

                                <li><?php echo $ownership['ownership_proof_document'];?></li>
                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
        <?php

    endwhile; // End of the loop.

        
get_footer();