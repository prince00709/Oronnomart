    

    <?php $__env->startSection('content'); ?>
        <div class="row">
            <?php $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <img class="mr-3" src="<?php echo e(static_asset('assets/img/cards/'.$payment_method->name.'.png')); ?>" height="30">
                            <h5 class="mb-0 h6"><?php echo e(ucfirst(translate($payment_method->name))); ?></h5>
                        </div>
                        <label class="aiz-switch aiz-switch-success mb-0 float-right">
                            <input type="checkbox" onchange="updatePaymentSettings(this, <?php echo e($payment_method->id); ?>)" <?php if($payment_method->active == 1): ?> checked <?php endif; ?>>
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="card-body">
                        <?php echo $__env->make('backend.setup_configurations.payment_method.partials.'.$payment_method->name, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <img class="mr-3" src="<?php echo e(static_asset('assets/img/cards/cod.png')); ?>" height="30">
                            <h5 class="mb-0 h6"><?php echo e(translate('Cash Payment')); ?></h5>
                        </div>
                        <label class="aiz-switch aiz-switch-success mb-0 float-right">
                            <input type="checkbox" onchange="updateSettings(this, 'cash_payment')" <?php if(get_setting('cash_payment') == 1): ?> checked <?php endif; ?>>
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <?php
            // $demo_mode = env('DEMO_MODE') == 'On' ? true : false;
        ?>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('script'); ?>
        <script type="text/javascript">
            function updatePaymentSettings(el, id) {

                if('<?php echo e(env('DEMO_MODE')); ?>' == 'On'){
                    AIZ.plugins.notify('info', '<?php echo e(translate('Data can not change in demo mode.')); ?>');
                    return;
                }

                if ($(el).is(':checked')) {
                    var value = 1;
                } else {
                    var value = 0;
                }

                $.post('<?php echo e(route('payment.activation')); ?>', {
                    _token: '<?php echo e(csrf_token()); ?>',
                    id: id,
                    value: value
                }, function(data) {
                    if (data == 1) {
                        AIZ.plugins.notify('success', '<?php echo e(translate('Payment Settings updated successfully')); ?>');
                    } else {
                        AIZ.plugins.notify('danger', 'Something went wrong');
                    }
                });
            }

            function updateSettings(el, type) {

                if('<?php echo e(env('DEMO_MODE')); ?>' == 'On'){
                    AIZ.plugins.notify('info', '<?php echo e(translate('Data can not change in demo mode.')); ?>');
                    return;
                }

                if ($(el).is(':checked')) {
                    var value = 1;
                } else {
                    var value = 0;
                }

                $.post('<?php echo e(route('business_settings.update.activation')); ?>', {
                    _token: '<?php echo e(csrf_token()); ?>',
                    type: type,
                    value: value
                }, function(data) {
                    if (data == 1) {
                        AIZ.plugins.notify('success', '<?php echo e(translate('Settings updated successfully')); ?>');
                    } else {
                        AIZ.plugins.notify('danger', 'Something went wrong');
                    }
                });
            }
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/demo4axiz/public_html/Oronnomart/resources/views/backend/setup_configurations/payment_method/index.blade.php ENDPATH**/ ?>