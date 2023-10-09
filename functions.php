<?php
/**
 * IdeeCasa functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package IdeeCasa
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ideecasa_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on IdeeCasa, use a find and replace
		* to change 'ideecasa' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'ideecasa', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'ideecasa' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'ideecasa_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'ideecasa_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ideecasa_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ideecasa_content_width', 640 );
}
add_action( 'after_setup_theme', 'ideecasa_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ideecasa_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ideecasa' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ideecasa' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ideecasa_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ideecasa_scripts() {
	wp_enqueue_style( 'ideecasa-style', get_template_directory_uri() . '/dist/css/app.css', array(), time() );

	wp_enqueue_script( 'ideecasa-js', get_template_directory_uri() . '/dist/js/app.js', array(), time(), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wc-blocks-vendors-style');
    wp_dequeue_style('wc-blocks-style');
    wp_dequeue_style('font-awesome');
    wp_dequeue_style('classic-theme-styles');
    wp_dequeue_style('ct_public_css');
    // wp_dequeue_style('contact-form-7');
}
add_action( 'wp_enqueue_scripts', 'ideecasa_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// Get image link from theme
function ic_image_directory() {
    echo get_template_directory_uri() . '/dist/images/';
}

// ACF
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Глобальные настройки',
        'menu_title'    => 'Глобальные настройки',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
}

// Menu And Navigation
function ic_menu_top_level() {
    $cats = get_field('cats', 'option');
    $catCount = 0;
    foreach ($cats as $cat) {
        ?>
            <li class="header__bottom-menu-list-item">
                <a href="<?php echo get_category_link( $cat->term_id );?>" class="header__bottom-menu-list-item-button text-hover-acc js-header-cats <?php 
            if ($catCount == 0) {
                echo "active";
                $catCount = 1;
            }
        ?>">
                    <?php echo $cat->name;?>
                </a>
            </li>
        <?php
    }
    ?>
        <!-- <li class="header__bottom-menu-list-item">
            <a href="/product-category/foppapedretti/" class="header__bottom-menu-list-item-button text-hover-acc">
                Foppapedretti
            </a>
        </li> -->
    <?php
}

function ic_menu_second_level() {
    $cats = get_field('cats', 'option');
    $catCount = 0;
    foreach ($cats as $cat) {
        ?>
        <div class="header__bottom-cards js-header-cards <?php 
            if ($catCount == 0) {
                echo "active";
                $catCount = 1;
            }
        ?>">
            <button type="button" class="header__bottom-cards-back text js-header-bottom-back">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_535_1067)">
                        <path
                            d="M8.69995 0.428711L3.42852 5.70014C3.38752 5.73862 3.35485 5.78509 3.33251 5.83669C3.31017 5.88828 3.29865 5.94391 3.29865 6.00014C3.29865 6.05636 3.31017 6.11199 3.33251 6.16359C3.35485 6.21519 3.38752 6.26166 3.42852 6.30014L8.69995 11.5716"
                            stroke="#969696" stroke-width="0.857143" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </g>
                    <defs>
                        <clipPath id="clip0_535_1067">
                            <rect width="12" height="12" fill="white"
                                transform="translate(12) rotate(90)" />
                        </clipPath>
                    </defs>
                </svg>
                Меню
            </button>
            <h2 class="header__bottom-cards-subtitle title-2">
                <?php echo $cat->name;?>
            </h2>
            <ul class="header__bottom-cards-list">
                <?php 
                    $args = array(
                        'taxonomy'     => 'product_cat',
                        'child_of'     => 0,
                        'parent'       => $cat->term_id,
                        'orderby'      => 'name',
                        'order'        => 'ASC',
                        'hide_empty'   => 1,
                        'hierarchical' => 1,
                        // 'number'       => 0, // сколько выводить?
                        // полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
                    );
                
                    $categories = get_categories( $args );
                    if( $categories ){
                        foreach( $categories as $sub_cat ){
                            ?>
                            <li class="header__bottom-cards-list-item">
                                <a href="<?php echo get_category_link( $sub_cat->term_id );?>" class="header__bottom-cards-list-item-link">
                                    <span class="header__bottom-cards-pic">
                                        <img class="header__bottom-cards-pic-img"
                                            src="<?php
                                            $category_thumbnail = get_woocommerce_term_meta($sub_cat->term_id, 'thumbnail_id', true);
                                            $image = wp_get_attachment_url($category_thumbnail);
                                            echo $image;
                                            ?>" alt="Фото">
                                    </span>
                                    <span class="header__bottom-cards-text text">
                                        <?php echo $sub_cat->name;?>
                                    </span>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                        <li class="header__bottom-cards-list-item">
                            <div class="header__bottom-cards-pic-line">
                            </div>
                            <a href="<?php echo get_category_link( $cat->term_id );?>" class="header__bottom-cards-text text">
                                Смотреть все
                            </a>
                        </li>
                        <?php
                    }
                ?>
            </ul>
        </div>
        <?php
    }
}

function ic_menu_footer() {
    $cats = get_field('cats', 'option');
    $catCount = 0;
    foreach ($cats as $cat) {
        ?>
            <a class="text footer__body-columns-list-item-text" href="<?php echo get_category_link( $cat->term_id );?>">
                <?php echo $cat->name;?>
            </a>
        <?php
    }
}
// Remove sidebar
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

/**
 * Remove WooCommerce breadcrumbs 
 */
