<div class="z-3 sticky-top-lg">
    <div class="card rounded-0 border">

        <?php
            $subtotal_for_min_order_amount = 0;
            $subtotal = 0;
            $tax = 0;
            $product_shipping_cost = 0;
            $shipping = 0;
            $coupon_code = null;
            $coupon_discount = 0;
            $total_point = 0;
        ?>
        <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $product = get_single_product($cartItem['product_id']);
                $subtotal_for_min_order_amount += cart_product_price($cartItem, $cartItem->product, false, false) * $cartItem['quantity'];
                $subtotal += cart_product_price($cartItem, $product, false, false) * $cartItem['quantity'];
                $tax += cart_product_tax($cartItem, $product, false) * $cartItem['quantity'];
                $product_shipping_cost = $cartItem['shipping_cost'];
                $shipping += $product_shipping_cost;
                if ((get_setting('coupon_system') == 1) && ($cartItem->coupon_applied == 1)) {
                    $coupon_code = $cartItem->coupon_code;
                    $coupon_discount = $carts->sum('discount');
                }
                if (addon_is_activated('club_point')) {
                    $total_point += $product->earn_point * $cartItem['quantity'];
                }
            ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="card-header pt-4 pb-1 border-bottom-0">
            <h3 class="fs-16 fw-700 mb-0"><?php echo e(translate('Order Summary')); ?></h3>
            <div class="text-right">
                <!-- Minimum Order Amount -->
                <?php if(get_setting('minimum_order_amount_check') == 1 && $subtotal_for_min_order_amount < get_setting('minimum_order_amount')): ?>
                    <span class="badge badge-inline badge-warning fs-12 rounded-0 px-2">
                        <?php echo e(translate('Minimum Order Amount') . ' ' . single_price(get_setting('minimum_order_amount'))); ?>

                    </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="card-body pt-2">

            <div class="row gutters-5">
                <!-- Total Products -->
                <div class="<?php if(addon_is_activated('club_point')): ?> col-6 <?php else: ?> col-12 <?php endif; ?>">
                    <div class="d-flex align-items-center justify-content-between bg-primary p-2">
                        <span class="fs-13 text-white"><?php echo e(translate('Total Products')); ?></span>
                        <span class="fs-13 fw-700 text-white"><?php echo e(sprintf("%02d", count($carts))); ?></span>
                    </div>
                </div>
                <?php if(addon_is_activated('club_point')): ?>
                    <!-- Total Clubpoint -->
                    <div class="col-6">
                        <div class="d-flex align-items-center justify-content-between bg-secondary-base p-2">
                            <span class="fs-13 text-white"><?php echo e(translate('Total Clubpoint')); ?></span>
                            <span class="fs-13 fw-700 text-white"><?php echo e(sprintf("%02d", $total_point)); ?></span>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <input type="hidden" id="sub_total" value="<?php echo e($subtotal); ?>">

            <table class="table my-3">
                <tfoot>
                    <!-- Subtotal -->
                    <tr class="cart-subtotal">
                        <th class="pl-0 fs-14 fw-400 pt-0 pb-2 text-dark border-top-0"><?php echo e(translate('Subtotal')); ?> (<?php echo e(sprintf("%02d", count($carts))); ?> <?php echo e(translate('Products')); ?>)</th>
                        <td class="text-right pr-0 fs-14 pt-0 pb-2 text-dark border-top-0"><?php echo e(single_price($subtotal)); ?></td>
                    </tr>
                    <!-- Tax -->
                    <tr class="cart-tax">
                        <th class="pl-0 fs-14 fw-400 pt-0 pb-2 text-dark border-top-0"><?php echo e(translate('Tax')); ?></th>
                        <td class="text-right pr-0 fs-14 pt-0 pb-2 text-dark border-top-0"><?php echo e(single_price($tax)); ?></td>
                    </tr>
                    <?php if($proceed != 1): ?>
                    <!-- Total Shipping -->
                    <tr class="cart-shipping">
                        <th class="pl-0 fs-14 fw-400 pt-0 pb-2 text-dark border-top-0"><?php echo e(translate('Total Shipping')); ?></th>
                        <td class="text-right pr-0 fs-14 pt-0 pb-2 text-dark border-top-0"><?php echo e(single_price($shipping)); ?></td>
                    </tr>
                    <?php endif; ?>
                    <!-- Redeem point -->
                    <?php if(Session::has('club_point')): ?>
                        <tr class="cart-club-point">
                            <th class="pl-0 fs-14 fw-400 pt-0 pb-2 text-dark border-top-0"><?php echo e(translate('Redeem point')); ?></th>
                            <td class="text-right pr-0 fs-14 pt-0 pb-2 text-dark border-top-0"><?php echo e(single_price(Session::get('club_point'))); ?></td>
                        </tr>
                    <?php endif; ?>
                    <!-- Coupon Discount -->
                    <?php if($coupon_discount > 0): ?>
                        <tr class="cart-coupon-discount">
                            <th class="pl-0 fs-14 fw-400 pt-0 pb-2 text-dark border-top-0"><?php echo e(translate('Coupon Discount')); ?></th>
                            <td class="text-right pr-0 fs-14 pt-0 pb-2 text-dark border-top-0"><?php echo e(single_price($coupon_discount)); ?></td>
                        </tr>
                    <?php endif; ?>

                    <?php
                        $total = $subtotal + $tax + $shipping;
                        if (Session::has('club_point')) {
                            $total -= Session::get('club_point');
                        }
                        if ($coupon_discount > 0) {
                            $total -= $coupon_discount;
                        }
                    ?>
                    <!-- Total -->
                    <tr class="cart-total">
                        <th class="pl-0 fs-14 text-dark fw-700 border-top-0 pt-3 text-uppercase"><?php echo e(translate('Total')); ?></th>
                        <td class="text-right pr-0 fs-16 fw-700 text-primary border-top-0 pt-3"><?php echo e(single_price($total)); ?></td>
                    </tr>
                </tfoot>
            </table>

            <!-- Coupon System -->
            <?php if(get_setting('coupon_system') == 1): ?>
                <?php if($coupon_discount > 0 && $coupon_code): ?>
                    <div class="mt-3">
                        <form class="" id="remove-coupon-form" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="proceed" value="<?php echo e($proceed); ?>">
                            <div class="input-group">
                                <div class="form-control"><?php echo e($coupon_code); ?></div>
                                <div class="input-group-append">
                                    <button type="button" id="coupon-remove"
                                        class="btn btn-primary"><?php echo e(translate('Change Coupon')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php else: ?>
                    <div class="mt-3">
                        <form class="" id="apply-coupon-form" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="proceed" value="<?php echo e($proceed); ?>">
                            <div class="input-group">
                                <input type="text" class="form-control rounded-0" name="code"
                                    onkeydown="return event.key != 'Enter';"
                                    placeholder="<?php echo e(translate('Have coupon code? Apply here')); ?>" required>
                                <div class="input-group-append">
                                    <button type="button" id="coupon-apply"
                                        class="btn btn-primary rounded-0"><?php echo e(translate('Apply')); ?></button>
                                </div>
                            </div>
                            <?php if(!auth()->check()): ?>
                                <small><?php echo e(translate('You must Login as customer to apply coupon')); ?></small>
                            <?php endif; ?>

                        </form>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if($proceed == 1): ?>
            <!-- Continue to Shipping -->
            <div class="mt-4">
                <a href="<?php echo e(route('checkout')); ?>" class="btn btn-primary btn-block fs-14 fw-700 rounded-0 px-4">
                    <?php echo e(translate('Proceed to Checkout')); ?> (<?php echo e(sprintf("%02d", count($carts))); ?>)
                </a>
            </div>
            <?php endif; ?>

        </div>
    </div>
</div>
<?php /**PATH D:\xampp8.2.12\htdocs\Oronnomart\resources\views/frontend/partials/cart/cart_summary.blade.php ENDPATH**/ ?>