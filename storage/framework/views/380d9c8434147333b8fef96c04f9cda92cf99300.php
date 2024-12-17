<form class="form-horizontal" action="<?php echo e(route('payment_method.update')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="payment_method" value="razorpay">
    <div class="form-group row">
        <input type="hidden" name="types[]" value="RAZOR_KEY">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('RAZOR KEY')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="RAZOR_KEY"
                value="<?php echo e(env('RAZOR_KEY')); ?>" placeholder="<?php echo e(translate('RAZOR KEY')); ?>"
                required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="RAZOR_SECRET">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('RAZOR SECRET')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="RAZOR_SECRET"
                value="<?php echo e(env('RAZOR_SECRET')); ?>"
                placeholder="<?php echo e(translate('RAZOR SECRET')); ?>" required>
        </div>
    </div>
    <div class="form-group mb-0 text-right">
        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
    </div>
</form>
<?php /**PATH /home1/demo4axiz/public_html/Oronnomart/resources/views/backend/setup_configurations/payment_method/partials/razorpay.blade.php ENDPATH**/ ?>