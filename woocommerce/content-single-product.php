<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$p_image_url = wp_get_attachment_url( $product->get_image_id());
$product_id = $product->get_id();
$photos_ids = $product->get_gallery_image_ids();
$brand = $product->get_attribute('brend');

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<style>
    .poster__pic {
        height: 80vh;
        max-height: 800px;
    }
    
    @media screen and (max-width: 1600px) {
        .poster__pic {
            height: 550px;
        }
    }

    @media screen and (max-width: 550px) {
        .poster__pic {
            height: 300px;
        }
    }
    .woocommerce-variation-description,.woocommerce-variation-availability,.woocommerce-variation-add-to-cart .quantity,.woo-variation-gallery-thumbnail-wrapper {
        display: none !important;
    }

    .variations {
        margin-top: 12px;
        margin-bottom: 12px;
    }

    /* .woo-variation-gallery-trigger {
        opacity: 0;
    } */

    .single_add_to_cart_button, .pre-order-btn {
        background-color: #9A8873;
        border: none;
        color: #FFF;
        font-size: 16px;
        font-weight: 500;
        padding: 8px 24px;
        cursor: pointer;
        transition: background-color .3s ease;
        margin-top: 12px;
        width: 100%;
    }

    .pre-order-btn {
        margin-top: 22px;
        height: 39px;
    }
    
    @media screen and (max-width: 920px) {
        .pre-order-btn {
        margin-top: 22px;
    }
    }

    .single_add_to_cart_button:hover,.pre-order-btn:hover {
        background-color: #766756;
    }

    .woo-variation-swatches .color-variable-item {
        width: 60px !important;
        height: 22px !important;
        border-radius: 0 !important;
        border-bottom: 1px solid #E3E3E3 !important;
        box-shadow: none !important;
        padding: 0 !important;
        padding-bottom: 6px !important;
    }

    .woo-variation-swatches .color-variable-item[title="White"] .variable-item-contents {
        box-shadow: var(--wvs-item-box-shadow,0 0 0 1px #a8a8a8) !important;
    }

    .woo-variation-swatches .color-variable-item.selected {
        border-bottom: 1px solid #000 !important;
    }

    .variable-item-contents::before {
        display: none !important;
    }

    .added_to_cart {
        display: none;
    }

    .woo-variation-gallery-wrapper .woo-variation-gallery-trigger {
        width: 24px;
        height: 24px;
        opacity: 0;
        transition: opacity .3s ease;
        background: none;
    }

    .woo-variation-gallery-wrapper:hover .woo-variation-gallery-trigger {
        opacity: 1;
    }

    @media screen and (max-width: 1000px) {
        .single_add_to_cart_button {
            width: 100%;
        }
    }


</style>

<?php 
    $prpSize = get_field('prp-size', $product_id);
    if ($prpSize) {
        ?>
            <!-- <style>
                .pr__slider-preview-img,.pr__slider-wrap .wvg-single-gallery-image-container img {
                    object-fit: cover;
                }
            </style> -->
        <?php
    }
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

<?php 
    if (get_field('prp-preview-pic')) {
        ?>
        <section class="poster poster-var3">
            <div class="poster__pic">
                <img class="poster__pic-img" src="<?php the_field('prp-preview-pic');?>" alt="Фото">
            </div>
        </section>
        <?php
    }
?>
    <section class="pr <?php 
        if (!get_field('prp-preview-pic')) {
            echo 'pr--no-preview';
        }
    ?>"> 
            <div class="pr__breads layout">
                <?php echo woocommerce_breadcrumb();?>
            </div>
            <div class="pr__top layout">
                <div class="pr__top-content">
                    <p class="pr__top-pre-title brand">
                        <?php echo $brand;?>
                    </p>
                    <h1 class="pr__top-title title">
                    <?php
                            // $cat_id =$product->get_category_ids()[0];
                            // the_field('cat-name', 'term_' . $cat_id); 
                            the_field('pr-text-before');
                            // echo $product->get_name();
                            // the_field('pr-text-before');
                        ?>
                    </h1>
                    <p class="pr__top-subtitle">
                    <?php echo $product->get_name();?>
                    </p>
                    <?php woocommerce_template_single_add_to_cart(); ?>
                </div>
                <div class="pr__slider-wrap">
                    <?php
                        /**
                         * Hook: woocommerce_before_single_product_summary.
                         *
                         * @hooked woocommerce_show_product_sale_flash - 10
                         * @hooked woocommerce_show_product_images - 20
                         */
                        // do_action( 'woocommerce_before_single_product_summary' );
                        // do_action('woocommerce_show_product_images');
                        // woocommerce_show_product_images();
                        wc_get_template( 'single-product/product-images.php' );
                    ?>
                </div>
            </div>
            <div class="pr__desc layout">
                <?php echo $product->get_description();?>
                <div class="pr__links">
                    <? if( get_field('pr-files') ): ?>

                        <?php while( has_sub_field('pr-files') ): ?>
                            <a href="<?php the_sub_field('pr-files-item'); ?>" class="pr__links-item" target="_blank">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_2729_1779)">
                                    <path d="M5.07178 7.92859L8.50035 11.3572L11.9289 7.92859" stroke="#9A8873" stroke-width="1.14286" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8.5 1.07129V11.357" stroke="#9A8873" stroke-width="1.14286" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M4.5 15.9286H12.5" stroke="#9A8873" stroke-width="1.14286" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_2729_1779">
                                    <rect width="16" height="16" fill="white" transform="translate(0.5 0.5)"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
