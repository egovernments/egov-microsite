<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hotell
 */
    /**
     * Doctype Hook
     * 
     * @hooked hotell_doctype
    */
    do_action( 'hotell_doctype' );
//echo "Color:".get_option( 'changeColor',true);
?>
<head itemscope itemtype="http://schema.org/WebSite">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" 		href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
   <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src ="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" de	fer></script>

<?php

//echo "Color:".get_option( 'changeColor',true);

//if ( get_option( 'changeColor' ) !== false && (get_option( 'changeColor',true ) !='orange' && get_option( 'changeColor',true ) !='')){
    
//$getColor=get_option( 'changeColor',true );
if(isset($_COOKIE['setcolor']) && $_COOKIE['setcolor'] !='orange'){
    
$getColor=$_COOKIE['setcolor'];
?>
    <link href="<?php echo get_stylesheet_directory_uri();?>/css/main-<?php echo $getColor;?>.css" rel="stylesheet">
<?php }else{ ?>
<link href="<?php echo get_stylesheet_directory_uri();?>/css/main.css" rel="stylesheet">
<?php } ?>
	<?php 
    /**
     * Before wp_head
     * 
     * @hooked hotell_head
    */

    do_action( 'hotell_before_wp_head' );
    
    wp_head(); ?>
    <style>
        .resize,.setcolor{cursor: pointer;}
        .setOrange{background-color: #ee5235 !important;}
    </style>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<?php
    wp_body_open();
    
    /**
     * Before Header
     * 
     * @hooked hotell_page_start - 20 
    */
    do_action( 'hotell_before_header' );
    
    /**
     * Header
     * 
     * @hooked hotell_header - 20     
    */
     $btn_lbl      = get_theme_mod( 'header_btn_lbl' );
    $btn_link     = get_theme_mod( 'header_btn_link' );
    $open_new_tab = get_theme_mod( 'header_new_tab', false );
    $new_tab      = ( $open_new_tab ) ? 'target=_blank' : '';
    $social_links = get_theme_mod( 'social_links' );
    $ed_social    = get_theme_mod( 'ed_social_links', false );
    $location     = get_theme_mod( 'header_location' );
    $email        = get_theme_mod( 'email' ); ?>
    
    <header id="masthead" class="site-header header-two" itemscope itemtype="http://schema.org/WPHeader">
        <?php //if( $location || $email || ( $ed_social && $social_links ) ){ ?> 
             <section class="top-header">
        <div class="container">
            <div class="row align-item-center">
                <div class="col-xl-4 col-lg-6 col-md-4 col-xs-12">
                   <ul class="links">
                        <li><a href="<?php echo get_field('top_menu_link_1','437');?>"><?php echo get_field('top_menu_title_1','437');?></a></li>
                        <li><a href="<?php echo get_field('top_menu_link_2','437');?>"><?php echo get_field('top_menu_title_2','437');?></a></li>
                        <li><a href="<?php echo get_field('top_menu_link_3','437');?>"><?php echo get_field('top_menu_title_3','437');?></a></li>
                    </ul>
                </div>
                <div class="col-xl-8 col-lg-6 col-md-8 col-xs-12 right">
                    <div class="wrap">
                        <div class="whatsapp menu-right">
                            <a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo str_replace(array('+',' ','-'),array('','',''),get_field('top_whatsapp_number','437'));?>">
                                <span><img src="<?php echo get_stylesheet_directory_uri();?>/images/whatsapp.png" class="img-fluid"></span>
                                <span class="number"><?php echo get_field('top_whatsapp_number','437');?></span>
                            </a>
                        </div>
                        <div class="skip menu-right">
                            <a href="#main-content">Skip to Main Content</a>
                        </div>
                        <div class="disabled-btn menu-right">
                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/disabled.png" class="img-fluid" width="14px"></a>
                        </div>
                        <div class="increase-font menu-right">
                            <div onclick="resize('0')" class="resize">-A</div>
                            <div onclick="resize('1')" class="resize">A</div>
                            <div onclick="resize('2')" class="resize">+A</div>
                        </div>
                        <div class="color menu-right">
                            <div class="blue setcolor" onclick="changeColor('blue')">A</div>
                            <div class="orange setcolor setOrange" onclick="changeColor('orange')" >A</div>
                            <div class="sky-blue setcolor" onclick="changeColor('sky-blue')">A</div>
                            <div class="green setcolor" onclick="changeColor('green')">A</div>
                        </div>
                        <div class="lang" style="margin-right:0px;">
                            <?php echo do_shortcode('[google-translator]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <script>

setCookie("fontSize", '100', 365);

function resize(size) {
     
     var font12px= new Array('.top-header .right .increase-font div, .top-header .right .color div','.news .card .date','.news .card .cat','.news .card .link','.box-card .meta .location','.box-card .meta .btn-link','.page-banner p','.upcoming-events .card-wrap .info .meta .location, .upcoming-events .card-wrap .info .meta .time','.site-header .header-left ul a','.top-header .links li a');

     var font14px = new Array('body', 'html','.btn-primary','.news .card p','footer .copyright','footer ul li a','footer address','table','table th','table td');
     
      var font16px = new Array('.online-services .card .title','.header .btn-link','.carousel-caption','.links p','footer .title','.sidebar ul li a');

     var font18px= new Array('.leaders .main .name','.news .card .heading','.quick-contact .card .desc','.tenders .content .subheading','.way-to-apply .wrap .btn-primary','.doc-require ul li','.accordion .accordion-button','.upcoming-events .card-wrap .info .subheading','.upcoming-events .card-wrap .timestamp .month');

      var font20px= new Array('.links .box ul li a','.page-banner .breadcrumb li','.downloads .card table thead th');

     var font24px= new Array('.quick-contact .card .title','.heading','.way-to-apply .wrap','.doc-require .cat','.upcoming-events .card-wrap .info .heading');

     var font30px = new Array('.header .title');

     var font32px = new Array('.heading.large');

     var font36px= new Array('.social .title','.upcoming-events .card-wrap .timestamp .date');

     var font56px= new Array('.page-banner .title');
     
  font12px = font12px.join(',');
  font14px = font14px.join(',');
  font16px = font16px.join(',');
  font18px = font18px.join(',');
  font20px = font20px.join(',');
  font24px = font24px.join(',');
  font30px = font30px.join(',');
  font32px = font32px.join(',');
  font36px = font36px.join(',');
  font56px = font56px.join(',');
  
  var resetfont12px = $(font12px).css('font-size');
  var resetfont14px = $(font14px).css('font-size');
  var resetfont16px = $(font16px).css('font-size');
var resetfont18px = $(font18px).css('font-size');
  var resetfont20px = $(font20px).css('font-size');
  var resetfont24px = $(font24px).css('font-size');
  var resetfont30px = $(font30px).css('font-size');
  var resetfont32px = $(font32px).css('font-size');
  var resetfont36px = $(font36px).css('font-size');
  var resetfont56px = $(font56px).css('font-size');

     


    if( size ==='1' ){
      //  var font_size=100;
        //jQuery('body,p,li,td,strong,span,a,address,h1,h2,h3,h4,.desc,.heading,.subheading,.location,.carousel-caption,.name,.title,.header .title,.time').removeAttr('style');
        
        jQuery(font12px).removeAttr('style')
        jQuery(font14px).removeAttr('style')
        jQuery(font16px).removeAttr('style')
        jQuery(font18px).removeAttr('style')
        jQuery(font20px).removeAttr('style')
        jQuery(font24px).removeAttr('style')
        jQuery(font30px).removeAttr('style')
        jQuery(font32px).removeAttr('style')
        jQuery(font36px).removeAttr('style')
        jQuery(font56px).removeAttr('style')

        setCookie("fontSize12px", '');
    setCookie("fontSize14px", '');
    setCookie("fontSize16px", '');
    setCookie("fontSize18px", '');
    setCookie("fontSize20px", '');
    setCookie("fontSize24px", '');
    setCookie("fontSize30px", '');
    setCookie("fontSize32px", '');
    setCookie("fontSize36px", '');
    setCookie("fontSize56px", '');

       //setCookie("fontSize", font_size);
    }
     if( size ==='0' ){
        
       // var font_size = font_size -1;
      // var  heading= parseInt(font_size) * 1;
       
    var originalfont12px = $(font12px).css('font-size');
    var originalfont14px = $(font14px).css('font-size');
    var originalfont16px = $(font16px).css('font-size');
    var originalfont18px = $(font18px).css('font-size');
    var originalfont20px = $(font20px).css('font-size');
    var originalfont24px = $(font24px).css('font-size');
    var originalfont30px = $(font30px).css('font-size');
    var originalfont32px = $(font32px).css('font-size');
    var originalfont36px = $(font36px).css('font-size');
    var originalfont56px = $(font56px).css('font-size');


    var originalfont12pxNumber = parseFloat(originalfont12px, 10);
    var originalfont14pxNumber = parseFloat(originalfont14px, 10);
    var originalfont16pxNumber = parseFloat(originalfont16px, 10);
    var originalfont18pxNumber = parseFloat(originalfont18px, 10);
    var originalfont20pxNumber = parseFloat(originalfont20px, 10);
    var originalfont24pxNumber = parseFloat(originalfont24px, 10);
    var originalfont30pxNumber = parseFloat(originalfont30px, 10);
    var originalfont32pxNumber = parseFloat(originalfont32px, 10);
    var originalfont36pxNumber = parseFloat(originalfont36px, 10);
    var originalfont56pxNumber = parseFloat(originalfont56px, 10);

    var newFontSize12px = originalfont12pxNumber * 0.9;
     var newFontSize14px = originalfont14pxNumber * 0.9;
      var newFontSize16px = originalfont16pxNumber * 0.9;
       var newFontSize18px = originalfont18pxNumber * 0.9;
        var newFontSize20px = originalfont20pxNumber * 0.9;
         var newFontSize24px = originalfont24pxNumber * 0.9;
          var newFontSize30px = originalfont30pxNumber * 0.9;
           var newFontSize32px = originalfont32pxNumber * 0.9;
            var newFontSize36px = originalfont36pxNumber * 0.9;
             var newFontSize56px = originalfont56pxNumber * 0.9;

    $(font12px).css('font-size', newFontSize12px);
    $(font14px).css('font-size', newFontSize14px);
    $(font16px).css('font-size', newFontSize16px);
    $(font18px).css('font-size', newFontSize18px);
    $(font20px).css('font-size', newFontSize20px);
    $(font24px).css('font-size', newFontSize24px);
    $(font30px).css('font-size', newFontSize30px);
    $(font32px).css('font-size', newFontSize32px);
    $(font36px).css('font-size', newFontSize36px);
    $(font56px).css('font-size', newFontSize56px);

    setCookie("fontSize12px", newFontSize12px);
    setCookie("fontSize14px", newFontSize14px);
    setCookie("fontSize16px", newFontSize16px);
    setCookie("fontSize18px", newFontSize18px);
    setCookie("fontSize20px", newFontSize20px);
    setCookie("fontSize24px", newFontSize24px);
    setCookie("fontSize30px", newFontSize30px);
    setCookie("fontSize32px", newFontSize32px);
    setCookie("fontSize36px", newFontSize36px);
    setCookie("fontSize56px", newFontSize56px);

    return false;
    
        //alert(font_size);
        // if(font_size > 89 ){
//jQuery('body,p,li,td,strong,span,a,address,h1,h2,h3,h4,.desc,.subheading,.location,.carousel-caption,.name,.time').css('font-size', font_size+'%');
//jQuery('.heading,.name,.title').css('font-size', heading+'%');
// setCookie("fontSize", font_size);

//}
}

 if(size==='2'){
   // var font_size =parseInt(font_size) + 1;
   // var  heading= parseInt(font_size) * 1;
    
    
      var originalfont12px = $(font12px).css('font-size');
    var originalfont14px = $(font14px).css('font-size');
    var originalfont16px = $(font16px).css('font-size');
    var originalfont18px = $(font18px).css('font-size');
    var originalfont20px = $(font20px).css('font-size');
    var originalfont24px = $(font24px).css('font-size');
    var originalfont30px = $(font30px).css('font-size');
    var originalfont32px = $(font32px).css('font-size');
    var originalfont36px = $(font36px).css('font-size');
    var originalfont56px = $(font56px).css('font-size');


    var originalfont12pxNumber = parseFloat(originalfont12px, 10);
    var originalfont14pxNumber = parseFloat(originalfont14px, 10);
    var originalfont16pxNumber = parseFloat(originalfont16px, 10);
    var originalfont18pxNumber = parseFloat(originalfont18px, 10);
    var originalfont20pxNumber = parseFloat(originalfont20px, 10);
    var originalfont24pxNumber = parseFloat(originalfont24px, 10);
    var originalfont30pxNumber = parseFloat(originalfont30px, 10);
    var originalfont32pxNumber = parseFloat(originalfont32px, 10);
    var originalfont36pxNumber = parseFloat(originalfont36px, 10);
    var originalfont56pxNumber = parseFloat(originalfont56px, 10);

    var newFontSize12px = originalfont12pxNumber * 1.05;
     var newFontSize14px = originalfont14pxNumber * 1.05;
      var newFontSize16px = originalfont16pxNumber * 1.05;
       var newFontSize18px = originalfont18pxNumber * 1.05;
        var newFontSize20px = originalfont20pxNumber * 1.05;
         var newFontSize24px = originalfont24pxNumber * 1.05;
          var newFontSize30px = originalfont30pxNumber * 1.05;
           var newFontSize32px = originalfont32pxNumber * 1.05;
            var newFontSize36px = originalfont36pxNumber * 1.05;
             var newFontSize56px = originalfont56pxNumber * 1.05;

    $(font12px).css('font-size', newFontSize12px);
    $(font14px).css('font-size', newFontSize14px);
    $(font16px).css('font-size', newFontSize16px);
    $(font18px).css('font-size', newFontSize18px);
    $(font20px).css('font-size', newFontSize20px);
    $(font24px).css('font-size', newFontSize24px);
    $(font30px).css('font-size', newFontSize30px);
    $(font32px).css('font-size', newFontSize32px);
    $(font36px).css('font-size', newFontSize36px);
    $(font56px).css('font-size', newFontSize56px);

    setCookie("fontSize12px", newFontSize12px);
    setCookie("fontSize14px", newFontSize14px);
    setCookie("fontSize16px", newFontSize16px);
    setCookie("fontSize18px", newFontSize18px);
    setCookie("fontSize20px", newFontSize20px);
    setCookie("fontSize24px", newFontSize24px);
    setCookie("fontSize30px", newFontSize30px);
    setCookie("fontSize32px", newFontSize32px);
    setCookie("fontSize36px", newFontSize36px);
    setCookie("fontSize56px", newFontSize56px);
    return false;
    
   // if(font_size < 111){
        
///jQuery('body,p,li,td,strong,span,a,address,h1,h2,h3,h4,.desc,.subheading,.location,.carousel-caption,.name,.time').css('font-size', font_size+'%');
//jQuery('.heading,.name,.title').css('font-size', heading+'%');
//setCookie("fontSize", font_size);

//}

}

}


function changeColor(newcolor) {
  
//var current_url=window.location.href;
//window.location.href = current_url+'?setcolor='+newcolor;


setCookie("setcolor", newcolor,365);
location.reload();

}



function setCookie(cname,cvalue,exdays) {
 
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
  
}
</script>
<?php

if(isset($_GET['setcolor'])){
//echo $_GET['setcolor'];

$option_name = 'changeColor' ;
$new_value = $_GET['setcolor'];

if ( get_option( $option_name ) !== false ) {
 
    // The option already exists, so update it.
    update_option( $option_name, $new_value );
 
} else {
 
    // The option hasn't been created yet, so add it with $autoload set to 'no'.
    $deprecated = null;
    $autoload = 'no';
    add_option( $option_name, $new_value, $deprecated, $autoload );
}
$previous_url = $_SERVER['HTTP_REFERER'];

//header('Location:'.$previous_url);
?>
<script>
var redirurl= document.referrer;
window.location.href = redirurl;</script>
<?php
}
?>
   
        <?php // } ?>    
            <div class="desktop-header">
                <div class="header-bottom">
                    <div class="container">
                        <div class="header-wrapper">
                                  <div class="navbar-brand" itemscope itemtype="http://schema.org/Organization">
        <?php 
            if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                the_custom_logo();
            } 
            
            if( is_front_page() && !$is_mobile ){ ?>
                <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
                <?php 
            }else{ ?>
                <p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></p>
            <?php
            }
            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ){ ?>
                <p class="site-description" itemprop="description"><?php echo $description; ?></p>
            <?php

            }
        ?>
    </div> 
                            <div class="nav-wrap">
                                <div class="header-left">
                                <div class="overlay"></div>
    <?php if ( current_user_can( 'manage_options' ) || has_nav_menu( 'primary' ) ) { ?>
        <nav id="site-navigation" class="main-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'fallback_cb'    => 'hotell_primary_menu_fallback',
                ) );
            ?>
        </nav><!-- #site-navigation -->
    <?php }
