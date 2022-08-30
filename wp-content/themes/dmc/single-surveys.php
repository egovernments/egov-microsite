<?php

 get_header();
?>
<div id="main-content">
<section class="downloads demo-graph sec-spacing bg">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header">
                        <div class="title">
                            <?php the_title();?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <div class="card">
                     <?php the_content();?>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
<?php 

get_footer();
?>