<?php /* Template Name: Главная */ ?>
<?php get_header();?>

<section class="intro">
    <div class='intro__slider js-intro-slider'>
        <div class='swiper-wrapper'>
        <?php

        if( get_field('intro') ): ?>

            <?php while( has_sub_field('intro') ): ?>
            <div class='swiper-slide'>
                <div class="intro__slide">
                    <div class="intro__slide-content layout">
                        <p class="intro__slide-pre-title">
                            <?php the_sub_field('intro-pre-title');?>
                        </p>
                        <h2 class="intro__slide-title title">
                            <?php the_sub_field('intro-title'); ?>
                        </h2>
                        <p class="intro__slide-subtitle text">
                            <?php the_sub_field('intro-text'); ?>
                        </p>
                        <a href="<?php the_sub_field('intro-link'); ?>" class="intro__slide-link button-1">
                            В каталог
                        </a>
                    </div>
                    <img src="<?php the_sub_field('intro-pic'); ?>" alt="Фото" class="intro__slide-back">
                </div>
            </div>
                

            <?php endwhile; ?>

        <?php endif;?>
        </div>
        <div class="intro__slider-nav">
            <div class="intro__slider-nav-content layout">
                <div class="swiper-button-prev"><svg width="12" height="20" viewBox="0 0 12 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.5 0.714111L1.71429 9.49983C1.64596 9.56395 1.5915 9.64141 1.55427 9.7274C1.51704 9.8134 1.49783 9.90612 1.49783 9.99983C1.49783 10.0935 1.51704 10.1863 1.55427 10.2722C1.5915 10.3582 1.64596 10.4357 1.71429 10.4998L10.5 19.2855"
                            stroke="#BFBFBF" stroke-width="1.42857" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="swiper-button-next"><svg width="12" height="20" viewBox="0 0 12 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.5 0.714111L10.2857 9.49983C10.354 9.56395 10.4085 9.64141 10.4457 9.7274C10.483 9.8134 10.5022 9.90612 10.5022 9.99983C10.5022 10.0935 10.483 10.1863 10.4457 10.2722C10.4085 10.3582 10.354 10.4357 10.2857 10.4998L1.5 19.2855"
                            stroke="#BFBFBF" stroke-width="1.42857" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="intro__slider-pag">
            <div class="intro__slider-pag-content layout">
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<section class="cats-2 layout">
    <div class="cats-2__slider js-cats-slider">
        <div class='swiper-wrapper'>
            <?php 
                $cats2 = get_field('h-cats');

                foreach ($cats2 as $cat) {
                    ?>
                    <div class='swiper-slide'>
                        <a href="<?php echo get_category_link( $cat->term_id );?>" class="cats-2__link">
                            <span class="cats-2__link-pic">
                                <img src="<?php
                                    $category_thumbnail = get_woocommerce_term_meta($cat->term_id, 'thumbnail_id', true);
                                    $image = wp_get_attachment_url($category_thumbnail);
                                    echo $image;
                                ?>" alt="Фото" class="cats-2__link-img">
                            </span>
                            <span class="cats-2__link-text title-4"><?php echo $cat->name;?></span>
                        </a>
                    </div>
                    <?php
                }
            ?>
        </div>
        <div class="swiper-button-next">
            <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M1.5 0.714111L10.2857 9.49983C10.354 9.56395 10.4085 9.64141 10.4457 9.7274C10.483 9.8134 10.5022 9.90612 10.5022 9.99983C10.5022 10.0935 10.483 10.1863 10.4457 10.2722C10.4085 10.3582 10.354 10.4357 10.2857 10.4998L1.5 19.2855"
                    stroke="#9A8873" stroke-width="1.42857" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </div>
    </div>
</section>
<section class="section-text layout">
    <ul class="section-text__block">
        <li class="section-text__block-1">
            <h2 class="title-2">
                Роскошь и стиль в каждой детали
            </h2>
        </li>
        <li class="section-text__block-2">
            <p class="section-text__block-2-text text">
                Итальянская мебель известна своим изысканным дизайном
                и превосходным качеством. Мы тщательно подобрали ассортимент мебели и декора от лучших
                итальянских брендов для создания интерьера вашей мечты
            </p>
            <a class="section-text__block-2-btn button button-2" href="/shop"> Мебель в наличии </a>
        </li>
    </ul>
