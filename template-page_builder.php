<?php
/*
 * Template Name: Page Builder
 */

get_header(); ?>

<?php if (have_rows('pagebuilder')): ?>
        <?php while (have_rows('pagebuilder')):
                the_row(); ?>

                <?php if (get_row_layout() === 'hero_banner'): ?>
                        <?php get_template_part('template-parts/blocks/hero_banner'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'hero_slider'): ?>
                        <?php get_template_part('template-parts/blocks/hero_slider'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'hero_slider_two_cols'): ?>
                        <?php get_template_part('template-parts/blocks/hero_slider_two_cols'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'text_with_image'): ?>
                        <?php get_template_part('template-parts/blocks/text_with_image'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'text_with_map'): ?>
                        <?php get_template_part('template-parts/blocks/text_with_map'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'text_block'): ?>
                        <?php get_template_part('template-parts/blocks/text_block'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'cards_block'): ?>
                        <?php get_template_part('template-parts/blocks/cards'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'text&slider'): ?>
                        <?php get_template_part('template-parts/blocks/text&slider'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'before_after_slider'): ?>
                        <?php get_template_part('template-parts/blocks/before_after_slider'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'impression_block'): ?>
                        <?php get_template_part('template-parts/blocks/impression_block'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'timeline'): ?>
                        <?php get_template_part('template-parts/blocks/timeline'); ?>
                <?php endif; ?>

                <?php if (get_row_layout() === 'news_block'): ?>
                        <?php get_template_part('template-parts/blocks/news_block'); ?>
                <?php endif; ?>

        <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>