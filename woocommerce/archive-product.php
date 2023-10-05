<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

$cat = get_term_by( 'slug', get_query_var('product_cat'), 'product_cat' );
$cat_id = $cat->term_id;
?>
            <section class="poster poster-var2">        
                <div class="poster__pic">
                    <img class="poster__pic-img" src="<?php 
                    if (get_field("cat-banner", 'term_' . $cat_id)) {
                        the_field("cat-banner", 'term_' . $cat_id);
                    } else {
                        echo '/wp-content/uploads/2023/06/gostinaja.png';
                    }
                    ?>" alt="Фото">
                </div> 
				<div class="poster__block layout">
					<h1 class="poster__block-subtitle title"><?php 
                    if (get_field("cat-banner", 'term_' . $cat_id)) {
                        woocommerce_page_title();
                    } else {
                        echo "Каталог";
                    } ?></h1>
				</div>
			</section>
            <div class="catalog__breads layout">
                <?php echo woocommerce_breadcrumb();?>
            </div>
                <?php 
                    $args = array(
                        'taxonomy'     => 'product_cat',
                        'child_of'     => 0,
                        'parent'       => $cat_id,
                        'orderby'      => 'name',
                        'order'        => 'ASC',
                        'hide_empty'   => 1,
                        'hierarchical' => 1,
                        // 'number'       => 0, // сколько выводить?
                        // полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
                    );
                
                    $categories = get_categories( $args );
                    if( $categories ){
                        ?>
                         <section style="display: flex;" class="cats layout hide-scroll">
                        <?php
                        foreach( $categories as $sub_cat ){
                            ?>
                            <a style="display:block;" href="<?php echo get_category_link( $sub_cat->term_id );?>" class="cats__button button-2">
                                <?php echo $sub_cat->name;?>
                            </a>
                            <?php
                        }
                        ?>
                          </section>
                        <?php
                    }
                ?>
            <section class="catalog layout">
            <?php
            if ( woocommerce_product_loop() ) {
                ?>
                <style>
                    .catalog__pre-top-products {
                        position: static;
                    }
                    .wfpDescription {
                        display: none;
                    }
                    .wfpTitle {
                        color: #000;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 500;
                        line-height: normal;
                    }
                    div.wfpTitle.wfpClickable {
                        color: #000;
                        font-size: 16px;
                        font-style: normal;
                        font-weight: 500;
                        line-height: normal;
                        margin-bottom: 10px;
                    }
                    div.wpfFilterTitle i.wpfTitleToggle::before {
                        content: "";
                        background-image: url("data:image/svg+xml,%3Csvg width='12' height='12' viewBox='0 0 12 12' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0.428711 8.7002L5.70014 3.42877C5.73862 3.38777 5.78509 3.35509 5.83669 3.33276C5.88828 3.31042 5.94391 3.29889 6.00014 3.29889C6.05637 3.29889 6.11199 3.31042 6.16359 3.33276C6.21519 3.35509 6.26166 3.38777 6.30014 3.42877L11.5716 8.7002' stroke='black' stroke-width='0.857143' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E%0A");
                        width: 12px;
                        height: 12px;
                        transition: transform .4s ease;
                    }
                    div.wpfFilterTitle i.wpfTitleToggle.fa-minus::before {
                        transform: rotate(-180deg);
                    }
                    ul.wpfFilterVerScroll li {
                        margin-bottom: 16px;
                    }
                    span.wpfCurrencySymbol,span.wpfFilterDelimeter {
                        display: none;
                    }
                    div.wpfPriceInputs input.wpfPriceRangeField {
                        border: 1px solid #BFBFBF !important;
                        border-radius: 0 !important;
                        background-color: #fff !important;
                        text-align: center;
                        color: #000 !important;
                        font-size: 16px !important;
                        font-style: normal !important;
                        font-weight: 400 !important;
                        line-height: normal !important;
                        letter-spacing: 0.16px;
                        min-width: 128px !important;
                    }
                    .wpfFilterWrapper[data-filter-type="wpfPrice"] div.wpfFilterContent {
                        padding-left: 0;
                        padding-right: 0;
                    }
                    div.wpfPriceInputs {
                        justify-content: space-between !important;
                    }
                    #wpfSliderRange {
                        max-width: calc(100% - 14px);
                        margin-left: 10px;
                    }
                    .ui-slider.ui-widget-content:not(.iris-slider-offset) {
                        height: 2px;
                        border: none !important;
                        background-color: #BFBFBF !important;
                    }
                    div.ui-widget-header {
                        background-color: #9A8873 !important;
                    }
                    div.ui-slider.ui-widget-content span.ui-slider-handle {
                        width: 14px;
                        height: 14px;
                        border-radius: 100px !important;
                        border: none !important;
                        background-color: #9A8873 !important;
                    }
                    .wpfFilterVerScroll::-webkit-scrollbar-track {
                        border: none !important;
                        background-color: transparent !important;
                    }
                    .wpfFilterVerScroll::-webkit-scrollbar-thumb {
                        border: none !important;

                    }
                    .wpfFilterButtons {
                        display: flex;
                        justify-content: center;
                    }
                    button.wpfClearButton.wpfButton {
                        margin: 0;
                        padding: 0;
                        color: #BFBFBF;
                        font-size: 14px;
                        font-style: normal;
                        font-weight: 500;
                        line-height: normal;
                        background: none;
                        text-transform: none !important;
                        border-bottom: 1px solid;
                        min-height: auto;
                        width: max-content;
                    }
                    [data-maxvalue="0"],[data-maxvalue="1"] {
                        display: none;
                    }
                    div.wpfPreview {
                        margin: 0;
                        display: flex;
                        justify-content: flex-start;
                    }
                    ul.products .spinner, .la-spinner, .wpfIconPreview .spinner, .wpfLoaderIconTemplate .spinner, .woobewoo-filter-loader.spinner {
                        animation: rotate-center 0.6s linear infinite both !important;
                        background: url("http://ideecasainterior.ru/wp-content/uploads/2023/07/loading-svgrepo-com-2.svg") no-repeat !important;
                        background-size: 100% 100% !important;
                    }
                   
                    @keyframes rotate-center {
                    0% {
                        transform: rotate(0);
                    }
                    100% {
                        transform: rotate(360deg);
                    }
                    }
                </style>
                <div class="catalog__pre">
                    <div class="catalog__pre-top">
                        <div class="catalog__filter">
                            <div class="catalog__filter-inner">
                                <div class="catalog__filter-top">
                                    <h3 class="catalog__filter-top-title title-2">
                                        Фильтр
                                    </h3>
                                    <button type="button" class="catalog__filter-top-close">
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="19.8937" height="1.28347" transform="matrix(0.70831 0.705902 -0.70831 0.705902 0.90918 0)" fill="#070605"/>
                                    <rect width="19.8937" height="1.28347" transform="matrix(0.70831 -0.705902 0.70831 0.705902 0 14.0938)" fill="#070605"/>
                                    </svg>
                                    </button>
                                </div>
                                <div class="catalog__filter-body hide-scroll">
                                    <?php echo do_shortcode('[wpf-filters id=1]');?>
                                </div>
                            </div>
                        </div>
                        <div class="catalog__pre-top-btns">
                        <button class="catalog__filter-btn">
                                <svg class="catalog__filter-btn-svg" width="15" height="15" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_605_978)">
                                    <path d="M2.00012 3.5C2.82855 3.5 3.50012 2.82843 3.50012 2C3.50012 1.17157 2.82855 0.5 2.00012 0.5C1.17169 0.5 0.500122 1.17157 0.500122 2C0.500122 2.82843 1.17169 3.5 2.00012 3.5Z" stroke="black" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M3.50012 2H13.5001" stroke="black" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M7.00012 8.5C7.82855 8.5 8.50012 7.82843 8.50012 7C8.50012 6.17157 7.82855 5.5 7.00012 5.5C6.17169 5.5 5.50012 6.17157 5.50012 7C5.50012 7.82843 6.17169 8.5 7.00012 8.5Z" stroke="black" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M0.500244 7H5.50024" stroke="black" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8.50012 7H13.5001" stroke="black" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.0001 13.5C12.8285 13.5 13.5001 12.8284 13.5001 12C13.5001 11.1716 12.8285 10.5 12.0001 10.5C11.1717 10.5 10.5001 11.1716 10.5001 12C10.5001 12.8284 11.1717 13.5 12.0001 13.5Z" stroke="black" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10.5002 12H0.500244" stroke="black" stroke-width="0.7" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_605_978">
                                    <rect width="14" height="14" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            <span class="catalog__filter-btn-text title-4">
                                Фильтр
                            </span>
                        </button>
                        <div class="catalog__sort">
                            <div class="dropdown js-dropdown">
                                <button class="catalog__filter-btn catalog__filter-btn--right catalog__filter-btn--icon-right js-select-current" data-val="popularity">
                                    <span class="catalog__filter-btn-text title-4">
                                        Популярное
                                    </span>
                                    <svg class="catalog__filter-btn-svg" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.428711 3.30005L5.70014 8.57148C5.73862 8.61248 5.78509 8.64515 5.83669 8.66749C5.88828 8.68983 5.94391 8.70135 6.00014 8.70135C6.05637 8.70135 6.11199 8.68983 6.16359 8.66749C6.21519 8.64515 6.26166 8.61248 6.30014 8.57148L11.5716 3.30005" stroke="black" stroke-width="0.857143" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                                <ul class="dropdown__list">
                                    <li class="dropdown__list-item">
                                        <button type="button" class="js-select-sort catalog__filter-btn catalog__filter-btn-text title-4" data-val="popularity">
                                        <span class="catalog__filter-btn-text title-4">
                                        Популярное
                                        </span>
                                        </button>
                                    </li>
                                    <li class="dropdown__list-item">
                                        <button type="button" class="js-select-sort catalog__filter-btn catalog__filter-btn-text title-4" data-val="date">
                                        <span class="catalog__filter-btn-text title-4">
                                        По новизне
                                        </span>
                                        </button>
                                    </li>
                                    <li class="dropdown__list-item">
                                        <button type="button" class="js-select-sort catalog__filter-btn catalog__filter-btn-text title-4" data-val="price-desc">
                                        <span class="catalog__filter-btn-text title-4">
                                        Цена по возрастанию
                                        </span>
                                        </button>
                                    </li>
                                    <li class="dropdown__list-item">
                                        <button type="button" class="js-select-sort catalog__filter-btn" data-val="price">
                                        <span class="catalog__filter-btn-text title-4">
                                            Цена по убыванию
                                        </span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        </div>
                        <h4 class="catalog__pre-top-products title-4">
                            <?php woocommerce_result_count();?>
                        </h4>
                    </div>
                    <!-- <div class="catalog__pre-tags">
                        <ul class="catalog__pre-tags-list hide-scroll">
                            <li class="catalog__pre-tags-item">
                                <button class="catalog__pre-tags-btn">
                                    <span class="text-gray4">
                                        Бежевый
                                    </span>
                                    <div class="catalog__pre-tags-pic">
                                        <img class="catalog__pre-tags-pic-svg" src="<?php echo ic_image_directory()?>catalog-tags-x.svg" alt="">
                                    </div>
                                </button>
                            </li>
                            <li class="catalog__pre-tags-item">
                                <button class="catalog__pre-tags-btn">
                                    <span class="text-gray4">
                                        Замша
                                    </span>
                                    <div class="catalog__pre-tags-pic">
                                        <img class="catalog__pre-tags-pic-svg" src="<?php echo ic_image_directory()?>catalog-tags-x.svg" alt="">
                                    </div>
                                </button>
                            </li>
                            <li class="catalog__pre-tags-item">
                                <button class="catalog__pre-tags-btn">
                                    <span class="text-gray4">
                                        Цена от 600.000 до 3.000.000
                                    </span>
                                    <div class="catalog__pre-tags-pic">
                                        <img class="catalog__pre-tags-pic-svg" src="<?php echo ic_image_directory()?>catalog-tags-x.svg" alt="">
                                    </div>
                                </button>
                            </li>
                            <li class="catalog__pre-tags-item">
                                <button class="catalog__pre-tags-btn">
                                    <span class="text-gray4">
                                        Коричневый
                                    </span>
                                    <div class="catalog__pre-tags-pic">
                                        <img class="catalog__pre-tags-pic-svg" src="<?php echo ic_image_directory()?>catalog-tags-x.svg" alt="">
                                    </div>
                                </button>
                            </li>
                        </ul>
                    </div> -->
                </div>
                <?php
                    if ( wc_get_loop_prop( 'total' ) ) {
                        ?> 
                        <ul class="catalog__list">
                            <?php
                                while ( have_posts() ) {
                                    the_post();

                                    do_action( 'woocommerce_shop_loop' );

                                    wc_get_template_part( 'content', 'product' );
                                }
                            ?>
                        </ul>
                        <?php
                    }
                ?>
    <?php

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}


/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
// do_action( 'woocommerce_after_main_content' );
?>
</section>

<? get_footer( 'shop' );
