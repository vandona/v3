<!-- Main Container Starts -->
<div id="main-container" class="container"> 
<!-- Breadcrumb Starts -->
		<?php echo CI::breadcrumbs()->generate(); ?>
<!-- Breadcrumb Ends -->
<!-- Product Info Starts -->
		<div class="row product-info full">
		<!-- Left Starts -->
			<div class="col-sm-4 images-block">
                            <?php
                                $photo = theme_img('no_picture.png', lang('no_image_available'));

                                if(!empty($product->images[0]))
                                {
                                    foreach($product->images as $photo)
                                    {
                                        if(isset($photo['primary']))
                                        {
                                            $primary = $photo;
                                        }
                                    }
                                    if(!isset($primary))
                                    {
                                        $tmp = $product->images; //duplicate the array so we don't lose it.
                                        $primary = array_shift($tmp);
                                    }

                                    $photo = '<img class="img-responsive thumbnail" src="'.base_url('uploads/images/full/'.$primary['filename']).'" alt="'.$product->seo_title.'" data-caption="'.htmlentities(nl2br($primary['caption'])).'"/>';
                                }
                                
                            ?>
				<a href="<?php echo base_url('uploads/images/full/'.$primary['filename']);?>">
					<?php echo $photo;?>
				</a>
                        <?php if(count($product->images) > 1):?>
				<ul class="list-unstyled list-inline">
                                    <?php foreach($product->images as $image):?>
                                    <li>
                                        <a href="<?php echo base_url('uploads/images/full/'.$image['filename']);?>">
                                            <img width="65" height="87" src="<?php echo base_url('uploads/images/full/'.$image['filename']);?>" alt="Image" class="img-responsive thumbnail" data-caption="<?php echo htmlentities(nl2br($image['caption']));?>"/>
                                        </a>
                                    </li>                                    
                                    <?php endforeach;?>
				</ul>
                        <?php endif;?>
			</div>
		<!-- Left Ends -->
		<!-- Right Starts -->
			<div class="col-sm-8 product-details">
				<div class="panel-smart">
				<!-- Product Name Starts -->
					<h2><?php echo $product->name;?></h2>
				<!-- Product Name Ends -->
					<hr />
				<!-- Manufacturer Starts -->
					<ul class="list-unstyled manufacturer">
						<li>
                                                    <span><?php echo lang('product_cod');?>:</span> <?php echo (new content_filter($product->sku))->display();?>
						</li>
						<li><span><?php echo lang('product_desc');?>:</span> <?php echo (new content_filter($product->description))->display();?></li>
						<li>
                                                    <span><?php echo lang('product_availability');?>:</span> 
                                                        <?php if($product->quantity > 0):?>
                                                            <strong class="label label-primary"><?php echo lang('available');?></strong>
                                                        <?php else:?>
                                                            <strong class="label label-danger"><?php echo lang('out_of_stock');?></strong>
                                                        <?php endif;?>
                                                    
						</li>
					</ul>
				<!-- Manufacturer Ends -->
					<hr />
				<!-- Price Starts -->
                                

                                <?php if(!$product->is_giftcard):?>
					<div class="price">
						<span class="price-head"><?php echo lang('price');?> :</span>
                                        <?php if($product->saleprice > 0):?>
