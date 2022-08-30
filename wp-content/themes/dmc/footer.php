<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hotell
 */
   ?>

    
 <?php
     if(!is_front_page() ){
   ?>
   <section class="quick-contact sec-spacing">
        <div class="container">
            <div class="row gx-5">
                <div class="col-md-3 col-xs-6">
                   <a class="desc" href="tel:<?php echo str_replace(array(" ",'-'),array('',''),get_field('call_on','437'));?>">
                     <div class="card">
                        <div class="icon mb-3">
                            <i class="fa fa-phone-volume" style="transform: rotate(-50deg);"></i>
                        </div>
                        <div class="content">
                            <div class="title">
                                Call on
                            </div>
                            <div class="desc">
                               
                               <?php the_field('call_on','437');?>
                            </div>
                        </div>
                    </div></a>
                </div>
                <div class="col-md-3 col-xs-6">
                     <a class="desc" href="mailto:<?php  echo get_field('mail_at','437');?>">
                               <div class="card">
                        <div class="icon mb-3">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="content">
                            <div class="title">
                                Mail At
                            </div>
                            <div class="desc">
                                <?php  the_field('mail_at','437');?>
                            </div>
                        </div>
                    </div></a>
                </div>
                <div class="col-md-3 col-xs-6">
                   <a href="javascript:void(0);"> <div class="card">
                        <div class="icon mb-3">
                            <i class="fa fa-clock"></i>
                        </div>
                        <div class="content">
                            <div class="title">
                               Office Hours
                            </div>
                            <div class="desc">
                             <?php the_field('office_hours','437');?>
                            </div>
                        </div>
                    </div></a>
                </div>
                <div class="col-md-3 col-xs-6">
                   <a class="desc" target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo str_replace(array(" ",'-','+'),array('','',''),get_field('whatsapp_number','437'));?>">
                     <div class="card">
                        <div class="icon mb-3">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div class="content">
                            <div class="title">
                                Whatsapp
                            </div>
                            <div class="desc">
                              
                                 <?php the_field('whatsapp_number','437');?>
                          
                            </div>
                        </div>
                    </div>   </a>
                </div>
            </div>
        </div>
    </section>
  
<?php } ?>
  <section class="social text-center">
        <div class="container">
            <div class="row inner-wrap align-item-center">
                <div class="col">
                    <div class="title">
                        <?php the_field('feeback_heading','437');?>
                        <a href="<?php echo get_field('feedback_form_link','437');?>" class="btn">Feedback form</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
 <footer>
        <div class="container">
            <div class="row wrap-reverse">
                <div class="col-md-4 plr-0">
                    <div class="widget-1">
                        <?php
                        if(get_field('footer_logo','437')){
                        ?>
                      <img src="<?php echo get_field('footer_logo','437')['url'];?>" class="img-fluid mb-4" width="85px">
                  <?php } ?>
                        <div class="social-links mt-4">
                            <div class="title">Follow us on</div>
                            <ul>
                                <li>
                                    <a href="<?php echo get_field('facebook_link','437');?>"><i class="fab fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="<?php echo get_field('instagram_link','437');?>"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="<?php echo get_field('twitter_link','437');?>"><i class="fab fa-twitter"></i></a>
                                </li>
                            </ul>
                        </div>
                        <?php
                        $poweredby_logo = get_field('powered_by','437');
                        if($poweredby_logo){
                        ?>
                        <p class="copyright">Powered by  <span class="poweredby_logo"><img src="<?php echo $poweredby_logo['url'];?>" class="img-fluid" width="75px"></span></p>
                    <?php } ?>
                        <p class="copyright pt-4"><?php echo get_field('copyright_text','437');?></p> 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget menu-links">
                         <div class="title"><?php echo get_field('heading','437');?></div>
                        <ul>
                            <?php 
