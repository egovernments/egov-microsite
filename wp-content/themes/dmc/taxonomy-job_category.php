<?php 

get_header();

?>
<style>
    .red {color: red;}
    .table>:not(caption)>*>* {
    padding: 1rem 1rem;
   
}
th {
    font-size: 18px;
    color: #324851;
}
.search-container {
    border: 1px solid #fff;
}
.topnav input {
    border: none;
    background: transparent;
    color: #fff;
    padding: 5px 10px;
}
.topnav button {
    border: none;
    background: transparent;
}
.topnav button i {
    color: #fff;
}

.topnav input::-webkit-input-placeholder { /* Edge */
  color: #fff;
}

.topnav input:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: #fff;
}

.topnav input::placeholder {
  color: #fff;
}

    table tr, table th, table td{border-top: none;border-left: none;border-right: none;}

    </style>
 
<div id="main-content">
 <section class="sec-spacing bg pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <aside class="sidebar">
                   <ul style="margin:0px;"> 
                        	 <?php
                              $cterm = get_queried_object();  
                              $ctslug = $cterm->slug;
                                     $i=1;
    $terms = get_terms( "job_category", array(
  'hide_empty' => 0,
) );

if ( count($terms) > 0 ){
  foreach ( $terms as $term ){
      if($ctslug==$term->slug){
      $active='current';
        
        $data=array(
            'title'=>$term->name,
            'term_slug' =>$term->slug
        );
    }else{
        $active='';
    }
                         ?>

    <li class="<?php echo $active;?>"><a href="<?php echo get_term_link( $term->slug,'job_category');?>"><?php echo $term->name;?></a></li>
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
                        <div class="title">Job in <?php echo $data['title'];?> Department </div>
                        <div class="topnav">
  <div class="search-container">
    <form method="get">
      <input type="text" placeholder="Search Jobs" name="s_job" value="<?php  
     if(isset($_GET['s_job'])){
       echo $_GET['s_job'];
     }?>">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
                    </div>
                     <div class="content">

                           <div class="table-responsive">
                              <table class="table">
                                <thead class="thead-light">
                                <tr>
                                  
                                  <th scope="col">Job Title</th>
                                  <th scope="col">Grade</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                    	<?php  
function title_filter( $where, &$wp_query ){
    global $wpdb;
    if ( $search_term = $wp_query->get( 'search_prod_title' ) ) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( like_escape( $search_term ) ) . '%\'';
    }
    return $where;
}

     if(isset($_GET['s_job'])){
       $sjob=$_GET['s_job'];
     }else{
$sjob='';
     }
     $postperpage=10;
    
     $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;  
     $job_args = array(
          'posts_per_page' => $postperpage,
            'post_type' => 'job_listing',
             'search_prod_title' => $sjob,
            'tax_query' => array(
        array (
            'taxonomy' => 'job_category',
            'field' => 'slug',
            'terms' => $data['term_slug'],
        )
    ),
         'post_status' => 'publish',
           'paged'          => $paged,
                'orderby' => 'post_date',
                'order'   => 'DESC',
        
      );
     add_filter( 'posts_where', 'title_filter', 10, 2 );
      $jobItems = new WP_Query( $job_args );
remove_filter( 'posts_where', 'title_filter', 10, 2 );

if( $jobItems->have_posts() ) {
   
while ( $jobItems->have_posts()){ $jobItems->the_post();
    ?>
           <tr>
                                  <td class="red"><a href="<?php the_permalink();?>"><?php the_title();?></a></td>
                                  <td><?php echo get_field('grade');?></td>
                                </tr>

                        <?php } ?>
                   
                <?php }else{ ?>
<tr>
<td colspan="2">No Job Found.</td>
                                </tr>
                <?php } ?>
                 </tbody>
                              </table>
                            </div>
 <div class="pagination">
 <nav aria-label="Page navigation">
                                <?php 
                                $big = 999999999; // need an unlikely integer
        

        $pages =  paginate_links( array(
            'base'       => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'     => '?paged=%#%',
            'current'    => max( 1, $paged ),
            'total'      => $jobItems->max_num_pages,
            'mid_size'   => 1,
            'prev_text'  => __( '«' ),
            'next_text'  => __( '»' ),
            'type'       => 'array'
        ) );
        ?>

   <?php
   $output ='';
   if ( is_array( $pages ) ) {

        $output .=  '<ul class="pagination">';
        foreach ( $pages as $page ) {
            $output .= "<li class='page-item'>$page</li>";
        }
        $output .= '</ul>';
}
echo  $output;
        ?>
                               
               </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </section>
</div>
<?php

get_footer();