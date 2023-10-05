<?php /* Template Name: Корзина и оформление заказа */ ?>
<?php get_header();?>
<?php $countTotal = WC()->cart->get_cart_contents_count(); ?>
<style>
    .woocommerce-error {
        display: none !important;
    }
    .quantity.wac-quantity {
        display: flex;
        align-items:center;
    }
    .wac-qty-button {
        font-size: 0;
        padding: 0;
        margin: 0;
        min-width: 12px;
        width: 12px;
        height: 12px;
        display: block;
        background-image: url("data:image/svg+xml,%3Csvg width='12' height='12' viewBox='0 0 12 12' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0.427734 6H11.5706' stroke='%23E3E3E3' stroke-width='0.857143' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E%0A");
        background-size: 100% 100%;
        border: none;
    }
    .wac-qty-button.wac-btn-inc {
        background-image: url("data:image/svg+xml,%3Csvg width='12' height='12' viewBox='0 0 12 12' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cg clip-path='url(%23clip0_646_3744)'%3E%3Cpath d='M5.99902 0.462891V11.6057' stroke='%23E3E3E3' stroke-width='0.857143' stroke-linecap='round' stroke-linejoin='round'/%3E%3Cpath d='M0.427734 6H11.5706' stroke='%23E3E3E3' stroke-width='0.857143' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/g%3E%3Cdefs%3E%3CclipPath id='clip0_646_3744'%3E%3Crect width='12' height='12' fill='white'/%3E%3C/clipPath%3E%3C/defs%3E%3C/svg%3E%0A");
    }
    .quantity.wac-quantity .input-text {
        color: #070605;
        font-size: 16px;
        width: 100%;
        display: block;
        border: none;
        text-align: -webkit-center;
        text-align: center;
        appearance: none;
    }
    .quantity.wac-quantity .input-text::-webkit-outer-spin-button,
    .quantity.wac-quantity .input-text::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
    }
    .shop_table .quantity {
        min-width: auto;
    }
    .coupon,button[name="update_cart"] {
        display: none;
    }
    #payment,#customer_details,#order_review_heading,.woocommerce-form-coupon-toggle {
        display: none;
    }
    .woocommerce-notices-wrapper {
        opacity: 0;
        width: 0;
        height: 0;
        pointer-events: none;
    }
</style>

<?php 
    if ($countTotal == 0) {
        ?>
            <style>
                .poster-var3 {
                    margin-bottom: 0 !important;
                }
                .poster__pic {
                    height: 80vh;
                }
            </style>
        <?php
    }
?>

<section class="poster poster-var3">
    <div class="poster__pic">
        <img class="poster__pic-img" src="<?php ic_image_directory();?>ordering-poster.jpg" alt="Фото">
    </div>
    <div class="poster__block layout">
        <h1 class="poster__block-subtitle title">
        <?php 
            if ($countTotal == 0) {
                echo "Корзина пуста";
            } else {
                echo "Оформление заказа";
            }
        ?></h1>
    </div>
