<?php
$background_impression = get_sub_field('background_impression');
$outside_impression = get_sub_field('outside_impression');
$inside_impression = get_sub_field('inside_impression');
$outside_text = get_sub_field('outside_text');
$inside_text = get_sub_field('inside_text');
$block_title = get_sub_field('block_title');
// Determine availability of impressions
$has_outside = !empty($outside_impression) && !empty($outside_impression['url']);
$has_inside = !empty($inside_impression) && !empty($inside_impression['url']);
?>
<section class="impression_block" id="situatie">
    <div class="container-fluid">
        <div class="row justify-content-center background-image-row">
            <h2><?= $block_title; ?></h2>
            <div class="col-11 col-md-10 col-lg-8 p-0">
                <div class="impression_block__background-image-container">
                    <img src="<?= $background_impression['url']; ?>" alt="<?= $background_impression['alt']; ?>">
                </div>
            </div>
        </div>
        <?php if ($has_outside || $has_inside): ?>
            <div class="row justify-content-center impression-banner">
                <?php if ($has_outside): ?>
                    <div class="col-12 col-md-6 col-lg-4 p-0 ">
                        <div
                            class="impression_block__outside-image-container<?= (!$has_inside ? ' single' : ''); ?> slide-left-on-scroll">
                            <img src="<?= $outside_impression['url']; ?>" alt="<?= $outside_impression['alt']; ?>">
                        </div>
                        <?php if (!empty($outside_text)): ?>
                            <div class="impression_block__text-container slide-left-on-scroll">
                                <h2><?= $outside_text; ?></h2>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ($has_inside): ?>
                    <div class="col-12 col-md-6 col-lg-8 p-0 ">
                        <div
                            class="impression_block__inside-image-container<?= (!$has_outside ? ' single' : ''); ?> slide-right-on-scroll">
                            <img src="<?= $inside_impression['url']; ?>" alt="<?= $inside_impression['alt']; ?>">
                        </div>
                        <?php if (!empty($inside_text)): ?>
                            <div class="impression_block__text-container slide-right-on-scroll">
                                <h2><?= $inside_text; ?></h2>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>