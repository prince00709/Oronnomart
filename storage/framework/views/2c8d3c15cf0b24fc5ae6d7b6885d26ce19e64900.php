<form class="form-horizontal" action="<?php echo e(route('payment_method.update')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="payment_method" value="bkash">
    <div class="form-group row">
        <input type="hidden" name="types[]" value="BKASH_CHECKOUT_APP_KEY">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('BKASH CHECKOUT APP KEY')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="BKASH_CHECKOUT_APP_KEY"
                value="<?php echo e(env('BKASH_CHECKOUT_APP_KEY')); ?>"
                placeholder="<?php echo e(translate('BKASH CHECKOUT APP KEY')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="BKASH_CHECKOUT_APP_SECRET">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('BKASH CHECKOUT APP SECRET')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="BKASH_CHECKOUT_APP_SECRET"
                value="<?php echo e(env('BKASH_CHECKOUT_APP_SECRET')); ?>"
                placeholder="<?php echo e(translate('BKASH CHECKOUT APP SECRET')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="BKASH_CHECKOUT_USER_NAME">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('BKASH CHECKOUT USER NAME')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="BKASH_CHECKOUT_USER_NAME"
                value="<?php echo e(env('BKASH_CHECKOUT_USER_NAME')); ?>"
                placeholder="<?php echo e(translate('BKASH CHECKOUT USER NAME')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="BKASH_CHECKOUT_PASSWORD">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('BKASH CHECKOUT PASSWORD')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="BKASH_CHECKOUT_PASSWORD"
                value="<?php echo e(env('BKASH_CHECKOUT_PASSWORD')); ?>"
                placeholder="<?php echo e(translate('BKASH CHECKOUT PASSWORD')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('Bkash Sandbox Mode')); ?></label>
        </div>
        <div class="col-md-8">
            <label class="aiz-switch aiz-switch-success mb-0">
                <input value="1" name="bkash_sandbox" type="checkbox"
                    <?php if(get_setting('bkash_sandbox') == 1): ?> checked <?php endif; ?>>
                <span class="slider round"></span>
            </label>
        </div>
    </div>
    <div class="form-group mb-0 text-right">
        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
    </div>
</form>
<?php /**PATH /home1/demo4axiz/public_html/Oronnomart/resources/views/backend/setup_configurations/payment_method/partials/bkash.blade.php ENDPATH**/ ?>