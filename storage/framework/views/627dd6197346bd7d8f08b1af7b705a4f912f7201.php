<?php $__env->startSection('content'); ?>
    <!-- aiz-main-wrapper -->
    <div class="aiz-main-wrapper d-flex flex-column justify-content-md-center bg-white">
        <section class="bg-white overflow-hidden">
            <div class="row">
                <div class="col-xxl-6 col-xl-9 col-lg-10 col-md-7 mx-auto py-lg-4">
                    <div class="card shadow-none rounded-0 border-0">
                        <div class="row no-gutters">
                            <!-- Left Side Image-->
                            <div class="col-lg-6">
                                    <img src="<?php echo e(uploaded_asset(get_setting('seller_register_page_image'))); ?>" alt="" class="img-fit h-100">
                                </div>
                                    
                                <!-- Right Side -->
                                <div class="col-lg-6 p-4 p-lg-5 d-flex flex-column justify-content-center border right-content" style="height: auto;">
                                    <!-- Site Icon -->
                                    <div class="size-48px mb-3 mx-auto mx-lg-0">
                                        <img src="<?php echo e(uploaded_asset(get_setting('site_icon'))); ?>" alt="<?php echo e(translate('Site Icon')); ?>" class="img-fit h-100">
                                    </div>

                                    <!-- Titles -->
                                    <div class="text-center text-lg-left">
                                        <h1 class="fs-20 fs-md-24 fw-700 text-primary" style="text-transform: uppercase;"><?php echo e(translate('Register your shop')); ?></h1>
                                    </div>
                                    <!-- Register form -->
                                    <div class="pt-3 pt-lg-4">
                                        <div class="">
                                            <form id="reg-form" class="form-default" role="form" action="<?php echo e(route('shops.store')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>

                                                <div class="fs-15 fw-600 pb-2"><?php echo e(translate('Personal Info')); ?></div>
                                                <!-- Name -->
                                                <div class="form-group">
                                                    <label for="name" class="fs-12 fw-700 text-soft-dark"><?php echo e(translate('Your Name')); ?></label>
                                                    <input type="text" class="form-control rounded-0<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(translate('Full Name')); ?>" name="name" required>
                                                    <?php if($errors->has('name')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="form-group">
                                                    <label><?php echo e(translate('Your Email')); ?></label>
                                                    <input type="email" class="form-control rounded-0<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(translate('Email')); ?>" name="email" required>
                                                    <?php if($errors->has('email')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>

                                                <!-- password -->
                                                <div class="form-group mb-0">
                                                    <label for="password" class="fs-12 fw-700 text-soft-dark"><?php echo e(translate('Password')); ?></label>
                                                    <div class="position-relative">
                                                        <input type="password" class="form-control rounded-0<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(translate('Password')); ?>" name="password" required>
                                                        <i class="password-toggle las la-2x la-eye"></i>
                                                    </div>
                                                    <div class="text-right mt-1">
                                                        <span class="fs-12 fw-400 text-gray-dark"><?php echo e(translate('Password must contain at least 6 digits')); ?></span>
                                                    </div>
                                                    <?php if($errors->has('password')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>

                                                <!-- password Confirm -->
                                                <div class="form-group">
                                                    <label for="password_confirmation" class="fs-12 fw-700 text-soft-dark"><?php echo e(translate('Confirm Password')); ?></label>
                                                    <div class="position-relative">
                                                        <input type="password" class="form-control rounded-0" placeholder="<?php echo e(translate('Confirm Password')); ?>" name="password_confirmation" required>
                                                        <i class="password-toggle las la-2x la-eye"></i>
                                                    </div>
                                                </div>


                                                <div class="fs-15 fw-600 py-2"><?php echo e(translate('Basic Info')); ?></div>
                                                
                                                <div class="form-group">
                                                    <label for="shop_name" class="fs-12 fw-700 text-soft-dark"><?php echo e(translate('Shop Name')); ?></label>
                                                    <input type="text" class="form-control rounded-0<?php echo e($errors->has('shop_name') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('shop_name')); ?>" placeholder="<?php echo e(translate('Shop Name')); ?>" name="shop_name" required>
                                                    <?php if($errors->has('shop_name')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('shop_name')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="form-group">
                                                    <label for="address" class="fs-12 fw-700 text-soft-dark"><?php echo e(translate('Address')); ?></label>
                                                    <input type="text" class="form-control rounded-0<?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('address')); ?>" placeholder="<?php echo e(translate('Address')); ?>" name="address" required>
                                                    <?php if($errors->has('address')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('address')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>

                                                <!-- Recaptcha -->
                                                <?php if(get_setting('google_recaptcha') == 1): ?>
                                                    <div class="form-group">
                                                        <div class="g-recaptcha" data-sitekey="<?php echo e(env('CAPTCHA_KEY')); ?>"></div>
                                                    </div>
                                                    <?php if($errors->has('g-recaptcha-response')): ?>
                                                        <span class="invalid-feedback" role="alert" style="display: block;">
                                                            <strong><?php echo e($errors->first('g-recaptcha-response')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            
                                                <!-- Submit Button -->
                                                <div class="mb-4 mt-4">
                                                    <button type="submit" class="btn btn-primary btn-block fw-600 rounded-0"><?php echo e(translate('Register Your Shop')); ?></button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- Log In -->
                                        <p class="fs-12 text-gray mb-0">
                                            <?php echo e(translate('Already have an account?')); ?>

                                            <a href="<?php echo e(route('seller.login')); ?>" class="ml-2 fs-14 fw-700 animate-underline-primary"><?php echo e(translate('Log In')); ?></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Go Back -->
                        <div class="mt-3 mr-4 mr-md-0">
                            <a href="<?php echo e(url()->previous()); ?>" class="ml-auto fs-14 fw-700 d-flex align-items-center text-primary" style="max-width: fit-content;">
                                <i class="las la-arrow-left fs-20 mr-1"></i>
                                <?php echo e(translate('Back to Previous Page')); ?>

                            </a>
                        </div>
                    </div>
                </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php if(get_setting('google_recaptcha') == 1): ?>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <?php endif; ?>

    <script type="text/javascript">
        <?php if(get_setting('google_recaptcha') == 1): ?>
        // making the CAPTCHA  a required field for form submission
        $(document).ready(function(){
            $("#reg-form").on("submit", function(evt)
            {
                var response = grecaptcha.getResponse();
                if(response.length == 0)
                {
                //reCaptcha not verified
                    alert("please verify you are human!");
                    evt.preventDefault();
                    return false;
                }
                //captcha verified
                //do the rest of your validations here
                $("#reg-form").submit();
            });
        });
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.layouts.authentication', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/demo4axiz/public_html/Oronnomart/resources/views/auth/boxed/seller_registration.blade.php ENDPATH**/ ?>