$footerMenus = get_field('footer_link','437');
foreach($footerMenus as $fmenu){
     
                            ?>
                            <li><a href="<?php echo $fmenu['menu_link'];?>"><?php echo $fmenu['menu_title'];?></a></li>
                        <?php } ?>
                        </ul>
                        <hr> 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget">
                          <div class="title">Contact Us</div> 
                          <style>
                          address p{color: #fff;}
                      </style>
<address><?php echo get_field('contact_address','437');?></address>
                        <hr>
                        
                       <ul>
<li><a href="tel:<?php echo str_replace(array(" ",'-'),array('',''),get_field('contact_number_1','437'));?>"><?php echo get_field('contact_number_1','437');?></a></li>
<li><a href="tel:<?php echo str_replace(array(" ",'-'),array('',''),get_field('contact_number_2','437'));?>"><?php echo get_field('contact_number_2','437');?></a></li>
</ul>
 <ul>
     <li><a href="mailto:<?php echo get_field('email_id','437');?>"> <?php echo get_field('email_id','437');?></a></li>
</ul>
 <hr>
                            </div>
                        </div>
                    </div>
                </div>
    </footer>
   <?php

    wp_footer(); ?>
    
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
   <script>
   
   const counters = document.querySelectorAll('.counter')

counters.forEach(counter => {
    counter.innerText = '0'

    const updateCounter = () => {
        const target = +counter.getAttribute('data-target')
        const c = +counter.innerText

        const increment = target / 200

        if(c < target) {
            counter.innerText = `${Math.ceil(c + increment)}`
            setTimeout(updateCounter, 1)
        } else {
            counter.innerText = target
        }
    }

    updateCounter()
})

     var swiper = new Swiper(".mySwiper", {
            slidesPerView: 4,
            spaceBetween: 30,
            loop: true,
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                480: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                991: {
                    slidesPerView: 3,
                    spaceBetween: 40
                },
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 40
                }
            },
               navigation: {
                 nextEl: ".swiper-button-next",
                 prevEl: ".swiper-button-prev",
             }
        });
        var swiper = new Swiper(".newsSwiper", {
            slidesPerView: 4,
            spaceBetween: 30,
            loop: true,
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                480: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                991: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 20
                }

            },

            navigation: {
          nextEl: ".news-swiper.swiper-button-next",
          prevEl: ".news-swiper.swiper-button-prev",
        }
        });
        var swiper = new Swiper(".clientSwiper", {
            slidesPerView: 5,
            spaceBetween: 30,
            loop: true,
            breakpoints: {
                320: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                480: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                991: {
                    slidesPerView: 3,
                    spaceBetween: 40
                },
                1200: {
                    slidesPerView: 5,
                    spaceBetween: 40
                }
            },
            navigation: {
          nextEl: ".client-swiper.swiper-button-next",
          prevEl: ".client-swiper.swiper-button-prev",
        }
        });
    </script>
    <script>
        var swiper = new Swiper(".newsCard", {
            slidesPerView: 4,
            spaceBetween: 30,
            loop: true,
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                480: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                991: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 20
                }
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            }
        });
    </script>
    <script>
        jQuery(document).ready(function($){
  $("#news_read_more").click(function(){
    $(".news_read_more").show();
    $(".news_read_less").hide();
  });

  $("#news_read_less").click(function(){
    $(".news_read_less").show();
    $(".news_read_more").hide();
  });
});
    </script>

    <script>
jQuery(document).ready(function(){
  jQuery(".eread-more").click(function(){
    var dataid=jQuery(this).data("id");
   jQuery(".eread-more.collapsed").show();
 
   jQuery(".shorteventdesc"+dataid).hide();
    jQuery(".eread-more"+dataid).hide();
    
  });

  jQuery(".eread-less").click(function(){
    var dataid=jQuery(this).data("id");
     jQuery(".eread-more"+dataid).show();
     jQuery(".shorteventdesc"+dataid).show();
  });
});
</script>
<script>
    jQuery(document).ready(function() {
    jQuery('#cityTable').DataTable({
    "bPaginate": false,
    "bLengthChange": false,"bFilter": true,"bInfo": false, });
} );

$('.carousel-inner').each(function() {

if ($(this).children('div').length === 1) $(this).siblings('.carousel-indicators, .carousel-control-prev, .carousel-control-next').hide();

});
</script>
</body>
</html>