<?php $__env->startSection('content'); ?>
    <style>
        @media (max-width: 767px){
            #flash_deal .flash-deals-baner{
                height: 203px !important;
            }
        }

        /* Card Styling */
        .category-card {
            position: relative;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }
        .category-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }

        /* Child Categories Styling */
        .child-category-container {
            display: none;
            top: 100%;
            left: 0;
            z-index: 10;
            transition: opacity 0.3s ease, transform 0.3s ease;
            transform: translateY(10px);
            opacity: 0;
            background: #ffffff;
            border: 1px solid #f1f1f1;
            border-radius: 0 0 8px 8px;
            overflow: hidden;
        }
        .category-card:hover .child-category-container {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        /* Links */
        .child-category-container a {
            border-bottom: 1px solid #f1f1f1;
            color: #333;
            text-decoration: none;
        }
        .child-category-container a:last-child {
            border-bottom: none;
        }
        .child-category-container a:hover {
            background-color: #f8f9fa;
            color: #007bff;
        }

    </style>

    <div  class="bg-light shadow-sm">
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

    
    <?php if(get_setting('home_banner1_images') != null): ?>
    <div class="mb-2">
        <div class="container">
            <div class="row gutters-10">
                <?php $banner_1_imags = json_decode(get_setting('home_banner1_images')); ?>
                <?php $__currentLoopData = $banner_1_imags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl col-md-6">
                        <div class="mb-3 mb-lg-0">
                            <a href="<?php echo e(json_decode(get_setting('home_banner1_links'), true)[$key]); ?>" class="d-block text-reset">
                                <img src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>" data-src="<?php echo e(uploaded_asset($banner_1_imags[$key])); ?>" alt="<?php echo e(env('APP_NAME')); ?> promo" class="img-fluid lazyload w-100">
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>


    
    <?php
        $flash_deal = \App\Models\FlashDeal::where('status', 1)->where('featured', 1)->first();
    ?>
    <?php if($flash_deal != null && strtotime(date('Y-m-d H:i:s')) >= $flash_deal->start_date && strtotime(date('Y-m-d H:i:s')) <= $flash_deal->end_date): ?>
    <section class="mb-2">
        <div class="container">
            <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">

                <div class="d-flex flex-wrap mb-3 align-items-baseline border-bottom">
                    <h3 class="h5 fw-700 mb-0">
                        <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block"><?php echo e(translate('Flash Sale')); ?></span>
                    </h3>
                    <div class="aiz-count-down ml-auto ml-lg-3 align-items-center" data-date="<?php echo e(date('Y/m/d H:i:s', $flash_deal->end_date)); ?>"></div>
                    <a href="<?php echo e(route('flash-deal-details', $flash_deal->slug)); ?>" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md w-100 w-md-auto"><?php echo e(translate('View More')); ?></a>
                </div>

                <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'>
                    <?php $__currentLoopData = $flash_deal->flash_deal_products->take(20); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $flash_deal_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $product = \App\Models\Product::find($flash_deal_product->product_id);
                        ?>
                        <?php if($product != null && $product->published != 0): ?>
                            <div class="carousel-box">
                               
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Today's deal -->
    <div id="todays_deal"  class="mb-2 mb-md-3 mt-2 mt-md-3">

    </div>

    <?php if(count($featured_categories) > 0): ?>
    <section class="mb-4 mt-4">
        <div class="container">
            <div class="bg-light rounded shadow-sm py-4 px-3">
                <!-- Top Section -->
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h3 class="fs-20 fs-md-24 fw-bold text-primary mb-0 text-shadow-sm">
                        <span><?php echo e(translate('Featured Categories')); ?></span>
                    </h3>
                    <a class="text-blue fs-12 fs-md-14 fw-bold text-decoration-none animate-underline-primary hov-text-primary"
                        href="<?php echo e(route('categories.all')); ?>">
                        <?php echo e(translate('View All Categories')); ?>

                    </a>
                </div>
                <!-- Categories -->
                <div class="bg-white rounded px-3 px-md-4 py-4 shadow">
                    <div class="row g-3">
                        <?php $__currentLoopData = $featured_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $category_name = $category->getTranslation('name');
                        ?>
                        <div class="col-xl-4 col-md-6">
                            <div class="card h-100 border-0 shadow-sm rounded overflow-hidden position-relative category-card">
                                <div class="d-flex flex-column text-center text-md-start">
                                    <!-- Image -->
                                    <div class="overflow-hidden">
                                        <img src="<?php echo e(isset($category->bannerImage->file_name) ? my_asset($category->bannerImage->file_name) : static_asset('assets/img/placeholder.jpg')); ?>"
                                            class="lazyload w-100 has-transition rounded-top"
                                            alt="<?php echo e($category->getTranslation('name')); ?>"
                                            onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';"
                                            style="max-height: 150px; object-fit: cover; transition: transform 0.3s ease;">
                                    </div>
                                    <!-- Text -->
                                    <div class="px-3 px-md-4 py-3">
                                        <h6 class="text-dark fw-bold mb-2 text-truncate">
                                            <a class="text-reset fs-16 hov-text-primary"
                                                href="<?php echo e(route('products.category', $category->slug)); ?>"
                                                title="<?php echo e($category_name); ?>">
                                                <?php echo e($category_name); ?>

                                            </a>
                                        </h6>
                                    </div>
                                </div>
                                <!-- Subcategories -->
                                <div class="position-absolute w-100 bg-white border rounded shadow-sm child-category-container">
                                    <?php $__currentLoopData = $category->childrenCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('products.category', $child_category->slug)); ?>"
                                    class="d-block px-3 py-2 text-reset hov-text-primary fs-14">
                                        <?php echo e($child_category->getTranslation('name')); ?>

                                    </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>


    
    <div id="section_home_categories">

    </div>

    <!-- End Shop Location  -->

    
    <div id="section_featured">

    </div>

    
    <div id="section_best_selling">

    </div>

    <!-- Auction Product -->
    <?php if(addon_is_activated('auction')): ?>
        <div id="auction_products">

        </div>
    <?php endif; ?>



    
    <?php if(get_setting('home_banner2_images') != null): ?>
    <div class="mb-2">
        <div class="container">
            <div class="row gutters-10">
                <?php $banner_2_imags = json_decode(get_setting('home_banner2_images')); ?>
                <?php $__currentLoopData = $banner_2_imags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl col-md-6">
                        <div class="mb-3 mb-lg-0">
                            <a href="<?php echo e(json_decode(get_setting('home_banner2_links'), true)[$key]); ?>" class="d-block text-reset">
                                <img src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>" data-src="<?php echo e(uploaded_asset($banner_2_imags[$key])); ?>" alt="<?php echo e(env('APP_NAME')); ?> promo" class="img-fluid lazyload w-100">
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    

    
    <?php if(get_setting('classified_product') == 1): ?>
        <?php
            $classified_products = \App\Models\CustomerProduct::where('status', '1')->where('published', '1')->take(10)->get();
        ?>
           <?php if(count($classified_products) > 0): ?>
               <section class="mb-2">
                   <div class="container">
                       <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                            <div class="d-flex mb-3 align-items-baseline border-bottom">
                                <h3 class="h5 fw-700 mb-0">
                                    <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block"><?php echo e(translate('Classified Ads')); ?></span>
                                </h3>
                                <a href="<?php echo e(route('customer.products')); ?>" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md"><?php echo e(translate('View More')); ?></a>
                            </div>
                           <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'>
                               <?php $__currentLoopData = $classified_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $classified_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <div class="carousel-box">
                                        <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                                            <div class="position-relative">
                                                <a href="<?php echo e(route('customer.product', $classified_product->slug)); ?>" class="d-block">
                                                    <img
                                                        class="img-fit lazyload mx-auto h-140px h-md-210px"
                                                        src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                                                        data-src="<?php echo e(uploaded_asset($classified_product->thumbnail_img)); ?>"
                                                        alt="<?php echo e($classified_product->getTranslation('name')); ?>"
                                                        onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';"
                                                    >
                                                </a>
                                                <div class="absolute-top-left pt-2 pl-2">
                                                    <?php if($classified_product->conditon == 'new'): ?>
                                                       <span class="badge badge-inline badge-success"><?php echo e(translate('new')); ?></span>
                                                    <?php elseif($classified_product->conditon == 'used'): ?>
                                                       <span class="badge badge-inline badge-danger"><?php echo e(translate('Used')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="p-md-3 p-2 text-left">
                                                <div class="fs-15 mb-1">
                                                    <span class="fw-700 text-primary"><?php echo e(single_price($classified_product->unit_price)); ?></span>
                                                </div>
                                                <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                                    <a href="<?php echo e(route('customer.product', $classified_product->slug)); ?>" class="d-block text-reset"><?php echo e($classified_product->getTranslation('name')); ?></a>
                                                </h3>
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

    
    <?php if(get_setting('home_banner3_images') != null): ?>
    <div class="mb-2">
        <div class="container">
            <div class="row gutters-10">
                <?php $banner_3_imags = json_decode(get_setting('home_banner3_images')); ?>
                <?php $__currentLoopData = $banner_3_imags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl col-md-6">
                        <div class="mb-3 mb-lg-0">
                            <a href="<?php echo e(json_decode(get_setting('home_banner3_links'), true)[$key]); ?>" class="d-block text-reset">
                                <img src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>" data-src="<?php echo e(uploaded_asset($banner_3_imags[$key])); ?>" alt="<?php echo e(env('APP_NAME')); ?> promo" class="img-fluid lazyload w-100">
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    
    <!-- <div id="section_best_sellers">

    </div> -->
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


    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function(){
            $.post('<?php echo e(route('home.section.featured')); ?>', {_token:'<?php echo e(csrf_token()); ?>'}, function(data){
                $('#section_featured').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('<?php echo e(route('home.section.best_selling')); ?>', {_token:'<?php echo e(csrf_token()); ?>'}, function(data){
                $('#section_best_selling').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('<?php echo e(route('home.section.auction_products')); ?>', {_token:'<?php echo e(csrf_token()); ?>'}, function(data){
                $('#auction_products').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('<?php echo e(route('home.section.home_categories')); ?>', {_token:'<?php echo e(csrf_token()); ?>'}, function(data){
                $('#section_home_categories').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('<?php echo e(route('home.section.best_sellers')); ?>', {_token:'<?php echo e(csrf_token()); ?>'}, function(data){
                $('#section_best_sellers').html(data);
                AIZ.plugins.slickCarousel();
            });
        });

    $(document).ready(function() {
        $('.category-nav-element').hover(
            function() {
                $(this).find('.sub-menu').stop(true, true).fadeIn(200); 
            },
            function() {
                $(this).find('.sub-menu').stop(true, true).fadeOut(200); 
            }
        );
    });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp8.2.12\htdocs\Oronnomart\resources\views/frontend/classic/index.blade.php ENDPATH**/ ?>