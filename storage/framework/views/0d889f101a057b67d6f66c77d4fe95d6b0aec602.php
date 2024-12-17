<form class="form-horizontal" action="<?php echo e(route('payment_method.update')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="payment_method" value="payhere">
    <div class="form-group row">
        <input type="hidden" name="types[]" value="PAYHERE_MERCHANT_ID">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('PAYHERE MERCHANT ID')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="PAYHERE_MERCHANT_ID"
                value="<?php echo e(env('PAYHERE_MERCHANT_ID')); ?>"
                placeholder="<?php echo e(translate('PAYHERE MERCHANT ID')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="PAYHERE_SECRET">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('PAYHERE SECRET')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="PAYHERE_SECRET"
                value="<?php echo e(env('PAYHERE_SECRET')); ?>"
                placeholder="<?php echo e(translate('PAYHERE SECRET')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="PAYHERE_CURRENCY">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('PAYHERE CURRENCY')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="PAYHERE_CURRENCY"
                value="<?php echo e(env('PAYHERE_CURRENCY')); ?>"
                placeholder="<?php echo e(translate('PAYHERE CURRENCY')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('Payhere Sandbox Mode')); ?></label>
        </div>
        <div class="col-md-8">
            <label class="aiz-switch aiz-switch-success mb-0">
                <input value="1" name="payhere_sandbox" type="checkbox"
                    <?php if(get_setting('payhere_sandbox') == 1): ?> checked <?php endif; ?>>
                <span class="slider round"></span>
            </label>
        </div>
    </div>
    <div class="form-group mb-0 text-right">
        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
    </div>
</form>
<?php /**PATH /home1/demo4axiz/public_html/Oronnomart/resources/views/backend/setup_configurations/payment_method/partials/payhere.blade.php ENDPATH**/ ?>