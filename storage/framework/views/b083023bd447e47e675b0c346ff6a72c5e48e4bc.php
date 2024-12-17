<form class="form-horizontal" action="<?php echo e(route('payment_method.update')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="payment_method" value="nagad">
    <div class="form-group row">
        <input type="hidden" name="types[]" value="NAGAD_MODE">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('NAGAD MODE')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="NAGAD_MODE"
                value="<?php echo e(env('NAGAD_MODE')); ?>" placeholder="<?php echo e(translate('NAGAD MODE')); ?>"
                required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="NAGAD_MERCHANT_ID">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('NAGAD MERCHANT ID')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="NAGAD_MERCHANT_ID"
                value="<?php echo e(env('NAGAD_MERCHANT_ID')); ?>"
                placeholder="<?php echo e(translate('NAGAD MERCHANT ID')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="NAGAD_MERCHANT_NUMBER">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('NAGAD MERCHANT NUMBER')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="NAGAD_MERCHANT_NUMBER"
                value="<?php echo e(env('NAGAD_MERCHANT_NUMBER')); ?>"
                placeholder="<?php echo e(translate('NAGAD MERCHANT NUMBER')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="NAGAD_PG_PUBLIC_KEY">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('NAGAD PG PUBLIC KEY')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="NAGAD_PG_PUBLIC_KEY"
                value="<?php echo e(env('NAGAD_PG_PUBLIC_KEY')); ?>"
                placeholder="<?php echo e(translate('NAGAD PG PUBLIC KEY')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="NAGAD_MERCHANT_PRIVATE_KEY">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('NAGAD MERCHANT PRIVATE KEY')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="NAGAD_MERCHANT_PRIVATE_KEY"
                value="<?php echo e(env('NAGAD_MERCHANT_PRIVATE_KEY')); ?>"
                placeholder="<?php echo e(translate('NAGAD MERCHANT PRIVATE KEY')); ?>" required>
        </div>
    </div>
    <div class="form-group mb-0 text-right">
        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
    </div>
</form>
<?php /**PATH /home1/demo4axiz/public_html/Oronnomart/resources/views/backend/setup_configurations/payment_method/partials/nagad.blade.php ENDPATH**/ ?>