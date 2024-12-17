<form class="form-horizontal" action="<?php echo e(route('payment_method.update')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="payment_method" value="mercadopago">
    <div class="form-group row">
        <input type="hidden" name="types[]" value="MERCADOPAGO_KEY">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('Mercadopago Key')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="MERCADOPAGO_KEY"
                value="<?php echo e(env('MERCADOPAGO_KEY')); ?>"
                placeholder="<?php echo e(translate('Mercadopago Key')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="MERCADOPAGO_ACCESS">
        <div class="col-md-4">
            <label class="col-from-label"><?php echo e(translate('Mercadopago Access')); ?></label>
        </div>
        <div class="col-md-8">
            <input type="text" class="form-control" name="MERCADOPAGO_ACCESS"
                value="<?php echo e(env('MERCADOPAGO_ACCESS')); ?>"
                placeholder="<?php echo e(translate('Mercadopago Access')); ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <input type="hidden" name="types[]" value="MERCADOPAGO_CURRENCY">
        <div class="col-lg-4">
            <label class="col-from-label"><?php echo e(translate('MERCADOPAGO CURRENCY')); ?></label>
        </div>
        <div class="col-lg-8">
            <input type="text" class="form-control" name="MERCADOPAGO_CURRENCY"
                value="<?php echo e(env('MERCADOPAGO_CURRENCY')); ?>"
                placeholder="<?php echo e(translate('MERCADOPAGO CURRENCY')); ?>" required>
            <br>
            <div class="alert alert-primary" role="alert">
                Currency must be <b>es-AR</b> or <b>es-CL</b> or <b>es-CO</b> or <b>es-MX</b> or
                <b>es-VE</b> or <b>es-UY</b> or <b>es-PE</b> or <b>pt-BR</b><br>
                If kept empty, <b>en-US</b> will be used automatically
            </div>
        </div>
    </div>

    <div class="form-group mb-0 text-right">
        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
    </div>
</form>
<?php /**PATH /home1/demo4axiz/public_html/Oronnomart/resources/views/backend/setup_configurations/payment_method/partials/mercadopago.blade.php ENDPATH**/ ?>