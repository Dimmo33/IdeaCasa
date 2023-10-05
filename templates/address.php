<?php /* Template Name: Где купить */ ?>
<?php get_header();?>

<section class="poster poster-var1">
                <div class="poster__pic">
                    <img class="poster__pic-img" src="<?php echo ic_image_directory()?>address-poster.jpg" alt="">
                </div>
                <div class="poster__block layout">
                    <h1 class="poster__block-subtitle title">Где купить</h1>
                </div>
            </section>
            <section class="section-text layout">
                <ul class="section-text__block">
                    <li class="section-text__block-1">
                        <h2 class="title-2">
                            Адреса салонов
                        </h2>
                    </li>
                    <li class="section-text__block-2">
                        <p class="section-text__block-2-text text">
                            Вы можете посетить наши салоны в Москве в крупных мебельных торговых центрах, будем рады вас
                            видеть
                        </p>
                        <p class="text">
                            <span class="accent-color">Бесплатная парковка для наших клиентов</span>
                        </p>
                    </li>
                </ul>
            </section>

            <section class="map">

                <div class="map__body">
                    <div class="map__frame js-map-frame active">
                        <script type="text/javascript" charset="utf-8" async
                            src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aff25483ef812fbf9e7fbe26386721c8f362bb67b71add79f5018d6d591535a94&amp;width=100%25&amp;height=100%&amp;lang=ru_RU&amp;scroll=false"></script>
                    </div>
                    <div class="map__frame js-map-frame">
                        <script type="text/javascript" charset="utf-8" async
                            src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A4783c839fe8d4daed6f06ac5bab82084f2ee2663f23cb4064f88da7842c4047e&amp;width=100%25&amp;height=100%&amp;lang=ru_RU&amp;scroll=false"></script>
                    </div>
                    <div class="map__content layout">
                        <div class="map__card js-map-card active  js-map-toggle">
                            <h4 class="map__card-title title-4-bold">
                                ТЦ Твинстор
                            </h4>
                            <p class="map__card-text text">
                                г. Москва , Щипковский переулок, 4 А01-02-03
                            </p>
                            <a class="map__card-call text" href="tel:+7 495 790 41 74">+7 495 790 41 74</a>
                            <p class="map__card-text map__card-text--bottom text">
                                10:00 - 21:00
                            </p>
                            <button class="map__card-btn">
                                <span class="map__card-btn-text">
                                    Показать местоположение
                                </span>
                            </button>
                        </div>
                        <div class="map__card js-map-card js-map-toggle">
                            <h4 class="map__card-title title-4-bold">
                                ТЦ Mobel Expo
                            </h4>
                            <p class="map__card-text text">
                                г. Москва , Нахимовский проспект 24, 3 вход, 1 этаж, павильон П19-20
                            </p>
                            <a class="map__card-call text" href="tel:+7 966 333 08 80">+7 966 333 08 80</a>
                            <p class="map__card-text map__card-text--bottom text">
                                10:00 - 21:00
                            </p>
                            <button class="map__card-btn">
                                <span class="map__card-btn-text">
                                    Показать местоположение
                                </span>
                            </button>
                        </div>
                    </div>
            </section>
            <section class="section-text layout">
                <ul class="section-text__block">
                    <li class="section-text__block-1">
                        <h2 class="title-2">
                            Интернет-магазин
                        </h2>
                    </li>
                    <li class="section-text__block-2">
                        <p class="section-text__block-2-text text">
                            Сделайте заказ прямо из дома в нашем интернет-магазине. Широкий выбор итальянской мебели и
                            аксессуаров для дома
                        </p>
                        <a class="section-text__block-2-btn button button-2" href="/shop"> В каталог </a>
                    </li>
                </ul>
            </section>

<?php get_footer();