add_action( 'init', 'my_remove_breadcrumbs' );
 
function my_remove_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

function render_prs($val)  {
    $prs = get_field($val);
    
    foreach ($prs as $prp_id) {
        $prp = wc_get_product( $prp_id);
        $p_image_url = wp_get_attachment_url( $prp->get_image_id());
        $link = get_permalink( $prp_id );
        $brand = $prp->get_attribute('brend');
       ?>
       <div class='swiper-slide'>
            <a href="<?php echo $link;?>" class="prp">
                <span class="prp__pic">
                    <img class="prp__pic-img" src="<?php echo $p_image_url;?>" alt="Фото">
                </span>
                <span class="prp__text">
                    <span class="prp__text-brand text">
                        <?php echo $brand;?>
                    </span>
                    <span class="prp__text-wrap">
                    <span class="prp__text-subtitle title-3">
                        <?php 
                             echo $prp->get_name();
                        ?>
                    </span>
                    <span class="prp__text-price text">
                    <?php  
                                    if ($prp->get_price() > 1) {
                                        woocommerce_template_single_price();
                                    }
                                ?>
                    </span>
                    </span>
                </span>
            </a>
        </div>
       <?php
    }
}

function render_prs_related()  {
    $args = array(
        'posts_per_page' => 9,
        'post_type' => 'product',
        'orderby' => 'rand',
        'order'   => 'DESC',
        'post_status' => 'publish',
        // 'tax_query' => array(
        //     array(
        //         'taxonomy' => 'product_visibility',
        //         'field'    => 'name',
        //         'terms'    => 'featured',
        //         'operator' => 'IN'
        //     ),
        // ),
        'meta_query' => array(
            'relation' => 'AND',
             array(
                            'key' => '_stock_status',
                            'value' => 'instock',
                            'compare' => '='
            ),
            //если есть фото
            array(
                            'key' => '_thumbnail_id'
            ),
 )
        );
    $wc_query = new WP_Query( $args );

    if ($wc_query->have_posts()) {
        while ($wc_query->have_posts()) {
            $wc_query->the_post();
    
            $prp = wc_get_product(get_the_ID());
            $p_image_url = wp_get_attachment_url( $prp->get_image_id());
            $link = get_permalink( get_the_ID() );
            $brand = $prp->get_attribute('brend');
            ?>
                <div class='swiper-slide'>
                    <a href="<?php echo $link;?>" class="prp">
                        <span class="prp__pic">
                            <img class="prp__pic-img" src="<?php echo $p_image_url;?>" alt="Фото" <?php 
                                $prpSize = get_field('prp-size', get_the_ID());
                                if ($prpSize) {
                                    echo 'style="object-fit: cover;"';
                                }
                            ?>>
                        </span>
                        <span class="prp__text">
                            <span class="prp__text-brand text">
                                <?php echo $brand;?>
                            </span>
                            <span class="prp__text-wrap">
                            <span class="prp__text-subtitle title-3">
                                <?php 
                                    echo $prp->get_name();
                                ?>
                            </span>
                            <span class="prp__text-price text">
                            <?php  
                                    if ($prp->get_price() > 1) {
                                        woocommerce_template_single_price();
                                    }
                                ?>
                            </span>
                            </span>
                        </span>
                    </a>
                </div>
            <?php
           
        }
    }
    wp_reset_postdata();
}

