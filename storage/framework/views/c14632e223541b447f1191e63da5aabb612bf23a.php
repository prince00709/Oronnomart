<div class="text-left">
    <!-- Product Name -->
    <h2 class="mb-4 fs-16 fw-700 text-dark">
        <?php echo e($detailedProduct->getTranslation('name')); ?>

    </h2>

    <div class="row align-items-center mb-3">
        <!-- Review -->
        <?php if($detailedProduct->auction_product != 1): ?>
            <div class="col-12">
                <?php
                    $total = 0;
                    $total += $detailedProduct->reviews->where('status', 1)->count();
                ?>
                <span class="rating rating-mr-2">
                    <?php echo e(renderStarRating($detailedProduct->rating)); ?>

                </span>
                <span class="ml-1 opacity-50 fs-14">(<?php echo e($total); ?>

                    <?php echo e(translate('reviews')); ?>)</span>
            </div>
        <?php endif; ?>
        <!-- Estimate Shipping Time -->
        <?php if($detailedProduct->est_shipping_days): ?>
            <div class="col-auto fs-14 mt-1">
                <small class="mr-1 opacity-50 fs-14"><?php echo e(translate('Estimate Shipping Time')); ?>:</small>
                <span class="fw-500"><?php echo e($detailedProduct->est_shipping_days); ?> <?php echo e(translate('Days')); ?></span>
            </div>
        <?php endif; ?>
        <!-- In stock -->
        <?php if($detailedProduct->digital == 1): ?>
            <div class="col-12 mt-1">
                <span class="badge badge-md badge-inline badge-pill badge-success"><?php echo e(translate('In stock')); ?></span>
            </div>
        <?php endif; ?>
    </div>
    <div class="row align-items-center">
        <?php if(get_setting('product_query_activation') == 1): ?>
            <!-- Ask about this product -->
            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 mb-3">
                <a href="javascript:void();" onclick="goToView('product_query')" class="text-primary fs-14 fw-600 d-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
                        <g id="Group_25571" data-name="Group 25571" transform="translate(-975 -411)">
                            <g id="Path_32843" data-name="Path 32843" transform="translate(975 411)" fill="#fff">
                                <path
                                    d="M 16 31 C 11.9933500289917 31 8.226519584655762 29.43972969055176 5.393400192260742 26.60659980773926 C 2.560270071029663 23.77347946166992 1 20.00665092468262 1 16 C 1 11.9933500289917 2.560270071029663 8.226519584655762 5.393400192260742 5.393400192260742 C 8.226519584655762 2.560270071029663 11.9933500289917 1 16 1 C 20.00665092468262 1 23.77347946166992 2.560270071029663 26.60659980773926 5.393400192260742 C 29.43972969055176 8.226519584655762 31 11.9933500289917 31 16 C 31 20.00665092468262 29.43972969055176 23.77347946166992 26.60659980773926 26.60659980773926 C 23.77347946166992 29.43972969055176 20.00665092468262 31 16 31 Z"
                                    stroke="none" />
                                <path
                                    d="M 16 2 C 12.26045989990234 2 8.744749069213867 3.456249237060547 6.100500106811523 6.100500106811523 C 3.456249237060547 8.744749069213867 2 12.26045989990234 2 16 C 2 19.73954010009766 3.456249237060547 23.2552490234375 6.100500106811523 25.89949989318848 C 8.744749069213867 28.54375076293945 12.26045989990234 30 16 30 C 19.73954010009766 30 23.2552490234375 28.54375076293945 25.89949989318848 25.89949989318848 C 28.54375076293945 23.2552490234375 30 19.73954010009766 30 16 C 30 12.26045989990234 28.54375076293945 8.744749069213867 25.89949989318848 6.100500106811523 C 23.2552490234375 3.456249237060547 19.73954010009766 2 16 2 M 16 0 C 24.8365592956543 0 32 7.163440704345703 32 16 C 32 24.8365592956543 24.8365592956543 32 16 32 C 7.163440704345703 32 0 24.8365592956543 0 16 C 0 7.163440704345703 7.163440704345703 0 16 0 Z"
                                    stroke="none" fill="<?php echo e(get_setting('secondary_base_color', '#ffc519')); ?>" />
                            </g>
                            <path id="Path_32842" data-name="Path 32842"
                                d="M28.738,30.935a1.185,1.185,0,0,1-1.185-1.185,3.964,3.964,0,0,1,.942-2.613c.089-.095.213-.207.361-.344.735-.658,2.252-2.032,2.252-3.555a2.228,2.228,0,0,0-2.37-2.37,2.228,2.228,0,0,0-2.37,2.37,1.185,1.185,0,1,1-2.37,0,4.592,4.592,0,0,1,4.74-4.74,4.592,4.592,0,0,1,4.74,4.74c0,2.577-2.044,4.432-3.028,5.333l-.284.255a1.89,1.89,0,0,0-.243.948A1.185,1.185,0,0,1,28.738,30.935Zm0,3.561a1.185,1.185,0,0,1-.835-2.026,1.226,1.226,0,0,1,1.671,0,1.061,1.061,0,0,1,.148.184,1.345,1.345,0,0,1,.113.2,1.41,1.41,0,0,1,.065.225,1.138,1.138,0,0,1,0,.462,1.338,1.338,0,0,1-.065.219,1.185,1.185,0,0,1-.113.207,1.06,1.06,0,0,1-.148.184A1.185,1.185,0,0,1,28.738,34.5Z"
                                transform="translate(962.004 400.504)" fill="<?php echo e(get_setting('secondary_base_color', '#ffc519')); ?>" />
                        </g>
                    </svg>
                    <span class="ml-2 text-primary animate-underline-blue"><?php echo e(translate('Product Inquiry')); ?></span>
                </a>
            </div>
        <?php endif; ?>
        <div class="col mb-3">
            <?php if($detailedProduct->auction_product != 1): ?>
                <div class="d-flex">
                    <!-- Add to wishlist button -->
                    <a href="javascript:void(0)" onclick="addToWishList(<?php echo e($detailedProduct->id); ?>)"
                        class="mr-3 fs-14 text-dark opacity-60 has-transitiuon hov-opacity-100">
                        <i class="la la-heart-o mr-1"></i>
                        <?php echo e(translate('Add to Wishlist')); ?>

                    </a>
                    <!-- Add to compare button -->
                    <a href="javascript:void(0)" onclick="addToCompare(<?php echo e($detailedProduct->id); ?>)"
                        class="fs-14 text-dark opacity-60 has-transitiuon hov-opacity-100">
                        <i class="las la-sync mr-1"></i>
                        <?php echo e(translate('Add to Compare')); ?>

                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>


    <!-- Brand Logo & Name -->
    <?php if($detailedProduct->brand != null): ?>
        <div class="d-flex flex-wrap align-items-center mb-3">
            <span class="text-secondary fs-14 fw-400 mr-4 w-80px"><?php echo e(translate('Brand')); ?></span><br>
            <a href="<?php echo e(route('products.brand', $detailedProduct->brand->slug)); ?>"
                class="text-reset hov-text-primary fs-14 fw-700"><?php echo e($detailedProduct->brand->name); ?></a>
        </div>
    <?php endif; ?>

    <!-- Seller Info -->
    <div class="d-flex flex-wrap align-items-center">
        <div class="d-flex align-items-center mr-4">
            <!-- Shop Name -->
            <?php if($detailedProduct->added_by == 'seller' && get_setting('vendor_system_activation') == 1): ?>
                <span class="text-secondary fs-14 fw-400 mr-4 w-80px"><?php echo e(translate('Sold by')); ?></span>
                <a href="<?php echo e(route('shop.visit', $detailedProduct->user->shop->slug)); ?>"
                    class="text-reset hov-text-primary fs-14 fw-700"><?php echo e($detailedProduct->user->shop->name); ?></a>
            <?php else: ?>
                <p class="mb-0 fs-14 fw-700"><?php echo e(translate('Inhouse product')); ?></p>
            <?php endif; ?>
        </div>
        <!-- Messase to seller -->
        <?php if(get_setting('conversation_system') == 1): ?>
            <div class="">
                <button class="btn btn-sm btn-soft-secondary-base btn-outline-secondary-base hov-svg-white hov-text-white rounded-4"
                    onclick="show_chat_modal()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                        class="mr-2 has-transition">
                        <g id="Group_23918" data-name="Group 23918" transform="translate(1053.151 256.688)">
                            <path id="Path_3012" data-name="Path 3012"
                                d="M134.849,88.312h-8a2,2,0,0,0-2,2v5a2,2,0,0,0,2,2v3l2.4-3h5.6a2,2,0,0,0,2-2v-5a2,2,0,0,0-2-2m1,7a1,1,0,0,1-1,1h-8a1,1,0,0,1-1-1v-5a1,1,0,0,1,1-1h8a1,1,0,0,1,1,1Z"
                                transform="translate(-1178 -341)" fill="<?php echo e(get_setting('secondary_base_color', '#ffc519')); ?>" />
                            <path id="Path_3013" data-name="Path 3013"
                                d="M134.849,81.312h8a1,1,0,0,1,1,1v5a1,1,0,0,1-1,1h-.5a.5.5,0,0,0,0,1h.5a2,2,0,0,0,2-2v-5a2,2,0,0,0-2-2h-8a2,2,0,0,0-2,2v.5a.5.5,0,0,0,1,0v-.5a1,1,0,0,1,1-1"
                                transform="translate(-1182 -337)" fill="<?php echo e(get_setting('secondary_base_color', '#ffc519')); ?>" />
                            <path id="Path_3014" data-name="Path 3014"
                                d="M131.349,93.312h5a.5.5,0,0,1,0,1h-5a.5.5,0,0,1,0-1"
                                transform="translate(-1181 -343.5)" fill="<?php echo e(get_setting('secondary_base_color', '#ffc519')); ?>" />
                            <path id="Path_3015" data-name="Path 3015"
                                d="M131.349,99.312h5a.5.5,0,1,1,0,1h-5a.5.5,0,1,1,0-1"
                                transform="translate(-1181 -346.5)" fill="<?php echo e(get_setting('secondary_base_color', '#ffc519')); ?>" />
                        </g>
                    </svg>

                    <?php echo e(translate('Message Seller')); ?>

                </button>
            </div>
        <?php endif; ?>
        <!-- Size guide -->
        <?php
            $sizeChartId = ($detailedProduct->main_category && $detailedProduct->main_category->sizeChart) ? $detailedProduct->main_category->sizeChart->id : 0;
            $sizeChartName = ($detailedProduct->main_category && $detailedProduct->main_category->sizeChart) ? $detailedProduct->main_category->sizeChart->name : null;
        ?>
        <?php if($sizeChartId != 0): ?>
            <div class=" ml-4">
                <a href="javascript:void(1);" onclick='showSizeChartDetail(<?php echo e($sizeChartId); ?>, "<?php echo e($sizeChartName); ?>")' class="animate-underline-primary"><?php echo e(translate('Show size guide')); ?></a>
            </div>
        <?php endif; ?>
    </div>

    <hr>

    <!-- For auction product -->
    <?php if($detailedProduct->auction_product): ?>
        <div class="row no-gutters mb-3">
            <div class="col-sm-2">
                <div class="text-secondary fs-14 fw-400 mt-1"><?php echo e(translate('Auction Will End')); ?></div>
            </div>
            <div class="col-sm-10">
                <?php if($detailedProduct->auction_end_date > strtotime('now')): ?>
                    <div class="aiz-count-down align-items-center"
                        data-date="<?php echo e(date('Y/m/d H:i:s', $detailedProduct->auction_end_date)); ?>"></div>
                <?php else: ?>
                    <p><?php echo e(translate('Ended')); ?></p>
                <?php endif; ?>

            </div>
        </div>

        <div class="row no-gutters mb-3">
            <div class="col-sm-2">
                <div class="text-secondary fs-14 fw-400 mt-1"><?php echo e(translate('Starting Bid')); ?></div>
            </div>
            <div class="col-sm-10">
                <span class="opacity-50 fs-20">
                    <?php echo e(single_price($detailedProduct->starting_bid)); ?>

                </span>
                <?php if($detailedProduct->unit != null): ?>
                    <span class="opacity-70">/<?php echo e($detailedProduct->getTranslation('unit')); ?></span>
                <?php endif; ?>
            </div>
        </div>

        <?php if(Auth::check() &&
                Auth::user()->product_bids->where('product_id', $detailedProduct->id)->first() != null): ?>
            <div class="row no-gutters mb-3">
                <div class="col-sm-2">
                    <div class="text-secondary fs-14 fw-400 mt-1"><?php echo e(translate('My Bidded Amount')); ?></div>
                </div>
                <div class="col-sm-10">
                    <span class="opacity-50 fs-20">
                        <?php echo e(single_price(Auth::user()->product_bids->where('product_id', $detailedProduct->id)->first()->amount)); ?>

                    </span>
                </div>
            </div>
            <hr>
        <?php endif; ?>

        <?php $highest_bid = $detailedProduct->bids->max('amount'); ?>
        <div class="row no-gutters my-2 mb-3">
            <div class="col-sm-2">
                <div class="text-secondary fs-14 fw-400 mt-1"><?php echo e(translate('Highest Bid')); ?></div>
            </div>
            <div class="col-sm-10">
                <strong class="h3 fw-600 text-primary">
                    <?php if($highest_bid != null): ?>
                        <?php echo e(single_price($highest_bid)); ?>

                    <?php endif; ?>
                </strong>
            </div>
        </div>
    <?php else: ?>
        <!-- Without auction product -->
        <?php if($detailedProduct->wholesale_product == 1): ?>
            <!-- Wholesale -->
            <table class="table mb-3">
                <thead>
                    <tr>
                        <th class="border-top-0"><?php echo e(translate('Min Qty')); ?></th>
                        <th class="border-top-0"><?php echo e(translate('Max Qty')); ?></th>
                        <th class="border-top-0"><?php echo e(translate('Unit Price')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $detailedProduct->stocks->first()->wholesalePrices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wholesalePrice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($wholesalePrice->min_qty); ?></td>
                            <td><?php echo e($wholesalePrice->max_qty); ?></td>
                            <td><?php echo e(single_price($wholesalePrice->price)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php else: ?>
            <!-- Without Wholesale -->
            <?php if(home_price($detailedProduct) != home_discounted_price($detailedProduct)): ?>
                <div class="row no-gutters mb-3">
                    <div class="col-sm-2">
                        <div class="text-secondary fs-14 fw-400"><?php echo e(translate('Price')); ?></div>
                    </div>
                    <div class="col-sm-10">
                        <div class="d-flex align-items-center">
                            <!-- Discount Price -->
                            <strong class="fs-16 fw-700 text-primary">
                                <?php echo e(home_discounted_price($detailedProduct)); ?>

                            </strong>
                            <!-- Home Price -->
                            <del class="fs-14 opacity-60 ml-2">
                                <?php echo e(home_price($detailedProduct)); ?>

                            </del>
                            <!-- Unit -->
                            <?php if($detailedProduct->unit != null): ?>
                                <span class="opacity-70 ml-1">/<?php echo e($detailedProduct->getTranslation('unit')); ?></span>
                            <?php endif; ?>
                            <!-- Discount percentage -->
                            <?php if(discount_in_percentage($detailedProduct) > 0): ?>
                                <span class="bg-primary ml-2 fs-11 fw-700 text-white w-35px text-center p-1"
                                    style="padding-top:2px;padding-bottom:2px;">-<?php echo e(discount_in_percentage($detailedProduct)); ?>%</span>
                            <?php endif; ?>
                            <!-- Club Point -->
                            <?php if(addon_is_activated('club_point') && $detailedProduct->earn_point > 0): ?>
                                <div class="ml-2 bg-secondary-base d-flex justify-content-center align-items-center px-3 py-1"
                                    style="width: fit-content;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                        viewBox="0 0 12 12">
                                        <g id="Group_23922" data-name="Group 23922" transform="translate(-973 -633)">
                                            <circle id="Ellipse_39" data-name="Ellipse 39" cx="6"
                                                cy="6" r="6" transform="translate(973 633)"
                                                fill="#fff" />
                                            <g id="Group_23920" data-name="Group 23920"
                                                transform="translate(973 633)">
                                                <path id="Path_28698" data-name="Path 28698"
                                                    d="M7.667,3H4.333L3,5,6,9,9,5Z" transform="translate(0 0)"
                                                    fill="#f3af3d" />
                                                <path id="Path_28699" data-name="Path 28699"
                                                    d="M5.33,3h-1L3,5,6,9,4.331,5Z" transform="translate(0 0)"
                                                    fill="#f3af3d" opacity="0.5" />
                                                <path id="Path_28700" data-name="Path 28700"
                                                    d="M12.666,3h1L15,5,12,9l1.664-4Z" transform="translate(-5.995 0)"
                                                    fill="#f3af3d" />
                                            </g>
                                        </g>
                                    </svg>
                                    <small class="fs-11 fw-500 text-white ml-2"><?php echo e(translate('Club Point')); ?>:
                                        <?php echo e($detailedProduct->earn_point); ?></small>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="row no-gutters mb-3">
                    <div class="col-sm-2">
                        <div class="text-secondary fs-14 fw-400"><?php echo e(translate('Price')); ?></div>
                    </div>
                    <div class="col-sm-10">
                        <div class="d-flex align-items-center">
                            <!-- Discount Price -->
                            <strong class="fs-16 fw-700 text-primary">
                                <?php echo e(home_discounted_price($detailedProduct)); ?>

                            </strong>
                            <!-- Unit -->
                            <?php if($detailedProduct->unit != null): ?>
                                <span class="opacity-70">/<?php echo e($detailedProduct->getTranslation('unit')); ?></span>
                            <?php endif; ?>
                            <!-- Club Point -->
                            <?php if(addon_is_activated('club_point') && $detailedProduct->earn_point > 0): ?>
                                <div class="ml-2 bg-secondary-base d-flex justify-content-center align-items-center px-3 py-1"
                                    style="width: fit-content;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                        viewBox="0 0 12 12">
                                        <g id="Group_23922" data-name="Group 23922" transform="translate(-973 -633)">
                                            <circle id="Ellipse_39" data-name="Ellipse 39" cx="6"
                                                cy="6" r="6" transform="translate(973 633)"
                                                fill="#fff" />
                                            <g id="Group_23920" data-name="Group 23920"
                                                transform="translate(973 633)">
                                                <path id="Path_28698" data-name="Path 28698"
                                                    d="M7.667,3H4.333L3,5,6,9,9,5Z" transform="translate(0 0)"
                                                    fill="#f3af3d" />
                                                <path id="Path_28699" data-name="Path 28699"
                                                    d="M5.33,3h-1L3,5,6,9,4.331,5Z" transform="translate(0 0)"
                                                    fill="#f3af3d" opacity="0.5" />
                                                <path id="Path_28700" data-name="Path 28700"
                                                    d="M12.666,3h1L15,5,12,9l1.664-4Z" transform="translate(-5.995 0)"
                                                    fill="#f3af3d" />
                                            </g>
                                        </g>
                                    </svg>
                                    <small class="fs-11 fw-500 text-white ml-2"><?php echo e(translate('Club Point')); ?>:
                                        <?php echo e($detailedProduct->earn_point); ?></small>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>

    <?php if($detailedProduct->auction_product != 1): ?>
        <form id="option-choice-form">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" value="<?php echo e($detailedProduct->id); ?>">

            <?php if($detailedProduct->digital == 0): ?>
                <!-- Choice Options -->
                <?php if($detailedProduct->choice_options != null): ?>
                    <?php $__currentLoopData = json_decode($detailedProduct->choice_options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row no-gutters mb-3">
                            <div class="col-sm-2">
                                <div class="text-secondary fs-14 fw-400 mt-2 ">
                                    <?php echo e(get_single_attribute_name($choice->attribute_id)); ?>

                                </div>
                            </div>
                            <div class="col-sm-10">
                                <div class="aiz-radio-inline">
                                    <?php $__currentLoopData = $choice->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label class="aiz-megabox pl-0 mr-2 mb-0">
                                            <input type="radio" name="attribute_id_<?php echo e($choice->attribute_id); ?>"
                                                value="<?php echo e($value); ?>"
                                                <?php if($key == 0): ?> checked <?php endif; ?>>
                                            <span
                                                class="aiz-megabox-elem rounded-0 d-flex align-items-center justify-content-center py-1 px-3">
                                                <?php echo e($value); ?>

                                            </span>
                                        </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <!-- Color Options -->
                <?php if($detailedProduct->colors != null && count(json_decode($detailedProduct->colors)) > 0): ?>
                    <div class="row no-gutters mb-3">
                        <div class="col-sm-2">
                            <div class="text-secondary fs-14 fw-400 mt-2"><?php echo e(translate('Color')); ?></div>
                        </div>
                        <div class="col-sm-10">
                            <div class="aiz-radio-inline">
                                <?php $__currentLoopData = json_decode($detailedProduct->colors); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label class="aiz-megabox pl-0 mr-2 mb-0" data-toggle="tooltip"
                                        data-title="<?php echo e(get_single_color_name($color)); ?>">
                                        <input type="radio" name="color"
                                            value="<?php echo e(get_single_color_name($color)); ?>"
                                            <?php if($key == 0): ?> checked <?php endif; ?>>
                                        <span
                                            class="aiz-megabox-elem rounded-0 d-flex align-items-center justify-content-center p-1">
                                            <span class="size-25px d-inline-block rounded"
                                                style="background: <?php echo e($color); ?>;"></span>
                                        </span>
                                    </label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Quantity + Add to cart -->
                <div class="row no-gutters mb-3">
                    <div class="col-sm-2">
                        <div class="text-secondary fs-14 fw-400 mt-2"><?php echo e(translate('Quantity')); ?></div>
                    </div>
                    <div class="col-sm-10">
                        <div class="product-quantity d-flex align-items-center">
                            <div class="row no-gutters align-items-center aiz-plus-minus mr-3" style="width: 130px;">
                                <button class="btn col-auto btn-icon btn-sm btn-light rounded-0" type="button"
                                    data-type="minus" data-field="quantity" disabled="">
                                    <i class="las la-minus"></i>
                                </button>
                                <input type="number" name="quantity"
                                    class="col border-0 text-center flex-grow-1 fs-16 input-number" placeholder="1"
                                    value="<?php echo e($detailedProduct->min_qty); ?>" min="<?php echo e($detailedProduct->min_qty); ?>"
                                    max="10" lang="en">
                                <button class="btn col-auto btn-icon btn-sm btn-light rounded-0" type="button"
                                    data-type="plus" data-field="quantity">
                                    <i class="las la-plus"></i>
                                </button>
                            </div>
                            <?php
                                $qty = 0;
                                foreach ($detailedProduct->stocks as $key => $stock) {
                                    $qty += $stock->qty;
                                }
                            ?>
                            <div class="avialable-amount opacity-60">
                                <?php if($detailedProduct->stock_visibility_state == 'quantity'): ?>
                                    (<span id="available-quantity"><?php echo e($qty); ?></span>
                                    <?php echo e(translate('available')); ?>)
                                <?php elseif($detailedProduct->stock_visibility_state == 'text' && $qty >= 1): ?>
                                    (<span id="available-quantity"><?php echo e(translate('In Stock')); ?></span>)
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <!-- Quantity -->
                <input type="hidden" name="quantity" value="1">
            <?php endif; ?>

            <!-- Total Price -->
            <div class="row no-gutters pb-3 d-none" id="chosen_price_div">
                <div class="col-sm-2">
                    <div class="text-secondary fs-14 fw-400 mt-1"><?php echo e(translate('Total Price')); ?></div>
                </div>
                <div class="col-sm-10">
                    <div class="product-price">
                        <strong id="chosen_price" class="fs-20 fw-700 text-primary">

                        </strong>
                    </div>
                </div>
            </div>

        </form>
    <?php endif; ?>

    <?php if($detailedProduct->auction_product): ?>
        <?php
            $highest_bid = $detailedProduct->bids->max('amount');
            $min_bid_amount = $highest_bid != null ? $highest_bid + 1 : $detailedProduct->starting_bid;
        ?>
        <?php if($detailedProduct->auction_end_date >= strtotime('now')): ?>
            <div class="mt-4">
                <?php if(Auth::check() && $detailedProduct->user_id == Auth::user()->id): ?>
                    <span
                        class="badge badge-inline badge-danger"><?php echo e(translate('Seller cannot Place Bid to His Own Product')); ?></span>
                <?php else: ?>
                    <button type="button" class="btn btn-primary buy-now  fw-600 min-w-150px rounded-0"
                        onclick="bid_modal()">
                        <i class="las la-gavel"></i>
                        <?php if(Auth::check() &&
                                Auth::user()->product_bids->where('product_id', $detailedProduct->id)->first() != null): ?>
                            <?php echo e(translate('Change Bid')); ?>

                        <?php else: ?>
                            <?php echo e(translate('Place Bid')); ?>

                        <?php endif; ?>
                    </button>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <!-- Add to cart & Buy now Buttons -->
        <div class="mt-3">
            <?php if($detailedProduct->digital == 0): ?>
                <?php if(((get_setting('product_external_link_for_seller') == 1) && ($detailedProduct->added_by == "seller") && ($detailedProduct->external_link != null)) ||
                    (($detailedProduct->added_by != "seller") && ($detailedProduct->external_link != null))): ?>
                    <a type="button" class="btn btn-primary buy-now fw-600 add-to-cart px-4 rounded-0"
                        href="<?php echo e($detailedProduct->external_link); ?>">
                        <i class="la la-share"></i> <?php echo e(translate($detailedProduct->external_link_btn)); ?>

                    </a>
                <?php else: ?>
                    <button type="button"
                        class="btn btn-secondary-base mr-2 add-to-cart fw-600 min-w-150px rounded-0 text-white"
                        <?php if(Auth::check() || get_Setting('guest_checkout_activation') == 1): ?> onclick="addToCart()" <?php else: ?> onclick="showLoginModal()" <?php endif; ?>>
                        <i class="las la-shopping-bag"></i> <?php echo e(translate('Add to cart')); ?>

                    </button>
                    <button type="button" class="btn btn-primary buy-now fw-600 add-to-cart min-w-150px rounded-0"
                        <?php if(Auth::check() || get_Setting('guest_checkout_activation') == 1): ?> onclick="addToCart()" <?php else: ?> onclick="showLoginModal()" <?php endif; ?>>
                        <i class="la la-shopping-cart"></i> <?php echo e(translate('Buy Now')); ?>

                    </button>
                <?php endif; ?>
                <button type="button" class="btn btn-secondary out-of-stock fw-600 d-none" disabled>
                    <i class="la la-cart-arrow-down"></i> <?php echo e(translate('Out of Stock')); ?>

                </button>
            <?php elseif($detailedProduct->digital == 1): ?>
                <button type="button"
                    class="btn btn-secondary-base mr-2 add-to-cart fw-600 min-w-150px rounded-0 text-white"
                    <?php if(Auth::check() || get_Setting('guest_checkout_activation') == 1): ?> onclick="addToCart()" <?php else: ?> onclick="showLoginModal()" <?php endif; ?>>
                    <i class="las la-shopping-bag"></i> <?php echo e(translate('Add to cart')); ?>

                </button>
                <button type="button" class="btn btn-primary buy-now fw-600 add-to-cart min-w-150px rounded-0"
                    <?php if(Auth::check() || get_Setting('guest_checkout_activation') == 1): ?> onclick="addToCart()" <?php else: ?> onclick="showLoginModal()" <?php endif; ?>>
                    <i class="la la-shopping-cart"></i> <?php echo e(translate('Buy Now')); ?>

                </button>
            <?php endif; ?>
        </div>

        <!-- Promote Link -->
        <div class="d-table width-100 mt-3">
            <div class="d-table-cell">
                <?php if(Auth::check() &&
                        addon_is_activated('affiliate_system') &&
                        get_affliate_option_status() &&
                        Auth::user()->affiliate_user != null &&
                        Auth::user()->affiliate_user->status): ?>
                    <?php
                        if (Auth::check()) {
                            if (Auth::user()->referral_code == null) {
                                Auth::user()->referral_code = substr(Auth::user()->id . Str::random(10), 0, 10);
                                Auth::user()->save();
                            }
                            $referral_code = Auth::user()->referral_code;
                            $referral_code_url = URL::to('/product') . '/' . $detailedProduct->slug . "?product_referral_code=$referral_code";
                        }
                    ?>
                    <div>
                        <button type="button" id="ref-cpurl-btn" class="btn btn-secondary w-200px rounded-0"
                            data-attrcpy="<?php echo e(translate('Copied')); ?>" onclick="CopyToClipboard(this)"
                            data-url="<?php echo e($referral_code_url); ?>"><?php echo e(translate('Copy the Promote Link')); ?></button>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Refund -->
        <?php
            $refund_sticker = get_setting('refund_sticker');
        ?>
        <?php if(addon_is_activated('refund_request')): ?>
            <div class="row no-gutters mt-3">
                <div class="col-sm-2">
                    <div class="text-secondary fs-14 fw-400 mt-2"><?php echo e(translate('Refund')); ?></div>
                </div>
                <div class="col-sm-10">
                    <?php if($detailedProduct->refundable == 1): ?>
                        <a href="<?php echo e(route('returnpolicy')); ?>" target="_blank">
                            <?php if($refund_sticker != null): ?>
                                <img src="<?php echo e(uploaded_asset($refund_sticker)); ?>" height="36">
                            <?php else: ?>
                                <img src="<?php echo e(static_asset('assets/img/refund-sticker.jpg')); ?>" height="36">
                            <?php endif; ?>
                        </a>
                        <a href="<?php echo e(route('returnpolicy')); ?>" class="text-blue hov-text-primary fs-14 ml-3"
                            target="_blank"><?php echo e(translate('View Policy')); ?></a>
                    <?php else: ?>
                        <div class="text-dark fs-14 fw-400 mt-2"><?php echo e(translate('Not Applicable')); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Seller Guarantees -->
        <?php if($detailedProduct->digital == 1): ?>
            <?php if($detailedProduct->added_by == 'seller'): ?>
                <div class="row no-gutters mt-3">
                    <div class="col-2">
                        <div class="text-secondary fs-14 fw-400"><?php echo e(translate('Seller Guarantees')); ?></div>
                    </div>
                    <div class="col-10">
                        <?php if($detailedProduct->user->shop->verification_status == 1): ?>
                            <span class="text-success fs-14 fw-700"><?php echo e(translate('Verified seller')); ?></span>
                        <?php else: ?>
                            <span class="text-danger fs-14 fw-700"><?php echo e(translate('Non verified seller')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Share -->
    <div class="row no-gutters mt-4">
        <div class="col-sm-2">
            <div class="text-secondary fs-14 fw-400 mt-2"><?php echo e(translate('Share')); ?></div>
        </div>
        <div class="col-sm-10">
            <div class="aiz-share"></div>
        </div>
    </div>
</div>
<?php /**PATH /home1/demo4axiz/public_html/Oronnomart/resources/views/frontend/product_details/details.blade.php ENDPATH**/ ?>