<?php
$text_block = get_sub_field('text_block');
$image_block = get_sub_field('image_block');
$reverse_layout = get_sub_field('reverse_layout');
$button_link = get_sub_field('button_link');
?>
<section class="text_with_image">
    <div class="container">
        <div class="row justify-content-center<?= $reverse_layout ? ' reverse' : '' ?>">

            <div class="col-12 col-lg-6">
                <div class="text_with_image__text-container slide-left-on-scroll">
                    <?= $text_block; ?>
                    <div class="text_with_image__button-container">
                        <a href="<?= $button_link['url']; ?>">
                            <?= $button_link['title']; ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="14.728" viewBox="0 0 24 14.728">
                                <path id="Arrow_1_Stroke_" data-name="Arrow 1 (Stroke)"
                                    d="M17.343.293l6.364,6.364a1,1,0,0,1,0,1.414l-6.364,6.364a1,1,0,1,1-1.414-1.414l4.657-4.657H0v-2H20.586L15.929,1.707A1,1,0,1,1,17.343.293Z"
                                    fill="#dee1e6" fill-rule="evenodd" />
                            </svg>
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-12 col-lg-5 p-0">
                <div class="text_with_image__image-container slide-right-on-scroll">
                    <img src="<?= $image_block['url']; ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</section>