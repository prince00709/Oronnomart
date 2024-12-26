<?php $__env->startSection('content'); ?>

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6"><?php echo e(translate('State Information')); ?></h5>
</div>

<div class="row">
  <div class="col-lg-6 mx-auto">
      <div class="card">
            <div class="card-header">
    			<h5 class="mb-0 h6"><?php echo e(translate('Edit State')); ?></h5>
    	    </div>
            <div class="card-body p-0">
                <form class="p-4" action="<?php echo e(route('states.update', $state->id)); ?>" method="POST" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PATCH">
                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-3">
                        <label for="name"><?php echo e(translate('Name')); ?></label>
                        <input type="text" placeholder="<?php echo e(translate('Name')); ?>" value="<?php echo e($state->name); ?>" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="state_id"><?php echo e(translate('Country')); ?></label>
                        <select class="select2 form-control aiz-selectpicker" name="country_id" data-selected="<?php echo e($state->country_id); ?>" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true">
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($country->id); ?>">
                                    <?php echo e($country->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group mb-3 text-right">
                        <button type="submit" class="btn btn-primary">
                            <?php echo e(translate('Update')); ?>

                            </button>
                    </div>
                </form>
            </div>
      </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp8.2.12\htdocs\Oronnomart\resources\views/backend/setup_configurations/states/edit.blade.php ENDPATH**/ ?>