</section>
<section class="ph3">
    <div class="ph3__pics">
        <div class="ph3__big">
            <div class="pht">
                <div class="pht__pic">
                    <img src="<?php the_field('tt1-big'); ?>" alt="Фото" class="pht__pic-img">
                </div>
                <?php
                if( get_field('tt1-list') ): ?>
                    <?php while( has_sub_field('tt1-list') ): ?>
                        <div class="pht__tt" style="left: <?php the_sub_field('tt1-list-x'); ?>%;top: <?php the_sub_field('tt1-list-y'); ?>%;">
                            <button type="button" class="pht__tt-btn js-pht-tt-btn"></button>
                            <div class="pht__tt-card js-pht-tt-card <?php
                                $checkLeft = get_sub_field('tt1-list-side'); 
                                if ($checkLeft) {
                                    echo 'pht__tt-card--left';
                                }

                             ?>">
                                <button class="pht__tt-card-close js-pht-tt-card-close">
                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.64265 0.357178L0.356934 9.64289" stroke="#070605"
                                            stroke-width="0.714286" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M0.356934 0.357178L9.64265 9.64289" stroke="#070605"
                                            stroke-width="0.714286" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <?php
                                    $tt1_product_id = get_sub_field('tt1-list-pr'); 
                                    $tt1_product = wc_get_product( $tt1_product_id );

                                    $tt1_p_image_url = wp_get_attachment_url( $tt1_product->get_image_id());
                                    $tt1_link = get_permalink($tt1_product_id);


                                 ?>
                                <div class="pht__tt-card-pic">
                                    <img src="<?php echo $tt1_p_image_url; ?>" alt="Фото" class="pht__tt-card-img">
                                </div>
                                <h5 class="pht__tt-card-title">
                                    <?php echo $tt1_product->get_name();?>
                                </h5>
                                <p class="pht__tt-card-desc">
                                    <?php the_sub_field('tt1-list-desc'); ?>
                                </p>
                                <a href="<?php echo $tt1_link; ?>" class="pht__tt-card-link">Узнать больше</a>
                            </div>
                        </div>

                    <?php endwhile; ?>

                <?php endif;?>
            </div>
        </div>
        <div class="ph3__container">
            <div class="ph3__sm">
                <div class="pht">
                    <div class="pht__pic">
                        <img src="<?php the_field('tt1-sm1'); ?>" alt="Фото" class="pht__pic-img">
                    </div>
                    <?php
                    if( get_field('tt2-list') ): ?>
                        <?php while( has_sub_field('tt2-list') ): ?>
                            <div class="pht__tt" style="left: <?php the_sub_field('tt2-list-x'); ?>%;top: <?php the_sub_field('tt2-list-y'); ?>%;">
                                <button type="button" class="pht__tt-btn js-pht-tt-btn"></button>
                                <div class="pht__tt-card js-pht-tt-card <?php
                                    $checkLeft = get_sub_field('tt2-list-side'); 

                                    if ($checkLeft) {
                                        echo 'pht__tt-card--left';
                                    }

                                ?>">
                                    <button class="pht__tt-card-close js-pht-tt-card-close">
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.64265 0.357178L0.356934 9.64289" stroke="#070605"
                                                stroke-width="0.714286" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M0.356934 0.357178L9.64265 9.64289" stroke="#070605"
                                                stroke-width="0.714286" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <?php
                                        $tt1_product_id = get_sub_field('tt2-list-pr'); 
                                        $tt1_product = wc_get_product( $tt1_product_id );

                                        $tt1_p_image_url = wp_get_attachment_url( $tt1_product->get_image_id());
                                        $tt1_link = get_permalink($tt1_product_id);


                                    ?>
                                    <div class="pht__tt-card-pic">
                                        <img src="<?php echo $tt1_p_image_url; ?>" alt="Фото" class="pht__tt-card-img">
                                    </div>
                                    <h5 class="pht__tt-card-title">
                                        <?php echo $tt1_product->get_name();?>
                                    </h5>
                                    <p class="pht__tt-card-desc">
                                        <?php the_sub_field('tt2-list-desc'); ?>
                                    </p>
                                    <a href="<?php echo $tt1_link; ?>" class="pht__tt-card-link">Узнать больше</a>
                                </div>
                            </div>

                        <?php endwhile; ?>

                    <?php endif;?>
                </div>
            </div>
            <div class="ph3__sm">
            <div class="pht">
                    <div class="pht__pic">
                        <img src="<?php the_field('tt1-sm2'); ?>" alt="Фото" class="pht__pic-img">
                    </div>
                    <?php
                    if( get_field('tt3-list') ): ?>
                        <?php while( has_sub_field('tt3-list') ): ?>
                            <div class="pht__tt" style="left: <?php the_sub_field('tt3-list-x'); ?>%;top: <?php the_sub_field('tt3-list-y'); ?>%;">
                                <button type="button" class="pht__tt-btn js-pht-tt-btn"></button>
                                <div class="pht__tt-card js-pht-tt-card <?php
                                    $checkLeft = get_sub_field('tt3-list-side'); 

                                    if ($checkLeft) {
                                        echo 'pht__tt-card--left';
                                    }

                                ?>">
                                    <button class="pht__tt-card-close js-pht-tt-card-close">
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.64265 0.357178L0.356934 9.64289" stroke="#070605"
                                                stroke-width="0.714286" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M0.356934 0.357178L9.64265 9.64289" stroke="#070605"
                                                stroke-width="0.714286" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <?php
                                        $tt1_product_id = get_sub_field('tt3-list-pr'); 
                                        $tt1_product = wc_get_product( $tt1_product_id );

                                        $tt1_p_image_url = wp_get_attachment_url( $tt1_product->get_image_id());
                                        $tt1_link = get_permalink($tt1_product_id);


                                    ?>
                                    <div class="pht__tt-card-pic">
                                        <img src="<?php echo $tt1_p_image_url; ?>" alt="Фото" class="pht__tt-card-img">
                                    </div>
                                    <h5 class="pht__tt-card-title">
                                        <?php echo $tt1_product->get_name();?>
                                    </h5>
                                    <p class="pht__tt-card-desc">
                                        <?php the_sub_field('tt3-list-desc'); ?>
                                    </p>
                                    <a href="<?php echo $tt1_link; ?>" class="pht__tt-card-link">Узнать больше</a>
                                </div>
                            </div>

                        <?php endwhile; ?>

                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="prs layout js-prs js-prs-1">
    <div class="prs__top">
        <h2 class="prs__title title-2">Мебель в наличии</h2>
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
            <?php render_prs_by_cat_id('619'); ?>
        </div>
    </div>
