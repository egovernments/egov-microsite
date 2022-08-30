<?php 
get_header();

?>

  <?php  
	  $current_page_id=get_the_ID();
	 $department_args = array(
	      'posts_per_page' => -1,
        	'post_type' => 'department',
        	'post_status' => 'publish',
        	    'orderby' => 'ID',
        	    'order'   => 'ASC',
        
      );
      $departmentItems = new WP_Query( $department_args );


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
<section class="department sec-spacing bg pb-5 <?php echo 'page-id-'.$current_page_id;?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <aside class="sidebar">
                        <ul style="margin:0px;"> 
                        	<?php
                         if( $departmentItems->have_posts() ) {
    $i=1;
    $data=array();
while ( $departmentItems->have_posts()){ $departmentItems->the_post();
	
    if($current_page_id==get_the_ID()){
        $active='current';
        
        $data=array(
            'title'=>get_the_title(get_the_ID()),
            'dept_id' =>get_the_ID()
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
                    <div class="row ">
                        <div class="description">
                            <?php the_content($data['dept_id']);?>
                        </div>
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
                             if($department_values){
                            foreach($department_values as $dprt_value){
                                    ?>
                                    <tr>
                                        <td><?php echo $dprt_value['description'];?></td>
                                        <td><?php echo $dprt_value['office_number'];?></td>
                                        <td><?php echo $dprt_value['mobile_number'];?></td>
                                    </tr>
                                   <?php }}else{echo "<tr>
                                        <td colspan='3'><p>No content available</p></td></tr>";} ?>
                                </tbody>
                            </table>
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