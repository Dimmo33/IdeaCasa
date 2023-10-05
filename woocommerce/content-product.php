<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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
$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
$product_id = $product->get_id();
$photos_ids = $product->get_gallery_image_ids();
$brand = $product->get_attribute('brend');

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li class="catalog__list-item">
    <a href="<?php echo $link;?>" class="prp">
        <span class="prp__pic" <?php 
            if (get_field('razmer_skidki')) {
                ?>data-price="<?php echo '-'.get_field('razmer_skidki').'%';?>"<?php
            }        
        ?>>
            <img class="prp__pic-img" src="<?php echo $p_image_url?>" alt="Фото" <?php 
            $prpSize = get_field('prp-size', $product_id);
            if ($prpSize) {
                echo 'style="object-fit: cover;"';
            }
        ?>>
        </span>
        <span class="prp__text">
            <span class="prp__text-top">
                <span class="prp__text-brand text">
                    <?php echo $brand;?>
                </span>
                <span class="prp__text-price text">
                    <?php  
                        if ($product->get_price() > 1) {
                            woocommerce_template_single_price();
                        }
                    ?>
                </span>
            </span>
            <span class="prp__text-wrap">
                <span class="prp__text-subtitle title-3">
                    <?php 
                    
                        echo $product->get_name();
                    ?>
                </span>
            </span>
        </span>
    </a>
</li>
