<?php
/**
   Template Name: Helpline Template
 **/

 get_header();

?>

<style>
    table tr, table th, table td{border-top: none;border-left: none;border-right: none;}
</style>
<div id="main-content">
<section class="downloads sec-spacing bg">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title">
                           <?php the_field('page_subheading');?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>Title</th>
                                    <th>Helpline</th>
                                   
                                </thead>
                                <tbody>
                                    <?php
                                    $helplineDetails = get_field('add_helpline_details');
                         if($helplineDetails) {
foreach($helplineDetails as $hl){
    ?>
                                	<tr>
                                        <td><?php echo $hl['title'];?></td>
                                        <td><a style="color:#F45329;"><?php echo $hl['helpline_number'];?></a></td>
                                        
                                    </tr>
                                <?php } } ?>
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