</section>
<section class="ph">
    <div class="ph__slider js-ph-slider">
        <div class='swiper-wrapper'>
            <?php if( get_field('ttp1-slider') ): ?>
            <?php while( has_sub_field('ttp1-slider') ): ?>
                <div class='swiper-slide'>
                    <div class="ph__pic">
                        <div class="pht">
                            <div class="pht__pic">
                                <img src="<?php the_sub_field('ttp1'); ?>" alt="Фото" class="pht__pic-img">
                            </div>
                            <?php
                            if( get_sub_field('ttp1-list') ): ?>
                                <?php while( has_sub_field('ttp1-list') ): ?>
                                    <div class="pht__tt" style="left: <?php the_sub_field('ttp1-list-x'); ?>%;top: <?php the_sub_field('ttp1-list-y'); ?>%;">
                                        <button type="button" class="pht__tt-btn js-pht-tt-btn"></button>
                                        <div class="pht__tt-card js-pht-tt-card <?php
                                            $checkLeft = get_sub_field('ttp1-list-side'); 
                                            if ($checkLeft) {
                                                echo 'pht__tt-card--left';
                                            }

                                            ?>">
                                            <button class="pht__tt-card-close js-pht-tt-card-close">
                                                <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.64265 0.357178L0.356934 9.64289" stroke="#070605"
                                                        stroke-width="0.714286" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M0.356934 0.357178L9.64265 9.64289" stroke="#070605"
                                                        stroke-width="0.714286" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                            <?php
                                                $tt1_product_id = get_sub_field('ttp1-list-pr'); 
                                                $tt1_product = wc_get_product( $tt1_product_id );

                                                $tt1_p_image_url = wp_get_attachment_url( $tt1_product->get_image_id());
                                                $tt1_link = get_permalink($tt1_product_id);
                                                ?>
                                            <div class="pht__tt-card-pic">
                                                <img src="<?php echo $tt1_p_image_url; ?>" alt="Фото" class="pht__tt-card-img">
                                            </div>
                                            <h5 class="pht__tt-card-title">
                                                <?php echo $tt1_product->get_name();?>
                                            </h5>
                                            <p class="pht__tt-card-desc">
                                                <?php the_sub_field('ttp1-list-desc'); ?>
                                            </p>
                                            <a href="<?php echo $tt1_link; ?>" class="pht__tt-card-link">Узнать больше</a>
                                        </div>
                                    </div>

                                <?php endwhile; ?>

                            <?php endif;?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="ph__slider-nav">
            <div class="ph__slider-nav-content layout">
                <div class="swiper-button-prev"><svg width="12" height="20" viewBox="0 0 12 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.5 0.714111L1.71429 9.49983C1.64596 9.56395 1.5915 9.64141 1.55427 9.7274C1.51704 9.8134 1.49783 9.90612 1.49783 9.99983C1.49783 10.0935 1.51704 10.1863 1.55427 10.2722C1.5915 10.3582 1.64596 10.4357 1.71429 10.4998L10.5 19.2855"
                            stroke="#BFBFBF" stroke-width="1.42857" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="swiper-button-next"><svg width="12" height="20" viewBox="0 0 12 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.5 0.714111L10.2857 9.49983C10.354 9.56395 10.4085 9.64141 10.4457 9.7274C10.483 9.8134 10.5022 9.90612 10.5022 9.99983C10.5022 10.0935 10.483 10.1863 10.4457 10.2722C10.4085 10.3582 10.354 10.4357 10.2857 10.4998L1.5 19.2855"
                            stroke="#BFBFBF" stroke-width="1.42857" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="ph__slider-pag">
            <div class="ph__slider-pag-content layout">
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<section class="section-text layout">
    <ul class="section-text__block">
        <li class="section-text__block-1">
            <h2 class="title-2">
            IdeeCasa – представитель итальянских брендов с 2006 года
            </h2>
        </li>
        <li class="section-text__block-2">
            <p class="section-text__block-2-text text">
            В начале своего пути мы с первого взгляда влюбились в Итальянский бренд Foppapedretti и начали активное сотрудничество. Теперь у нас самый большой выбор в России товаров от Foppapedretti, и широкий выбор из других итальянских брендов
            <br><br>
            Мы постоянно в поиске лучших итальянских производителей, чтобы вы могли создать дома неповторимую атмосферу уюта и роскоши
            </p>
            <a class="section-text__block-2-btn button button-2" href="/about"> Узнать о нас больше </a>
        </li>
    </ul>
