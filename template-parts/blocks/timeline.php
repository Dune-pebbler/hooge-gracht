<section class="timeline">
    <div class="container">
        <div class="timeline-slider owl-carousel owl-theme">
            <?php if (have_rows('tijdlijn', 'option')): ?>
                <?php while (have_rows('tijdlijn', 'option')):
                    the_row(); ?>
                    <div class="timeline-slide <?= get_sub_field('is_disabled') ? 'disabled' : ''; ?>">

                        <?php if ($when = get_sub_field('when')): ?>
                            <h3><?= esc_html($when); ?></h3>
                        <?php endif; ?>

                        <?php if ($image = get_sub_field('afbeelding')): ?>
                            <img src="<?= esc_url($image['url']); ?>" loading="lazy" alt="<?= esc_attr($when ?? ''); ?>" />
                        <?php endif; ?>

                        <p>
                            <?php if ($titel = get_sub_field('titel')): ?>
                                <strong><?= esc_html($titel); ?></strong>
                            <?php endif; ?>

                            <?php if ($subtitel = get_sub_field('subtitel')): ?>
                                <span><?= esc_html($subtitel); ?></span>
                            <?php endif; ?>
                        </p>

                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<script>
    jQuery(document).ready(function ($) {

        function timelineOptions(amount) {
            let navItems = $(".timeline-slider").find(".timeline-slide").length;

            return {
                items: amount,
                nav: navItems > amount,
                mouseDrag: navItems > amount,
                touchDrag: navItems > amount,
                pullDrag: navItems > amount,
                freeDrag: navItems > amount,
            };
        }

        function setOnTimelineSlider() {
            let carouselOptions = {
                ...timelineOptions(2),
                dots: false,
                margin: 25,
                navText: [
                    '<i class="fal fa-arrow-left"></i>',
                    '<i class="fal fa-arrow-right"></i>',
                ],
                responsive: {
                    768: {
                        ...timelineOptions(4),
                    },
                    1199: {
                        ...timelineOptions(5),
                    },
                    1360: {
                        margin: 100,
                        ...timelineOptions(6),
                    },
                    1500: {
                        margin: 50,
                        ...timelineOptions(8),
                    },
                },
            };

            $(".timeline-slider").on("initialized.owl.carousel", function () {
                $(this).find(".owl-item").last().addClass("last");
            });

            $(".timeline-slider").owlCarousel(carouselOptions);
        }

        setOnTimelineSlider();

    });
</script>