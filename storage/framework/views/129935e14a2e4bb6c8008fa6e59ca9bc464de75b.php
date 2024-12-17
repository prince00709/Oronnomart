<form class="form-horizontal" action="<?php echo e(route('payment_method.update')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="payment_method" value="paypal">
    <div class="form-group row">
        <input type="hidden" name="types[]" value="PAYPAL_CLIENT_ID">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('Paypal Client Id')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="PAYPAL_CLIENT_ID"
                value="<?php echo e(env('PAYPAL_CLIENT_ID')); ?>"
                placeholder="<?php echo e(translate('Paypal Client ID')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="PAYPAL_CLIENT_SECRET">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('Paypal Client Secret')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="PAYPAL_CLIENT_SECRET"
                value="<?php echo e(env('PAYPAL_CLIENT_SECRET')); ?>"
                placeholder="<?php echo e(translate('Paypal Client Secret')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('Paypal Sandbox Mode')); ?></label>
        </div>
        <div class="col-md-8">
            <label class="aiz-switch aiz-switch-success mb-0">
                <input value="1" name="paypal_sandbox" type="checkbox"
                    <?php if(get_setting('paypal_sandbox') == 1): ?> checked <?php endif; ?>>
                <span class="slider round"></span>
            </label>
        </div>
    </div>
    <div class="form-group mb-0 text-right">
        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
    </div>
</form>
<?php /**PATH /home1/demo4axiz/public_html/Oronnomart/resources/views/backend/setup_configurations/payment_method/partials/paypal.blade.php ENDPATH**/ ?>