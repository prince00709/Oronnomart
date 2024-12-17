<?php if(isset($category_id)): ?>
    <?php
        $meta_title = $category->meta_title;
        $meta_description = $category->meta_description;
    ?>
<?php elseif(isset($brand_id)): ?>
    <?php
        $meta_title = get_single_brand($brand_id)->meta_title;
        $meta_description = get_single_brand($brand_id)->meta_description;
    ?>
<?php else: ?>
    <?php
        $meta_title         = get_setting('meta_title');
        $meta_description   = get_setting('meta_description');
    ?>
<?php endif; ?>

<?php $__env->startSection('meta_title'); ?><?php echo e($meta_title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_description'); ?><?php echo e($meta_description); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?php echo e($meta_title); ?>">
    <meta itemprop="description" content="<?php echo e($meta_description); ?>">

    <!-- Twitter Card data -->
    <meta name="twitter:title" content="<?php echo e($meta_title); ?>">
    <meta name="twitter:description" content="<?php echo e($meta_description); ?>">

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo e($meta_title); ?>" />
    <meta property="og:description" content="<?php echo e($meta_description); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="mb-4 pt-4">
        <div class="container sm-px-0 pt-2">
            <form class="" id="search-form" action="" method="GET">
                <div class="row">

                    <!-- Sidebar Filters -->
                    <div class="col-xl-3">
                        <div class="aiz-filter-sidebar collapse-sidebar-wrap sidebar-xl sidebar-right z-1035">
                            <div class="overlay overlay-fixed dark c-pointer" data-toggle="class-toggle" data-target=".aiz-filter-sidebar" data-same=".filter-sidebar-thumb"></div>
                            <div class="collapse-sidebar c-scrollbar-light text-left">
                                <div class="d-flex d-xl-none justify-content-between align-items-center pl-3 border-bottom">
                                    <h3 class="h6 mb-0 fw-600"><?php echo e(translate('Filters')); ?></h3>
                                    <button type="button" class="btn btn-sm p-2 filter-sidebar-thumb" data-toggle="class-toggle" data-target=".aiz-filter-sidebar" >
                                        <i class="las la-times la-2x"></i>
                                    </button>
                                </div>

                                <!-- Categories -->
                                <div class="bg-white border mb-3">
                                    <div class="fs-16 fw-700 p-3">
                                        <a href="#collapse_1" class="dropdown-toggle filter-section text-dark d-flex align-items-center justify-content-between" data-toggle="collapse">
                                            <?php echo e(translate('Categories')); ?>

                                        </a>
                                    </div>
                                    <div class="collapse show" id="collapse_1">
                                        <ul class="p-3 mb-0 list-unstyled">
                                            <?php if(!isset($category_id)): ?>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="mb-3 text-dark">
                                                        <a class="text-reset fs-14 hov-text-primary" href="<?php echo e(route('products.category', $category->slug)); ?>">
                                                            <?php echo e($category->getTranslation('name')); ?>

                                                        </a>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <li class="mb-3">
                                                    <a class="text-reset fs-14 fw-600 hov-text-primary" href="<?php echo e(route('search')); ?>">
                                                        <i class="las la-angle-left"></i>
                                                        <?php echo e(translate('All Categories')); ?>

                                                    </a>
                                                </li>
                                                
                                                <?php if($category->parent_id != 0): ?>
                                                    <li class="mb-3">
                                                        <a class="text-reset fs-14 fw-600 hov-text-primary" href="<?php echo e(route('products.category', get_single_category($category->parent_id)->slug)); ?>">
                                                            <i class="las la-angle-left"></i>
                                                            <?php echo e(get_single_category($category->parent_id)->getTranslation('name')); ?>

                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                                <li class="mb-3">
                                                    <a class="text-reset fs-14 fw-600 hov-text-primary" href="<?php echo e(route('products.category', $category->slug)); ?>">
                                                        <i class="las la-angle-left"></i>
                                                        <?php echo e($category->getTranslation('name')); ?>

                                                    </a>
                                                </li>
                                                <?php $__currentLoopData = $category->childrenCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $immediate_children_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="ml-4 mb-3">
                                                        <a class="text-reset fs-14 hov-text-primary" href="<?php echo e(route('products.category', $immediate_children_category->slug)); ?>">
                                                            <?php echo e($immediate_children_category->getTranslation('name')); ?>

                                                        </a>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Price range -->
                                <div class="bg-white border mb-3">
                                    <div class="fs-16 fw-700 p-3">
                                        <?php echo e(translate('Price range')); ?>

                                    </div>
                                    <div class="p-3 mr-3">
                                        <?php
                                            $product_count = get_products_count()
                                        ?>
                                        <div class="aiz-range-slider">
                                            <div
                                                id="input-slider-range"
                                                data-range-value-min="<?php if($product_count < 1): ?> 0 <?php else: ?> <?php echo e(get_product_min_unit_price()); ?> <?php endif; ?>"
                                                data-range-value-max="<?php if($product_count < 1): ?> 0 <?php else: ?> <?php echo e(get_product_max_unit_price()); ?> <?php endif; ?>"
                                            ></div>

                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <span class="range-slider-value value-low fs-14 fw-600 opacity-70"
                                                        <?php if(isset($min_price)): ?>
                                                            data-range-value-low="<?php echo e($min_price); ?>"
                                                        <?php elseif($products->min('unit_price') > 0): ?>
                                                            data-range-value-low="<?php echo e($products->min('unit_price')); ?>"
                                                        <?php else: ?>
                                                            data-range-value-low="0"
                                                        <?php endif; ?>
                                                        id="input-slider-range-value-low"
                                                    ></span>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <span class="range-slider-value value-high fs-14 fw-600 opacity-70"
                                                        <?php if(isset($max_price)): ?>
                                                            data-range-value-high="<?php echo e($max_price); ?>"
                                                        <?php elseif($products->max('unit_price') > 0): ?>
                                                            data-range-value-high="<?php echo e($products->max('unit_price')); ?>"
                                                        <?php else: ?>
                                                            data-range-value-high="0"
                                                        <?php endif; ?>
                                                        id="input-slider-range-value-high"
                                                    ></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Hidden Items -->
                                    <input type="hidden" name="min_price" value="">
                                    <input type="hidden" name="max_price" value="">
                                </div>
                                
                                <!-- Attributes -->
                                <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="bg-white border mb-3">
                                        <div class="fs-16 fw-700 p-3">
                                            <a href="#" class="dropdown-toggle text-dark filter-section collapsed d-flex align-items-center justify-content-between" 
                                                data-toggle="collapse" data-target="#collapse_<?php echo e(str_replace(' ', '_', $attribute->name)); ?>" style="white-space: normal;">
                                                <?php echo e($attribute->getTranslation('name')); ?>

                                            </a>
                                        </div>
                                        <?php
                                            $show = '';
                                            foreach ($attribute->attribute_values as $attribute_value){
                                                if(in_array($attribute_value->value, $selected_attribute_values)){
                                                    $show = 'show';
                                                }
                                            }
                                        ?>
                                        <div class="collapse <?php echo e($show); ?>" id="collapse_<?php echo e(str_replace(' ', '_', $attribute->name)); ?>">
                                            <div class="p-3 aiz-checkbox-list">
                                                <?php $__currentLoopData = $attribute->attribute_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <label class="aiz-checkbox mb-3">
                                                        <input
                                                            type="checkbox"
                                                            name="selected_attribute_values[]"
                                                            value="<?php echo e($attribute_value->value); ?>" <?php if(in_array($attribute_value->value, $selected_attribute_values)): ?> checked <?php endif; ?>
                                                            onchange="filter()"
                                                        >
                                                        <span class="aiz-square-check"></span>
                                                        <span class="fs-14 fw-400 text-dark"><?php echo e($attribute_value->value); ?></span>
                                                    </label>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                <!-- Color -->
                                <?php if(get_setting('color_filter_activation')): ?>
                                    <div class="bg-white border mb-3">
                                        <div class="fs-16 fw-700 p-3">
                                            <a href="#" class="dropdown-toggle text-dark filter-section collapsed d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#collapse_color">
                                                <?php echo e(translate('Filter by color')); ?>

                                            </a>
                                        </div>
                                        <?php
                                            $show = '';
                                            foreach ($colors as $key => $color){
                                                if(isset($selected_color) && $selected_color == $color->code){
                                                    $show = 'show';
                                                }
                                            }
                                        ?>
                                        <div class="collapse <?php echo e($show); ?>" id="collapse_color">
                                            <div class="p-3 aiz-radio-inline">
                                                <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip" data-title="<?php echo e($color->name); ?>">
                                                    <input
                                                        type="radio"
                                                        name="color"
                                                        value="<?php echo e($color->code); ?>"
                                                        onchange="filter()"
                                                        <?php if(isset($selected_color) && $selected_color == $color->code): ?> checked <?php endif; ?>
                                                    >
                                                    <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                        <span class="size-30px d-inline-block rounded" style="background: <?php echo e($color->code); ?>;"></span>
                                                    </span>
                                                </label>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Contents -->
                    <div class="col-xl-9">
                        
                        <!-- Breadcrumb -->
                        <ul class="breadcrumb bg-transparent py-0 px-1">
                            <li class="breadcrumb-item has-transition opacity-50 hov-opacity-100">
                                <a class="text-reset" href="<?php echo e(route('home')); ?>"><?php echo e(translate('Home')); ?></a>
                            </li>
                            <?php if(!isset($category_id)): ?>
                                <li class="breadcrumb-item fw-700  text-dark">
                                    "<?php echo e(translate('All Categories')); ?>"
                                </li>
                            <?php else: ?>
                                <li class="breadcrumb-item opacity-50 hov-opacity-100">
                                    <a class="text-reset" href="<?php echo e(route('search')); ?>"><?php echo e(translate('All Categories')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(isset($category_id)): ?>
                                <li class="text-dark fw-600 breadcrumb-item">
                                    "<?php echo e($category->getTranslation('name')); ?>"
                                </li>
                            <?php endif; ?>
                        </ul>
                        
                        <!-- Top Filters -->
                        <div class="text-left">
                            <div class="row gutters-5 flex-wrap align-items-center">
                                <div class="col-lg col-10">
                                    <h1 class="fs-20 fs-md-24 fw-700 text-dark">
                                        <?php if(isset($category_id)): ?>
                                            <?php echo e($category->getTranslation('name')); ?>

                                        <?php elseif(isset($query)): ?>
                                            <?php echo e(translate('Search result for ')); ?>"<?php echo e($query); ?>"
                                        <?php else: ?>
                                            <?php echo e(translate('All Products')); ?>

                                        <?php endif; ?>
                                    </h1>
                                    <input type="hidden" name="keyword" value="<?php echo e($query); ?>">
                                </div>
                                <div class="col-2 col-lg-auto d-xl-none mb-lg-3 text-right">
                                    <button type="button" class="btn btn-icon p-0" data-toggle="class-toggle" data-target=".aiz-filter-sidebar">
                                        <i class="la la-filter la-2x"></i>
                                    </button>
                                </div>
                                
                                <div class="col-6 col-lg-auto mb-3 w-lg-200px">
                                    <select class="form-control form-control-sm aiz-selectpicker rounded-0" name="sort_by" onchange="filter()">
                                        <option value=""><?php echo e(translate('Sort by')); ?></option>
                                        <option value="newest" <?php if(isset($sort_by)): ?> <?php if($sort_by == 'newest'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Newest')); ?></option>
                                        <option value="oldest" <?php if(isset($sort_by)): ?> <?php if($sort_by == 'oldest'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Oldest')); ?></option>
                                        <option value="price-asc" <?php if(isset($sort_by)): ?> <?php if($sort_by == 'price-asc'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Price low to high')); ?></option>
                                        <option value="price-desc" <?php if(isset($sort_by)): ?> <?php if($sort_by == 'price-desc'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(translate('Price high to low')); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Products -->
                        <div class="px-3">
                            <div class="row gutters-16 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-4 row-cols-md-3 row-cols-2 border-top border-left">
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col border-right border-bottom has-transition hov-shadow-out z-1">
                                        <?php echo $__env->make('frontend.'.get_setting('homepage_select').'.partials.product_box_1',['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="aiz-pagination mt-4">
                            <?php echo e($products->appends(request()->input())->links()); ?>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function filter(){
            $('#search-form').submit();
        }
        function rangefilter(arg){
            $('input[name=min_price]').val(arg[0]);
            $('input[name=max_price]').val(arg[1]);
            filter();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp8.2.12\htdocs\Oronnomart\resources\views/frontend/product_listing.blade.php ENDPATH**/ ?>