<?php the_sub_field('pr-files-item-name'); ?>
                            </a>

                        <?php endwhile; ?>

                    <?php endif; ?>
                    <?php 
                        $br_values = get_the_terms( $product->id, 'pa_brend');


                        if ($br_values) {
                            foreach ( $br_values as $value ) {
                                if (get_field('b-brand', $value->taxonomy .'_'. $value->term_id)) {
                                ?>
                                 <a href="<?php the_field('b-brand', $value->taxonomy .'_'. $value->term_id); ?>" class="pr__links-item" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-0.5 -0.5 14 14" height="14" width="14"><g id="color-swatches--color-colors-design-painting-palette-sample-swatch"><path id="Vector" stroke="#9a8873" stroke-linecap="round" stroke-linejoin="round" d="M1.3928571428571428 0.4642857142857143h2.7857142857142856c0.2462757142857143 0 0.48245785714285716 0.09783150000000002 0.6566021428571429 0.27197207142857144C5.009308571428572 0.9103992857142857 5.107142857142858 1.1465814285714286 5.107142857142858 1.3928571428571428V10.214285714285715c0 0.6156428571428572 -0.24457642857142858 1.2061214285714286 -0.6799278571428572 1.6415285714285714C3.991863571428572 12.29112857142857 3.401394285714286 12.535714285714286 2.7857142857142856 12.535714285714286v0c-0.30485 0 -0.6067192857142858 -0.060078571428571426 -0.8883735714285714 -0.17670714285714287 -0.28164500000000003 -0.11662857142857143 -0.5375592857142858 -0.2876714285714286 -0.7531271428571429 -0.5031928571428572C0.7088639999999999 11.420407142857144 0.4642857142857143 10.829928571428573 0.4642857142857143 10.214285714285715V1.3928571428571428c0 -0.2462757142857143 0.09783150000000002 -0.48245785714285716 0.27197207142857144 -0.6565993571428572C0.9103992857142857 0.5621172142857144 1.1465814285714286 0.4642857142857143 1.3928571428571428 0.4642857142857143v0Z" stroke-width="1"></path><path id="Vector_2" stroke="#9a8873" stroke-linecap="round" stroke-linejoin="round" d="m5.107161428571429 4.642857142857143 3.25 -3.2685714285714287c0.17397714285714286 -0.17294642857142858 0.4093235714285714 -0.27001928571428574 0.6546428571428571 -0.27001928571428574s0.4807028571428572 0.09707285714285714 0.6546242857142858 0.27001928571428574l1.9592857142857143 1.9685714285714286c0.17299285714285714 0.17397714285714286 0.27002857142857145 0.40933285714285716 0.27002857142857145 0.6546428571428571 0 0.2453192857142857 -0.09703571428571428 0.4806657142857143 -0.27002857142857145 0.6546428571428571l-7.19641 7.2057142857142855" stroke-width="1"></path><path id="Vector_3" stroke="#9a8873" stroke-linecap="round" stroke-linejoin="round" d="M8.357142857142858 7.892857142857143h3.25c0.24625714285714287 0 0.48248571428571424 0.09783428571428571 0.6565928571428571 0.2719692857142857 0.17410714285714285 0.17414428571428572 0.27197857142857146 0.4103264285714286 0.27197857142857146 0.6566021428571429v2.7857142857142856c0 0.24625714285714287 -0.09787142857142857 0.48248571428571424 -0.27197857142857146 0.6565928571428571s-0.4103357142857143 0.27197857142857146 -0.6565928571428571 0.27197857142857146H2.7857142857142856" stroke-width="1"></path><path id="Vector_4" stroke="#9a8873" stroke-linecap="round" stroke-linejoin="round" d="M0.4642857142857143 4.178571428571429h4.642857142857143" stroke-width="1"></path><path id="Vector_5" stroke="#9a8873" stroke-linecap="round" stroke-linejoin="round" d="M0.4642857142857143 7.892857142857143h4.642857142857143" stroke-width="1"></path></g></svg>
                                        Варианты отделок <?php echo $value->name;?>
                                </a>
                                <?php }
                            }
                        }
                    ?>

                </div>
            </div>
            <?php
                $checkPrat = get_field('prat-check');

                /*
                *  Перебираем Повторитель
                */

                if ($checkPrat) {
                    if( get_field('prat') ): ?>
                        <div class="pr__chars layout">
                            <h2 class="pr__chars-title title-2">
                                Цены и варианты
                            </h2>
                            <div class="pr__chars-content">
                                <div class="pr__chars-vars">
                                    
                                    <?php while( has_sub_field('prat') ): ?>
                                        <div class="pr__chars-vars-item">
                                            <p class="pr__chars-vars-item-name">
                                            <?php the_sub_field('prat-title'); ?></p>
                                            <p class="pr__chars-vars-item-cost">
                                                от 
                                            <?php the_sub_field('prat-cost'); ?> ₽</p>
                                            <div class="pr__chars-vars-item-pic">
                                                <img src="<?php the_sub_field('prat-icon'); ?>" alt="Фото" />
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif;
                }
            ?>
            <?php $attributes = $product->get_attributes();
                if (count($attributes) > 1 or get_field('pr-tech-docs')) {
                    ?>
                        <div class="pr__chars layout">
                            <h2 class="pr__chars-title title-2">
                                Характеристики
                            </h2>
                            <div class="pr__chars-content">
                                <?php 
                                    $checkPhoto = get_field('tech-file-or-link');
                                ?>
                                <?php if ( have_rows('pr-tech-docs') ) : ?>
                                
                                    <?php while( have_rows('pr-tech-docs') ) : the_row(); ?>
                                
                                        <div class="pr__chars-content-pic">
                                                <img src=" <?php 
                                                if ($checkPhoto) {
                                                    the_sub_field('pr-tech-docs-img-file');
                                                } else {
                                                    the_sub_field('pr-tech-docs-img');
                                                } ?>" alt="Фото" class="pr__chars-content-img">
                                            </div>
                                
                                    <?php endwhile; ?>
                                
                                <?php endif; ?>
                                
                                <ul class="pr__chars-list">
                                    <?php 
                                        $attributes = $product->get_attributes();
                                        foreach ( $attributes as $attribute ) {
                                            $values = wc_get_product_terms( $product->id, $attribute['name'], array( 'fields' => 'names' ) );
                                            if (wc_attribute_label($attribute['name']) !== "Бренд") {
                                                ?>
                                                    <li class="pr__chars-list-item">
                                                        <div class="pr__chars-list-item-name">
                                                        <?php echo wc_attribute_label($attribute['name']);?>:
                                                        </div>
                                                        <div class="pr__chars-list-item-value">
                                                            <?php
                                                                echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );
                                                            ?>
                                                        </div>
                                                    </li>
                                                <?php
                                            }
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    <?php
                }
            ?>
           
                <?php
                    $checkVars = get_field('pr-vars-toggle');
                    $checkAcc = get_field('pr-vars-acc');

                    if ($checkVars && !$checkAcc) {
                        ?>
                         <div class="pr__chars layout">
                            <h2 class="pr__chars-title title-2">
                                Варианты отделки
                            </h2>
                            <div class="pr__chars-content">
                                <div class="pr__chars-table">
                                    <h3 class="pr__chars-table-title title-3">
                                        <?php the_field('pr-vars-title');?>
                                    </h3>
                                    <ul class="pr__chars-table-list">
                                        <?php
                                            if( get_field('pr-vars') ): ?>

                                                <?php while( has_sub_field('pr-vars') ): ?>
                                                    <li class="pr__chars-table-list-item">
                                                        <div>
                                                            <img src="<?php the_sub_field('pr-vars-pic'); ?>" alt="Фото">
                                                        </div>
                                                        <p class="text"><?php the_sub_field('pr-vars-name'); ?></p>
                                                    </li>

                                                <?php endwhile; ?>

                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php
                    } 
                    if ($checkVars && $checkAcc) {
?>
<div class="pr__chars layout">
    <h2 class="pr__chars-title title-2">
        Варианты отделки
    </h2>
    <div class="pr__chars-content">
    <?php

    $repeater = get_field('pr-acc');

    foreach( $repeater as $item ) {	
        ?>
        <div class="pr__chars-acc">
            <h3 class="pr__chars-acc-title title-3">
                <?php echo $item['pr-acc-title'];  ?>
            </h3>
            <div class="pr__chars-acc-wrap">
                <ul class="pr__chars-acc-list">
                <?php
                    foreach ( $item['pr-acc-list'] as $subitem ) {
                            ?>
                            <li class="pr__chars-acc-list-item">
                        <button type="button" class="title-3"><?php echo $subitem['pr-acc-list-title'];  ?><svg width="12" height="12"
                                viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.428589 3.30005L5.70002 8.57148C5.73849 8.61248 5.78497 8.64515 5.83656 8.66749C5.88816 8.68983 5.94379 8.70135 6.00002 8.70135C6.05624 8.70135 6.11187 8.68983 6.16347 8.66749C6.21507 8.64515 6.26154 8.61248 6.30002 8.57148L11.5714 3.30005"
                                    stroke="#BFBFBF" stroke-width="0.857143" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </button>
                        <ul>
                            <?php 
                                foreach ( $subitem['pr-acc-list-item'] as $subsubitem ) {  
                                    ?>
                                     <li>
                                        <div>
                                            <img src="<?php echo $subsubitem['pr-acc-list-item-pic']; ?>" alt="Фото">
                                        </div>
                                        <p class="brand">
                                            <?php echo $subsubitem['pr-acc-list-item-text']; ?>
                                        </p>
                                    </li>
                                    <?php   
                              }
                            ?>
                        </ul>
                    </li>
                            <?php    
                    }
                ?>
                </ul>
            </div>
        </div>
        <?php
    }
    ?>
    </div>
</div>
                <?php
                    }
                ?>
    </section>
    <section class="prs layout js-prs js-prs-1">
        <div class="prs__top">
            <h2 class="prs__title title-2">Рекомендуемые товары</h2>
            <div class="prs__controls">
                <div class="swiper-button-prev"><svg width="9" height="15" viewBox="0 0 9 15" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7.875 0.535645L1.28571 7.12493C1.23447 7.17303 1.19362 7.23112 1.1657 7.29561C1.13778 7.36011 1.12337 7.42965 1.12337 7.49993C1.12337 7.57021 1.13778 7.63975 1.1657 7.70425C1.19362 7.76874 1.23447 7.82683 1.28571 7.87493L7.875 14.4642"
                            stroke="#070605" stroke-width="1.07143" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="prs__fraction js-prs-fraction"></div>
                <div class="swiper-button-next">
                    <svg width="9" height="15" viewBox="0 0 9 15" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.125 0.535645L7.71429 7.12493C7.76553 7.17303 7.80638 7.23112 7.8343 7.29561C7.86222 7.36011 7.87663 7.42965 7.87663 7.49993C7.87663 7.57021 7.86222 7.63975 7.8343 7.70425C7.80638 7.76874 7.76553 7.82683 7.71429 7.87493L1.125 14.4642"
                            stroke="#070605" stroke-width="1.07143" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="prs__slider js-prs-slider">
            <div class='swiper-wrapper'>
                <?php render_prs_related();?>
            </div>
        </div>
    </section>
</div>