// Вывод товаров по ID категори
function render_prs_by_cat_id($cat_id) {
    $args = array(
        'posts_per_page' => 8,    
        'post_type' => 'product',
        'orderby' => 'rand',
        'order'   => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'id',
                'terms'    => $cat_id,
            ),
        ),
        'meta_query' => array(
            'relation' => 'AND',
             array(
                            'key' => '_stock_status',
                            'value' => 'instock',
                            'compare' => '='
            ),
            //если есть фото
            array(
                            'key' => '_thumbnail_id'
            ),
 )
        );
    $wc_query = new WP_Query( $args );

    if ($wc_query->have_posts()) {
        while ($wc_query->have_posts()) {
            $wc_query->the_post();
    
            $prp = wc_get_product(get_the_ID());
            $p_image_url = wp_get_attachment_url( $prp->get_image_id());
            $link = get_permalink( get_the_ID() );
            $brand = $prp->get_attribute('brend');
            ?>
                <div class='swiper-slide'>
                    <a href="<?php echo $link;?>" class="prp">
                        <span class="prp__pic">
                            <img class="prp__pic-img" src="<?php echo $p_image_url;?>" alt="Фото" 
                            <?php 
                                $prpSize = get_field('prp-size', get_the_ID());
                                if ($prpSize) {
                                    echo 'style="object-fit: cover;"';
                                }
                            ?>
                            >
                        </span>
                        <span class="prp__text">
                            <span class="prp__text-brand text">
                                <?php echo $brand;?>
                            </span>
                            <span class="prp__text-wrap">
                            <span class="prp__text-subtitle title-3">
                                <?php 
                                    echo $prp->get_name();
                                ?>
                            </span>
                            <span class="prp__text-price text">
                            <?php  
                                    if ($prp->get_price() > 1) {
                                        woocommerce_template_single_price();
                                    }
                                ?>
                            </span>
                            </span>
                        </span>
                    </a>
                </div>
            <?php
            
        }
    }
    wp_reset_postdata();
}

add_filter( 'woocommerce_checkout_fields', 'truemisha_required_fields', 25 );
 
function truemisha_required_fields( $fields ) {
 
	// print_r( $fields ); exit // если хотите узнать названия полей
	$fields[ 'billing' ][ 'billing_first_name' ][ 'required' ] = false; // необязательно
	$fields[ 'billing' ][ 'billing_last_name' ][ 'required' ] = false; // необязательно
	$fields[ 'billing' ][ 'billing_company' ][ 'required' ] = false; // обязательно
    $fields[ 'billing' ][ 'billing_address_1' ][ 'required' ] = false; // обязательно
    $fields[ 'billing' ][ 'billing_city' ][ 'required' ] = false; // обязательно
    $fields[ 'billing' ][ 'billing_postcode' ][ 'required' ] = false; // обязательно
    $fields[ 'billing' ][ 'billing_email' ][ 'required' ] = false; // обязательно
    $fields[ 'billing' ][ 'billing_phone' ][ 'required' ] = false; // обязательно
 
	return $fields;
}

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
  
