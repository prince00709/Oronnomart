<?php if(count($product_ids) > 0): ?>
<table class="table table-bordered aiz-table">
  <thead>
  	<tr>
  		<td width="50%">
          <span><?php echo e(translate('Product')); ?></span>
  		</td>
      <td data-breakpoints="lg" width="20%">
          <span><?php echo e(translate('Base Price')); ?></span>
  		</td>
  		<td data-breakpoints="lg" width="20%">
          <span><?php echo e(translate('Discount')); ?></span>
  		</td>
      <td data-breakpoints="lg" width="10%">
          <span><?php echo e(translate('Discount Type')); ?></span>
      </td>
  	</tr>
  </thead>
  <tbody>
      <?php $__currentLoopData = $product_ids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      	<?php
      		$product = \App\Models\Product::findOrFail($id);
      	?>
          <tr>
            <td>
              <div class="from-group row">
                <div class="col-auto">
                  <img class="size-60px img-fit" src="<?php echo e(uploaded_asset($product->thumbnail_img)); ?>">
                </div>
                <div class="col">
                  <span><?php echo e($product->getTranslation('name')); ?></span>
                </div>
              </div>
            </td>
            <td>
                <span><?php echo e($product->unit_price); ?></span>
            </td>
            <td>
                <input type="number" lang="en" name="discount_<?php echo e($id); ?>" value="<?php echo e($product->discount); ?>" min="0" step="1" class="form-control" required>
            </td>
            <td>
                <select class="form-control aiz-selectpicker" name="discount_type_<?php echo e($id); ?>">
                  <option value="amount"><?php echo e(translate('Flat')); ?></option>
                  <option value="percent"><?php echo e(translate('Percent')); ?></option>
                </select>
            </td>
          </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
<?php endif; ?>
<?php /**PATH /home1/demo4axiz/public_html/Oronnomart/resources/views/backend/marketing/flash_deals/flash_deal_discount.blade.php ENDPATH**/ ?>