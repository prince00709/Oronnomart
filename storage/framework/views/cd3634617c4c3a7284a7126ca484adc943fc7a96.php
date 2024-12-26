<div class="modal fade" id="fq-bought-product-select-modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h6"><?php echo e(translate('Add Products')); ?></h5>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="min-height: 300px;">
                <div class="row gutters-5">
                    <div class="col-md-6">
                        <select class="form-control aiz-selectpicker" name="fq_brough_category" onchange="filterFqBoughtProduct()" data-placeholder="<?php echo e(translate('Select a Category')); ?>" data-live-search="true">
                            <option value=""><?php echo e(translate('Choose Category')); ?></option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->getTranslation('name')); ?></option>
                                <?php $__currentLoopData = $category->childrenCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make('categories.child_category', ['child_category' => $childCategory], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="search_keyword" onkeyup="filterFqBoughtProduct()" placeholder="<?php echo e(translate('Search by Product Name')); ?>">
                    </div>
                </div>
                <div class="mt-3" id="product-list"></div>
            </div>

            <div class="modal-footer">
                <button 
                    type="button"
                    class="mx-2 btn btn-success btn-sm rounded-2 fs-14 fw-700 shadow-success action-btn"
                    onclick="addFqBoughtProduct()"
                ><?php echo e(translate('Add')); ?></button>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\xampp8.2.12\htdocs\Oronnomart\resources\views/modals/product_select_modal.blade.php ENDPATH**/ ?>