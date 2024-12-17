<div class="aiz-category-menu bg-white rounded-0 border-top" id="category-sidebar" style="width:270px; position: relative;">
    <ul class="list-unstyled categories no-scrollbar mb-0 text-left">
        @foreach (get_level_zero_categories()->take(10) as $category)
            @php
                $category_name = $category->getTranslation('name');
            @endphp
            <li class="category-nav-element border border-top-0 position-relative" data-id="{{ $category->id }}">
                <a href="{{ route('products.category', $category->slug) }}" class="text-truncate text-dark px-4 fs-14 d-block hov-column-gap-1">
                    <img class="cat-image lazyload mr-2 opacity-60" 
                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                        data-src="{{ isset($category->catIcon->file_name) ? my_asset($category->catIcon->file_name) : static_asset('assets/img/placeholder.jpg') }}" 
                        width="16" alt="{{ $category_name }}"
                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                    <span class="cat-name has-transition">{{ $category_name }}</span>
                </a>

                <!-- Sub-category submenu that appears on hover -->
                @if(count(\App\Utility\CategoryUtility::get_immediate_children_ids($category->id)) > 0)
                    <ul class="sub-menu" style="display: none;">
                        @foreach (\App\Utility\CategoryUtility::get_immediate_children_ids($category->id) as $childCategoryId)
                            @php
                                $childCategory = \App\Models\Category::find($childCategoryId);
                                $childCategoryName = $childCategory->getTranslation('name');
                            @endphp
                            <li class="category-nav-element border border-top-0">
                                <a href="{{ route('products.category', $childCategory->slug) }}" class="text-truncate text-dark px-4 fs-14 d-block hov-column-gap-1">
                                    <img class="cat-image lazyload mr-2 opacity-60" 
                                         src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                         data-src="{{ isset($childCategory->catIcon->file_name) ? my_asset($childCategory->catIcon->file_name) : static_asset('assets/img/placeholder.jpg') }}" 
                                         width="16" alt="{{ $childCategoryName }}"
                                         onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                    <span class="cat-name has-transition">{{ $childCategoryName }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
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