</section>
<?php 
    if ($countTotal > 0) {
        ?>
        <section class="ordering">
            <div class="layout">
                <a class="ordering__return" href="/">
                    <svg class="ordering__return-svg" width="12" height="12" viewBox="0 0 12 12" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_643_3128)">
                            <path
                                d="M8.7002 0.428467L3.42877 5.6999C3.38777 5.73837 3.35509 5.78484 3.33276 5.83644C3.31042 5.88804 3.29889 5.94367 3.29889 5.9999C3.29889 6.05612 3.31042 6.11175 3.33276 6.16335C3.35509 6.21495 3.38777 6.26142 3.42877 6.2999L8.70019 11.5713"
                                stroke="#BFBFBF" stroke-width="0.857143" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_643_3128">
                                <rect width="12" height="12" fill="white" transform="translate(12) rotate(90)" />
                            </clipPath>
                        </defs>
                    </svg>
                    <p class="ordering__return-text text">
                        Вернуться назад
                    </p>
                </a>
                <h2 class="ordering__delivery-subtitle title-2">
                    Товары в корзине
                </h2>
                <div class="ordering__body">
                    <div class="ordering__body-column-1">
                        <div class="ordering__body-cart">
                            <?php do_action( 'woocommerce_before_cart' );?>
                            
                            <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
                                <?php do_action( 'woocommerce_before_cart_table' ); ?>
                                <div class="shop_table shop_table_responsive cart woocommerce-cart-form__contents">
                                    <?php do_action( 'woocommerce_before_cart_contents' ); ?>

                                    <?php
                                    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                        $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                        $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                            $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                            $brand = $_product->get_attribute('brend');
                                            $p_image_url = wp_get_attachment_url( $_product->get_image_id());
                                            ?>
                                            <div class="prp-2 woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
                                                <div class="prp-2__pic">
                                                    <img class="prp-2__pic-img" src="<?php echo $p_image_url;?>" alt="Фото">
                                                </div>
                                                <div class="prp-2__content">
                                                    <p class="prp-2__content-brand text">
                                                        <?php echo $brand;?>
                                                    </p>
                                                    <a style="display:block;" href="<?php echo $product_permalink;?>" class="prp-2__content-subtitle title-3">
                                                        <?php echo $_product->get_name();?>
                                                    </a>
                                                    <p class="prp-2__content-price text">
                                                        <?php echo $_product->get_price();?> ₽
                                                    </p>
                                                    <div class="prp-2__content-container">
                                                        <?php
                                                        if ( $_product->is_sold_individually() ) {
                                                            $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                                        } else {
                                                            $product_quantity = woocommerce_quantity_input(
                                                                array(
                                                                    'input_name'   => "cart[{$cart_item_key}][qty]",
                                                                    'input_value'  => $cart_item['quantity'],
                                                                    'max_value'    => $_product->get_max_purchase_quantity(),
                                                                    'min_value'    => '0',
                                                                    'product_name' => $_product->get_name(),
                                                                ),
                                                                $_product,
                                                                false
                                                            );
                                                        }
                                                        echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                                                        ?>
                                                    </div>
                                                </div>
                                                <?php
                                                    echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                                        'woocommerce_cart_item_remove_link',
                                                        sprintf(
                                                            '<a href="%s" class="prp-2__btn-close remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">
                                                                <span class="prp-2__btn-close-pic">
                                                                <svg class="prp-2__btn-close-pic-img" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="19.8937" height="1.28347" transform="matrix(0.70831 0.705902 -0.70831 0.705902 0.90918 0.000244141)" fill="#BFBFBF"/>
                                                                <rect width="19.8937" height="1.28347" transform="matrix(0.70831 -0.705902 0.70831 0.705902 0 14.094)" fill="#BFBFBF"/>
                                                                </svg>
                                                            </span>
                                                            </a>',
                                                            esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                            esc_html__( 'Remove this item', 'woocommerce' ),
                                                            esc_attr( $product_id ),
                                                            esc_attr( $_product->get_sku() )
                                                        ),
                                                        $cart_item_key
                                                    );
                                                ?>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>

                                <?php do_action( 'woocommerce_cart_contents' ); ?>
                                <?php if ( wc_coupons_enabled() ) { ?>
                                    <div class="coupon">
                                        <label for="coupon_code"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
                                        <?php do_action( 'woocommerce_cart_coupon' ); ?>
                                    </div>
                                <?php } ?>

                                <button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

                                <?php do_action( 'woocommerce_cart_actions' ); ?>

                                <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
                    
                                <?php do_action( 'woocommerce_after_cart_contents' ); ?>

                                <?php do_action( 'woocommerce_after_cart_table' ); ?>
                            </form>
                            <?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

                            <div class="cart-collaterals">
                                <?php
                                    /**
                                     * Cart collaterals hook.
                                     *
                                     * @hooked woocommerce_cross_sell_display
                                     * @hooked woocommerce_cart_totals - 10
                                     */
                                    do_action( 'woocommerce_cart_collaterals' );
                                ?>
                            </div>

                            <?php do_action( 'woocommerce_after_cart' ); ?>
                        </div>
                        <div class="ordering__delivery">
                            <h2 class="ordering__delivery-subtitle title-2">
                                Способ доставки
                            </h2>
                            <ul class="ordering__delivery-list">
                                <li class="ordering__delivery-list-item active">
                                    <button class="ordering__delivery-list-item-content">
                                        <span class="ordering__delivery-list-item-content-subtitle title-4">
                                            Доставка мебели
                                        </span>
                                        <span class="ordering__delivery-list-item-content-text text">
                                            от 1000₽
                                        </span>
                                    </button>
                                </li>
                                <li class="ordering__delivery-list-item">
                                    <button class="ordering__delivery-list-item-content">
                                        <span class="ordering__delivery-list-item-content-subtitle title-4">
                                            Доставка аксессуаров
                                        </span>
                                        <span class="ordering__delivery-list-item-content-text text">
                                            от 1000₽
                                        </span>
                                    </button>
                                </li>
                                <li class="ordering__delivery-list-item">
                                    <button class="ordering__delivery-list-item-content">
                                        <span class="ordering__delivery-list-item-content-subtitle title-4">
                                            Доставка СДЭК
                                        </span>
                                        <span class="ordering__delivery-list-item-content-text text">
                                            Бесплатно*
                                        </span>
                                    </button>
                                </li>
                            </ul>
                            <p class="ordering__delivery-text text">
                                Стоимость доставки 6000₽ по МСК, доставка за МКАД - 50₽ за 1км
                            </p>
                            <p class="ordering__delivery-text text">
                                Стремянки/гладилки/вешалки – 1000₽, доставка за МКАД - 30₽ за 1км
                            </p>
                            <h2 class="ordering__delivery-subtitle ordering__delivery-subtitle--var2  title-2">
                                Доставить по адресу
                            </h2>
                            <div class="ordering__address">
                                <p class="ordering__input-text text">
                                    Город, улица, дом
                                </p>
                                <input class="ordering__input text" type="text" placeholder="Введите адрес" name="d-address">
                                <ul class="ordering__input-list">
                                    <li class="ordering__input-list-item">
                                        <p class="ordering__input-text text">
                                            Квартира/офис
                                        </p>
                                        <input class="ordering__input text" type="text" placeholder="№" name="d-address">
                                    </li>
                                    <li class="ordering__input-list-item">
                                        <p class="ordering__input-text text">
                                            Подъезд
                                        </p>
                                        <input class="ordering__input text" type="text" placeholder="№" name="d-address">
                                    </li>
                                    <li class="ordering__input-list-item">
                                        <p class="ordering__input-text text">
                                            Этаж
                                        </p>
                                        <input class="ordering__input text" type="text" placeholder="№" name="d-address">
                                    </li>
                                    <li class="ordering__input-list-item">
                                        <p class="ordering__input-text text">
                                            Домофон
                                        </p>
                                        <input class="ordering__input text" type="text" placeholder="№" name="d-address">
                                    </li>
                                </ul>
                            </div>
                            <div class="ordering__address-container">
                                <p class="ordering__address-container-mark">
                                    !
                                </p>
                                <p class="ordering__address-container-text text">
                                    Итоговая стоимость и срок доставки рассчитывается индивидуально, вопросы можете
                                    уточнить по тел:
                                    <a class="ordering__price-help-link-text"
                                        href="tel:+7 (495) 172 15 24">+7 (495) 172 15 24</a>
                                </p>
                            </div>
                            <h2 class="ordering__delivery-subtitle title-2" id="order-who">
                                Покупатель
                            </h2>
                            <div class="ordering__buyer">
                                <ul class="ordering__input-list ordering__input-list--var2">
                                    <li class="ordering__input-list-item">
                                        <div class="ordering__input-wrap">
                                            <p class="ordering__input-text text">
                                                Имя*
                                            </p>
                                            <input class="ordering__input text" type="text"
                                            placeholder="Ваше имя" name="d-name" />
                                        </div>
                                        <div class="ordering__input-wrap">
                                        <p class="ordering__input-text text">
                                            Контактный телефон*
                                        </p>
                                        <input class="ordering__input text" type="text"
                                            placeholder="+7 (123) 456 78 90" name="d-tel">
                                        </div>
                                        <div class="ordering__input-wrap">
                                        <p class="ordering__input-text text">
                                            Электронная почта
                                        </p>
                                        <input
                                            class="ordering__input text"
                                            type="text" placeholder="example@mail.ru" name="d-email">
                                        </div>
                                    </li>
                                    <li class="ordering__input-list-item">
                                        <p class="ordering__input-text text">
                                            Комментарий
                                        </p>
                                        <textarea class="ordering__input ordering__input--var2 text" 
                                            placeholder="Оставьте свой комментарий здесь" name="d-comment"></textarea>
                                    </li>
                                </ul>
                            </div>
                            <h2 class="ordering__delivery-subtitle title-2">
                                Способы оплаты
                            </h2>
                            <div class="ordering__payment">
                                <button class="ordering__payment-btn active">
                                    <span class="ordering__payment-btn-pic">
                                        <img class="ordering__payment-btn-pic-img" src="<?php ic_image_directory();?>ordering-marker.svg"
                                            alt="">
                                    </span>
                                    <span class="ordering__payment-btn-text text">
                                        Наличные
                                    </span>
                                </button>
                                <button class="ordering__payment-btn">
                                    <span class="ordering__payment-btn-pic">
                                        <img class="ordering__payment-btn-pic-img" src="<?php ic_image_directory();?>ordering-marker.svg"
                                            alt="">
                                    </span>
                                    <span class="ordering__payment-btn-text text">
                                        Банковская карта
                                    </span>
                                </button>
                                <button class="ordering__payment-btn">
                                    <span class="ordering__payment-btn-pic">
                                        <img class="ordering__payment-btn-pic-img" src="<?php ic_image_directory();?>ordering-marker.svg"
                                            alt="">
                                    </span>
                                    <span class="ordering__payment-btn-text text">
                                        Оплата по счету (для юр.лиц)
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="ordering__body-column-2">
                        <div class="ordering__order-wrap">
                            <?php 
                                define( 'WOOCOMMERCE_CHECKOUT', true );
                                echo do_shortcode('[woocommerce_checkout]');
                            ;?>
                            <button class="ordering__price-btn button-1">
                                Оформить заказ
                            </button>
                            <div class="ordering__price-help">
                                <h3 class="ordering__price-help-subtitle title-3">
                                    Нужна помощь с заказом?
                                </h3>
                                <div class="ordering__price-help-link text">
                                    <a class="ordering__price-help-link-text" href="tel:+7 (495) 172 15 24">
                                    +7 (495) 172 15 24</a>
                                    <p class="ordering__price-help-link-content text">
                                        /
                                    </p>
                                    <a class="ordering__price-help-link-text text" href="mailto:info@ideecasainterior.ru">
                                        info@ideecasainterior.ru </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
?>

<?php get_footer();