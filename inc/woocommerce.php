<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package IdeeCasa
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function ideecasa_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 150,
			'single_image_width'    => 300,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'ideecasa_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function ideecasa_woocommerce_scripts() {
	wp_enqueue_style( 'ideecasa-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'ideecasa-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'ideecasa_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function ideecasa_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'ideecasa_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function ideecasa_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'ideecasa_woocommerce_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'ideecasa_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function ideecasa_woocommerce_wrapper_before() {
		?>
			<main id="primary" class="site-main">
		<?php
	}
}
// add_action( 'woocommerce_before_main_content', 'ideecasa_woocommerce_wrapper_before' );

if ( ! function_exists( 'ideecasa_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function ideecasa_woocommerce_wrapper_after() {
		?>
			</main><!-- #main -->
		<?php
	}
}
// add_action( 'woocommerce_after_main_content', 'ideecasa_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'ideecasa_woocommerce_header_cart' ) ) {
			ideecasa_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'ideecasa_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function ideecasa_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		ideecasa_woocommerce_cart_link();
		$fragments['a.cart-contents-link'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'ideecasa_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'ideecasa_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function ideecasa_woocommerce_cart_link() {
        $countTotal = WC()->cart->get_cart_contents_count();
		?>
        <a class="header__info-pic cart-contents-link <?php 
            if ($countTotal >= 1) {
                echo "full";
            }
        ?>" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
            <?php 
                if ($countTotal >= 1) {
                    ?>
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.9285 10.7142H3.07138C2.80356 10.7088 2.53794 10.7637 2.29422 10.8749C2.05049 10.986 1.83489 11.1506 1.6634 11.3564C1.49191 11.5622 1.36891 11.8039 1.30353 12.0637C1.23814 12.3235 1.23203 12.5946 1.28567 12.8571L3.24995 22.6785C3.33344 23.0879 3.55785 23.4551 3.88413 23.7161C4.21042 23.9772 4.6179 24.1155 5.03567 24.1071H19.9642C20.382 24.1155 20.7895 23.9772 21.1158 23.7161C21.4421 23.4551 21.6665 23.0879 21.75 22.6785L23.7142 12.8571C23.7679 12.5946 23.7618 12.3235 23.6964 12.0637C23.631 11.8039 23.508 11.5622 23.3365 11.3564C23.165 11.1506 22.9494 10.986 22.7057 10.8749C22.462 10.7637 22.1963 10.7088 21.9285 10.7142Z" fill="white" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16.0713 4.46436L19.6427 10.7144" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M5.35693 10.7144L8.92836 4.46436" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span><?php echo $countTotal;?></span>
                    <?php
                } else {
                    ?>
                    <svg class="header__info-pic-svg" width="20" height="18" viewBox="0 0 20 18" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M17.5427 6.57134H2.45701C2.24275 6.567 2.03026 6.61092 1.83527 6.69985C1.64029 6.78878 1.46782 6.92043 1.33062 7.08507C1.19343 7.2497 1.09503 7.44309 1.04272 7.65091C0.990414 7.85873 0.98553 8.07566 1.02843 8.28562L2.59986 16.1428C2.66665 16.4703 2.84618 16.764 3.10721 16.9729C3.36824 17.1817 3.69423 17.2924 4.02843 17.2856H15.9713C16.3055 17.2924 16.6315 17.1817 16.8925 16.9729C17.1535 16.764 17.3331 16.4703 17.3999 16.1428L18.9713 8.28562C19.0142 8.07566 19.0093 7.85873 18.957 7.65091C18.9047 7.44309 18.8063 7.2497 18.6691 7.08507C18.5319 6.92043 18.3594 6.78878 18.1645 6.69985C17.9695 6.61092 17.757 6.567 17.5427 6.57134Z"
                        stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M12.8572 1.57153L15.7143 6.57153" stroke="white" stroke-width="1.2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M4.28564 6.57153L7.14279 1.57153" stroke="white" stroke-width="1.2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <?php
                }
            ?>
        </a>
		<?php
	}
}

if ( ! function_exists( 'ideecasa_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function ideecasa_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>

        <?php ideecasa_woocommerce_cart_link(); ?>

		<?php
	}
}