</section>
<div class="brands layout">
    <ul class="brands__list">
        <li class="brands__list-item">
            <a href="/product-category/brands/foppapedretti/">
            <img src="/wp-content/uploads/2023/07/foppa-1.svg" alt="Фото">
            </a>
        </li>
        <li class="brands__list-item">
        <a href="/product-category/brands/incanto/">
        <img src="/wp-content/uploads/2023/07/inkanto-1.png" alt="Фото">
                </a>
        </li>
        <li class="brands__list-item">
        <a href="/product-category/brands/noctis/">
        <img src="/wp-content/uploads/2023/07/noktis-1.png" alt="Фото">
                </a>
        </li>
        <li class="brands__list-item">
        <a href="/product-category/brands/tomasella/">
        <img src="/wp-content/uploads/2023/07/tomasella-1.png" alt="Фото">
                </a>
        </li>
        <li class="brands__list-item">
            <a href="#">
                <img src="/wp-content/uploads/2023/07/logo-2-1.png" alt="Фото">
            </a>
        </li>
        <li class="brands__list-item">
        <a href="/product-category/brands/nicoletti/">
        <img src=/wp-content/uploads/2023/08/logo-1-1-1.svg" alt="Фото">
                </a>
        </li>
        <li class="brands__list-item">
            <a href="/product-category/brands/italialounge/">
                <img src="/wp-content/uploads/2023/07/italia_lounge_white-1.png" alt="Фото">
            </a>
        </li>
        <li class="brands__list-item">
            <a href="/product-category/brands/sedit/">
                <img src="/wp-content/uploads/2023/07/sedit-1.png" alt="Фото">
            </a>
        </li>
        <li class="brands__list-item">
            <a href="#">
                <img src="/wp-content/uploads/2023/07/modesign.png" alt="Фото">
            </a>
        </li>
        <li class="brands__list-item">
            <a href="/product-category/brands/natisa/">
                <img src="/wp-content/uploads/2023/07/logo-natisa-1.png" alt="Фото">
            </a>
        </li>
        <li class="brands__list-item">
            <a href="/product-category/brands/franco-bianchini/">
                <img src="/wp-content/uploads/2023/08/logo-1-2.svg" alt="Фото">
            </a>
        </li>
        <li class="brands__list-item">
            <a href="/product-category/brands/nicoline/">
                <img src="/wp-content/uploads/2023/07/frame-8.png" alt="Фото">
            </a>
        </li>
    </ul>
