<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package IdeeCasa
 */

get_header();
?>

<section class="page-404">
    <div class="layout">
        <div class="page-404__content">
            <h2 class="page-404__content-title title">
                404
            </h2>
            <h2 class="page-404__content-subtitle title">
                Страница не найдена
            </h2>
            <p class="page-404__content-text text">
                Скорее всего, вы перешли по неправильной ссылке или такой страницы не существует
            </p>
            <div class="page-404__content-button">
                <a class="page-404__content-button-link button-1" href="#">
                    На главную страницу
                </a>
            </div>
        </div>
        <div class="page-404__pic">
            <img class="page-404__pic-img" src="<?php echo ic_image_directory()?>404-pic.jpg" alt="">
        </div>
    </div>
</section>

<?php
get_footer();
