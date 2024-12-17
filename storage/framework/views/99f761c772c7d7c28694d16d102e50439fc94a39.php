<div class="aiz-category-menu bg-white rounded-0 border-top" id="category-sidebar" style="width:270px; position: relative;">
    <ul class="list-unstyled categories no-scrollbar mb-0 text-left">
        <?php $__currentLoopData = get_level_zero_categories()->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $category_name = $category->getTranslation('name');
            ?>
            <li class="category-nav-element border border-top-0 position-relative" data-id="<?php echo e($category->id); ?>">
                <a href="<?php echo e(route('products.category', $category->slug)); ?>" class="text-truncate text-dark px-4 fs-14 d-block hov-column-gap-1">
                    <img class="cat-image lazyload mr-2 opacity-60" 
                        src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                        data-src="<?php echo e(isset($category->catIcon->file_name) ? my_asset($category->catIcon->file_name) : static_asset('assets/img/placeholder.jpg')); ?>" 
                        width="16" alt="<?php echo e($category_name); ?>"
                        onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                    <span class="cat-name has-transition"><?php echo e($category_name); ?></span>
                </a>

                <!-- Sub-category submenu that appears on hover -->
                <?php if(count(\App\Utility\CategoryUtility::get_immediate_children_ids($category->id)) > 0): ?>
                    <ul class="sub-menu" style="display: none;">
                        <?php $__currentLoopData = \App\Utility\CategoryUtility::get_immediate_children_ids($category->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCategoryId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $childCategory = \App\Models\Category::find($childCategoryId);
                                $childCategoryName = $childCategory->getTranslation('name');
                            ?>
                            <li class="category-nav-element border border-top-0">
                                <a href="<?php echo e(route('products.category', $childCategory->slug)); ?>" class="text-truncate text-dark px-4 fs-14 d-block hov-column-gap-1">
                                    <img class="cat-image lazyload mr-2 opacity-60" 
                                         src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                                         data-src="<?php echo e(isset($childCategory->catIcon->file_name) ? my_asset($childCategory->catIcon->file_name) : static_asset('assets/img/placeholder.jpg')); ?>" 
                                         width="16" alt="<?php echo e($childCategoryName); ?>"
                                         onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                                    <span class="cat-name has-transition"><?php echo e($childCategoryName); ?></span>
                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>

<style>
    /* Sub-menu Styling */
    .sub-menu {
        display: none;
        position: absolute;
        left: 270px; /* Adjust if needed */
        top: 0;
        background-color: #fff;
        border: 1px solid #ddd;
        width: 270px;
        z-index: 999;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    /* Hover effect for categories */
    .category-nav-element:hover > .sub-menu {
        display: block;
    }

    /* Category hover effect */
    .category-nav-element:hover > a {
        position: relative;
        z-index: 10;
        background: #eed1e2;
    }

    /* Smooth Hover Transition */
    .cat-name.has-transition {
        transition: background-color 0.3s, color 0.3s;
    }

    /* Hover Effects */
    .aiz-category-menu .category-nav-element:hover > a {
        position: relative;
        z-index: 10;
        background: #eed1e2;
    }
</style>

<?php /**PATH D:\xampp8.2.12\htdocs\Oronnomart\resources\views/frontend/classic/partials/category_menu.blade.php ENDPATH**/ ?>