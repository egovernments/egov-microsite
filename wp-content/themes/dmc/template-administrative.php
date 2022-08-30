<?php 
/****
Template Name: Administrative Setup Template
 ***/

get_header();

?>

  <?php  
	 
	 $administrative_args = array(
	      'posts_per_page' => -1,
        	'post_type' => 'administrative',
        	'post_status' => 'publish',
        	    'orderby' => 'post_date',
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
<section class="sec-spacing bg pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <aside class="sidebar">
                        <ul style="margin:0px;"> 
                        	<?php
                         if( $administrativeItems->have_posts() ) {
    $i=1;
    $data=array();
while ( $administrativeItems->have_posts()){ $administrativeItems->the_post();
	if($i==1){
		$active='current';
		
		$data=array(
            'title'=>get_the_title(get_the_ID()),
            'administrative_id' =>get_the_ID()
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
                        <div class="content">
                           <?php echo get_the_content($data['administrative_id']);?>
                           <p>&nbsp;</p>
                           <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>Description</th>
                                    <th>Office Number</th>
                                     <th>Mobile Number</th>
                                </thead>
                                <tbody>
                                    <?php
                             $department_values = get_field('add_details',$data['dept_id']);
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