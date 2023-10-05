<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 6.1.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$attribute_keys  = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>
<style>
    .variations_form.cart {
        height: 100%;
    }
    .variations_form.cart > div {
        height: 100%;
    display: flex;
    flex-direction: column;
    }
    .single_variation_wrap {
        margin-top: auto;
    }
</style>
<form class="variations_form cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<table class="variations" cellspacing="0">
			<tbody>
				<?php foreach ( $attributes as $attribute_name => $options ) : ?>
					<tr>

						<td class="value">
							<?php
								wc_dropdown_variation_attribute_options(
									array(
										'options'   => $options,
										'attribute' => $attribute_name,
										'product'   => $product,
									)
								);
							?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?php do_action( 'woocommerce_after_variations_table' ); ?>

		<div class="single_variation_wrap">
			<?php
				/**
				 * Hook: woocommerce_before_single_variation.
				 */
				do_action( 'woocommerce_before_single_variation' );

				/**
				 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
				 *
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				// do_action( 'woocommerce_single_variation' );
                woocommerce_single_variation();

                if ($product->get_price() > 1) {
                    ?>
                        <!-- <div class="woocommerce-variation-price">
                            <span class="price"><del aria-hidden="true"><span class="woocommerce-Price-amount amount"><bdi><?php echo $product->get_price();?>&nbsp;<span class="woocommerce-Price-currencySymbol">₽</span></bdi></span> </del><span class="woocommerce-Price-amount amount">&nbsp;<?php echo $product->get_sale_price();?>&nbsp;<span class="woocommerce-Price-currencySymbol">₽</span></span></span>
                        </div>
                        <style>
                            .woocommerce-variation.single_variation:has(.price) + .woocommerce-variation-price {
                                display: none !important;
                            }
                        </style> -->
                    <?php
                    woocommerce_template_single_price();
                    woocommerce_single_variation_add_to_cart_button();
                    ideecasa_pre_order_block();
                } else {
                    ?> 
                        <button type="button" class="pre-order-btn js-pre-order-popup-toggle" data-name="<?php echo $product->get_name();?>" data-sku="<?php echo $product->get_sku();?>">Узнать стоимость</button>
                        <?php ideecasa_pre_order_block(); ?>
                    <?php
                }

				/**
				 * Hook: woocommerce_after_single_variation.
				 */
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>
	<?php else : ?>
		<table class="variations" cellspacing="0">
			<tbody>
				<?php foreach ( $attributes as $attribute_name => $options ) : ?>
					<tr>

						<td class="value">
							<?php
								wc_dropdown_variation_attribute_options(
									array(
										'options'   => $options,
										'attribute' => $attribute_name,
										'product'   => $product,
									)
								);
							?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?php do_action( 'woocommerce_after_variations_table' ); ?>

		<div class="single_variation_wrap">
			<?php
				/**
				 * Hook: woocommerce_before_single_variation.
				 */
				do_action( 'woocommerce_before_single_variation' );

				/**
				 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
				 *
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				// do_action( 'woocommerce_single_variation' );
                woocommerce_single_variation();

                if ($product->get_price() > 1) {
                    ?>
                        <!-- <div class="woocommerce-variation-price">
                            <span class="price">
                                <?php 
                                    if ($product->get_variation_sale_price( 'min', true ) > 1) {
                                        ?>
                                         <del aria-hidden="true">
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi>
                                                    <?php  echo $product->get_variation_regular_price( 'min', true );?>&nbsp;<span class="woocommerce-Price-currencySymbol">₽</span>
                                                </bdi>
                                            </span> 
                                        </del>
                                        <span class="woocommerce-Price-amount amount">&nbsp;<?php echo $product->get_variation_sale_price( 'min', true );?>&nbsp;<span class="woocommerce-Price-currencySymbol">₽</span>
                                        </span>
                                        <?php
                                    } else {
                                        ?>
                                        <span class="woocommerce-Price-amount amount">&nbsp;<?php echo $product->get_price();?>&nbsp;<span class="woocommerce-Price-currencySymbol">₽</span>
                                        </span>
                                        <?php
                                    }
                                ?>
                            </span>
                        </div>
                        <style>
                            .woocommerce-variation.single_variation:has(.price) + .woocommerce-variation-price {
                                display: none !important;
                            }
                        </style> -->
                    <?php
                    woocommerce_template_single_price();
                    woocommerce_single_variation_add_to_cart_button();
                    ideecasa_pre_order_block();
                } else {
                    ?> 
                        <button type="button" class="pre-order-btn js-pre-order-popup-toggle" data-name="<?php echo $product->get_name();?>" data-sku="<?php echo $product->get_sku();?>">Узнать стоимость</button>
                        <?php ideecasa_pre_order_block(); ?>
                    <?php
                }

				/**
				 * Hook: woocommerce_after_single_variation.
				 */
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<?php
do_action( 'woocommerce_after_add_to_cart_form' );