<!-- Footer Section Starts -->
	<footer id="footer-area">
	<!-- Footer Links Starts -->
		<div class="footer-links">
		<!-- Container Starts -->
			<div class="container">
				<!-- Information Links Starts -->
					<div class="col-md-2 col-sm-6">
                                            <h5>Информация</h5>
                                            <ul>
                                                    <?php page_loop(0, false, false);?>

                                            </ul>
					</div>
				<!-- Information Links Ends -->
				<!-- My Account Links Starts -->
					<div class="col-md-2 col-sm-6">
                                            <h5>Моят профил</h5>
                                            <ul>
                                                <?php if(CI::Login()->isLoggedIn(false, false)):?>
                                                <li><a href="<?php echo  site_url('my-account');?>"><?php echo lang('my_account')?></a></li>
                                                <li><a href="<?php echo site_url('logout');?>"><?php echo lang('logout');?></a></li>
                                                <?php else:?>
                                                <li><a href="<?php echo site_url('register');?>"><?php echo lang('register');?></a></li>
                                                <li><a href="<?php echo site_url('login');?>"><?php echo lang('login');?></a></li>
                                                <?php endif;?>
                                            </ul>
					</div>
				<!-- My Account Links Ends -->					
				<!-- Customer Service Links Starts -->
					<div class="col-md-2 col-sm-6">
                                            <h5>Услуги</h5>
                                            <ul>
                                                <li><a href="№">Контакт</a></li>
                                                <li><a href="#">Карта на сайта</a></li>
                                                <li><a href="#">Съдружници</a></li>
                                            </ul>
					</div>
				<!-- Customer Service Links Ends -->
				<!-- Follow Us Links Starts -->
					<div class="col-md-2 col-sm-6">
						<h5>Follow Us</h5>
						<ul>
                                                    <li><a href="#">Facebook</a></li>
                                                    <li><a href="#">Twitter</a></li>
                                                    <li><a href="#">YouTube</a></li>
						</ul>
					</div>
				<!-- Follow Us Links Ends -->
				<!-- Contact Us Starts -->
					<div class="col-md-4 col-sm-12 last">
                                            <h5>Контакт</h5>
                                            <ul>
                                                <li>Vandona</li>
                                                <li>София 1000</li>
                                                <li>Email: <a href="mailto:info@vandona.com">info@vandona.com</a></li>								
                                            </ul>
                                            <h4 class="lead">
                                                    Tel: <span>0888 7654321</span>
                                            </h4>
					</div>
				<!-- Contact Us Ends -->
			</div>
		<!-- Container Ends -->
		</div>
	<!-- Footer Links Ends -->
	<!-- Copyright Area Starts -->
		<div class="copyright">
		<!-- Container Starts -->
			<div class="container">
			<!-- Starts -->
				<p class="pull-left">
					&copy; 2015 Vandona All Rights Reserved.  <a href="http://a-w-d.biz">AWD</a>
				</p>
			<!-- Ends -->
			<!-- Payment Gateway Links Starts -->
<!--				<ul class="pull-right list-inline">
					<li>
						<img src="<?php echo theme_img('payment-icon/cirrus.png');?>" alt="PaymentGateway" />
					</li>
					<li>
						<img src="<?php echo theme_img('payment-icon/paypal.png');?>" alt="PaymentGateway" />
					</li>
					<li>
						<img src="<?php echo theme_img('payment-icon/visa.png');?>" alt="PaymentGateway" />
					</li>
					<li>
						<img src="<?php echo theme_img('payment-icon/mastercard.png');?>" alt="PaymentGateway" />
					</li>
					<li>
						<img src="<?php echo theme_img('payment-icon/americanexpress.png');?>" alt="PaymentGateway" />
					</li>
				</ul>-->
			<!-- Payment Gateway Links Ends -->
			</div>
		<!-- Container Ends -->
		</div>
	<!-- Copyright Area Ends -->
	</footer>
<!-- Footer Section Ends -->
<script>
setInterval(function(){
    resizeCategories();
}, 200);

function updateItemCount(items)
{
    $('#itemCount').text(items);
}

function resizeCategories()
{
    $('.categoryItem').each(function(){
        $(this).height($(this).width());
        var look = $(this).find('.look');
        var margin = 0-look.height()/2;
        look.css('margin-top', margin);
    });
}
</script>

</body>
</html>