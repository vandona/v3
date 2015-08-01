<!-- Main Container Starts -->
<div id="main-container" class="container">
        <h2 class="main-heading text-center">
            <?php echo str_replace('{name}', $customer['firstname'].' '.$customer['lastname'], lang('my_account_page_title'));?>
        </h2>
    <section class="login-area">
        <div id="addresses" class="row"></div>
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-smart">
                    <div class="panel-heading">
                        <h3><?php echo lang('account_information');?></h3>
                    </div>
                    <div class="panel-body">
                        <?php echo form_open('my-account',' class="form-horizontal"'); ?>
                        <div class="form-group">
                            <label for="company"><?php echo lang('account_company');?></label>
                            <div class="col-sm-8">
                                <?php echo form_input(['class'=>'form-control','name'=>'company', 'value'=> assign_value('company', $customer['company'])]);?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="account_firstname"><?php echo lang('account_firstname');?></label>
                            <div class="col-sm-8">
                            <?php echo form_input(['class'=>'form-control','name'=>'firstname', 'value'=> assign_value('firstname', $customer['firstname'])]);?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="account_lastname"><?php echo lang('account_lastname');?></label>
                            <div class="col-sm-8">
                            <?php echo form_input(['class'=>'form-control','name'=>'lastname', 'value'=> assign_value('lastname', $customer['lastname'])]);?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="account_email"><?php echo lang('account_email');?></label>
                            <div class="col-sm-8">
                            <?php echo form_input(['class'=>'form-control','name'=>'email', 'value'=> assign_value('email', $customer['email'])]);?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="account_phone"><?php echo lang('account_phone');?></label>
                                <div class="col-sm-8">    
                                    <?php echo form_input(['class'=>'form-control','name'=>'phone', 'value'=> assign_value('phone', $customer['phone'])]);?>
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="checklist">
                                <input type="checkbox" name="email_subscribe" value="1" <?php if((bool)$customer['email_subscribe']) { ?> checked="checked" <?php } ?>/> <?php echo lang('account_newsletter_subscribe');?>
                            </label>

                            <div style="margin:30px 0px 10px; text-align:center;">
                                <strong><?php echo lang('account_password_instructions');?></strong>
                            </div>
                        </div>
                        <div class="form-group">                                
                                    <label for="account_password"><?php echo lang('account_password');?></label>
                                    <div class="col-sm-8"> 
                                    <?php echo form_password(['class'=>'form-control','name'=>'password']);?>
                                    </div>
                        </div>
                        <div class="form-group"> 
                                <label for="account_confirm"><?php echo lang('account_confirm');?></label>
                            <div class="col-sm-8">     
                                <?php echo form_password(['class'=>'form-control','name'=>'confirm']);?>
                            </div>
                        </div>

                            <input type="submit" value="<?php echo lang('form_submit');?>" class="btn btn-main" />
                        </form>    
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="panel panel-smart">
                    <div class="panel-heading">
                        <h3><?php echo lang('order_history');?></h3>
                    </div>
                    <div class="panel-body">
                                    <?php if($orders):
                            echo $orders_pagination;
                        ?>
                        <table class="table bordered zebra">
                            <thead>
                                <tr>
                                    <th><?php echo lang('order_date');?></th>
                                    <th><?php echo lang('order_number');?></th>
                                    <th><?php echo lang('order_status');?></th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php
                            foreach($orders as $order): ?>
                                <tr>
                                    <td>
                                        <?php $d = format_date($order->ordered_on); 

                                        $d = explode(' ', $d);
                                        echo $d[0].' '.$d[1].', '.$d[3];

                                        ?>
                                    </td>
                                    <td><a href="<?php echo site_url('order-complete/'.$order->order_number); ?>"><?php echo $order->order_number; ?></a></td>
                                    <td><?php echo $order->status;?></td>
                                </tr>

                            <?php endforeach;?>
                            </tbody>
                        </table>
                        <?php else: ?>
                            <div class="alert yellow"><i class="close"></i><?php echo lang('no_order_history');?></div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
$(document).ready(function(){
    loadAddresses();
});

function closeAddressForm()
{
    $.gumboTray.close();
    loadAddresses();
}

function loadAddresses()
{
    $('#addresses').spin();
    $('#addresses').load('/addresses');
}
</script>