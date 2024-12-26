<?php $__env->startSection('content'); ?>
    <div class="aiz-titlebar text-left mt-2 mb-3">
    	<div class="row align-items-center">
    		<div class="col-md-12">
    			<h1 class="h3"><?php echo e(translate('All States')); ?></h1>
    		</div>
    	</div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <form class="" id="sort_cities" action="" method="GET">
                    <div class="card-header row gutters-5">
                        <div class="col text-center text-md-left">
                            <h5 class="mb-md-0 h6"><?php echo e(translate('States')); ?></h5>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="sort_state" name="sort_state" <?php if(isset($sort_state)): ?> value="<?php echo e($sort_state); ?>" <?php endif; ?> placeholder="<?php echo e(translate('Type state name')); ?>">
                        </div>
                        <div class="col-md-3">
                            <select class="form-control aiz-selectpicker" data-live-search="true" id="sort_country" name="sort_country">
                                <option value=""><?php echo e(translate('Select Country')); ?></option>
                                <?php $__currentLoopData = \App\Models\Country::where('status', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->id); ?>" <?php if($sort_country == $country->id): ?> selected <?php endif; ?> <?php echo e($sort_country); ?>>
                                        <?php echo e($country->name); ?>

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
                                <th width="10%">#</th>
                                <th><?php echo e(translate('Name')); ?></th>
                                <th><?php echo e(translate('Country')); ?></th>
                                <th><?php echo e(translate('Show/Hide')); ?></th>
                                <th class="text-right"><?php echo e(translate('Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(($key+1) + ($states->currentPage() - 1)*$states->perPage()); ?></td>
                                    <td><?php echo e($state->name); ?></td>
                                    <td><?php echo e($state->country->name); ?></td>
                                    <td>
                                        <label class="aiz-switch aiz-switch-success mb-0">
                                            <input onchange="update_status(this)" value="<?php echo e($state->id); ?>" type="checkbox" <?php if($state->status == 1) echo "checked";?> >
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td class="text-right">
                                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="<?php echo e(route('states.edit', $state->id)); ?>" title="<?php echo e(translate('Edit')); ?>">
                                            <i class="las la-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="aiz-pagination">
                        <?php echo e($states->appends(request()->input())->links()); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
    		<div class="card">
    			<div class="card-header">
    				<h5 class="mb-0 h6"><?php echo e(translate('Add New State')); ?></h5>
    			</div>
    			<div class="card-body">
    				<form action="<?php echo e(route('states.store')); ?>" method="POST">
    					<?php echo csrf_field(); ?>
    					<div class="form-group mb-3">
    						<label for="name"><?php echo e(translate('Name')); ?></label>
    						<input type="text" placeholder="<?php echo e(translate('Name')); ?>" name="name" class="form-control" required>
    					</div>

                        <div class="form-group">
                            <label for="country"><?php echo e(translate('Country')); ?></label>
                            <select class="select2 form-control aiz-selectpicker" name="country_id" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true">
                                <?php $__currentLoopData = \App\Models\Country::where('status', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->id); ?>">
                                        <?php echo e($country->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
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
            $.post('<?php echo e(route('states.status')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
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

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp8.2.12\htdocs\Oronnomart\resources\views/backend/setup_configurations/states/index.blade.php ENDPATH**/ ?>