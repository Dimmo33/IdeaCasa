<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="shop_table woocommerce-checkout-review-order-table">

<div class="ordering__price ordering__price--php">
                        <div class="ordering__price-total">
                            <h2 class="ordering__price-total-left title-2">
                                Итого
                            </h2>
                            <h3 class="ordering__price-total-right title-3">
                                <?php echo WC()->cart->get_total()?>
                            </h3>
                        </div>
                        <div class="ordering__price-total ordering__price-total--var2">
                            <p class="ordering__price-total-left text">
                            <?php
                                $cart_count = WC()->cart->cart_contents_count;

                                if ($cart_count == 1) {
                                    echo '1 товар';
                                }

                                if ($cart_count > 1 and $cart_count < 5) {
                                    echo $cart_count.' товара';
                                }

                                if ($cart_count >= 5) {
                                    echo $cart_count.' товаров';
                                }
                                ?> на сумму
                            </p>
                            <p class="ordering__price-total-right text">
                                <?php echo WC()->cart->get_total()?>
                            </p>
                        </div>
                    </div>
        <div style="display: none;">

       
		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
			<?php wc_cart_totals_shipping_html(); ?>
		<?php endif; ?>

        </div>

		<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

        

		<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

</div>