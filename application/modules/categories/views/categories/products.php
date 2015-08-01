<!-- Product Grid Display Starts -->
<div class="row">
    <?php if(count($products) == 0):?>

        <h2 style="margin:50px 0px; text-align:center; line-height:30px;">
            <?php echo lang('no_products');?>
        </h2>

    <?php else:?>

        <div class="col-nest categoryItems element">
        <?php foreach($products as $product):?>
            <?php
                $photo  = theme_img('no_picture.png');

                if(!empty($product->images[0]))
                {
                    $primary    = $product->images[0];
                    foreach($product->images as $photo)
                    {
                        if(isset($photo['primary']))
                        {
                            $primary    = $photo;
                        }
                    }

                    $photo  = base_url('uploads/images/medium/'.$primary['filename']);
                }
                ?>
            <!-- Product #1 Starts -->
                    <div class="col-md-4 col-sm-6">
                            <div class="product-col">
                                    <div class="image">
                                        <a href="<?php echo site_url('/product/'.$product->slug); ?>"><img src="<?php echo $photo;?>" alt="<?php echo $product->name;?>" class="img-responsive" /></a>
                                    </div>
                                    <div class="caption">
                                            <h4><a href="<?php echo site_url('/product/'.$product->slug); ?>"><?php echo $product->name;?></a></h4>
                                            <div class="description">
                                                    
                                            </div>
                                            <?php if(!$product->is_giftcard): //do not display this if the product is a giftcard?>
                                            <div class="price">
                                                    <span class="price-new"> <?php echo ( $product->saleprice>0?format_currency($product->saleprice):format_currency($product->price) );?></span> 
                                            </div>
                                            <?php endif;?>
                                            <div class="cart-button button-group">
<!--                                                    <button type="button" title="Wishlist" class="btn btn-wishlist">
                                                            <i class="fa fa-heart"></i>
                                                    </button>
                                                    <button type="button" title="Compare" class="btn btn-compare">
                                                            <i class="fa fa-bar-chart-o"></i>
                                                    </button>-->
                                                    <?php if((bool)$product->track_stock && $product->quantity < 1 && config_item('inventory_enabled')):?>
                                                        <div class="categoryItemNote yellow"><?php echo lang('out_of_stock');?></div>
                                                    <?php elseif($product->saleprice > 0):?>
                                                        <div class="categoryItemNote red"><?php echo lang('on_sale');?></div>
                                                    <?php endif;?>
                                                        <a href="<?php echo site_url('/product/'.$product->slug); ?>" type="button" class="btn btn-cart">
                                                            <i class="icon-cart"></i> <?php echo lang('form_add_to_cart');?>
                                                        </a>									
                                            </div>
                                    </div>
                            </div>
                    </div>
            <!-- Product #1 Ends -->
            
        <?php endforeach;?>
        </div>

    <?php endif;?>
</div>
