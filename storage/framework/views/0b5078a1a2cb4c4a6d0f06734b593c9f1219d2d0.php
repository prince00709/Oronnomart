<form class="form-horizontal" action="<?php echo e(route('payment_method.update')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="payment_method" value="aamarpay">
    <div class="form-group row">
        <input type="hidden" name="types[]" value="AAMARPAY_STORE_ID">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('Aamarpay Store Id')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="AAMARPAY_STORE_ID"
                value="<?php echo e(env('AAMARPAY_STORE_ID')); ?>"
                placeholder="<?php echo e(translate('Aamarpay Store Id')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="AAMARPAY_SIGNATURE_KEY">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('Aamarpay signature key')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="AAMARPAY_SIGNATURE_KEY"
                value="<?php echo e(env('AAMARPAY_SIGNATURE_KEY')); ?>"
                placeholder="<?php echo e(translate('Aamarpay signature key')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('Aamarpay Sandbox Mode')); ?></label>
        </div>
        <div class="col-md-8">
            <label class="aiz-switch aiz-switch-success mb-0">
                <input value="1" name="aamarpay_sandbox" type="checkbox"
                    <?php if(get_setting('aamarpay_sandbox') == 1): ?> checked <?php endif; ?>>
                <span class="slider round"></span>
            </label>
        </div>
    </div>
    <div class="form-group mb-0 text-right">
        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
    </div>
</form>
<?php /**PATH /home1/demo4axiz/public_html/Oronnomart/resources/views/backend/setup_configurations/payment_method/partials/aamarpay.blade.php ENDPATH**/ ?>