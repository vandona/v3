<div id="addressFormWrapper">
    <div class="page-header">
        <?php if($addressCount > 0):?>
            <button class="btn btn-main pull-right input-xs" type="cancel" onclick="closeAddressForm();"><?php echo lang('form_cancel');?></button>
        <?php endif;?>
        <h3><?php echo lang('address_form');?></h3>
    </div>
    
    <div id="addressError" class="alert alert-danger hide" role="alert"></div>

    <?php echo form_open('addresses/form/'.$id, ['id'=>'addressForm', 'class'=>'form-horizontal']);?>
        <div class="form-group">            
            <label class="col-sm-2 control-label"><?php echo lang('address_company');?></label>
            <div class="col-sm-10">
                <?php echo form_input(['class'=>'form-control','name'=>'company', 'value'=> assign_value('company',$company)]);?>
            </div>
        </div>

        <div class="form-group">
                <label class="col-sm-2 control-label required"><?php echo lang('address_firstname');?></label>
            <div class="col-sm-10">    
                <?php echo form_input(['class'=>'form-control','name'=>'firstname', 'value'=> assign_value('firstname',$firstname)]);?>
            </div>
        </div>
        <div class="form-group">
                <label class="col-sm-2 required control-label"><?php echo lang('address_lastname');?></label>
            <div class="col-sm-10">
                <?php echo form_input(['class'=>'form-control','name'=>'lastname', 'value'=> assign_value('lastname',$lastname)]);?>
            </div>
        </div>
        
        <div class="form-group">
                <label class="col-sm-2 required control-label"><?php echo lang('address_email');?></label>
                <div class="col-sm-10">
                <?php echo form_input(['class'=>'form-control','name'=>'email', 'value'=>assign_value('email',$email)]);?>
            </div>
        </div>
        <div class="form-group">
                <label class="col-sm-2 required control-label"><?php echo lang('address_phone');?></label>
            <div class="col-sm-10">    
                <?php echo form_input(['class'=>'form-control','name'=>'phone', 'value'=> assign_value('phone',$phone)]);?>
            </div>
        </div>
        <div class="form-group">
                <label class="col-sm-2 required control-label"><?php echo lang('address');?></label>
                <div class="col-sm-5">
                <?php
                echo form_input(['class'=>'form-control','name'=>'address1', 'value'=>assign_value('address1',$address1)]);
                ?>
                </div>
            <div class="col-sm-5">    
                <?php    
                echo form_input(['class'=>'form-control','name'=>'address2', 'value'=> assign_value('address2',$address2)]);
                ?>
            </div>
        </div>
        <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo lang('address_country');?></label>
            <div class="col-sm-10">
                <?php echo form_dropdown('country_id', $countries_menu, assign_value('country_id', $country_id), 'id="country_id" class="form-control"');?>
            </div>
        </div>
        <div class="form-group">
                <label class="col-sm-2 required control-label"><?php echo lang('address_city');?></label>
            <div class="col-sm-10">    
                <?php echo form_input(['class'=>'form-control','name'=>'city', 'value'=>assign_value('city',$city)]);?>
            </div>
        </div>
        <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo lang('address_state');?></label>
            <div class="col-sm-10">    
                <?php echo form_dropdown('zone_id', $zones_menu, assign_value('zone_id', $zone_id), 'id="zone_id" class="form-control"');?>
            </div>
        </div>
        <div class="form-group">
                <label class="col-sm-2 required control-label"><?php echo lang('address_zip');?></label>
            <div class="col-sm-10">    
                <?php echo form_input(['class'=>'form-control','maxlength'=>'10', 'name'=>'zip', 'value'=> assign_value('zip',$zip)]);?>
            </div>
        </div>

        <button class="btn btn-main" type="submit"><?php echo lang('save_address');?></button>
    </form>

    <script>
    $(function(){
        $('#country_id').change(function(){
            $('#zone_id').load('<?php echo site_url('addresses/get-zone-options');?>/'+$('#country_id').val());
        });

        $('#addressForm').on('submit', function(event){
            $('.addressFormWrapper').spin();
            event.preventDefault();
            $.post($(this).attr('action'), $(this).serialize(), function(data){
                if(data == 1)
                {
                    closeAddressForm();
                }
                else
                {
                    $('#addressFormWrapper').html(data);
                }
            });
        })
    });

    <?php if(validation_errors()):
        $errors = \CI::form_validation()->get_error_array(); ?>

        var formErrors = <?php echo json_encode($errors);?>
        
        for (var key in formErrors) {
            if (formErrors.hasOwnProperty(key)) {
                $('[name="'+key+'"]').parent().append('<div class="form-error text-red">'+formErrors[key]+'</div>')
            }
        }
    <?php endif;?>
    </script>
</div>