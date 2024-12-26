<?php $__env->startSection('content'); ?>
    <div class="aiz-titlebar text-left mt-2 mb-3">
    	<div class="row align-items-center">
    		<div class="col-md-12">
    			<h1 class="h3"><?php echo e(translate('All cities')); ?></h1>
    		</div>
    	</div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <form class="" id="sort_cities" action="" method="GET">
                    <div class="card-header row gutters-5">
                        <div class="col text-center text-md-left">
                            <h5 class="mb-md-0 h6"><?php echo e(translate('Cities')); ?></h5>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="sort_city" name="sort_city" <?php if(isset($sort_city)): ?> value="<?php echo e($sort_city); ?>" <?php endif; ?> placeholder="<?php echo e(translate('Type city name & Enter')); ?>">
                        </div>
                        <div class="col-md-4">
                            <select class="form-control aiz-selectpicker" data-live-search="true" id="sort_state" name="sort_state">
                                <option value=""><?php echo e(translate('Select State')); ?></option>
                                <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($state->id); ?>" <?php if($sort_state == $state->id): ?> selected <?php endif; ?> <?php echo e($sort_state); ?>>
                                        <?php echo e($state->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-primary" type="submit"><?php echo e(translate('Filter')); ?></button>
                        </div>
                    </div>
                </form>
                <div class="card-body">
                    <table class="table aiz-table mb-0">
                        <thead>
                            <tr>
                                <th data-breakpoints="lg">#</th>
                                <th><?php echo e(translate('Name')); ?></th>
                                <th><?php echo e(translate('State')); ?></th>
                                <th><?php echo e(translate('Area Wise Shipping Cost')); ?></th>
                                <th><?php echo e(translate('Show/Hide')); ?></th>
                                <th data-breakpoints="lg" class="text-right"><?php echo e(translate('Options')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(($key+1) + ($cities->currentPage() - 1) * $cities->perPage()); ?></td>
                                    <td><?php echo e($city->getTranslation('name')); ?></td>
                                    <td><?php echo e($city->state->name); ?></td>
                                    <td><?php echo e(single_price($city->cost)); ?></td>
                                    <td>
                                        <label class="aiz-switch aiz-switch-success mb-0">
                                          <input onchange="update_status(this)" value="<?php echo e($city->id); ?>" type="checkbox" <?php if($city->status == 1) echo "checked";?> >
                                          <span class="slider round"></span>
                                        </label>
                                      </td>
                                    <td class="text-right">
                                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="<?php echo e(route('cities.edit', ['id'=>$city->id, 'lang'=>env('DEFAULT_LANGUAGE')])); ?>" title="<?php echo e(translate('Edit')); ?>">
                                            <i class="las la-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="<?php echo e(route('cities.destroy', $city->id)); ?>" title="<?php echo e(translate('Delete')); ?>">
                                            <i class="las la-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="aiz-pagination">
                        <?php echo e($cities->appends(request()->input())->links()); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
    		<div class="card">
    			<div class="card-header">
    				<h5 class="mb-0 h6"><?php echo e(translate('Add New city')); ?></h5>
    			</div>
    			<div class="card-body">
    				<form action="<?php echo e(route('cities.store')); ?>" method="POST">
    					<?php echo csrf_field(); ?>
    					<div class="form-group mb-3">
    						<label for="name"><?php echo e(translate('Name')); ?></label>
    						<input type="text" placeholder="<?php echo e(translate('Name')); ?>" name="name" class="form-control" required>
    					</div>

                        <div class="form-group">
                            <label for="country"><?php echo e(translate('State')); ?></label>
                            <select class="select2 form-control aiz-selectpicker" name="state_id" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true" required>
                                <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group mb-3">
    						<label for="name"><?php echo e(translate('Cost')); ?></label>
    						<input type="number" min="0" step="0.01" placeholder="<?php echo e(translate('Cost')); ?>" name="cost" class="form-control" required>
    					</div>
    					<div class="form-group mb-3 text-right">
    						<button type="submit" class="btn btn-primary"><?php echo e(translate('Save')); ?></button>
    					</div>
    				</form>
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
        function sort_cities(el){
            $('#sort_cities').submit();
        }

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
            $.post('<?php echo e(route('cities.status')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '<?php echo e(translate('Country status updated successfully')); ?>');
                }
                else{
                    AIZ.plugins.notify('danger', '<?php echo e(translate('Something went wrong')); ?>');
                }
            });
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp8.2.12\htdocs\Oronnomart\resources\views/backend/setup_configurations/cities/index.blade.php ENDPATH**/ ?>