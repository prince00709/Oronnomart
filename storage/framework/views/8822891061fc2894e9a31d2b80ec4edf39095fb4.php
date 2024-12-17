<?php $__env->startSection('content'); ?>
    <div class="aiz-titlebar text-left mt-2 mb-3">
        <h5 class="mb-0 h6"><?php echo e(translate('Edit Dynamic Popup')); ?></h5>
    </div>
    <div class="">
        <!-- Error Meassages -->
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form class="form form-horizontal mar-top" action="<?php echo e(route('dynamic-popups.update', $dynamic_popup->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <!-- Custom Dynamic Popup Information -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6"><?php echo e(translate('Custom Dynamic Popup Information')); ?></h5>
                </div>
                <div class="card-body">
                    <div class="row gutters-16">
                        <div class="col-lg-8">
                            <!-- Title -->
                            <div class="form-group row">
                                <label class="col-md-4 col-from-label fw-700">
                                    <?php echo e(translate('Title')); ?> <span class="text-danger">*</span><br>
                                    <span class="fs-12 text-secondary fw-400"><?php echo e(translate('(Best within 50 character)')); ?></span>
                                </label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="title" placeholder="<?php echo e(translate('Type your text here')); ?>" value="<?php echo e($dynamic_popup->title); ?>" required>
                                </div>
                            </div>
                            <!-- Summary -->
                            <div class="form-group row">
                                <label class="col-md-4 col-from-label fw-700">
                                    <?php echo e(translate('Summary')); ?> <span class="text-danger">*</span><br>
                                    <span class="fs-12 text-secondary fw-400"><?php echo e(translate('(Best within 200 character)')); ?></span>
                                </label>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="summary" rows="2" placeholder="<?php echo e(translate('Type your text here')); ?>" required><?php echo e($dynamic_popup->summary); ?></textarea>
                                </div>
                            </div>
                            <!-- Image -->
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label fw-700" for="banner">
                                    <?php echo e(translate('Image')); ?> <span class="text-danger">*</span><br>
                                    <span class="fs-12 text-secondary fw-400"><?php echo e(translate('(512px X 280px)')); ?></span>
                                </label>
                                <div class="col-md-8">
                                    <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="false">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium"><?php echo e(translate('Browse')); ?></div>
                                        </div>
                                        <div class="form-control file-amount"><?php echo e(translate('Choose File')); ?></div>
                                        <input type="hidden" value="<?php echo e($dynamic_popup->banner); ?>" name="banner" class="selected-files">
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                                </div>
                            </div>
                            <!-- Button Text -->
                            <div class="form-group row">
                                <label class="col-md-4 col-from-label fw-700">
                                    <?php echo e(translate('Button Text')); ?> <span class="text-danger">*</span><br>
                                    <span class="fs-12 text-secondary fw-400"><?php echo e(translate('(Best within 30 character)')); ?></span>
                                </label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="btn_text" value="<?php echo e($dynamic_popup->btn_text); ?>" placeholder="<?php echo e(translate('Type your text here')); ?>" required>
                                </div>
                            </div>
                            <!-- Select Button Color -->
                            <div class="form-group row">
                                <label class="col-md-4 col-from-label fw-700">
                                    <?php echo e(translate('Select Button Color')); ?> <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="text" class="form-control aiz-color-input" value="<?php echo e($dynamic_popup->btn_background_color); ?>" placeholder="#000000" name="btn_background_color" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text p-0">
                                                <input class="aiz-color-picker border-0 size-40px" type="color" value="<?php echo e($dynamic_popup->btn_background_color); ?>">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Button Text Color -->
                            <div class="form-group row">
                                <label class="col-md-4 col-from-label fw-700">
                                    <?php echo e(translate('Button Text Color')); ?> <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-8 row">
                                    <div class="col radio mar-btm mr-3 d-flex align-items-center">
                                        <input id="btn_text_color_light" class="magic-radio" type="radio" name="btn_text_color" value="white" <?php if($dynamic_popup->btn_text_color == 'white'): ?> checked <?php endif; ?>>
                                        <label for="btn_text_color_light" class="mb-0 ml-2"><?php echo e(translate('Light')); ?></label>
                                    </div>
                                    <div class="col radio mar-btm mr-3 d-flex align-items-center">
                                        <input id="btn_text_color_dark" class="magic-radio" type="radio" name="btn_text_color" value="dark" <?php if($dynamic_popup->btn_text_color == 'dark'): ?> checked <?php endif; ?>>
                                        <label for="btn_text_color_dark" class="mb-0 ml-2"><?php echo e(translate('Dark')); ?></label>
                                    </div>
                                </div>
                            </div>
                            <?php if($dynamic_popup->id != 1): ?>
                                <!-- Link -->
                                <div class="form-group row">
                                    <label class="col-md-4 col-from-label fw-700">
                                        <?php echo e(translate('Link')); ?> <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="btn_link" value="<?php echo e($dynamic_popup->btn_link); ?>" placeholder="<?php echo e(translate('Type your text here')); ?>" required>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($dynamic_popup->id == 1): ?>
                                <!-- Link -->
                                <input type="hidden" class="form-control" name="btn_link" value="#">
                                <!-- Show Subscriber form -->
                                <div class="form-group row">
                                    <label class="col-md-4 col-from-label fw-700"><?php echo e(translate('Show Subscriber form?')); ?></label>
                                    <div class="col-md-8">
                                        <label class="aiz-switch aiz-switch-success mb-0">
                                            <input type="checkbox" name="show_subscribe_form" <?php if( $dynamic_popup->show_subscribe_form == 'on'): ?> checked <?php endif; ?>>
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <!-- Button -->
                            <div class="float-right mb-3">
                                <button type="submit" class="btn btn-primary w-230px btn-md rounded-2 fs-14 fw-700 shadow-primary"><?php echo e(translate('Save')); ?></button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="h-100 rounded-3 pverflow-hideen">
                                <img class="h-100 w-100" src="<?php echo e(static_asset('assets/img/dynamic-popup.png')); ?>" alt="Dynamic Popup">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/demo4axiz/public_html/Oronnomart/resources/views/backend/marketing/dynamic_popup/edit.blade.php ENDPATH**/ ?>