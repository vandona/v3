<div class="slider">
        <div class="container">
                <div id="main-carousel" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper For Slides Starts -->
                                <div class="carousel-inner">
                                    <?php $i=1; foreach($banners as $banner):?>
                                        <div class="item <?php echo $i == 1 ? 'active':'';?>">
                                            <img src="<?php echo base_url('uploads/'.$banner->image);?>" alt="<?php echo $banner->name;?>" class="img-responsive" />
                                        </div>						
                                    <?php $i++; endforeach;?>
                                </div>
                        <!-- Wrapper For Slides Ends -->
                        <!-- Controls Starts -->
                                <a class="left carousel-control" href="#main-carousel" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#main-carousel" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                        <!-- Controls Ends -->
                </div>				
        </div>
</div>
