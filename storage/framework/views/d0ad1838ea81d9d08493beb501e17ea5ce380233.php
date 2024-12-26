<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<?php if(Auth::check()): ?>
    <?php $__currentLoopData = Auth::user()->addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="border mb-4">
            <div class="row">
                <div class="col-md-8">
                    <label class="aiz-megabox d-block bg-white mb-0">
                        <input type="radio" name="address_id" value="<?php echo e($address->id); ?>" <?php if($address->id == $address_id): ?>
                            checked
                        <?php endif; ?> required>
                        <span class="d-flex p-3 aiz-megabox-elem border-0">
                            <!-- Checkbox -->
                            <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                            <!-- Address -->
                            <span class="flex-grow-1 pl-3 text-left">
                                <div class="row">
                                    <span class="fs-14 text-secondary col-md-3 col-5"><?php echo e(translate('Address')); ?></span>
                                    <span class="fs-14 text-dark fw-500 ml-2 col"><?php echo e($address->address); ?></span>
                                </div>
                                <div class="row">
                                    <span class="fs-14 text-secondary col-md-3 col-5"><?php echo e(translate('Postal Code')); ?></span>
                                    <span class="fs-14 text-dark fw-500 ml-2 col"><?php echo e($address->postal_code); ?></span>
                                </div>
                                <div class="row">
                                    <span class="fs-14 text-secondary col-md-3 col-5"><?php echo e(translate('City')); ?></span>
                                    <span class="fs-14 text-dark fw-500 ml-2 col"><?php echo e(optional($address->city)->name); ?></span>
                                </div>
                                <div class="row">
                                    <span class="fs-14 text-secondary col-md-3 col-5"><?php echo e(translate('State')); ?></span>
                                    <span class="fs-14 text-dark fw-500 ml-2 col"><?php echo e(optional($address->state)->name); ?></span>
                                </div>
                                <div class="row">
                                    <span class="fs-14 text-secondary col-md-3 col-5"><?php echo e(translate('Country')); ?></span>
                                    <span class="fs-14 text-dark fw-500 ml-2 col"><?php echo e(optional($address->country)->name); ?></span>
                                </div>
                                <div class="row">
                                    <span class="fs-14 text-secondary col-md-3 col-5"><?php echo e(translate('Phone')); ?></span>
                                    <span class="fs-14 text-dark fw-500 ml-2 col"><?php echo e($address->phone); ?></span>
                                </div>
                            </span>
                        </span>
                    </label>
                </div>
                <!-- Edit Address Button -->
                <div class="col-md-4 p-3 text-right">
                    <a class="btn btn-sm btn-secondary-base text-white mr-4 rounded-0 px-4" onclick="edit_address('<?php echo e($address->id); ?>')"><?php echo e(translate('Change')); ?></a>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <input type="hidden" name="checkout_type" value="logged">
    <!-- Add New Address -->
    <div class="border p-3 c-pointer text-center bg-light has-transition hov-bg-soft-light h-100 d-flex flex-column justify-content-center" onclick="add_new_address()">
        <i class="las la-plus mb-1 fs-20 text-gray"></i>
        <div class="alpha-7 fw-700"><?php echo e(translate('Add New Address')); ?></div>
    </div>
<?php else: ?>
    <!-- Guest Shipping a address -->
    <?php echo $__env->make('frontend.partials.cart.guest_shipping_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH D:\xampp8.2.12\htdocs\Oronnomart\resources\views/frontend/partials/cart/shipping_info.blade.php ENDPATH**/ ?>