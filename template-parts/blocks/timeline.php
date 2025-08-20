<?php
$timeline_title = get_field('timeline_title', 'option');
?>
<section class="timeline" id="planning">
    <div class="container">
        <div class="timeline__title-container">
            <h2><?= $timeline_title; ?></h2>
        </div>
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