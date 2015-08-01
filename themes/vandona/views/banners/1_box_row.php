<?php if(isset($banners[0])): $b = $banners[0]; ?>
<div class="col1-banners">
        <div class="container">
                <img src="<?php echo base_url('uploads/'.$b->image);?>" alt="<?php echo $b->name;?>" class="img-responsive" />
        </div>
</div>
<?php endif;?>