<!--                                            <small class="sale"><?php echo lang('on_sale');?></small>-->
                                            <span class="price-new"><?php echo format_currency($product->saleprice);?></span>
                                        <?php else:?>
                                            <span class="price-old"><?php echo format_currency($product->price);?></span>
                                        <?php endif;?>
					</div>
                                 <?php endif;?>
				<!-- Price Ends -->
					<hr />
				<!-- Available Options Starts -->
					<div class="options">
						<h3><?php echo lang('product_available_options');?></h3>
                                                <div id="productAlerts"></div>
                                                 <?php echo form_open('cart/add-to-cart', 'id="add-to-cart"');?>
                                                <input type="hidden" name="cartkey" value="<?php echo CI::session()->flashdata('cartkey');?>" />
                                                <input type="hidden" name="id" value="<?php echo $product->id?>"/>
	<?php if(count($options) > 0): ?>
                <?php foreach($options as $option):
                    $required = '';
                    if($option->required)
                    {
                        $required = ' class="required"';
                    }
                    ?>
                        <div class="form-group">
                            <div class="col" data-cols="1/3">
                                <label<?php echo $required;?> class="control-label text-uppercase"><?php echo ($product->is_giftcard) ? lang('gift_card_'.$option->name) : $option->name;?></label>
                            </div>
                            <div class="col" data-cols="2/3">
                        <?php
                        if($option->type == 'checklist')
                        {
                            $value  = [];
                            if($posted_options && isset($posted_options[$option->id]))
                            {
                                $value  = $posted_options[$option->id];
                            }
                        }
                        else
                        {
                            if(isset($option->values[0]))
                            {
                                $value  = $option->values[0]->value;
                                if($posted_options && isset($posted_options[$option->id]))
                                {
                                    $value  = $posted_options[$option->id];
                                }
                            }
                            else
                            {
                                $value = false;
                            }
                        }

                        if($option->type == 'textfield'):?>
                            <input type="text" name="option[<?php echo $option->id;?>]" value="<?php echo $value;?>"/>
                        <?php elseif($option->type == 'textarea'):?>
                            <textarea name="option[<?php echo $option->id;?>]"><?php echo $value;?></textarea>
                        <?php elseif($option->type == 'droplist'):?>
                            <select name="option[<?php echo $option->id;?>]" class="form-control">
                                <option value=""><?php echo lang('choose_option');?></option>

                            <?php foreach ($option->values as $values):
                                $selected   = '';
                                if($value == $values->id)
                                {
                                    $selected   = ' selected="selected"';
                                }?>

                                <option<?php echo $selected;?> value="<?php echo $values->id;?>">
                                    <?php if($product->is_giftcard):?>
                                        <?php echo($values->price != 0)?' (+'.format_currency($values->price).') ':''; echo lang($values->name);?>
                                    <?php else:?>
                                        <?php echo($values->price != 0)?' (+'.format_currency($values->price).') ':''; echo $values->name;?>
                                    <?php endif;?>
                                    
                                </option>

                            <?php endforeach;?>
                            </select>
                        <?php elseif($option->type == 'radiolist'):?>
                            <label class="control-label radiolist">
                            <?php foreach ($option->values as $values):

                                $checked = '';
                                if($value == $values->id)
                                {
                                    $checked = ' checked="checked"';
                                }?>
                                <div>
                                    <input<?php echo $checked;?> type="radio" name="option[<?php echo $option->id;?>]" value="<?php echo $values->id;?>"/>
                                    <?php echo($values->price != 0)?'(+'.format_currency($values->price).') ':''; echo $values->name;?>
                                </div>
                            <?php endforeach;?>
                            </label>
                        <?php elseif($option->type == 'checklist'):?>
                            <label class="control-label checklist"<?php echo $required;?>>
                            <?php foreach ($option->values as $values):

                                $checked = '';
                                if(in_array($values->id, $value))
                                {
                                    $checked = ' checked="checked"';
                                }?>
                                <div><input<?php echo $checked;?> type="checkbox" name="option[<?php echo $option->id;?>][]" value="<?php echo $values->id;?>"/>
                                <?php echo($values->price != 0 && $option->name != 'Buy a Sample')?'('.format_currency($values->price).') ':''; echo $values->name;?></div>
                            <?php endforeach; ?>
                            </label>
                        <?php endif;?>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
						<div class="cart-button button-group">
							<button type="button" title="Wishlist" class="btn btn-wishlist">
								<i class="fa fa-heart"></i>
							</button>
							<button type="button" title="Compare" class="btn btn-compare">
								<i class="fa fa-bar-chart-o"></i>
							</button>
                                                    <?php if(!config_item('inventory_enabled') || config_item('allow_os_purchase') || !(bool)$product->track_stock || $product->quantity > 0) : ?>

                <?php if(!$product->fixed_quantity) : ?>

                        <strong>Quantity&nbsp;</strong>
                        <input type="text" name="quantity" value="1" style="width:50px; display:inline"/>&nbsp;
                        <button class="btn btn-cart" type="button" value="submit" onclick="addToCart($(this));"><i class="icon-cart"></i> <?php echo lang('form_add_to_cart');?></button>
                <?php else: ?>
                        <button class="btn btn-cart" type="button" value="submit" onclick="addToCart($(this));"><i class="icon-cart"></i> <?php echo lang('form_add_to_cart');?></button>
                <?php endif;?>

            <?php endif;?>
															
						</div>
					</div>
				<!-- Available Options Ends -->
				</div>
			</div>
		<!-- Right Ends -->
		</div>
	<!-- Product Info Ends -->

	</div>
<!-- Main Container Ends -->



<script>

    function addToCart(btn)
    {
        $('.productDetails').spin();
        btn.attr('disabled', true);
        var cart = $('#add-to-cart');
        $.post(cart.attr('action'), cart.serialize(), function(data){
            if(data.message != undefined)
            {
                $('#productAlerts').html('<div class="alert green">'+data.message+' <a href="<?php echo site_url('checkout');?>"> <?php echo lang('view_cart');?></a> <i class="close"></i></div>');
                updateItemCount(data.itemCount);
                cart[0].reset();
            }
            else if(data.error != undefined)
            {
                $('#productAlerts').html('<div class="alert red">'+data.error+' <i class="close"></i></div>');
            }

            $('.productDetails').spin(false);
            btn.attr('disabled', false);
        }, 'json');
    }

    var banners = false;
    $(document).ready(function(){
        banners = $('#banners').html();
    })

    $('.productImages img').click(function(){
        if(banners)
        {
            $.gumboTray(banners);
            $('.banners').gumboBanner($('.productImages img').index(this));
        }
    });

    $('.tabs').gumboTabs();
</script>

<?php if(count($product->images) > 1):?>
<script id="banners" type="text/template">
    <div class="banners">
        <?php
        foreach($product->images as $image):?>
                <div class="banner" style="text-align:center;">
                    <img src="<?php echo base_url('uploads/images/full/'.$image['filename']);?>" style="max-height:600px; margin:auto;"/>
                    <?php if(!empty($image['caption'])):?>
                        <div class="caption">
                            <?php echo $image['caption'];?>
                        </div>
                    <?php endif; ?>
                </div>
        <?php endforeach;?>
        <a class="controls" data-direction="back"><i class="icon-chevron-left"></i></a>
        <a class="controls" data-direction="forward"><i class="icon-chevron-right"></i></a>
        <div class="banner-timer"></div>
    </div>
</script>
<?php endif;?>


<?php if(!empty($product->related_products)):?>
    <div class="page-header" style="margin-top:30px;">
        <h3><?php echo lang('related_products_title');?></h3>
    </div>
    <?php
    $relatedProducts = [];
    foreach($product->related_products as $related)
    {
        $related->images    = json_decode($related->images, true);
        $relatedProducts[] = $related;
    }
    \GoCart\Libraries\View::getInstance()->show('categories/products', ['products'=>$relatedProducts]); ?>

<?php endif;?>