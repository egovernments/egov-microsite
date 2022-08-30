<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Hotell
 */

get_header();

	/**
	 * Before Posts hook
	*/
//	do_action( 'hotell_before_posts_content' );

	if ( have_posts() ) : 
	
	?>
    <style>
    @media (max-width: 767px){
      .search {
        right: auto;
      }
    }
    .box-card {
    	    padding: 30px 40px 10px;
    }
    </style>
<section class="search-result sec-spacing bg pb-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title">Search Results for "<?php echo get_search_query()?>"</div>
                    </div>
                </div>
            </div>
            
              
	<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post();

			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
			?>
			<div class="box-card">
              
                <div class="content">
                    <h2 class="heading mb-4"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                    <p><?php the_excerpt();?> </p>
                </div>
            </div>
           
<?php
		endwhile;

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
?>
</div>
    </section>
<?php
get_footer();