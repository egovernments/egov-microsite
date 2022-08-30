<?php 
get_header();

?>

  <?php  
	  $current_page_id=get_the_ID();
	 $department_args = array(
	      'posts_per_page' => -1,
        	'post_type' => 'cities',
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
.cities .city {
  color: #1C343E;
  font-size: 18px;
  padding: 15px;
  border-bottom: 1px solid #d9d9d9;
  max-width: 250px;
  font-weight: 500;
  position: relative;
}

.cities .city.active::before {
  color: #F45329;
  content: '';
  position: absolute;
  left: 0;
  width: 4px;
  height: 25px;
  background-color: #F45329;
}

.search-city {
  position: relative;
}

.search-city input {
  background-color: transparent;
  color: #fff;
  border: 2px solid #fff;
  border-radius: 0px;
  padding: 4px 10px;
}

.search-city input::-webkit-input-placeholder {
  color: #fff;
}

.search-city input:-ms-input-placeholder {
  color: #fff;
}

.search-city input::-ms-input-placeholder {
  color: #fff;
}

.search-city input::placeholder {
  color: #fff;
}

.search-city i {
  position: absolute;
  top: 50%;
  right: 10px;
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
  color: #fff;
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
 
    $data=array();
while ( $departmentItems->have_posts()){ $departmentItems->the_post();
	if($current_page_id==get_the_ID()){
		$active='current';
		
		$data=array(
            'title'=>get_the_title(get_the_ID()),
            'district_id' =>get_the_ID()
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
                         <div class="topnav">
   <!--<div class="search-container">
   <form method="get">
      <input type="text" placeholder="Search City" name="s_city" id="search_city">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>-->
</div>
                    </div>
                     <div class="row" id="citiesList">
                       
                            <?php
                            $district_values = get_field('add_city_details',$data['district_id']);
                             $count_ttl= count($district_values);
                             
                             if(($count_ttl % 3)=='0'){
                                $col_count = round(($count_ttl/3),0);
                             }elseif(($count_ttl % 3)=='1'){
                                $col_count = round(($count_ttl/3),0)+1;
                             }else{
                                $col_count = round(($count_ttl/3),0);
                             }
                            ?>
                            
                                    <?php
                             

                            for($i=0; $i<=$count_ttl;$i++){
                                    ?>
                                    

                                    <div class="col-md-4">
                            <div class="city">
                               <a href="<?php echo $district_values[$i]['city_link'];?>"><?php echo $district_values[$i]['city_name'];?></a>
                            </div>
                        </div>
                                   <?php } ?>
                                
                        </div>
                         <?php } ?>
                       
                    </div>
               
               
            </div>
        </div>
    </section>

</div>
<?php

get_footer();