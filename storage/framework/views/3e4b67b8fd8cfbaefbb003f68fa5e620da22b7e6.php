<form class="form-horizontal" action="<?php echo e(route('payment_method.update')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="payment_method" value="instamojo">
    <div class="form-group row">
        <input type="hidden" name="types[]" value="IM_API_KEY">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('API KEY')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="IM_API_KEY"
                value="<?php echo e(env('IM_API_KEY')); ?>" placeholder="<?php echo e(translate('IM API KEY')); ?>"
                required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="IM_AUTH_TOKEN">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('AUTH TOKEN')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="IM_AUTH_TOKEN"
                value="<?php echo e(env('IM_AUTH_TOKEN')); ?>"
                placeholder="<?php echo e(translate('IM AUTH TOKEN')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('Instamojo Sandbox Mode')); ?></label>
        </div>
        <div class="col-md-8">
            <label class="aiz-switch aiz-switch-success mb-0">
                <input value="1" name="instamojo_sandbox" type="checkbox"
                    <?php if(get_setting('instamojo_sandbox') == 1): ?> checked <?php endif; ?>>
                <span class="slider round"></span>
            </label>
        </div>
    </div>
    <div class="form-group mb-0 text-right">
        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
    </div>
</form>
<?php /**PATH /home1/demo4axiz/public_html/Oronnomart/resources/views/backend/setup_configurations/payment_method/partials/instamojo.blade.php ENDPATH**/ ?>