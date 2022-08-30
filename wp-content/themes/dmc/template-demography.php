<?php
/**
   Template Name: Demography Template
 **/

 get_header();
?>
<div id="main-content">
<section class="downloads demo-graph sec-spacing bg">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title">
                           <?php the_field('enter_your_subtitle');?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>Demographic Label</th>
                                    <th class="text-right">Value</th>
                                </thead>
                                <tbody>
                                	<?php
                             $demographic_values = get_field('demographic_label_value');
                             if($demographic_values){
                            foreach($demographic_values as $demographic_value){
                                	?>
                                    <tr>
                                        <td><?php echo $demographic_value['demographic_label'];?></td>
                                        <td><?php echo $demographic_value['value'];?></td>
                                    </tr>
                                   <?php } }else{echo "<p>No content available</p>";} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
<?php 

get_footer();
?>