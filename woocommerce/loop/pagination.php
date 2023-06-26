<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
$base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
$format  = isset( $format ) ? $format : '';

if ( $total <= 1 ) {
	return;
}
?>
	<?php
	$pages = paginate_links( array(
        'base' => $base,
        'format' => $format,
        'current' => max( 1, $current ),
        'total' => $total,
        'prev_next' => false,
        'type'  => 'array',
        'prev_next'   => true,
        'prev_text'    => __( '<svg width="7" height="13" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M6 12L1.12022 6.79615C1.08227 6.75817 1.05202 6.71229 1.03135 6.66136C1.01067 6.61042 1 6.5555 1 6.5C1 6.44449 1.01067 6.38958 1.03135 6.33864C1.05202 6.28771 1.08227 6.24183 1.12022 6.20385L6 1" stroke="#070605" stroke-width="0.857143" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        ' ),
        'next_text'    => __( '<svg width="7" height="13" viewBox="0 0 7 13" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 12L5.87978 6.79615C5.91773 6.75817 5.94798 6.71229 5.96865 6.66136C5.98933 6.61042 6 6.5555 6 6.5C6 6.44449 5.98933 6.38958 5.96865 6.33864C5.94798 6.28771 5.91773 6.24183 5.87978 6.20385L1 1" stroke="#070605" stroke-width="0.857143" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        '),
    ) );

    $output = '';

    if ( is_array( $pages ) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var( 'paged' );

        $output .=  '<ul class="pagination">';
        foreach ( $pages as $page ) {
            $output .= "<li class='pagination__item'>".str_replace("page-numbers", "pagination__item-btn pagination__item-btn-text text", $page)."</li>";
        }
        $output .= '</ul>';
    }

    echo $output;

	?>
