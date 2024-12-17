<form class="form-horizontal" action="<?php echo e(route('payment_method.update')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="payment_method" value="paystack">
    <div class="form-group row">
        <input type="hidden" name="types[]" value="PAYSTACK_PUBLIC_KEY">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('PUBLIC KEY')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="PAYSTACK_PUBLIC_KEY"
                value="<?php echo e(env('PAYSTACK_PUBLIC_KEY')); ?>"
                placeholder="<?php echo e(translate('PUBLIC KEY')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="PAYSTACK_SECRET_KEY">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('SECRET KEY')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="PAYSTACK_SECRET_KEY"
                value="<?php echo e(env('PAYSTACK_SECRET_KEY')); ?>"
                placeholder="<?php echo e(translate('SECRET KEY')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="MERCHANT_EMAIL">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('MERCHANT EMAIL')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="MERCHANT_EMAIL"
                value="<?php echo e(env('MERCHANT_EMAIL')); ?>"
                placeholder="<?php echo e(translate('MERCHANT EMAIL')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="PAYSTACK_CURRENCY_CODE">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('PAYSTACK CURRENCY CODE')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="PAYSTACK_CURRENCY_CODE"
                value="<?php echo e(env('PAYSTACK_CURRENCY_CODE')); ?>"
                placeholder="<?php echo e(translate('PAYSTACK CURRENCY CODE')); ?>" required>
        </div>
    </div>
    <div class="form-group mb-0 text-right">
        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
    </div>
</form>
<?php /**PATH /home1/demo4axiz/public_html/Oronnomart/resources/views/backend/setup_configurations/payment_method/partials/paystack.blade.php ENDPATH**/ ?>