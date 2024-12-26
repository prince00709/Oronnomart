<?php $__env->startSection('content'); ?>
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="h3"><?php echo e(translate('All Carriers')); ?></h1>
            </div>
            <div class="col-md-6 text-md-right">
                <a href="<?php echo e(route('carriers.create')); ?>" class="btn btn-circle btn-info">
                    <span><?php echo e(translate('Add New Carrier')); ?></span>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header row gutters-5">
                    <div class="col text-center text-md-left">
                        <h5 class="mb-md-0 h6"><?php echo e(translate('Carriers')); ?></h5>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table aiz-table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo e(translate('Logo')); ?></th>
                                <th><?php echo e(translate('Name')); ?></th>
                                <th><?php echo e(translate('Transit Time')); ?></th>
                                <th><?php echo e(translate('Status')); ?></th>
                                <th style="text-align: right;"><?php echo e(translate('Options')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $carriers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $carrier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php echo e($carriers->firstItem() + $key); ?>

                                    </td>
                                    <td>
                                        <img src="<?php echo e(uploaded_asset($carrier->logo)); ?>" alt="<?php echo e(translate('Carrier')); ?>" class="h-50px">
                                    </td>
                                    <td><?php echo e($carrier->name); ?></td>
                                    <td><?php echo e($carrier->transit_time); ?></td>
                                    <td>
                                        <label class="aiz-switch aiz-switch-success mb-0">
                                            <input onchange="update_status(this)" value="<?php echo e($carrier->id); ?>" type="checkbox" <?php if($carrier->status == 1) echo "checked";?> >
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td style="text-align: right;">
                                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="<?php echo e(route('carriers.edit', $carrier->id)); ?>" title="<?php echo e(translate('Edit')); ?>">
                                            <i class="las la-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="<?php echo e(route('carriers.destroy', $carrier->id)); ?>" title="<?php echo e(translate('Delete')); ?>">
                                            <i class="las la-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="aiz-pagination">
                        <?php echo e($carriers->appends(request()->input())->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">

        function update_status(el){

            if('<?php echo e(env('DEMO_MODE')); ?>' == 'On'){
                AIZ.plugins.notify('info', '<?php echo e(translate('Data can not change in demo mode.')); ?>');
                return;
            }

            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('carriers.update_status')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '<?php echo e(translate('Carrier Status updated successfully')); ?>');
                }
                else{
                    AIZ.plugins.notify('danger', '<?php echo e(translate('Carrier Status went wrong')); ?>');
                }
            });
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp8.2.12\htdocs\Oronnomart\resources\views/backend/setup_configurations/carriers/index.blade.php ENDPATH**/ ?>