</div>
<section class="prs layout js-prs js-prs-2">
    <div class="prs__top">
        <h2 class="prs__title title-2">Выбор дизайнеров</h2>
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
            <?php render_prs('prs-choose'); ?>
        </div>
    </div>
</section>
<section class="ph">
    <div class="ph__slider js-ph-slider">
        <div class='swiper-wrapper'>
            <?php if( get_field('ttp2-slider') ): ?>
            <?php while( has_sub_field('ttp2-slider') ): ?>
                <div class='swiper-slide'>
                    <div class="ph__pic">
                        <div class="pht">
                            <div class="pht__pic">
                                <img src="<?php the_sub_field('ttp2'); ?>" alt="Фото" class="pht__pic-img">
                            </div>
                            <?php
                            if( get_sub_field('ttp2-list') ): ?>
                                <?php while( has_sub_field('ttp2-list') ): ?>
                                    <div class="pht__tt" style="left: <?php the_sub_field('ttp2-list-x'); ?>%;top: <?php the_sub_field('ttp2-list-y'); ?>%;">
                                        <button type="button" class="pht__tt-btn js-pht-tt-btn"></button>
                                        <div class="pht__tt-card js-pht-tt-card <?php
                                            $checkLeft = get_sub_field('ttp2-list-side'); 
                                            if ($checkLeft) {
                                                echo 'pht__tt-card--left';
                                            }

                                            ?>">
                                            <button class="pht__tt-card-close js-pht-tt-card-close">
                                                <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.64265 0.357178L0.356934 9.64289" stroke="#070605"
                                                        stroke-width="0.714286" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M0.356934 0.357178L9.64265 9.64289" stroke="#070605"
                                                        stroke-width="0.714286" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                            <?php
                                                $tt2_product_id = get_sub_field('ttp2-list-pr'); 
                                                $tt2_product = wc_get_product( $tt2_product_id );

                                                $tt2_p_image_url = wp_get_attachment_url( $tt2_product->get_image_id());
                                                $tt2_link = get_permalink($tt2_product_id);
                                                ?>
                                            <div class="pht__tt-card-pic">
                                                <img src="<?php echo $tt2_p_image_url; ?>" alt="Фото" class="pht__tt-card-img">
                                            </div>
                                            <h5 class="pht__tt-card-title">
                                                <?php echo $tt2_product->get_name();?>
                                            </h5>
                                            <p class="pht__tt-card-desc">
                                                <?php the_sub_field('ttp2-list-desc'); ?>
                                            </p>
                                            <a href="<?php echo $tt2_link; ?>" class="pht__tt-card-link">Узнать больше</a>
                                        </div>
                                    </div>

                                <?php endwhile; ?>

                            <?php endif;?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="ph__slider-nav">
            <div class="ph__slider-nav-content layout">
                <div class="swiper-button-prev"><svg width="12" height="20" viewBox="0 0 12 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.5 0.714111L1.71429 9.49983C1.64596 9.56395 1.5915 9.64141 1.55427 9.7274C1.51704 9.8134 1.49783 9.90612 1.49783 9.99983C1.49783 10.0935 1.51704 10.1863 1.55427 10.2722C1.5915 10.3582 1.64596 10.4357 1.71429 10.4998L10.5 19.2855"
                            stroke="#BFBFBF" stroke-width="1.42857" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="swiper-button-next"><svg width="12" height="20" viewBox="0 0 12 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.5 0.714111L10.2857 9.49983C10.354 9.56395 10.4085 9.64141 10.4457 9.7274C10.483 9.8134 10.5022 9.90612 10.5022 9.99983C10.5022 10.0935 10.483 10.1863 10.4457 10.2722C10.4085 10.3582 10.354 10.4357 10.2857 10.4998L1.5 19.2855"
                            stroke="#BFBFBF" stroke-width="1.42857" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="ph__slider-pag">
            <div class="ph__slider-pag-content layout">
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<section class="section-text layout">
    <ul class="section-text__block">
        <li class="section-text__block-1">
            <h2 class="title-2">
                Откройте для себя кровати Noctis
            </h2>
            <p class="text text-accent" style="margin-top: 8px;"><svg style="margin-bottom: 6px;" width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2.08832 0L1.49663 3.55024H2.33196V7H0V3.55024L0.870132 0H2.08832ZM6.29976 0L5.70807 3.55024H6.5434V7H4.21144V3.55024L5.08157 0H6.29976Z" fill="#9A8873"/>
            </svg>
            Потому что прекрасное нужно жить каждый день ... и каждую ночь <svg style="margin-bottom: 6px; transform: rotate(180deg);" width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2.08832 0L1.49663 3.55024H2.33196V7H0V3.55024L0.870132 0H2.08832ZM6.29976 0L5.70807 3.55024H6.5434V7H4.21144V3.55024L5.08157 0H6.29976Z" fill="#9A8873"/>
            </svg></p>
        </li>
        <li class="section-text__block-2">
            <p class="section-text__block-2-text text">
            Компания Noctis было основана в 1998 году, и с тех пор уже успела завоевать Европейский рынок мягкой мебели и выйти на мировой уровень производства
            <br><br>
            Яркие и неординарные эксперименты с дизайном кроватей, позволили выделить мебель Noctis из итальянских брендов. Философия компании – создание ярких, ультрасовременных кроватей и эрогономичных, которые способны преобразить интерьер
            </p>
            <!-- <a class="section-text__block-2-btn text" href="#" style="font-weight: 400;"> Читать больше ... </a> -->
        </li>
    </ul>
