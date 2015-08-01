<!-- Main Container Starts -->
<div id="main-container" class="container">
	<!-- Main Heading Starts -->
        <h2 class="main-heading text-center">
                <?php echo lang('login_title');?>
        </h2>
	<!-- Main Heading Ends -->
    <!-- Login Form Section Starts -->
		<section class="login-area">
			<div class="row">
				<div class="col-sm-6">
				<!-- Login Panel Starts -->
					<div class="panel panel-smart">
						<div class="panel-heading">
							<h3 class="panel-title"><?php echo lang('login');?></h3>
						</div>
						<div class="panel-body">
							<p>
								<?php echo lang('plogin');?>
							</p>
						<!-- Login Form Starts -->
						<?php echo form_open('login/'.$redirect, 'id="loginForm" class="form-inline" role="form"'); ?>	
                                                
								<div class="form-group">
                                                                        <label class="sr-only" for="email"><?php echo lang('email');?></label>
                                                                        <input type="text" name="email" class="form-control" placeholder="<?php echo lang('email');?>"/>
								</div>
								<div class="form-group">
                                                                        <label class="sr-only" for="password"><?php echo lang('password');?></label>
                                                                        <input class="form-control" type="password" name="password" placeholder="<?php echo lang('password');?>"/>
								</div>
                                                                <button type="submit" class="btn btn-main">
                                                                                <?php echo lang('form_login');?>
                                                                </button>
                                                                <div class="form-group">
                                                                    <input name="remember" value="true" type="checkbox" />
                                                                    <?php echo lang('keep_me_logged_in');?>
                                                                </div>                                                                
							</form>
						<!-- Login Form Ends -->
						</div>
					</div>
                                        <div class="panel panel-smart">
						<div class="panel-heading">
							<h3 class="panel-title"><?php echo lang('forgot_password')?></h3>
						</div>
                                            <div class="panel-body">
                                                <a class="btn btn-main" href="<?php echo site_url('forgot-password'); ?>"><?php echo lang('forgot_password')?></a>
                                            </div>
                                        </div>    
				<!-- Login Panel Ends -->
				</div>
				<div class="col-sm-6">
				<!-- Account Panel Starts -->
					<div class="panel panel-smart">
						<div class="panel-heading">
							<h3 class="panel-title">
								<?php echo lang('form_register');?>
							</h3>
						</div>
						<div class="panel-body">
							<p>
								<?php echo lang('pregister');?>
							</p>
		<?php echo form_open('register', 'id="registration_form" class="form-horizontal"'); ?>
                <input type="hidden" name="submitted" value="submitted" />
                <input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
                <div class="form-group">   
                    <div class="col-sm-8">
                        <?php echo form_input(['class'=>'form-control','name'=>'company', 'value'=> assign_value('company')]);?>
                    </div>
                     <label for="company"><?php echo lang('account_company');?></label>
                </div>
                <div class="form-group">
                    <label for="account_firstname"><?php echo lang('account_firstname');?></label>
                    <div class="col-sm-8">
                        <?php echo form_input(['class'=>'form-control','name'=>'firstname', 'value'=> assign_value('firstname')]);?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="account_lastname"><?php echo lang('account_lastname');?></label>
                    <div class="col-sm-8">
                        <?php echo form_input(['class'=>'form-control','name'=>'lastname', 'value'=> assign_value('lastname')]);?>
                    </div>
                </div>

                <div class="form-group">
                    
                    <label for="account_email"><?php echo lang('account_email');?></label>
                    <div class="col-sm-8">
                        <?php echo form_input(['class'=>'form-control','name'=>'email', 'value'=>assign_value('email')]);?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="account_phone"><?php echo lang('account_phone');?></label>
                    <div class="col-sm-8">
                    <?php echo form_input(['class'=>'form-control','name'=>'phone', 'value'=> assign_value('phone')]);?>
                    </div>
                </div>
               

                <label class="checklist">
                    <input type="checkbox" name="email_subscribe" value="1" <?php echo set_radio('email_subscribe', '1', TRUE); ?>/> <?php echo lang('account_newsletter_subscribe');?>
                </label>

                    <div class="form-group">
                        <label for="account_password"><?php echo lang('account_password');?></label>
                        <div class="col-sm-8">
                            <input class="form-control"type="password" name="password" autocomplete="off" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="account_confirm"><?php echo lang('account_confirm');?></label>
                        <div class="col-sm-8">
                            <input class="form-control" type="password" name="confirm" autocomplete="off" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-9 col-sm-2">
                            <input type="submit" value="<?php echo lang('form_register');?>" class="btn btn-main" />
                        </div>
                    </div>
            </form>
						</div>
					</div>
				<!-- Account Panel Ends -->
				<!-- Guest Checkout Panel Starts -->
<!--					<div class="panel panel-smart">
						<div class="panel-heading">
							<h3 class="panel-title">
								Checkout as Guest
							</h3>
						</div>
						<div class="panel-body">
							<p>
								Checkout as a guest instead!
							</p>
							<button class="btn btn-main">As Guest</button>
						</div>
					</div>-->
				<!-- Guest Checkout Panel Ends -->
				</div>
			</div>
		</section>
	<!-- Login Form Section Ends -->
	</div>
<!-- Main Container Ends -->   

<script>
    $(document).ready(function() {
        <?php if(isset($registrationErrors)):?>

            var formErrors = <?php echo json_encode($registrationErrors);?>

            for (var key in formErrors) {
                if (formErrors.hasOwnProperty(key)) {
                    $('#registration_form').find('[name="'+key+'"]').parent().append('<div class="form-error text-red">'+formErrors[key]+'</div>')
                }
            }
        <?php endif;?>

        <?php if(isset($loginErrors)):?>

            var formErrors = <?php echo json_encode($loginErrors);?>

            for (var key in formErrors) {
                if (formErrors.hasOwnProperty(key)) {
                    $('#loginForm').find('[name="'+key+'"]').parent().append('<div class="form-error text-red">'+formErrors[key]+'</div>')
                }
            }
        <?php endif;?>
        });        
</script>