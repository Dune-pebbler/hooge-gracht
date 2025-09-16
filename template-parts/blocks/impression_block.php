<?php
$background_impression = get_sub_field('background_impression');
$outside_impression = get_sub_field('outside_impression');
$inside_impression = get_sub_field('inside_impression');
$outside_text = get_sub_field('outside_text');
$inside_text = get_sub_field('inside_text');
?>
<section class="impression_block" id="situatie">
    <div class="container">
        <div class="row">
            <div class="col-12 p-0">
                <div class="impression_block__background-image-container">
                    <img src="<?= $background_impression['url']; ?>" alt="<?= $background_impression['alt']; ?>">
                </div>
            </div>
        </div>
        <div class="row justify-content-center impression-banner">
            <div class="col-12 col-md-6 col-lg-4 p-0 ">
                <div class="impression_block__outside-image-container slide-left-on-scroll">
                    <img src="<?= $outside_impression['url']; ?>" alt="<?= $outside_impression['alt']; ?>">
                </div>
                <div class="impression_block__text-container slide-left-on-scroll">
                    <h2><?= $outside_text; ?></h2>
                </div>
            </div>
            <div class="col12 col-md-6 col-lg-4 p-0 ">
                <div class="impression_block__inside-image-container slide-right-on-scroll">
                    <img src="<?= $inside_impression['url']; ?>" alt="<?= $inside_impression['alt']; ?>">
                </div>
                <div class="impression_block__text-container slide-right-on-scroll">
                    <h2><?= $inside_text; ?></h2>
                </div>
            </div>
        </div>
    </div>
</section>