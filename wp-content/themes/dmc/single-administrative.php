<?php 

get_header();

?>

  <?php  
	 $current_page_id=get_the_ID();
	 $administrative_args = array(
	      'posts_per_page' => -1,
        	'post_type' => 'administrative',
        	'post_status' => 'publish',
        	    'orderby' => 'ID',
        	    'order'   => 'ASC',
        
      );
      $administrativeItems = new WP_Query( $administrative_args );


?>
<style>
.department .table > :not(caption) > * > * {
    padding: 1rem 0.5rem;
}
.department table thead {
    background: #F1F1F1;
}
 .department table tr, .department table th, .department table td {
    border-top: none;
    border-left: none;
    border-right: none;
}
</style>
<div id="main-content">
<section class="sec-spacing bg pb-5 <?php echo 'page-id-'.$current_page_id;?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <aside class="sidebar">
                        <ul style="margin:0px;"> 
                        	<?php
                         if( $administrativeItems->have_posts() ) {
    
    $data=array();
while ( $administrativeItems->have_posts()){ $administrativeItems->the_post();
	if($current_page_id==get_the_ID()){
		$active='current';
		
		$data=array(
            'title'=>get_the_title(get_the_ID()),
            'administrative_id' =>$current_page_id
		);
	}else{
		$active='';
	}
                        	?>

                            <li class="<?php echo $active;?>"><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
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
                        <div class="title"><?php echo $data['title'];?></div>
                    </div>
                      <div class="box-card">
                        <div class="content" >
                      
                           <?php //echo the_content('313');
                $content_post = get_post($data['administrative_id']);
$content = $content_post->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
echo $content;
                           ?>
                           <p>&nbsp;</p>
                         <?php 
                          $department_values = get_field('add_details',$data['dept_id']);
                          if($department_values){
                          ?>
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>Description</th>
                                    <th>Office Number</th>
                                     <th>Mobile Number</th>
                                </thead>
                                <tbody>
                                    <?php
                            
                            foreach($department_values as $dprt_value){
                                    ?>
                                    <tr>
                                        <td><?php echo $dprt_value['description'];?></td>
                                        <td><?php echo $dprt_value['office_number'];?></td>
                                        <td><?php echo $dprt_value['mobile_number'];?></td>
                                    </tr>
                                   <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
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