</section>
<section class="prs layout js-prs js-prs-3">
    <div class="prs__top">
        <h2 class="prs__title title-2">Избранные модели Noctis</h2>
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
            <?php render_prs('prs-brand'); ?>
        </div>
    </div>
</section>
<!-- <section class="ph"  style="margin-bottom: 0;">
    <div class="ph__slider js-ph-slider">
        <div class='swiper-wrapper'>
            <?php if( get_field('ttp3-slider') ): ?>
            <?php while( has_sub_field('ttp3-slider') ): ?>
                <div class='swiper-slide'>
                    <div class="ph__pic">
                        <div class="pht">
                            <div class="pht__pic">
                                <?php 
                                    $position = get_sub_field('ttp3-position');

                                    if ($position) {
                                       ?>
                                            <style>
                                                .pht__pic-img-<?php echo $position; ?> {
                                                    object-position: <?php echo $position; ?>%;
                                                }
                                            </style>
                                       <?php
                                    }
                                ?>
                                <img src="<?php the_sub_field('ttp3'); ?>" alt="Фото" class="pht__pic-img <?php 
                                     if ($position) {
                                        echo "pht__pic-img-".$position;
                                     }
                                ?>">
                            </div>
                            <?php
                            if( get_sub_field('ttp3-list') ): ?>
                                <?php while( has_sub_field('ttp3-list') ): ?>
                                    <div class="pht__tt" style="left: <?php the_sub_field('ttp3-list-x'); ?>%;top: <?php the_sub_field('ttp3-list-y'); ?>%;">
                                        <button type="button" class="pht__tt-btn js-pht-tt-btn"></button>
                                        <div class="pht__tt-card js-pht-tt-card <?php
                                            $checkLeft = get_sub_field('ttp3-list-side'); 
                                            if ($checkLeft) {
                                                echo 'pht__tt-card--left';
                                            }

                                            ?>">
                                            <button class="pht__tt-card-close js-pht-tt-card-close">
                                                <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.64265 0.357178L0.356934 9.64289" stroke="#070605"
                                                        stroke-width="0.714286" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M0.356934 0.357178L9.64265 9.64289" stroke="#070605"
                                                        stroke-width="0.714286" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                            <?php
                                                $tt3_product_id = get_sub_field('ttp3-list-pr'); 
                                                $tt3_product = wc_get_product( $tt3_product_id );

                                                $tt3_p_image_url = wp_get_attachment_url( $tt3_product->get_image_id());
                                                $tt3_link = get_permalink($tt3_product_id);
                                                ?>
                                            <div class="pht__tt-card-pic">
                                                <img src="<?php echo $tt3_p_image_url; ?>" alt="Фото" class="pht__tt-card-img">
                                            </div>
                                            <h5 class="pht__tt-card-title">
                                                <?php echo $tt3_product->get_name();?>
                                            </h5>
                                            <p class="pht__tt-card-desc">
                                                <?php the_sub_field('ttp3-list-desc'); ?>
                                            </p>
                                            <a href="<?php echo $tt3_link; ?>" class="pht__tt-card-link">Узнать больше</a>
                                        </div>
                                    </div>

                                <?php endwhile; ?>

                            <?php endif;?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section> -->
