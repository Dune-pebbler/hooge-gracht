<section class="news">
    <div class="container">
        <div class="row">
            <div class="news-carousel owl-carousel">

                <?php
                $nieuws_query = new WP_Query([
                    'post_type' => 'nieuws',
                    'posts_per_page' => 3,
                ]);

                if ($nieuws_query->have_posts()):
                    while ($nieuws_query->have_posts()):
                        $nieuws_query->the_post();
                        $button_link = [
                            'url' => get_permalink(),
                            'title' => __('Lees meer', 'textdomain')
                        ];
                        ?>

                        <div class="news-item">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="news-thumb">
                                    <?php the_post_thumbnail('full'); ?>
                                </div>
                            <?php endif; ?>

                            <div class="news-content">
                                <h2><?php the_title(); ?></h2>
                                <span class="news-date"><?php echo get_the_date('d/m/Y'); ?></span>
                                <div class="news-excerpt"><?php the_excerpt(); ?></div>
                                <div class="news_button">

                                    <a href="<?= $button_link['url']; ?>">
                                        <?= $button_link['title']; ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="14.728"
                                            viewBox="0 0 24 14.728">
                                            <path id="Arrow_1_Stroke_" data-name="Arrow 1 (Stroke)"
                                                d="M17.343.293l6.364,6.364a1,1,0,0,1,0,1.414l-6.364,6.364a1,1,0,1,1-1.414-1.414l4.657-4.657H0v-2H20.586L15.929,1.707A1,1,0,1,1,17.343.293Z"
                                                fill="#dee1e6" fill-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                    <?php endwhile;
                    wp_reset_postdata();
                else:
                    echo '<p>' . __('Geen nieuws gevonden.', 'textdomain') . '</p>';
                endif;
                ?>

            </div>
        </div>
    </div>
</section>

<script>
    jQuery(document).ready(function ($) {
        $('.news-carousel').owlCarousel({
            items: 3,
            loop: true,
            margin: 20,
            dots: true,
            nav: false,
            autoplay: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1024: {
                    items: 3
                }
            }
        });
    });
</script>