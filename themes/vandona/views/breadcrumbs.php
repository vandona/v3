<?php if(!empty($breadcrumbs)):?>
<!-- Breadcrumb Starts -->	
<ol class="breadcrumb">
    <li><a href="<?php echo site_url();?>"><i class="icon-home"></i></a></li>
    <?php for($i = 0; $i<count($breadcrumbs); $i++):?>
        <?php if($i != count($breadcrumbs)-1):?>
    <li><a href="<?php echo $breadcrumbs[$i]['link'];?>"><?php echo $breadcrumbs[$i]['name'];?></a><li>
        <?php else:?>
            <li class="active"><?php echo $breadcrumbs[$i]['name'];?></li>
        <?php endif;?>
    <?php endfor;?>
</ol>
<!-- Breadcrumb Ends -->
<?php endif;