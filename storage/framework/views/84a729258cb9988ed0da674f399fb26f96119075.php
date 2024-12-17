<?php $__env->startSection('content'); ?>
    <style>
        @media (max-width: 767px){
            #flash_deal .flash-deals-baner{
                height: 203px !important;
            }
        }
    </style>
    <?php $lang = get_system_language()->code;  ?>
    <!-- Sliders -->
    <div class="home-banner-area mb-3" style="">
        <div class="container">
            <div class="d-flex flex-wrap position-relative">
                <div class="position-static d-none d-xl-block">
                    <?php echo $__env->make('frontend.'.get_setting("homepage_select").'.partials.category_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <!-- Sliders -->
                <div class="home-slider">
                    <?php if(get_setting('home_slider_images', null, $lang) != null): ?>
                        <div class="aiz-carousel dots-inside-bottom" data-autoplay="true" data-infinite="true">
                            <?php
                                $decoded_slider_images = json_decode(get_setting('home_slider_images', null, $lang), true);
                                $sliders = get_slider_images($decoded_slider_images);
                                $home_slider_links = get_setting('home_slider_links', null, $lang);
                            ?>
                            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="carousel-box">
                                    <a href="<?php echo e(isset(json_decode($home_slider_links, true)[$key]) ? json_decode($home_slider_links, true)[$key] : ''); ?>">
                                        <!-- Image -->
                                        <img class="d-block mw-100 img-fit overflow-hidden h-180px h-md-320px h-lg-460px overflow-hidden"
                                            src="<?php echo e($slider ? my_asset($slider->file_name) : static_asset('assets/img/placeholder.jpg')); ?>"
                                            alt="<?php echo e(env('APP_NAME')); ?> promo"
                                            onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>';">
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Flash Deal -->
    <?php
        $flash_deal = get_featured_flash_deal();
    ?>
    <?php if($flash_deal != null): ?>
        <section class="mb-2 mb-md-3 mt-2 mt-md-3" id="flash_deal">
            <div class="container">
                <!-- Top Section -->
                <div class="d-flex flex-wrap mb-2 mb-md-3 align-items-baseline justify-content-between">
                    <!-- Title -->
                    <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0">
                        <span class="d-inline-block"><?php echo e(translate('Flash Sale')); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 16 24"
                            class="ml-3">
                            <path id="Path_28795" data-name="Path 28795"
                                d="M30.953,13.695a.474.474,0,0,0-.424-.25h-4.9l3.917-7.81a.423.423,0,0,0-.028-.428.477.477,0,0,0-.4-.207H21.588a.473.473,0,0,0-.429.263L15.041,18.151a.423.423,0,0,0,.034.423.478.478,0,0,0,.4.2h4.593l-2.229,9.683a.438.438,0,0,0,.259.5.489.489,0,0,0,.571-.127L30.9,14.164a.425.425,0,0,0,.054-.469Z"
                                transform="translate(-15 -5)" fill="#fcc201" />
                        </svg>
                    </h3>
                    <!-- Links -->
                    <div>
                        <div class="text-dark d-flex align-items-center mb-0">
                            <a href="<?php echo e(route('flash-deals')); ?>"
                                class="fs-10 fs-md-12 fw-700 text-reset has-transition opacity-60 hov-opacity-100 hov-text-primary animate-underline-primary mr-3"><?php echo e(translate('View All Flash Sale')); ?></a>
                            <span class=" border-left border-soft-light border-width-2 pl-3">
                                <a href="<?php echo e(route('flash-deal-details', $flash_deal->slug)); ?>"
                                    class="fs-10 fs-md-12 fw-700 text-reset has-transition opacity-60 hov-opacity-100 hov-text-primary animate-underline-primary"><?php echo e(translate('View All Products from This Flash Sale')); ?></a>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Countdown for small device -->
                <div class="bg-white mb-3 d-md-none">
                    <div class="aiz-count-down-circle" end-date="<?php echo e(date('Y/m/d H:i:s', $flash_deal->end_date)); ?>"></div>
                </div>

                <div class="row gutters-5 gutters-md-16">
                    <!-- Flash Deals Baner & Countdown -->
                    <div class="flash-deals-baner col-xxl-4 col-lg-5 col-6 h-200px h-md-400px h-lg-475px">
                        <div class="h-100 w-100 w-xl-auto"
                            style="background-image: url('<?php echo e(uploaded_asset($flash_deal->banner)); ?>'); background-size: cover; background-position: center center;">
                            <div class="py-5 px-md-3 px-xl-5 d-none d-md-block">
                                <div class="bg-white">
                                    <div class="aiz-count-down-circle"
                                        end-date="<?php echo e(date('Y/m/d H:i:s', $flash_deal->end_date)); ?>"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Flash Deals Products -->
                    <div class="col-xxl-8 col-lg-7 col-6">
                        <?php
                            $flash_deal_products = get_flash_deal_products($flash_deal->id);
                        ?>
                        <div class="aiz-carousel border-top <?php if(count($flash_deal_products) > 8): ?> border-right <?php endif; ?> arrow-inactive-none arrow-x-0"
                            data-rows="2" data-items="5" data-xxl-items="5" data-xl-items="3.5" data-lg-items="3" data-md-items="2"
                            data-sm-items="2.5" data-xs-items="1.7" data-arrows="true" data-dots="false">
                            <?php $__currentLoopData = $flash_deal_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $flash_deal_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="carousel-box border-left border-bottom">
                                    <?php if($flash_deal_product->product != null && $flash_deal_product->product->published != 0): ?>
                                        <?php
                                            $product_url = route('product', $flash_deal_product->product->slug);
                                            if ($flash_deal_product->product->auction_product == 1) {
                                                $product_url = route('auction-product', $flash_deal_product->product->slug);
                                            }
                                        ?>
                                        <div
                                            class="h-100px h-md-200px h-lg-auto flash-deal-item position-relative text-center has-transition hov-shadow-out z-1">
                                            <a href="<?php echo e($product_url); ?>"
                                                class="d-block py-md-3 overflow-hidden hov-scale-img"
                                                title="<?php echo e($flash_deal_product->product->getTranslation('name')); ?>">
                                                <!-- Image -->
                                                <img src="<?php echo e(get_image($flash_deal_product->product->thumbnail)); ?>"
                                                    class="lazyload h-60px h-md-100px h-lg-140px mw-100 mx-auto has-transition"
                                                    alt="<?php echo e($flash_deal_product->product->getTranslation('name')); ?>"
                                                    onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                                                <!-- Price -->
                                                <div
                                                    class="fs-10 fs-md-14 mt-md-3 text-center h-md-48px has-transition overflow-hidden pt-md-4 flash-deal-price lh-1-5">
                                                    <span
                                                        class="d-block text-primary fw-700"><?php echo e(home_discounted_base_price($flash_deal_product->product)); ?></span>
                                                    <?php if(home_base_price($flash_deal_product->product) != home_discounted_base_price($flash_deal_product->product)): ?>
                                                        <del
                                                            class="d-block fw-400 text-secondary"><?php echo e(home_base_price($flash_deal_product->product)); ?></del>
                                                    <?php endif; ?>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Today's deal -->
    <div id="todays_deal"  class="mb-2 mb-md-3 mt-2 mt-md-3">

    </div>

    <!-- Featured Categories -->
    <?php if(count($featured_categories) > 0): ?>
        <section class="mb-2 mb-md-3 mt-2 mt-md-3">
            <div class="container">
                <div class="bg-white">
                    <!-- Top Section -->
                    <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between">
                        <!-- Title -->
                        <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0">
                            <span class=""><?php echo e(translate('Featured Categories')); ?></span>
                        </h3>
                        <!-- Links -->
                        <div class="d-flex">
                            <a class="text-blue fs-10 fs-md-12 fw-700 hov-text-primary animate-underline-primary"
                                href="<?php echo e(route('categories.all')); ?>"><?php echo e(translate('View All Categories')); ?></a>
                        </div>
                    </div>
                </div>
                <!-- Categories -->
                <div class="bg-white px-3">
                    <div class="row border-top border-right">
                        <?php $__currentLoopData = $featured_categories->take(6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $category_name = $category->getTranslation('name');
                        ?>
                            <div class="col-xl-4 col-md-6 border-left border-bottom py-3 py-md-2rem">
                                <div class="d-sm-flex text-center text-sm-left">
                                    <div class="mb-3">
                                        <img src="<?php echo e(isset($category->bannerImage->file_name) ? my_asset($category->bannerImage->file_name) : static_asset('assets/img/placeholder.jpg')); ?>"
                                            class="lazyload w-150px h-auto mx-auto has-transition"
                                            alt="<?php echo e($category->getTranslation('name')); ?>"
                                            onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                                    </div>
                                    <div class="px-2 px-lg-4">
                                        <h6 class="text-dark mb-0 text-truncate-2">
                                            <a class="text-reset fw-700 fs-14 hov-text-primary"
                                                href="<?php echo e(route('products.category', $category->slug)); ?>"
                                                title="<?php echo e($category_name); ?>">
                                                <?php echo e($category_name); ?>

                                            </a>
                                        </h6>
                                        <?php $__currentLoopData = $category->childrenCategories->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $child_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <p class="mb-0 mt-3">
                                                <a href="<?php echo e(route('products.category', $child_category->slug)); ?>" class="fs-13 fw-300 text-reset hov-text-primary animate-underline-primary">
                                                    <?php echo e($child_category->getTranslation('name')); ?>

                                                </a>
                                            </p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Banner section 1 -->
    <?php $homeBanner1Images = get_setting('home_banner1_images', null, $lang);   ?>
    <?php if($homeBanner1Images != null): ?>
        <div class="mb-2 mb-md-3 mt-2 mt-md-3">
            <div class="container">
                <?php
                    $banner_1_imags = json_decode($homeBanner1Images);
                    $data_md = count($banner_1_imags) >= 2 ? 2 : 1;
                    $home_banner1_links = get_setting('home_banner1_links', null, $lang);
                ?>
                <div class="w-100">
                    <div class="aiz-carousel gutters-16 overflow-hidden arrow-inactive-none arrow-dark arrow-x-15"
                        data-items="<?php echo e(count($banner_1_imags)); ?>" data-xxl-items="<?php echo e(count($banner_1_imags)); ?>"
                        data-xl-items="<?php echo e(count($banner_1_imags)); ?>" data-lg-items="<?php echo e($data_md); ?>"
                        data-md-items="<?php echo e($data_md); ?>" data-sm-items="1" data-xs-items="1" data-arrows="true"
                        data-dots="false">
                        <?php $__currentLoopData = $banner_1_imags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="carousel-box overflow-hidden hov-scale-img">
                                <a href="<?php echo e(isset(json_decode($home_banner1_links, true)[$key]) ? json_decode($home_banner1_links, true)[$key] : ''); ?>"
                                    class="d-block text-reset overflow-hidden">
                                    <img src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>"
                                        data-src="<?php echo e(uploaded_asset($value)); ?>" alt="<?php echo e(env('APP_NAME')); ?> promo"
                                        class="img-fluid lazyload w-100 has-transition"
                                        onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>';">
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Featured Products -->
    <div id="section_featured">

    </div>

    <!-- Banner Section 2 -->
    <?php $homeBanner2Images = get_setting('home_banner2_images', null, $lang);   ?>
    <?php if($homeBanner2Images != null): ?>
        <div class="mb-2 mb-md-3 mt-2 mt-md-3">
            <div class="container">
                <?php
                    $banner_2_imags = json_decode($homeBanner2Images);
                    $data_md = count($banner_2_imags) >= 2 ? 2 : 1;
                    $home_banner2_links = get_setting('home_banner2_links', null, $lang);
                ?>
                <div class="aiz-carousel gutters-16 overflow-hidden arrow-inactive-none arrow-dark arrow-x-15"
                    data-items="<?php echo e(count($banner_2_imags)); ?>" data-xxl-items="<?php echo e(count($banner_2_imags)); ?>"
                    data-xl-items="<?php echo e(count($banner_2_imags)); ?>" data-lg-items="<?php echo e($data_md); ?>"
                    data-md-items="<?php echo e($data_md); ?>" data-sm-items="1" data-xs-items="1" data-arrows="true"
                    data-dots="false">
                    <?php $__currentLoopData = $banner_2_imags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-box overflow-hidden hov-scale-img">
                            <a href="<?php echo e(isset(json_decode($home_banner2_links, true)[$key]) ? json_decode($home_banner2_links, true)[$key] : ''); ?>"
                                class="d-block text-reset overflow-hidden">
                                <img src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>"
                                    data-src="<?php echo e(uploaded_asset($value)); ?>" alt="<?php echo e(env('APP_NAME')); ?> promo"
                                    class="img-fluid lazyload w-100 has-transition"
                                    onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>';">
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Best Selling  -->
    <div id="section_best_selling">

    </div>

    <!-- New Products -->
    <div id="section_newest">

    </div>

    <!-- Banner Section 3 -->
    <?php $homeBanner3Images = get_setting('home_banner3_images', null, $lang);   ?>
    <?php if($homeBanner3Images != null): ?>
        <div class="mb-2 mb-md-3 mt-2 mt-md-3">
            <div class="container">
                <?php
                    $banner_3_imags = json_decode($homeBanner3Images);
                    $data_md = count($banner_3_imags) >= 2 ? 2 : 1;
                    $home_banner3_links = get_setting('home_banner3_links', null, $lang);
                ?>
                <div class="aiz-carousel gutters-16 overflow-hidden arrow-inactive-none arrow-dark arrow-x-15"
                    data-items="<?php echo e(count($banner_3_imags)); ?>" data-xxl-items="<?php echo e(count($banner_3_imags)); ?>"
                    data-xl-items="<?php echo e(count($banner_3_imags)); ?>" data-lg-items="<?php echo e($data_md); ?>"
                    data-md-items="<?php echo e($data_md); ?>" data-sm-items="1" data-xs-items="1" data-arrows="true"
                    data-dots="false">
                    <?php $__currentLoopData = $banner_3_imags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-box overflow-hidden hov-scale-img">
                            <a href="<?php echo e(isset(json_decode($home_banner3_links, true)[$key]) ? json_decode($home_banner3_links, true)[$key] : ''); ?>"
                                class="d-block text-reset overflow-hidden">
                                <img src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>"
                                    data-src="<?php echo e(uploaded_asset($value)); ?>" alt="<?php echo e(env('APP_NAME')); ?> promo"
                                    class="img-fluid lazyload w-100 has-transition"
                                    onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>';">
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Auction Product -->
    <?php if(addon_is_activated('auction')): ?>
        <div id="auction_products">

        </div>
    <?php endif; ?>

    <!-- Cupon -->
    <?php if(get_setting('coupon_system') == 1): ?>
        <div class="mb-2 mb-md-3 mt-2 mt-md-3"
            style="background-color: <?php echo e(get_setting('cupon_background_color', '#292933')); ?>">
            <div class="container">
                <div class="row py-5">
                    <div class="col-xl-8 text-center text-xl-left">
                        <div class="d-lg-flex">
                            <div class="mb-3 mb-lg-0">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="109.602" height="93.34" viewBox="0 0 109.602 93.34">
                                    <defs>
                                        <clipPath id="clip-pathcup">
                                            <path id="Union_10" data-name="Union 10" d="M12263,13778v-15h64v-41h12v56Z"
                                                transform="translate(-11966 -8442.865)" fill="none" stroke="#fff"
                                                stroke-width="2" />
                                        </clipPath>
                                    </defs>
                                    <g id="Group_24326" data-name="Group 24326"
                                        transform="translate(-274.201 -5254.611)">
                                        <g id="Mask_Group_23" data-name="Mask Group 23"
                                            transform="translate(-3652.459 1785.452) rotate(-45)"
                                            clip-path="url(#clip-pathcup)">
                                            <g id="Group_24322" data-name="Group 24322"
                                                transform="translate(207 18.136)">
                                                <g id="Subtraction_167" data-name="Subtraction 167"
                                                    transform="translate(-12177 -8458)" fill="none">
                                                    <path
                                                        d="M12335,13770h-56a8.009,8.009,0,0,1-8-8v-8a8,8,0,0,0,0-16v-8a8.009,8.009,0,0,1,8-8h56a8.009,8.009,0,0,1,8,8v8a8,8,0,0,0,0,16v8A8.009,8.009,0,0,1,12335,13770Z"
                                                        stroke="none" />
                                                    <path
                                                        d="M 12335.0009765625 13768.0009765625 C 12338.3095703125 13768.0009765625 12341.0009765625 13765.30859375 12341.0009765625 13762 L 12341.0009765625 13755.798828125 C 12336.4423828125 13754.8701171875 12333.0009765625 13750.8291015625 12333.0009765625 13746 C 12333.0009765625 13741.171875 12336.4423828125 13737.130859375 12341.0009765625 13736.201171875 L 12341.0009765625 13729.9990234375 C 12341.0009765625 13726.6904296875 12338.3095703125 13723.9990234375 12335.0009765625 13723.9990234375 L 12278.9990234375 13723.9990234375 C 12275.6904296875 13723.9990234375 12272.9990234375 13726.6904296875 12272.9990234375 13729.9990234375 L 12272.9990234375 13736.201171875 C 12277.5576171875 13737.1298828125 12280.9990234375 13741.1708984375 12280.9990234375 13746 C 12280.9990234375 13750.828125 12277.5576171875 13754.869140625 12272.9990234375 13755.798828125 L 12272.9990234375 13762 C 12272.9990234375 13765.30859375 12275.6904296875 13768.0009765625 12278.9990234375 13768.0009765625 L 12335.0009765625 13768.0009765625 M 12335.0009765625 13770.0009765625 L 12278.9990234375 13770.0009765625 C 12274.587890625 13770.0009765625 12270.9990234375 13766.412109375 12270.9990234375 13762 L 12270.9990234375 13754 C 12275.4111328125 13753.9990234375 12278.9990234375 13750.4111328125 12278.9990234375 13746 C 12278.9990234375 13741.5888671875 12275.41015625 13738 12270.9990234375 13738 L 12270.9990234375 13729.9990234375 C 12270.9990234375 13725.587890625 12274.587890625 13721.9990234375 12278.9990234375 13721.9990234375 L 12335.0009765625 13721.9990234375 C 12339.412109375 13721.9990234375 12343.0009765625 13725.587890625 12343.0009765625 13729.9990234375 L 12343.0009765625 13738 C 12338.5888671875 13738.0009765625 12335.0009765625 13741.5888671875 12335.0009765625 13746 C 12335.0009765625 13750.4111328125 12338.58984375 13754 12343.0009765625 13754 L 12343.0009765625 13762 C 12343.0009765625 13766.412109375 12339.412109375 13770.0009765625 12335.0009765625 13770.0009765625 Z"
                                                        stroke="none" fill="#fff" />
                                                </g>
                                            </g>
                                        </g>
                                        <g id="Group_24321" data-name="Group 24321"
                                            transform="translate(-3514.477 1653.317) rotate(-45)">
                                            <g id="Subtraction_167-2" data-name="Subtraction 167"
                                                transform="translate(-12177 -8458)" fill="none">
                                                <path
                                                    d="M12335,13770h-56a8.009,8.009,0,0,1-8-8v-8a8,8,0,0,0,0-16v-8a8.009,8.009,0,0,1,8-8h56a8.009,8.009,0,0,1,8,8v8a8,8,0,0,0,0,16v8A8.009,8.009,0,0,1,12335,13770Z"
                                                    stroke="none" />
                                                <path
                                                    d="M 12335.0009765625 13768.0009765625 C 12338.3095703125 13768.0009765625 12341.0009765625 13765.30859375 12341.0009765625 13762 L 12341.0009765625 13755.798828125 C 12336.4423828125 13754.8701171875 12333.0009765625 13750.8291015625 12333.0009765625 13746 C 12333.0009765625 13741.171875 12336.4423828125 13737.130859375 12341.0009765625 13736.201171875 L 12341.0009765625 13729.9990234375 C 12341.0009765625 13726.6904296875 12338.3095703125 13723.9990234375 12335.0009765625 13723.9990234375 L 12278.9990234375 13723.9990234375 C 12275.6904296875 13723.9990234375 12272.9990234375 13726.6904296875 12272.9990234375 13729.9990234375 L 12272.9990234375 13736.201171875 C 12277.5576171875 13737.1298828125 12280.9990234375 13741.1708984375 12280.9990234375 13746 C 12280.9990234375 13750.828125 12277.5576171875 13754.869140625 12272.9990234375 13755.798828125 L 12272.9990234375 13762 C 12272.9990234375 13765.30859375 12275.6904296875 13768.0009765625 12278.9990234375 13768.0009765625 L 12335.0009765625 13768.0009765625 M 12335.0009765625 13770.0009765625 L 12278.9990234375 13770.0009765625 C 12274.587890625 13770.0009765625 12270.9990234375 13766.412109375 12270.9990234375 13762 L 12270.9990234375 13754 C 12275.4111328125 13753.9990234375 12278.9990234375 13750.4111328125 12278.9990234375 13746 C 12278.9990234375 13741.5888671875 12275.41015625 13738 12270.9990234375 13738 L 12270.9990234375 13729.9990234375 C 12270.9990234375 13725.587890625 12274.587890625 13721.9990234375 12278.9990234375 13721.9990234375 L 12335.0009765625 13721.9990234375 C 12339.412109375 13721.9990234375 12343.0009765625 13725.587890625 12343.0009765625 13729.9990234375 L 12343.0009765625 13738 C 12338.5888671875 13738.0009765625 12335.0009765625 13741.5888671875 12335.0009765625 13746 C 12335.0009765625 13750.4111328125 12338.58984375 13754 12343.0009765625 13754 L 12343.0009765625 13762 C 12343.0009765625 13766.412109375 12339.412109375 13770.0009765625 12335.0009765625 13770.0009765625 Z"
                                                    stroke="none" fill="#fff" />
                                            </g>
                                            <g id="Group_24325" data-name="Group 24325">
                                                <rect id="Rectangle_18578" data-name="Rectangle 18578" width="8"
                                                    height="2" transform="translate(120 5287)" fill="#fff" />
                                                <rect id="Rectangle_18579" data-name="Rectangle 18579" width="8"
                                                    height="2" transform="translate(132 5287)" fill="#fff" />
                                                <rect id="Rectangle_18581" data-name="Rectangle 18581" width="8"
                                                    height="2" transform="translate(144 5287)" fill="#fff" />
                                                <rect id="Rectangle_18580" data-name="Rectangle 18580" width="8"
                                                    height="2" transform="translate(108 5287)" fill="#fff" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="ml-lg-3">
                                <h5 class="fs-36 fw-400 text-white mb-3"><?php echo e(translate(get_setting('cupon_title'))); ?></h5>
                                <h5 class="fs-20 fw-400 text-gray"><?php echo e(translate(get_setting('cupon_subtitle'))); ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 text-center text-xl-right mt-4">
                        <a href="<?php echo e(route('coupons.all')); ?>"
                            class="btn text-white hov-bg-white hov-text-dark border border-width-2 fs-16 px-4"
                            style="border-radius: 28px;background: rgba(255, 255, 255, 0.2);box-shadow: 0px 20px 30px rgba(0, 0, 0, 0.16);"><?php echo e(translate('View All Coupons')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Category wise Products -->
    <div id="section_home_categories" class="mb-2 mb-md-3 mt-2 mt-md-3">

    </div>

    <!-- Classified Product -->
    <?php if(get_setting('classified_product') == 1): ?>
        <?php
            $classified_products = get_home_page_classified_products(6);
        ?>
        <?php if(count($classified_products) > 0): ?>
            <section class="mb-2 mb-md-3 mt-2 mt-md-3">
                <div class="container">
                    <!-- Top Section -->
                    <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between">
                        <!-- Title -->
                        <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0">
                            <span class=""><?php echo e(translate('Classified Ads')); ?></span>
                        </h3>
                        <!-- Links -->
                        <div class="d-flex">
                            <a class="text-blue fs-10 fs-md-12 fw-700 hov-text-primary animate-underline-primary"
                                href="<?php echo e(route('customer.products')); ?>"><?php echo e(translate('View All Products')); ?></a>
                        </div>
                    </div>
                    <!-- Banner -->
                    <?php
                        $classifiedBannerImage = get_setting('classified_banner_image', null, $lang);
                        $classifiedBannerImageSmall = get_setting('classified_banner_image_small', null, $lang);
                    ?>
                    <?php if($classifiedBannerImage != null || $classifiedBannerImageSmall != null): ?>
                        <div class="mb-3 overflow-hidden hov-scale-img d-none d-md-block">
                            <img src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>"
                                data-src="<?php echo e(uploaded_asset($classifiedBannerImage)); ?>"
                                alt="<?php echo e(env('APP_NAME')); ?> promo" class="lazyload img-fit h-100 has-transition"
                                onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>';">
                        </div>
                        <div class="mb-3 overflow-hidden hov-scale-img d-md-none">
                            <img src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>"
                                data-src="<?php echo e($classifiedBannerImageSmall != null ? uploaded_asset($classifiedBannerImageSmall) : uploaded_asset($classifiedBannerImage)); ?>"
                                alt="<?php echo e(env('APP_NAME')); ?> promo" class="lazyload img-fit h-100 has-transition"
                                onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>';">
                        </div>
                    <?php endif; ?>
                    <!-- Products Section -->
                    <div class="bg-white">
                        <div class="row no-gutters border-top border-left">
                            <?php $__currentLoopData = $classified_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $classified_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div
                                    class="col-xl-4 col-md-6 border-right border-bottom has-transition hov-shadow-out z-1">
                                    <div class="aiz-card-box p-2 has-transition bg-white">
                                        <div class="row hov-scale-img">
                                            <div class="col-4 col-md-5 mb-3 mb-md-0">
                                                <a href="<?php echo e(route('customer.product', $classified_product->slug)); ?>"
                                                    class="d-block overflow-hidden h-auto h-md-150px text-center">
                                                    <img class="img-fluid lazyload mx-auto has-transition"
                                                        src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                                                        data-src="<?php echo e(isset($classified_product->thumbnail->file_name) ? my_asset($classified_product->thumbnail->file_name) : static_asset('assets/img/placeholder.jpg')); ?>"
                                                        alt="<?php echo e($classified_product->getTranslation('name')); ?>"
                                                        onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                                                </a>
                                            </div>
                                            <div class="col">
                                                <h3
                                                    class="fw-400 fs-14 text-dark text-truncate-2 lh-1-4 mb-3 h-35px d-none d-sm-block">
                                                    <a href="<?php echo e(route('customer.product', $classified_product->slug)); ?>"
                                                        class="d-block text-reset hov-text-primary"><?php echo e($classified_product->getTranslation('name')); ?></a>
                                                </h3>
                                                <div class="fs-14 mb-3">
                                                    <span
                                                        class="text-secondary"><?php echo e($classified_product->user ? $classified_product->user->name : ''); ?></span><br>
                                                    <span
                                                        class="fw-700 text-primary"><?php echo e(single_price($classified_product->unit_price)); ?></span>
                                                </div>
                                                <?php if($classified_product->conditon == 'new'): ?>
                                                    <span
                                                        class="badge badge-inline badge-soft-info fs-13 fw-700 p-3 text-info"
                                                        style="border-radius: 20px;"><?php echo e(translate('New')); ?></span>
                                                <?php elseif($classified_product->conditon == 'used'): ?>
                                                    <span
                                                        class="badge badge-inline badge-soft-danger fs-13 fw-700 p-3 text-danger"
                                                        style="border-radius: 20px;"><?php echo e(translate('Used')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Top Sellers -->
    <?php if(get_setting('vendor_system_activation') == 1): ?>
        <?php
            $best_selers = get_best_sellers(10);
        ?>
        <?php if(count($best_selers) > 0): ?>
        <section class="mb-2 mb-md-3 mt-2 mt-md-3">
            <div class="container">
                <!-- Top Section -->
                <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between">
                    <!-- Title -->
                    <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0">
                        <span class="pb-3"><?php echo e(translate('Top Sellers')); ?></span>
                    </h3>
                    <!-- Links -->
                    <div class="d-flex">
                        <a class="text-blue fs-10 fs-md-12 fw-700 hov-text-primary animate-underline-primary"
                            href="<?php echo e(route('sellers')); ?>"><?php echo e(translate('View All Sellers')); ?></a>
                    </div>
                </div>
                <!-- Sellers Section -->
                <div class="aiz-carousel arrow-x-0 arrow-inactive-none" data-items="5" data-xxl-items="5"
                    data-xl-items="4" data-lg-items="3.4" data-md-items="2.5" data-sm-items="2" data-xs-items="1.4"
                    data-arrows="true" data-dots="false">
                    <?php $__currentLoopData = $best_selers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($seller->user != null): ?>
                            <div
                                class="carousel-box h-100 position-relative text-center border-right border-top border-bottom <?php if($key == 0): ?> border-left <?php endif; ?> has-transition hov-animate-outline">
                                <div class="position-relative px-3" style="padding-top: 2rem; padding-bottom:2rem;">
                                    <!-- Shop logo & Verification Status -->
                                    <div class="position-relative mx-auto size-100px size-md-120px">
                                        <a href="<?php echo e(route('shop.visit', $seller->slug)); ?>"
                                            class="d-flex mx-auto justify-content-center align-item-center size-100px size-md-120px border overflow-hidden hov-scale-img"
                                            tabindex="0"
                                            style="border: 1px solid #e5e5e5; border-radius: 50%; box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.06);">
                                            <img src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>"
                                                data-src="<?php echo e(uploaded_asset($seller->logo)); ?>" alt="<?php echo e($seller->name); ?>"
                                                class="img-fit lazyload has-transition"
                                                onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>';">
                                        </a>
                                        <div class="absolute-top-right z-1 mr-md-2 mt-1 rounded-content bg-white">
                                            <?php if($seller->verification_status == 1): ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24.001" height="24"
                                                    viewBox="0 0 24.001 24">
                                                    <g id="Group_25929" data-name="Group 25929"
                                                        transform="translate(-480 -345)">
                                                        <circle id="Ellipse_637" data-name="Ellipse 637" cx="12"
                                                            cy="12" r="12" transform="translate(480 345)"
                                                            fill="#fff" />
                                                        <g id="Group_25927" data-name="Group 25927"
                                                            transform="translate(480 345)">
                                                            <path id="Union_5" data-name="Union 5"
                                                                d="M0,12A12,12,0,1,1,12,24,12,12,0,0,1,0,12Zm1.2,0A10.8,10.8,0,1,0,12,1.2,10.812,10.812,0,0,0,1.2,12Zm1.2,0A9.6,9.6,0,1,1,12,21.6,9.611,9.611,0,0,1,2.4,12Zm5.115-1.244a1.083,1.083,0,0,0,0,1.529l3.059,3.059a1.081,1.081,0,0,0,1.529,0l5.1-5.1a1.084,1.084,0,0,0,0-1.53,1.081,1.081,0,0,0-1.529,0L11.339,13.05,9.045,10.756a1.082,1.082,0,0,0-1.53,0Z"
                                                                transform="translate(0 0)" fill="#3490f3" />
                                                        </g>
                                                    </g>
                                                </svg>
                                            <?php else: ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24.001" height="24"
                                                    viewBox="0 0 24.001 24">
                                                    <g id="Group_25929" data-name="Group 25929"
                                                        transform="translate(-480 -345)">
                                                        <circle id="Ellipse_637" data-name="Ellipse 637" cx="12"
                                                            cy="12" r="12" transform="translate(480 345)"
                                                            fill="#fff" />
                                                        <g id="Group_25927" data-name="Group 25927"
                                                            transform="translate(480 345)">
                                                            <path id="Union_5" data-name="Union 5"
                                                                d="M0,12A12,12,0,1,1,12,24,12,12,0,0,1,0,12Zm1.2,0A10.8,10.8,0,1,0,12,1.2,10.812,10.812,0,0,0,1.2,12Zm1.2,0A9.6,9.6,0,1,1,12,21.6,9.611,9.611,0,0,1,2.4,12Zm5.115-1.244a1.083,1.083,0,0,0,0,1.529l3.059,3.059a1.081,1.081,0,0,0,1.529,0l5.1-5.1a1.084,1.084,0,0,0,0-1.53,1.081,1.081,0,0,0-1.529,0L11.339,13.05,9.045,10.756a1.082,1.082,0,0,0-1.53,0Z"
                                                                transform="translate(0 0)" fill="red" />
                                                        </g>
                                                    </g>
                                                </svg>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- Shop name -->
                                    <h2 class="fs-14 fw-700 text-dark text-truncate-2 h-40px mt-3 mt-md-4 mb-0 mb-md-3">
                                        <a href="<?php echo e(route('shop.visit', $seller->slug)); ?>"
                                            class="text-reset hov-text-primary" tabindex="0"><?php echo e($seller->name); ?></a>
                                    </h2>
                                    <!-- Shop Rating -->
                                    <div class="rating rating-mr-2 text-dark mb-3">
                                        <?php echo e(renderStarRating($seller->rating)); ?>

                                        <span class="opacity-60 fs-14">(<?php echo e($seller->num_of_reviews); ?>

                                            <?php echo e(translate('Reviews')); ?>)</span>
                                    </div>
                                    <!-- Visit Button -->
                                    <a href="<?php echo e(route('shop.visit', $seller->slug)); ?>" class="btn-visit">
                                        <span class="circle" aria-hidden="true">
                                            <span class="icon arrow"></span>
                                        </span>
                                        <span class="button-text"><?php echo e(translate('Visit Store')); ?></span>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Top Brands -->
    <?php if(get_setting('top_brands') != null): ?>
        <section class="mb-2 mb-md-3 mt-2 mt-md-3">
            <div class="container">
                <!-- Top Section -->
                <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between">
                    <!-- Title -->
                    <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0"><?php echo e(translate('Top Brands')); ?></h3>
                    <!-- Links -->
                    <div class="d-flex">
                        <a class="text-blue fs-10 fs-md-12 fw-700 hov-text-primary animate-underline-primary"
                            href="<?php echo e(route('brands.all')); ?>"><?php echo e(translate('View All Brands')); ?></a>
                    </div>
                </div>
                <!-- Brands Section -->
                <div class="bg-white px-3">
                    <div
                        class="row row-cols-xxl-6 row-cols-xl-6 row-cols-lg-4 row-cols-md-4 row-cols-3 gutters-16 border-top border-left">
                        <?php
                            $top_brands = json_decode(get_setting('top_brands'));
                            $brands = get_brands($top_brands);
                        ?>
                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div
                                class="col text-center border-right border-bottom hov-scale-img has-transition hov-shadow-out z-1">
                                <a href="<?php echo e(route('products.brand', $brand->slug)); ?>" class="d-block p-sm-3">
                                    <img src="<?php echo e(isset($brand->brandLogo->file_name) ? my_asset($brand->brandLogo->file_name) : static_asset('assets/img/placeholder.jpg')); ?>"
                                        class="lazyload h-100 h-md-100px mx-auto has-transition p-2 p-sm-4 mw-100"
                                        alt="<?php echo e($brand->getTranslation('name')); ?>"
                                        onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                                    <p class="text-center text-dark fs-12 fs-md-14 fw-700 mt-2">
                                        <?php echo e($brand->getTranslation('name')); ?>

                                    </p>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/demo4axiz/public_html/Oronnomart/resources/views/frontend/classic/index.blade.php ENDPATH**/ ?>