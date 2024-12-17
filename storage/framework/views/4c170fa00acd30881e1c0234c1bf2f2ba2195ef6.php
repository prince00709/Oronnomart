<form class="form-horizontal" action="<?php echo e(route('payment_method.update')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="payment_method" value="payku">
    <div class="form-group row">
        <input type="hidden" name="types[]" value="PAYKU_BASE_URL">
        <div class="col-lg-4">
            <label class="col-from-label"><?php echo e(translate('PAYKU_BASE_URL')); ?></label>
        </div>
        <div class="col-lg-8">
            <input type="text" class="form-control" name="PAYKU_BASE_URL"
                value="<?php echo e(env('PAYKU_BASE_URL')); ?>"
                placeholder="<?php echo e(translate('PAYKU_BASE_URL')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="PAYKU_PUBLIC_TOKEN">
        <div class="col-lg-4">
            <label class="col-from-label"><?php echo e(translate('PAYKU_PUBLIC_TOKEN')); ?></label>
        </div>
        <div class="col-lg-8">
            <input type="text" class="form-control" name="PAYKU_PUBLIC_TOKEN"
                value="<?php echo e(env('PAYKU_PUBLIC_TOKEN')); ?>"
                placeholder="<?php echo e(translate('PAYKU_PUBLIC_TOKEN')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="PAYKU_PRIVATE_TOKEN">
        <div class="col-lg-4">
            <label class="col-from-label"><?php echo e(translate('PAYKU_PRIVATE_TOKEN')); ?></label>
        </div>
        <div class="col-lg-8">
            <input type="text" class="form-control" name="PAYKU_PRIVATE_TOKEN"
                value="<?php echo e(env('PAYKU_PRIVATE_TOKEN')); ?>"
                placeholder="<?php echo e(translate('PAYKU_PRIVATE_TOKEN')); ?>" required>
        </div>
    </div>

    <div class="form-group mb-0 text-right">
        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
    </div>
</form>
<?php /**PATH /home1/demo4axiz/public_html/Oronnomart/resources/views/backend/setup_configurations/payment_method/partials/payku.blade.php ENDPATH**/ ?>