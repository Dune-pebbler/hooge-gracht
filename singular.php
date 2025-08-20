<?php get_header(); ?>



<section class="single">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <?php
                // Display featured image as a banner
                if (have_posts()):
                    while (have_posts()):
                        the_post();
                        if (has_post_thumbnail()): ?>
                            <div class="featured-banner">
                                <?php the_post_thumbnail('full', ['class' => 'img-fluid w-100']); ?>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; endif; ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">

                <?php
                if (have_posts()):
                    while (have_posts()):
                        the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="entry-header">
                                <h1 class="entry-title"><?php the_title(); ?></h1>
                            </header>

                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                        </article>

                    <?php endwhile;
                else: ?>
                    <p>No content found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>