function custom_override_checkout_fields( $fields ) {
  //unset($fields['billing']['billing_first_name']);// имя
  //unset($fields['billing']['billing_last_name']);// фамилия
  unset($fields['billing']['billing_company']); // компания
//   unset($fields['billing']['billing_address_1']);//
  unset($fields['billing']['billing_address_2']);//
  unset($fields['billing']['billing_city']);
  unset($fields['billing']['billing_postcode']);
//   unset($fields['billing']['billing_country']);
  unset($fields['billing']['billing_state']);
  //unset($fields['billing']['billing_phone']);
  //unset($fields['order']['order_comments']);
  //unset($fields['billing']['billing_email']);
  unset($fields['account']['account_username']);
  unset($fields['account']['account_password']);
  unset($fields['account']['account_password-2']);

 
  unset($fields['billing']['billing_company']);// компания
  unset($fields['billing']['billing_postcode']);// индекс 

//   unset($fields['billing']['billing_country']);  //удаляем! тут хранится значение страны оплаты
  unset($fields['shipping']['shipping_country']); ////удаляем! тут хранится значение страны доставки
    return $fields;
}

function ideecasa_get_url() {
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
        $url = "https://";   
    else  
        $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    
    
    echo $url;  
}

function ideecasa_pre_order_block() {
    ?>
        <div class="pre-order">
            <p class="pre-order-text">
                Заказать через
            </p>
            <ul class="pre-order-list">
                <li class="pre-order-list-item">
                    <a href="https://t.me/ideecasainterior" target="_blank">
                    <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_2717_1532)">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2449 26.4899C20.5598 26.4899 26.4898 20.5599 26.4898 13.245C26.4898 5.93001 20.5598 6.10352e-05 13.2449 6.10352e-05C5.92995 6.10352e-05 0 5.93001 0 13.245C0 20.5599 5.92995 26.4899 13.2449 26.4899ZM19.0666 8.46207C19.1687 7.30179 17.9435 7.77953 17.9435 7.77953C17.0388 8.15404 16.1058 8.53462 15.1627 8.91931C12.2385 10.1121 9.21744 11.3444 6.64393 12.5572C5.2485 13.0691 6.06534 13.581 6.06534 13.581L8.27761 14.2635C9.29863 14.5706 9.84321 14.2294 9.84321 14.2294L14.6081 10.9874C16.3098 9.82711 15.9014 10.7827 15.493 11.1922L11.9193 14.6047C11.3747 15.0825 11.647 15.492 11.8853 15.6968C12.5605 16.2925 14.2215 17.3825 14.9466 17.8584C15.1353 17.9822 15.2606 18.0645 15.2887 18.0856C15.4589 18.2221 16.3778 18.8364 16.9905 18.6999C17.6031 18.5634 17.6712 17.7785 17.6712 17.7785L18.488 12.4207C18.6105 11.4905 18.7511 10.5965 18.8633 9.88245C18.9693 9.20799 19.0501 8.69414 19.0666 8.46207Z" fill="#9A8873"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_2717_1532">
                    <rect width="26.4898" height="26.4898" fill="white"/>
                    </clipPath>
                    </defs>
                    </svg>
                    </a>
                </li>
                <li class="pre-order-list-item">
                    <a href="https://wa.me/79935877780?text=Здравствуйте! Меня интересует товар <?php ideecasa_get_url(); ?>" class="js-pre-order-wa" target="_blank">
                    <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_2717_1534)">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.7552 26.4898C21.0701 26.4898 27 20.5598 27 13.2449C27 5.92995 21.0701 0 13.7552 0C6.44021 0 0.510254 5.92995 0.510254 13.2449C0.510254 20.5598 6.44021 26.4898 13.7552 26.4898ZM18.9902 7.68013C17.6272 6.31543 15.8144 5.56357 13.8832 5.56286C9.90396 5.56286 6.66505 8.80129 6.66362 12.7819C6.66314 14.0543 6.99556 15.2964 7.62721 16.3911L6.60291 20.1322L10.4301 19.1284C11.4845 19.7037 12.6719 20.0067 13.88 20.0072H13.8829C17.8618 20.0072 21.1007 16.7683 21.1024 12.7879C21.1036 10.8586 20.3535 9.04483 18.9902 7.68013ZM13.8834 18.7878H13.881C12.8041 18.7873 11.748 18.498 10.8268 17.9514L10.6076 17.8213L8.33643 18.417L8.94254 16.2027L8.79992 15.9755C8.19934 15.0201 7.88207 13.9161 7.88258 12.7821C7.88377 9.47363 10.5758 6.78205 13.8856 6.78205C15.4883 6.78253 16.9949 7.40766 18.1278 8.54182C19.2608 9.67598 19.8842 11.1835 19.8837 12.787C19.8825 16.096 17.1907 18.7878 13.8834 18.7878ZM17.1746 14.2936C16.9942 14.2032 16.1074 13.767 15.9419 13.7067C15.7767 13.6465 15.6562 13.6164 15.536 13.7971C15.4158 13.9778 15.0701 14.3839 14.9648 14.5044C14.8596 14.6248 14.7543 14.6397 14.5741 14.5494C14.5446 14.5346 14.5044 14.5172 14.4547 14.4957C14.2007 14.3855 13.6997 14.1682 13.1234 13.654C12.5871 13.1755 12.2251 12.5849 12.1198 12.4044C12.0145 12.2238 12.1085 12.1262 12.1988 12.0363C12.253 11.9823 12.3152 11.9066 12.3773 11.8309C12.4083 11.7931 12.4394 11.7553 12.4693 11.7203C12.5458 11.631 12.579 11.5632 12.6241 11.4714C12.6322 11.4549 12.6406 11.4377 12.6498 11.4194C12.71 11.299 12.6799 11.1937 12.6348 11.1033C12.6048 11.043 12.4338 10.6268 12.2787 10.2495C12.2017 10.0619 12.1285 9.88385 12.0786 9.76393C11.9493 9.45341 11.8183 9.45421 11.7131 9.45484C11.6992 9.45495 11.6857 9.45503 11.6727 9.45437C11.5676 9.44907 11.4472 9.44811 11.327 9.44811C11.2068 9.44811 11.0114 9.49315 10.8459 9.67383C10.8353 9.68549 10.8233 9.6982 10.8104 9.71203C10.6224 9.91272 10.2145 10.3482 10.2145 11.1787C10.2145 12.0645 10.8577 12.9203 10.9505 13.0439L10.9512 13.0447C10.9571 13.0526 10.9676 13.0677 10.9825 13.0892C11.1979 13.3981 12.341 15.038 14.0328 15.7686C14.4633 15.9546 14.7991 16.0654 15.0612 16.1485C15.4934 16.2858 15.8865 16.2665 16.1975 16.22C16.5442 16.1683 17.2647 15.7838 17.415 15.3624C17.5653 14.9411 17.5653 14.5798 17.5203 14.5046C17.484 14.4438 17.3987 14.4025 17.2724 14.3414C17.2421 14.3268 17.2094 14.311 17.1746 14.2936Z" fill="#9A8873"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_2717_1534">
                        <rect width="26.4898" height="26.4898" fill="white" transform="translate(0.510254)"/>
                        </clipPath>
                        </defs>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    <?php
}