if( ! function_exists( 'hotell_primary_menu_fallback' ) ) :
/**
 * Fallback for primary menu
*/
function hotell_primary_menu_fallback(){
    if( current_user_can( 'manage_options' ) ){
        echo '<ul id="primary-menu" class="navbar-nav">';
        echo '<li class="nav-item"><a class="nav-link" href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'hotell' ) . '</a></li>';
        echo '</ul>';
    }
}
endif;
     ?>
                                </div>
                                <style>
                                .searchform input {
   padding: 6px 10px;
    max-width: 156px;
    font-size: 14px;
    border: 1px solid #000;
}
                                .site-header .header-right {
    line-height: 1;
    margin-left: 25px;
}
                                .searchform {
    position: relative;
}
                                .searchform .search-icon {
   width: 20px;
    position: absolute;
    top: 8px;
    right: 9px;
    cursor: pointer;
}
                            </style>
                               <div class="header-right">
                                 <ul class="navbar-nav">

                                     <li class="nav-item search-desktop">
                                        <div class="searchform">
                    <form method="get" action="<?php echo site_url();?>/">
                        <?php
                        if(isset($_GET['s'])){ $keyword=$_GET['s'];}else{ $keyword='';}
                        ?>
                        <input type="text" name="s" value="<?php echo $keyword
                    ?>" required="" placeholder="Search" autocomplete="off">
                    <button type="submit" id="submit_search" style="display:none;">Submit</button>
                    <label for="submit_search">
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="search-icon" xmlns="http://www.w3.org/2000/svg">
<path d="M17.1527 15.0943H16.0686L15.6844 14.7238C17.0292 13.1595 17.8388 11.1286 17.8388 8.91938C17.8388 3.99314 13.8456 0 8.91938 0C3.99314 0 0 3.99314 0 8.91938C0 13.8456 3.99314 17.8388 8.91938 17.8388C11.1286 17.8388 13.1595 17.0292 14.7238 15.6844L15.0943 16.0686V17.1527L21.9554 24L24 21.9554L17.1527 15.0943ZM8.91938 15.0943C5.50257 15.0943 2.74443 12.3362 2.74443 8.91938C2.74443 5.50257 5.50257 2.74443 8.91938 2.74443C12.3362 2.74443 15.0943 5.50257 15.0943 8.91938C15.0943 12.3362 12.3362 15.0943 8.91938 15.0943Z" fill="#F45329"/>
</svg>
</label>
                    </form>
