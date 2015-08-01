<!-- Main Container Starts -->
<div id="main-container" class="container">
<h2 class="main-heading text-center"><?php echo lang('cart');?></h2>
<!-- Shopping Cart Table Starts -->
		<div id="orderSummary" class="table-responsive shopping-cart-table">
							
		</div>
	<!-- Shopping Cart Table Ends -->
        <!-- Shipping Section Starts -->
		<section class="registration-area">
			<div class="row">
			<!-- Shipping & Shipment Block Starts -->
				<div class="col-sm-6">
				
				<!-- Shipment Information Block Starts -->
					<div class="panel panel-smart">
						<div class="panel-heading">
							<h3 class="panel-title">
                                                            <?php echo lang('shipment_information');?>
							</h3>
						</div>
						<div class="panel-body checkoutAddress">
                                                    <?php 
                                                        if(!empty($addresses))
                                                        {
                                                            $this->show('checkout/address_list', ['addresses'=>$addresses]);
                                                        } else {
                                                        ?>
                                                            <script>
                                                                $('.checkoutAddress').load('<?php echo site_url('addresses/form');?>');
                                                            </script>
                                                        <?php
                                                        }
                                                    ?>
						</div>
					</div>
				<!-- Shipment Information Block Ends -->
				</div>
			<!-- Shipping & Shipment Block Ends -->
			<!-- Discount & Conditions Blocks Starts -->
				<div class="col-sm-6">
                                        <div class="panel panel-smart">
                                                       <div class="panel-heading">
                                                               <h3 class="panel-title">
                                                                       <?php echo lang('ship_pay_methods');?>
                                                               </h3>
                                                       </div>
                                            <div class="panel-body">
                                                <div id="shippingMethod"></div>
                                                <div id="paymentMethod"></div>
                                            </div> 
                                        </div>
				
				
				</div>
			<!-- Discount & Conditions Blocks Ends -->
			</div>
		</section>
	<!-- Shipping Section Ends -->

</div>
<!-- Main Container Ends -->
        



<script>
    var grandTotalTest = <?php echo (GC::getGrandTotal() > 0)?1:0;?>;

    function closeAddressForm(){
        $('.checkoutAddress').load('<?php echo site_url('checkout/address-list');?>');
    }

    function processErrors(errors)
    {
        //scroll to the top
        $('body').scrollTop(0);

        $.each(errors, function(key,val) {

            if(key == 'inventory')
            {
                setInventoryErrors(val);
                $('#summaryErrors').text('<?php echo lang('some_items_are_out_of_stock');?>').show();
            }
            else if(key == 'shipping')
            {
                showShippingError(val);
            }
            else if(key == 'shippingAddress')
            {
                $('#addressError').text('<?php echo lang('error_shipping_address')?>').show();
            }
            else if(key == 'billingAddress')
            {
                $('#addressError').text('<?php echo lang('error_billing_address')?>').show();
            }
        });
    }

    $(document).ready(function(){
        //getBillingAddressForm();
        //getShippingAddressForm();
        //getShippingMethods();
        getCartSummary();
        getPaymentMethods();
    });

    function getCartSummary(callback)
    {
        //update shipping too
        getShippingMethods();

        $('#orderSummary').spin();
        $.post('<?php echo site_url('cart/summary');?>', function(data) {
            $('#orderSummary').html(data);
            if(callback != undefined)
            {
                callback();
            }
        });
    }

    function getShippingMethods()
    {
        $('#shippingMethod').load('<?php echo site_url('checkout/shipping-methods');?>');
    }

    function getPaymentMethods()
    {
        $('#paymentMethod').load('<?php echo site_url('checkout/payment-methods');?>');
    }
</script>
