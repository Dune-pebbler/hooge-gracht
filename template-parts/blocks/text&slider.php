<?php
$text_block = get_sub_field('text_block');
?>
<section class="text_slider">
    <div class="container-fluid fade-in-on-scroll">
        <div class="row">
            <div class="col-12 col-lg-8 p-0">
                <div class="text_slider__image-container ">
                    <?php if (have_rows('image_block')): ?>
                        <div class="owl-carousel text-with-image-carousel">
                            <?php while (have_rows('image_block')):
                                the_row();
                                $img = get_sub_field('repeater_img');
                                if ($img): ?>
                                    <div class="item">
                                        <img src="<?= esc_url($img['url']); ?>" alt="<?= esc_attr($img['alt']); ?>">
                                    </div>
                                <?php endif;
                            endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="text_slider__text-container">
                    <?= $text_block; ?>
                </div>
            </div>


        </div>
    </div>
</section>

<script>
    jQuery(document).ready(function ($) {
        $('.text-with-image-carousel').owlCarousel({
            items: 3, // default
            loop: true,
            dots: true,
            nav: false,
            autoplay: false,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            margin: 5,
            responsive: {
                0: { // mobile
                    items: 1
                },
                768: { // tablet
                    items: 3
                },
                1024: { // desktop
                    items: 3
                }
            }
        });
    });
</script>