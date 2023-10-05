<?php /* Template Name: Варианты отделки */ ?>
<?php get_header();?>
<section class="poster poster-var1">
    <div class="poster__pic">
        <img alt="" data-src="/wp-content/uploads/2023/08/photo_2023-08-02-15.56.03.jpeg"
            class="poster__pic-img lazyloaded" src="<?php ic_image_directory();?>otdjpg.jpg">
    </div>
    <div class="poster__block layout">
        <h1 class="poster__block-subtitle title"><?php the_title();?></h1>
    </div>
</section>
<section class="otd layout">
<?php

$repeater = get_field('b-list');

foreach( $repeater as $item ) {	
    ?>
        <div class="otd__block">
            <h2 class="otd__block-title title-2">
                <?php echo $item['b-zag'];  ?>
            </h2>
            <?php
                    foreach ( $item['b-inner-grid'] as $subitem ) {
                        ?>
                            <h3 class="otd__block-subtitle">
                                <?php echo $subitem['b-inner-zag'];  ?>
                            </h3>
                            <ul class="otd__block-list">
                            <?php 
                                foreach ( $subitem['b-inner-list'] as $subsubitem ) {
                                    
                                    ?>
                                    <li class="otd__block-list-item">
                                        <div class="otd__block-list-item-pic">
                                            <img src="<?php echo $subsubitem['b-inner-list-pic']['link']; ?>" alt="Фото" class="otd__block-list-item-img">
                                        </div>
                                        <p class="otd__block-list-item-title title-4">
                                            <?php 
                                                if (!$subsubitem['b-inner-list-title']) {
                                                    echo $subsubitem['b-inner-list-pic']['title'];
                                                } else {
                                                    echo $subsubitem['b-inner-list-title'];
                                                }
                                            ?>
                                        </p>
                                    </li>
                                    <?php
                                }
                            ?>
                            </ul>
                        <?php
                    }
            ?>
        </div>
        <?php
    }
    ?>
</section>

<?php get_footer();