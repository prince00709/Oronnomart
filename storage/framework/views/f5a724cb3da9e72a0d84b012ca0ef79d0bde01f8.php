<form class="form-horizontal" action="<?php echo e(route('payment_method.update')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="payment_method" value="ngenius">
    <div class="form-group row">
        <input type="hidden" name="types[]" value="NGENIUS_OUTLET_ID">
        <div class="col-lg-4">
            <label class="col-from-label"><?php echo e(translate('NGENIUS OUTLET ID')); ?></label>
        </div>
        <div class="col-lg-8">
            <input type="text" class="form-control" name="NGENIUS_OUTLET_ID"
                value="<?php echo e(env('NGENIUS_OUTLET_ID')); ?>"
                placeholder="<?php echo e(translate('NGENIUS OUTLET ID')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="NGENIUS_API_KEY">
        <div class="col-lg-4">
            <label class="col-from-label"><?php echo e(translate('NGENIUS API KEY')); ?></label>
        </div>
        <div class="col-lg-8">
            <input type="text" class="form-control" name="NGENIUS_API_KEY"
                value="<?php echo e(env('NGENIUS_API_KEY')); ?>"
                placeholder="<?php echo e(translate('NGENIUS API KEY')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="NGENIUS_CURRENCY">
        <div class="col-lg-4">
            <label class="col-from-label"><?php echo e(translate('NGENIUS CURRENCY')); ?></label>
        </div>
        <div class="col-lg-8">
            <input type="text" class="form-control" name="NGENIUS_CURRENCY"
                value="<?php echo e(env('NGENIUS_CURRENCY')); ?>"
                placeholder="<?php echo e(translate('NGENIUS CURRENCY')); ?>" required>
            <br>
            <div class="alert alert-primary" role="alert">
                Currency must be <b>AED</b> or <b>USD</b> or <b>EUR</b><br>
                If kept empty, <b>AED</b> will be used automatically
            </div>
        </div>
    </div>
    <div class="form-group mb-0 text-right">
        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
    </div>
</form>
<?php /**PATH /home1/demo4axiz/public_html/Oronnomart/resources/views/backend/setup_configurations/payment_method/partials/ngenius.blade.php ENDPATH**/ ?>