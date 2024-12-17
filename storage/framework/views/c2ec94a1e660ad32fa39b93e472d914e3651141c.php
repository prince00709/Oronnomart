<form class="form-horizontal" action="<?php echo e(route('payment_method.update')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="payment_method" value="paymob">
    <div class="form-group row">
        <input type="hidden" name="types[]" value="PAYMOB_API_KEY">
        <div class="col-lg-4">
            <label class="col-from-label"><?php echo e(translate('Paymob API Key')); ?></label>
        </div>
        <div class="col-lg-8">
            <input type="text" class="form-control" name="PAYMOB_API_KEY"
                value="<?php echo e(env('PAYMOB_API_KEY')); ?>"
                placeholder="<?php echo e(translate('Paymob API Key')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="PAYMOB_IFRAME_ID">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('Paymob Iframe ID')); ?></label>
        </div>
        <div class="col-lg-8">
            <input type="text" class="form-control" name="PAYMOB_IFRAME_ID"
                value="<?php echo e(env('PAYMOB_IFRAME_ID')); ?>"
                placeholder="<?php echo e(translate('Paymob Iframe ID')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="PAYMOB_INTEGRATION_ID">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('Paymob Integration ID')); ?></label>
        </div>
        <div class="col-lg-8">
            <input type="text" class="form-control" name="PAYMOB_INTEGRATION_ID"
                value="<?php echo e(env('PAYMOB_INTEGRATION_ID')); ?>"
                placeholder="<?php echo e(translate('Paymob Integration ID')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="PAYMOB_HMAC">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('Paymob HMAC')); ?></label>
        </div>
        <div class="col-lg-8">
            <input type="text" class="form-control" name="PAYMOB_HMAC"
                value="<?php echo e(env('PAYMOB_HMAC')); ?>"
                placeholder="<?php echo e(translate('Paymob HMAC')); ?>" required>
        </div>
    </div>
    <div class="form-group mb-0 text-right">
        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
    </div>
</form>
<?php /**PATH /home1/demo4axiz/public_html/Oronnomart/resources/views/backend/setup_configurations/payment_method/partials/paymob.blade.php ENDPATH**/ ?>