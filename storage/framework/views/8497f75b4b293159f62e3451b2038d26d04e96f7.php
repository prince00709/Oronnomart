<?php if(get_setting('home_categories') != null): ?>
<?php
$home_categories = json_decode(get_setting('home_categories'));
$categories = get_category($home_categories);
?>
<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
$category_name = $category->getTranslation('name');
?>
<section class="mb-2">
    <div class="container">
        <!-- <a href="<?php echo e(route('products.category', $category->slug)); ?>" class="d-block text-reset">
                                <img src="<?php echo e(uploaded_asset($category->banner)); ?>" data-src="" alt="<?php echo e(env('APP_NAME')); ?> promo" class="img-fluid lazyload w-100">
                            </a> -->
        <!-- <a href="<?php echo e(route('products.category', $category->slug)); ?>" > <div class="mb-3 custom-title-category" style="background-image: url('<?php echo e(uploaded_asset($category->banner)); ?>');"> -->
        <!--<div class="col-3">-->
        <!--    <h3 class="h5 fw-700 mb-1">-->
        <!--        <span class="border-primary border-width-2 d-inline-block"><?php echo e($category->getTranslation('name')); ?></span>-->

        <!--    </h3>-->
        <!--     <div class="explor">-->
        <!--        <span class=""><?php echo e(translate(' Explore More >')); ?></span>-->

        <!--    </div>-->

        <!--</div>-->
        <!-- </div></a> -->
        <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">

            <div class="d-flex mb-3 align-items-baseline border-bottom">
                <h3 class="h5 fw-700 mb-0">
                    <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block"><?php echo e($category->getTranslation('name')); ?></span>
                </h3>
                <a href="<?php echo e(route('products.category', $category->slug)); ?>" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md"><?php echo e(translate('View More')); ?></a>
            </div>
            <div class="aiz-carousel gutters-10 half-outside-arrow px-2" data-items="6" data-xl-items="5" data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'>
                <?php $__currentLoopData = get_cached_products($category->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-box">
                    <?php echo $__env->make('frontend.'.get_setting('homepage_select').'.partials.product_box_1', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH D:\xampp8.2.12\htdocs\Oronnomart\resources\views/frontend/classic/partials/home_categories_section.blade.php ENDPATH**/ ?>