<section class="preview">
    <div class="preview__pic preview__pic--first">
        <img src="/wp-content/uploads/2023/07/rectangle-6.jpg" alt="Фото"
            class="preview__pic-img">
    </div>
    <div class="preview__video">
        <video preload="none" class="preview__video-bd" width="100%" height="100%" autoplay="true"
            muted="true" loop="true" playsinline="" poster="/wp-content/uploads/2023/07/rectangle-6-1.jpg">
            <source src="/wp-content/uploads/2023/07/img_3486.ogv"
                type="video/ogg;">
            <source src="/wp-content/uploads/2023/07/img_3486.mp4"
                type="video/mp4;">
            <source src="/wp-content/uploads/2023/07/img_3486.webm"
                type="video/webm;">
        </video>
    </div>
    <div class="preview__pic">
        <img src="/wp-content/uploads/2023/07/rectangle-6-1.jpg" alt="Фото"
            class="preview__pic-img">
    </div>
</section>
<section class="section-text layout">
    <ul class="section-text__block">
        <li class="section-text__block-1">
            <h2 class="title-2">
            Идеальное сочетание ар-деко и современного стиля
            </h2>
            <p class="text text-accent" style="margin-top: 8px;"><svg style="margin-bottom: 6px;" width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2.08832 0L1.49663 3.55024H2.33196V7H0V3.55024L0.870132 0H2.08832ZM6.29976 0L5.70807 3.55024H6.5434V7H4.21144V3.55024L5.08157 0H6.29976Z" fill="#9A8873"/>
            </svg>
            Уже два поколения демонстрируем совершенство «Сделано в Италии» по всему миру <svg style="margin-bottom: 6px; transform: rotate(180deg);" width="7" height="7" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2.08832 0L1.49663 3.55024H2.33196V7H0V3.55024L0.870132 0H2.08832ZM6.29976 0L5.70807 3.55024H6.5434V7H4.21144V3.55024L5.08157 0H6.29976Z" fill="#9A8873"/>
            </svg></p>
        </li>
        <li class="section-text__block-2">
            <p class="section-text__block-2-text text">
            Компания Franco Bianchini существует с 1968 года. Бренд разрабатывает и производит мебель непревзойденного стиля, создавая изысканные коллекции, в которых дизайн является не просто признаком, а синонимом качества, исследований и возвращения к итальянским традициям. 
            </p>
            <p class="section-text__block-2-text text">
            Каждая коллекция Franco Bianchini - это результат инновационных идей и стилистических решений, направленных на то, чтобы удивлять. Изделия говорят об эксклюзивности, как в выборе драгоценных материалов, так и в оригинальных и утонченных формах
            </p>
        </li>
    </ul>
</section>
<section class="prs layout js-prs js-prs-4">
    <div class="prs__top">
        <h2 class="prs__title title-2">Избранные модели Franco Bianchini</h2>
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
            <?php render_prs('prs-choose-2'); ?>
        </div>
    </div>
</section>
<section class="section-application" style="margin-top: 0;">
    <ul class="section-application__block layout">
        <li class="section-application__block-1">
            <h2 class="title-2">
                Подберем идеальную мебель 
                и декор для вашего дома
            </h2>
        </li>
        <li class="section-application__block-2">
            <p class="section-application__block-2-text text">
                Поможем сменить обстановку, подобрать мебель для всей квартиры под ваш стиль или выбрать подходящий декор
            </p>
            <p class="section-application__block-2-text text">
                Наши дизайнеры создадут гармоничную подборку мебели под любой ваш запрос
            </p>
            <button class="section-application__block-2-button button button-1 js-base-popup-toggle" type="button"> Оставить заявку </button>
        </li>
    </ul>
</section>

<?php get_footer();