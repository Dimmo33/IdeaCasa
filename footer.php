<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IdeeCasa
 */

?>

    </main>
<footer class="footer">
    <div class="footer__body layout">
        <div class="footer__body-info">
            <div class="footer__body-info-top">
                <div class="footer__body-info-top-pic">
                    <img class="footer__body-info-top-pic-img" src="<?php echo ic_image_directory()?>logo-white.svg" alt="">
                </div>
                <div class="footer__body-info-top-contacts">
                    <div class="footer__body-info-top-contacts-call">
                        <a class="footer__body-info-top-contacts-text title-4-bold" href="tel:+74951721524">
                            +7 (495) 172 15 24</a>
                    </div>
                    <div class="footer__body-info-top-contacts-email">
                        <a class="footer__body-info-top-contacts-text title-4-bold"
                            href="mailto:info@ideecasainterior.ru"> info@ideecasainterior.ru </a>
                    </div>
                </div>
            </div>
            <div class="footer__body-info-bottom">
                <div class="footer__body-info-bottom-content">
                    <p
                        class="text footer__body-info-bottom-content-text footer__body-info-bottom-content-text--var2">
                        Пн - Вс 10:00 - 21:00
                    </p>
                    <p class="text footer__body-info-bottom-content-text">
                        г. Москва , Щипковский переулок, 4
                    </p>
                    <p class="text footer__body-info-bottom-content-text">
                        ТЦ Mobel Expo, Нахимовский проспект 24
                    </p>
                </div>
            </div>
        </div>
        <ul class="footer__body-columns">
            <li class="footer__body-columns-block footer__body-columns-block--1">
                <ul class="footer__body-columns-list">
                    <li class="footer__body-columns-list-item">
                        <h4 class="title-4-bold footer__body-columns-list-item-subtitle">
                            Каталог
                        </h4>
                        
                       <?php ic_menu_footer();?>
                    </li>
                </ul>
            </li>
            <li class="footer__body-columns-block footer__body-columns-block--2">
                <ul class="footer__body-columns-list">
                    <li class="footer__body-columns-list-item">
                        <h4 class="title-4-bold footer__body-columns-list-item-subtitle">
                            О компании
                        </h4>
                        <a class="text footer__body-columns-list-item-text" href="/about">
                            О нас
                        </a>
                        <a class="text footer__body-columns-list-item-text" href="/contacts/">
                            Контакты
                        </a>
                    </li>
                </ul>
            </li>
            <li class="footer__body-columns-block footer__body-columns-block--3">
                <ul class="footer__body-columns-list">
                    <li class="footer__body-columns-list-item">
                        <h4 class="title-4-bold footer__body-columns-list-item-subtitle">
                            Клиентам
                        </h4>
                        <a class="text footer__body-columns-list-item-text" href="/where-buy/">
                            Где купить
                        </a>
                        <a class="text footer__body-columns-list-item-text" href="/delivery/">
                            Доставка и оплата
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="footer__bottom layout">
        <div class="footer__bottom-body">
            <div class="footer__bottom-body-content">
                <a class="text footer__bottom-body-content-link" href="/privacy-policy/">
                    Политика конфиденциальности
                </a>
                <a class="text footer__bottom-body-content-link" href="#">
                    Пользовательское соглашение
                </a>
                <p class="text footer__bottom-body-content-text">
                    © Ideecasa 2006-2023. Все права защищены.
                </p>
            </div>
        </div>
    </div>
</footer>
<style>
    .notiny-base.notiny-theme-wooac.notiny-with-img {
        display: none !important;
    }
    .notiny-base.notiny-theme-wooac.notiny-with-img:last-child {
        display: flex !important;
    }
    .screen-reader-text {
        display: none;
    }
</style>

<?php wp_footer(); ?>

</body>
</html>