<div></div>
</div>
                                <?php //echo '<a href="' . esc_url( $btn_link ) . '" class="nav-link"> </a>'; ?>
                            </li></ul>
                                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            /**
             * Mobile Navigation
            */
        ?>
        <div class="mobile-header">
        <div class="header-bottom">
            <div class="container">
                <div class="header-wrapper">
                    <?php hotell_site_branding( true ); ?>
                    <div class="nav-wrap">
                        <div class="d-flex align-item-center">
                    <div class="me-3">
<div class="dropdown search-dropdown">
  <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width: 45px;">
    <img class="search-icon" src="<?php echo get_stylesheet_directory_uri();?>/images/search.png">
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item">
                                            <div class="searchform">
                    <form method="get" action="<?php echo site_url();?>/">
                        <?php
                        if(isset($_GET['s'])){ $keyword=$_GET['s'];}else{ $keyword='';}
                        ?>
                        <input type="text" name="s" value="<?php echo $keyword
                    ?>" required="" placeholder="Search" autocomplete="off">
                    <button type="submit" id="submit_search" style="display:none;">Submit</button>
                    <label for="submit_search">
                    <img class="search-icon" src="<?php echo get_stylesheet_directory_uri();?>/images/search.png" width="24px"></label>
                    </form>
<div></div>
</div>
                                <?php //echo '<a href="' . esc_url( $btn_link ) . '" class="nav-link"> <img src="'.get_stylesheet_directory_uri().'/images/search.png" class="img-fluid" width="24px"></a>'; ?>

    </a></li>
  </ul>