add_filter( 'dgwt/wcas/product/thumbnail_src', function($src, $product_id) {
    $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'full' );
    if ( is_array( $thumbnail_url ) && !empty( $thumbnail_url[0] ) ) {
      $src = $thumbnail_url[0];
    }
    return $src;
  }, 10, 2);


function update_brands_sort() {
    // ////
    $brands_sort = get_field('sort_brands', 'option');

    $params = array(
        'post_type' => 'product',
        'posts_per_page' => 2000,
    ); // (1)
    $wc_query = new WP_Query($params);

    if ($wc_query->have_posts()) {
        $pr_count = 0;
        while ( $wc_query->have_posts() ) {
            $my_post = $wc_query->next_post();

            $pr_count = $pr_count + 1;

            $brand_attr = get_the_terms( $my_post->ID, 'pa_brend');
            $brand_product_attr_id = $brand_attr[0]->term_id; // id брендв

            if ($brand_attr) {
                $brands_count = 0;

                foreach ($brands_sort as $brand_id) {
                    if ($brand_id == $brand_product_attr_id) {
                        update_post_meta( $my_post->ID, 'brand_number', $brands_count );
                    }

                    $brands_count = $brands_count + 1;
                }

                if ($brands_count == 0) {
                    update_post_meta( $my_post->ID, 'brand_number', 999 ); // установка конечного значения
                }
            }
        }

        echo $pr_count;

        wp_reset_postdata();
    }
    // ////
}