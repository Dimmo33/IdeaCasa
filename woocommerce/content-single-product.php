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
    .woocommerce-variation-description,.woocommerce-variation-availability,.woocommerce-variation-add-to-cart .quantity,.woo-variation-gallery-thumbnail-wrapper {
        display: none !important;
    }

    .variations {
        margin-top: 12px;
        margin-bottom: 24px;
    }

    .woo-variation-gallery-trigger {
        opacity: 0;
    }

    .single_add_to_cart_button {
        background-color: #9A8873;
        border: none;
        color: #FFF;
        font-size: 16px;
        font-weight: 500;
        padding: 8px 24px;
        cursor: pointer;
        transition: background-color .3s ease;
    }

    .single_add_to_cart_button:hover {
        background-color: #766756;
    }

    .woo-variation-swatches .color-variable-item {
        width: 60px !important;
        height: 16px !important;
        border-radius: 0 !important;
        border-bottom: 1px solid #E3E3E3 !important;
        box-shadow: none !important;
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

    @media screen and (max-width: 1000px) {
        
    }


</style>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
    <section class="pr"> 
            <div class="pr__breads layout">
                <?php echo woocommerce_breadcrumb();?>
            </div>
            <div class="pr__top">
                <div class="pr__top-content">
                    <p class="pr__top-pre-title brand">
                        <?php echo $brand;?>
                    </p>
                    <h1 class="pr__top-title title">
                        <?php echo $product->get_name();?>
                    </h1>
                    <p class="pr__top-subtitle">
                        <?php
                            $cat_id =$product->get_category_ids()[0];
                            the_field('cat-name', 'term_' . $cat_id); 
                            echo ' ';
                            echo $product->get_name();
                            echo ' ';
                            echo $brand;
                        ?>
                    </p>
                    <?php
                        /**
                         * Hook: woocommerce_single_product_summary.
                         *
                         * @hooked woocommerce_template_single_title - 5
                         * @hooked woocommerce_template_single_rating - 10
                         * @hooked woocommerce_template_single_price - 10
                         * @hooked woocommerce_template_single_excerpt - 20
                         * @hooked woocommerce_template_single_add_to_cart - 30
                         * @hooked woocommerce_template_single_meta - 40
                         * @hooked woocommerce_template_single_sharing - 50
                         * @hooked WC_Structured_Data::generate_product_data() - 60
                         */
                        // do_action( 'woocommerce_single_product_summary' );
                        // woocommerce_template_single_add_to_cart();
                        // woocommerce_template_single_title();
                        // woocommerce_template_single_meta();
                        woocommerce_template_single_add_to_cart();
                    ?>
                </div>
                <div class="pr__top-short-desc">
                    <p>
                        Настенная вешалка Appendialbero от Foppapedretti состоит из блока с тремя ручками для
                        подвешивания курток и пальто, который можно свободно дополнить, поставив рядом еще несколько
                        блоков, напоминающих по форме ветви дерева.
                    </p>
                    <br>
                    <p>
                        Настенная вешалка Appendialbero от Foppapedretti состоит из блока с тремя ручками.
                    </p>
                </div>
                <div class="pr__slider-preview">
                    <img src="<?php echo $p_image_url;?>" alt="Фото" class="pr__slider-preview-img">
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
    </section>
</div>