</div>
                    
                     
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <img src="<?php echo get_stylesheet_directory_uri();?>/images/navbar-toggle.png" class="img-fluid" width="18px">
          </button>

                </div>
                      
                    </div>
                </div>

 <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="menu-container-wrapper">
     <nav id="mobile-site-navigation" class="main-navigation mobile-navigation">        
                                <div class="primary-menu-list main-menu-modal cover-modal" data-modal-target-string=".main-menu-modal">  
                                    <div class="menu-top-wrap">
                                      
                                        <div class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'hotell' ); ?>">
                                            <div class="header-left">
                                                <?php hotell_primary_nagivation(); ?>
                                               
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </nav><!-- #mobile-site-navigation -->
</div>
            </div>
        </div>
    </div>
    </header>
    <?php
    if( ( is_home() || is_singular() || is_archive() || is_search() || is_404() ) && ! is_front_page() ){  
        if(is_search()){
       $image_url = get_field('upload_search_banner',437)['url'];
        }else{
             if( get_post_type() != 'leaders' ){ 
        $image_url = hotell_get_breadcrumb_image_url();
    }
         }
 $cterm = get_queried_object();  
         if( $cterm && ($cterm->taxonomy =='job_category')){
            
            $getbanner= get_field('upload_banner',$cterm);
             $image_url=$getbanner['url'];
         }

         if(! $image_url){
            $image_url=  get_field('header_title_default_background_image','437')['url'];
         }
         ?>

        <section class="page-banner" <?php if( $image_url ) echo 'style="background-image: url(' . esc_url( $image_url ) . ')"'; ?>>
        <div class="container">
            <div class="row">
                <div class="col">
                <div class="content">
                    <hr>
                    <?php  global $post;
    $post_page  = get_option( 'page_for_posts' ); //The ID of the page that displays posts.
    $show_front = get_option( 'show_on_front' ); //What to show on the front page    
    $home       = get_theme_mod( 'home_text', __( 'Home', 'hotell' ) ); // text for the 'Home' link
    $delimiter  = '';
    $before     = '<li class="breadcrumb-item  active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'; // tag before the current crumb
    $after      = '</li>'; // tag after the current crumb
    
    if( get_theme_mod( 'ed_breadcrumb', true ) ){
        $depth = 1;
        echo '<nav aria-label="breadcrumb"><ol class="breadcrumb" style="margin-left:0px;"><li><span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a href="' . esc_url( home_url() ) . '" itemprop="item"><span itemprop="name">' . esc_html( $home ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" /><span class="separator"> / </span> &nbsp;</span> </li>';
        
        if( is_home() ){ 
            $depth = 2;                       
            echo $before . '' . esc_html( single_post_title( '', false ) ) . '' . $after;            
        }elseif( is_category() ){  
            $depth = 2;          
            $thisCat = get_category( get_query_var( 'cat' ), false );            
            if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                $p = get_post( $post_page );
                echo '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_permalink( $post_page ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $p->post_title ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</li>';
                $depth++;  
            }            
            if( $thisCat->parent != 0 ){
                $parent_categories = get_category_parents( $thisCat->parent, false, ',' );
                $parent_categories = explode( ',', $parent_categories );
                foreach( $parent_categories as $parent_term ){
                    $parent_obj = get_term_by( 'name', $parent_term, 'category' );
                    if( is_object( $parent_obj ) ){
                        $term_url  = get_term_link( $parent_obj->term_id );
                        $term_name = $parent_obj->name;
                        echo '<li class="breadcrumb-item"  itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( $term_url ) . '"><span itemprop="name">' . esc_html( $term_name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</li>';
                        $depth++;
                    }
                }
            }
            echo $before . '' .  esc_html( single_cat_title( '', false ) ) . '' . $after;       
        }elseif( is_tag() ){ 
            $depth          = 2;
            $queried_object = get_queried_object();
            echo $before . '' . esc_html( single_tag_title( '', false ) ) . ''. $after;
        }elseif( is_author() ){  
            global $author;
            $depth    = 2;
            $userdata = get_userdata( $author );
            echo $before . '' . esc_html( $userdata->display_name ) .'' . $after;     
        }elseif( is_search() ){ 
            $depth       = 2;
            $request_uri = $_SERVER['REQUEST_URI'];
            echo $before . '' . sprintf( __( 'Search Results', 'hotell' ), esc_html( get_search_query() ) ) . '' . $after;        
        }elseif( is_day() ){            
            $depth = 2;
            echo '<li class="breadcrumb-item"  itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'hotell' ) ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_time( __( 'Y', 'hotell' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</li>';
            $depth++;
            echo '<li class="breadcrumb-item"  itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'hotell' ) ), get_the_time( __( 'm', 'hotell' ) ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_time( __( 'F', 'hotell' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</li>';
            $depth++;
            echo $before . '' . esc_html( get_the_time( __( 'd', 'hotell' ) ) ) . '' . $after;        
        }elseif( is_month() ){            
            $depth = 2;
            echo '<li class="breadcrumb-item"  itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'hotell' ) ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_time( __( 'Y', 'hotell' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</li>';
            $depth++;
            echo $before . '' . esc_html( get_the_time( __( 'F', 'hotell' ) ) ) . '' . $after;        
        }elseif( is_year() ){ 
            $depth = 2;
            echo $before .''. esc_html( get_the_time( __( 'Y', 'hotell' ) ) ) .''. $after;  
        }elseif( is_single() && !is_attachment() ){   
            $depth = 2;         
            if( get_post_type() != 'post' ){                
                $post_type = get_post_type_object( get_post_type() );                
                if( $post_type->has_archive == true ){// For CPT Archive Link                   
                   // Add support for a non-standard label of 'archive_title' (special use case).
                   $label = !empty( $post_type->labels->archive_title ) ? $post_type->labels->archive_title : $post_type->labels->name;
                   echo '<li class="breadcrumb-item"  itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="javascript:void(0);" itemprop="item"><span itemprop="name">' . esc_html( $label ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '</li>';
                   $depth++;    
                }
                echo $before . '' . esc_html( get_the_title() ) . '' . $after;
            }else{ //For Post                
                $cat_object       = get_the_category();
                $potential_parent = 0;
                
                if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                    $p = get_post( $post_page );
                    echo '<li class="breadcrumb-item"  itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_permalink( $post_page ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $p->post_title ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '</li>';  
                    $depth++; 
                }
                
                if( $cat_object ){ //Getting category hierarchy if any        
                    //Now try to find the deepest term of those that we know of
                    $use_term = key( $cat_object );
                    foreach( $cat_object as $key => $object ){
                        //Can't use the next($cat_object) trick since order is unknown
                        if( $object->parent > 0  && ( $potential_parent === 0 || $object->parent === $potential_parent ) ){
                            $use_term         = $key;
                            $potential_parent = $object->term_id;
                        }
                    }                    
                    $cat  = $cat_object[$use_term];              
                    $cats = get_category_parents( $cat, false, ',' );
                    $cats = explode( ',', $cats );
                    foreach ( $cats as $cat ) {
                        $cat_obj = get_term_by( 'name', $cat, 'category' );
                        if( is_object( $cat_obj ) ){
                            $term_url  = get_term_link( $cat_obj->term_id );
                            $term_name = $cat_obj->name;
                            echo '<li class="breadcrumb-item"  itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( $term_url ) . '"><span itemprop="name">' . esc_html( $term_name ) . '</span></a><meta itemprop="position" content="' . absint( $depth ). '" />' . $delimiter . '</li>';
                            $depth++;
                        }
                    }
                }
                echo $before . '' . esc_html( get_the_title() ) . '' . $after;   
            }        
        }elseif( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ){ //For Custom Post Archive
            $depth     = 2;
            $post_type = get_post_type_object( get_post_type() );
            if( get_query_var('paged') ){
                echo '<li class="breadcrumb-item"  itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $post_type->label ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '/</li>';
                echo $before . sprintf( __('Page %s', 'hotell'), get_query_var('paged') ) . $after;
            }else{

             if(get_post_type() == 'job_listing'){
                 $tax = $wp_query->get_queried_object();

              echo $before . '' . esc_html( $post_type->label ) . ' / '. esc_html( $tax->name ) . '' . $after;
              }else{

                echo $before . '' . esc_html( $post_type->label ) . '' . $after;
            }
            }    
        }elseif( is_attachment() ){ 
            $depth = 2;           
            echo $before . '' . esc_html( get_the_title() ) . '' . $after;
        }elseif( is_page() && !$post->post_parent ){            
            $depth = 2;
            echo $before . '' . esc_html( get_the_title() ) . '' . $after;
        }elseif( is_page() && $post->post_parent ){            
            $depth       = 2;
            $parent_id   = $post->post_parent;
            $breadcrumbs = array();
            while( $parent_id ){
                $current_page  = get_post( $parent_id );
                $breadcrumbs[] = $current_page->ID;
                $parent_id     = $current_page->post_parent;
            }
            $breadcrumbs = array_reverse( $breadcrumbs );
            for ( $i = 0; $i < count( $breadcrumbs) ; $i++ ){
                echo '<li class="breadcrumb-item"  itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="' . esc_url( get_permalink( $breadcrumbs[$i] ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title( $breadcrumbs[$i] ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</li>';
                $depth++;
            }
            echo $before . '' . esc_html( get_the_title() ) . '' . $after;
        }elseif( is_404() ){
            $depth = 2;
            echo $before . '' . esc_html__( '404 Error - Page Not Found', 'hotell' ) . '' . $after;
        }
        
        if( get_query_var('paged') ) printf( __( ' (Page %s)', 'hotell' ), get_query_var('paged') );
        
        echo '</ol></nav><!-- .crumbs -->';


        
    }                ?>
                    <!--<nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">City</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                    </nav>-->
                    <?php
              if(!is_archive()){

                    ?>
                    <div class="title">
                       <?php
                       if(is_search()){
                    echo "Search Results";
                    
               }else{
                        the_title();
                    }
                    ?>
                    </div>

                    <?php

                 if( get_the_title(get_the_ID()) == 'Job Listing' ){ 
                    
                    ?>
                     <p><?php  the_content();?></p>
                 <?php } 

                    if( get_post_type() == 'services' ){ 
                        if(get_field('banner_description')){
                    ?>
                     <p><?php echo get_field('banner_description');?></p>
                 <?php } 


  if(get_field('apply_now_button_link')){
                 ?>
                    <a href="<?php echo get_field('apply_now_button_link');?>" class="btn btn-primary mt-3">Apply <i class="fas fa-arrow-right"></i></a>
                    
                <?php }  } }else{
                  $term = get_queried_object();  
                  
                  ?>
                   <div class="title">
           <?php echo   $term->name; ?>
                   </div>
                  <?php
                } ?>
                </div>
            </div>
        </div>
        </div>
    </section>
        
        <?php 
    }    
    ?>
    <?php
    
    /**
     * Before Content
     * 
     * @hooked hotell_banner             - 15
     * @hooked hotell_top_bar            - 30
     * @hooked hotell_content_start      - 40
    */
    //do_action( 'hotell_after_header' );