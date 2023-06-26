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
                <button class="header__bottom-menu-list-item-button text-hover-acc js-header-cats <?php 
            if ($catCount == 0) {
                echo "active";
                $catCount = 1;
            }
        ?>">
                    <?php echo $cat->name;?>
                </button>
            </li>
        <?php
    }
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
                    }
                ?>
            </ul>
        </div>
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