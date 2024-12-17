<option value="0"><?php echo e(translate('No Parent')); ?></option>
<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($p_category->id); ?>"><?php echo e($p_category->getTranslation('name')); ?></option>
    <?php $__currentLoopData = $p_category->childrenCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('backend.product.categories.child_category_edit', ['child_category' => $childCategory], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home1/demo4axiz/public_html/Oronnomart/resources/views/backend/product/categories/categories_option_edit.blade.php ENDPATH**/ ?>