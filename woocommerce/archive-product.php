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
                    the_field("cat-banner", 'term_' . $cat_id);
                    ?>" alt="Фото">
                </div> 
				<div class="poster__block layout">
					<h1 class="poster__block-subtitle title"> <?php woocommerce_page_title(); ?></h1>
				</div>
			</section>
			<section class="cats layout hide-scroll">
				<button class="cats__button button-2">
					Кровати
				</button>
				<button class="cats__button button-2">
					Гардеробы
				</button>
				<button class="cats__button button-2">
					Шкафы
				</button>
				<button class="cats__button button-2">
					Прикроватные столики
				</button>
			</section>
            <section class="catalog layout">
        <!-- <?php echo woocommerce_breadcrumb();?> -->
            <?php
            if ( woocommerce_product_loop() ) {
                ?>
                <div class="catalog__pre">
                    <div class="catalog__pre-top">
                        <h4 class="catalog__pre-top-products title-4">
                            <?php woocommerce_result_count();?>
                        </h4>
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
                        <button class="catalog__filter-btn catalog__filter-btn--right catalog__filter-btn--icon-right">
                            <span class="catalog__filter-btn-text title-4">
                                Популярное
                            </span>
                            <svg class="catalog__filter-btn-svg" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.428711 3.30005L5.70014 8.57148C5.73862 8.61248 5.78509 8.64515 5.83669 8.66749C5.88828 8.68983 5.94391 8.70135 6.00014 8.70135C6.05637 8.70135 6.11199 8.68983 6.16359 8.66749C6.21519 8.64515 6.26166 8.61248 6.30014 8.57148L11.5716 3.30005" stroke="black" stroke-width="0.857143" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                    <div class="catalog__pre-tags">
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
                    </div>
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
