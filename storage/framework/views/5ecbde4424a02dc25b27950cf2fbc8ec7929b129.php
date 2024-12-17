<?php $__env->startSection('content'); ?>

<?php
    CoreComponentRepository::instantiateShopRepository();
    CoreComponentRepository::initializeCache();
?>

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3"><?php echo e(translate('All Categories')); ?></h1>
        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_product_category')): ?>
            <div class="col-md-6 text-md-right">
                <a href="<?php echo e(route('categories.create')); ?>" class="btn btn-circle btn-info">
                    <span><?php echo e(translate('Add New category')); ?></span>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
<div class="card">
    <div class="card-header d-block d-md-flex">
        <h5 class="mb-0 h6"><?php echo e(translate('Categories')); ?></h5>
        <form class="" id="sort_categories" action="" method="GET">
            <div class="box-inline pad-rgt pull-left">
                <div class="" style="min-width: 200px;">
                    <input type="text" class="form-control" id="search" name="search"<?php if(isset($sort_search)): ?> value="<?php echo e($sort_search); ?>" <?php endif; ?> placeholder="<?php echo e(translate('Type name & Enter')); ?>">
                </div>
            </div>
        </form>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th data-breakpoints="lg">#</th>
                    <th><?php echo e(translate('Name')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Parent Category')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Order Level')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Level')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Banner')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Icon')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Cover Image')); ?></th>
                    <th data-breakpoints="lg"><?php echo e(translate('Featured')); ?></th>
                    <?php if(get_setting('seller_commission_type') == 'category_based'): ?>
                        <th data-breakpoints="lg"><?php echo e(translate('Commission')); ?></th>
                    <?php endif; ?>
                    <th width="10%" class="text-right"><?php echo e(translate('Options')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(($key+1) + ($categories->currentPage() - 1)*$categories->perPage()); ?></td>
                        <td class="d-flex align-items-center">
                            <?php echo e($category->getTranslation('name')); ?>

                            <?php if($category->digital == 1): ?>
                                <img src="<?php echo e(static_asset('assets/img/digital_tag.png')); ?>" alt="<?php echo e(translate('Digital')); ?>" class="ml-2 h-25px" style="cursor: pointer;" title="DIgital">
                            <?php endif; ?>
                         </td>
                        <td>
                            <?php
                                $parent = \App\Models\Category::where('id', $category->parent_id)->first();
                            ?>
                            <?php if($parent != null): ?>
                                <?php echo e($parent->getTranslation('name')); ?>

                            <?php else: ?>
                                —
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($category->order_level); ?></td>
                        <td><?php echo e($category->level); ?></td>
                        <td>
                            <?php if($category->banner != null): ?>
                                <img src="<?php echo e(uploaded_asset($category->banner)); ?>" alt="<?php echo e(translate('Banner')); ?>" class="h-50px">
                            <?php else: ?>
                                —
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($category->icon != null): ?>
                                <span class="avatar avatar-square avatar-xs">
                                    <img src="<?php echo e(uploaded_asset($category->icon)); ?>" alt="<?php echo e(translate('icon')); ?>">
                                </span>
                            <?php else: ?>
                                —
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($category->cover_image != null): ?>
                                <img src="<?php echo e(uploaded_asset($category->cover_image)); ?>" alt="<?php echo e(translate('Cover Image')); ?>" class="h-50px">
                            <?php else: ?>
                                —
                            <?php endif; ?>
                        </td>
                        <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" onchange="update_featured(this)" value="<?php echo e($category->id); ?>" <?php if($category->featured == 1) echo "checked";?>>
                                <span></span>
                            </label>
                        </td>
                        <?php if(get_setting('seller_commission_type') == 'category_based'): ?>
                            <td><?php echo e($category->commision_rate); ?> %</td>
                        <?php endif; ?>
                        <td class="text-right">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_product_category')): ?>
                                <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="<?php echo e(route('categories.edit', ['id'=>$category->id, 'lang'=>env('DEFAULT_LANGUAGE')] )); ?>" title="<?php echo e(translate('Edit')); ?>">
                                    <i class="las la-edit"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_product_category')): ?>
                                <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="<?php echo e(route('categories.destroy', $category->id)); ?>" title="<?php echo e(translate('Delete')); ?>">
                                    <i class="las la-trash"></i>
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="aiz-pagination">
            <?php echo e($categories->appends(request()->input())->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('modal'); ?>
    <?php echo $__env->make('modals.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function update_featured(el){

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
            $.post('<?php echo e(route('categories.featured')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '<?php echo e(translate('Featured categories updated successfully')); ?>');
                }
                else{
                    AIZ.plugins.notify('danger', '<?php echo e(translate('Something went wrong')); ?>');
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp8.2.12\htdocs\Oronnomart\resources\views/backend/product/categories/index.blade.php ENDPATH**/ ?>