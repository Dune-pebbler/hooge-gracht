<?php get_header(); ?>

<section class="news-archive">
    <div class="container fade-in-on-scroll">
        <div class="row news-grid" id="news-container">

            <?php if (have_posts()): ?>
                <?php while (have_posts()):
                    the_post(); ?>
                    <?php
                    $button_link = [
                        'url' => get_permalink(),
                        'title' => __('Lees meer', 'textdomain')
                    ];
                    ?>
                    <div class="col-md-4 news-item-wrap">
                        <a href="<?= $button_link['url']; ?>" class="news-item-link">
                            <div class="news-item">
                                <?php if (has_post_thumbnail()): ?>
                                    <div class="news-thumb">
                                        <?php the_post_thumbnail('full'); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="news-content">
                                    <h2><?php the_title(); ?></h2>
                                    <div class="news-content-container">
                                        <span class="news-date"><?php echo get_the_date('d/m/Y'); ?></span>
                                        <div class="news-excerpt">
                                            <?php
                                            // 1. Define your desired character limit
                                            $limit = 250;

                                            // 2. Get the raw excerpt text
                                            $excerpt = get_the_excerpt();

                                            // 3. Check if the text is longer than the limit
                                            if (strlen($excerpt) > $limit) {
                                                // Cut the string to the limit
                                                $excerpt = substr($excerpt, 0, $limit);
                                                // Ensure it doesn't end in the middle of a word
                                                $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));
                                                // Add an ellipsis
                                                echo $excerpt . '...';
                                            } else {
                                                // If it's shorter, display it as is
                                                echo $excerpt;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="news_button">
                                        <span><?= $button_link['title']; ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="14.728"
                                                viewBox="0 0 24 14.728">
                                                <path
                                                    d="M17.343.293l6.364,6.364a1,1,0,0,1,0,1.414l-6.364,6.364a1,1,0,1,1-1.414-1.414l4.657-4.657H0v-2H20.586L15.929,1.707A1,1,0,1,1,17.343.293Z"
                                                    fill="#dee1e6" fill-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>

            <?php else: ?>
                <p><?php _e('Geen nieuws gevonden.', 'textdomain'); ?></p>
            <?php endif; ?>

        </div> <?php
        // Use the global query object to check the number of pages
        global $wp_query;

        // Only show pagination if there is more than one page
        if ($wp_query->max_num_pages > 1): ?>
            <div class="row">
                <div class="col-12 pagination-wrapper">
                    <?php
                    // Display the pagination links
                    the_posts_pagination([
                        'prev_text' => __('Vorige', 'textdomain'),
                        'next_text' => __('Volgende', 'textdomain'),
                        'screen_reader_text' => ' ' // Hides the default "Posts navigation" text
                    ]);
                    ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</section>

<?php get_footer(); ?>