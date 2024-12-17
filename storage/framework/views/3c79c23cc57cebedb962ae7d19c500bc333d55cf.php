<form class="form-horizontal" action="<?php echo e(route('payment_method.update')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="payment_method" value="sslcommerz">
    <div class="form-group row">
        <input type="hidden" name="types[]" value="SSLCZ_STORE_ID">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('Sslcz Store Id')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="SSLCZ_STORE_ID"
                value="<?php echo e(env('SSLCZ_STORE_ID')); ?>"
                placeholder="<?php echo e(translate('Sslcz Store Id')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="SSLCZ_STORE_PASSWD">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('Sslcz store password')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="SSLCZ_STORE_PASSWD"
                value="<?php echo e(env('SSLCZ_STORE_PASSWD')); ?>"
                placeholder="<?php echo e(translate('Sslcz store password')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('Sslcommerz Sandbox Mode')); ?></label>
        </div>
        <div class="col-md-8">
            <label class="aiz-switch aiz-switch-success mb-0">
                <input value="1" name="sslcommerz_sandbox" type="checkbox"
                    <?php if(get_setting('sslcommerz_sandbox') == 1): ?> checked <?php endif; ?>>
                <span class="slider round"></span>
            </label>
        </div>
    </div>
    <div class="form-group mb-0 text-right">
        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
    </div>
</form>
<?php /**PATH /home1/demo4axiz/public_html/Oronnomart/resources/views/backend/setup_configurations/payment_method/partials/sslcommerz.blade.php ENDPATH**/ ?>