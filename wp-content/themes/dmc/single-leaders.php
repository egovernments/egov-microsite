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
    do_action( 'hotell_before_posts_content' );

    while ( have_posts() ) : the_post();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); if( ! is_single() ) echo ' itemscope itemtype="https://schema.org/Blog"'; ?>>
    <?php
     $image_url = get_the_post_thumbnail_url(get_the_ID(),'full');
     if($image_url){?>
<img src="<?php echo $image_url;?>" alt="<?php echo get_the_title();?>" style="width:100%;">
<p>&nbsp;</p>
    <?php }
    ?>
    <?php if( 'post' == get_post_type()  && !is_single() ) echo '<div class="card blog-card">';
         
        /**
         * @hooked hotell_post_thumbnail - 10
         * @hooked hotell_entry_header   - 20 
        */
        do_action( 'hotell_before_post_entry_content' );
    
        /**
         * Entry Content
         * @hooked hotell_entry_content - 15
         * @hooked hotell_entry_footer  - 20
        */
        do_action( 'hotell_post_entry_content' );
        
    if( 'post' == get_post_type()  && !is_single() ) echo '</div>'; ?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php
       // get_template_part( 'template-parts/content', get_post_type() );

    endwhile; // End of the loop.

    hotell_content_wrapper_end();
        
get_footer();