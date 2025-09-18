<?php
$text_with_map__text_field = get_sub_field('text_with_map__text_field');
$text_with_map__map_field = get_sub_field('text_with_map__map_field');
?>
<section class="text_with_map fade-in-on-scroll" id="locatie">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-12 col-lg-5">
                <div class="text_with_map__text-container">
                    <div class="text_with_map__text-content">
                        <?= $text_with_map__text_field; ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-7 p-0">
                <div class="text_with_map__image-container">
                    <a href="https://maps.app.goo.gl/e9TJFCt6qBoeUymF6" target="_blank" rel="noopener noreferrer">
                        <img src="<?= $text_with_map__map_field['url']; ?>"
                            alt="<?= $text_with_map__map_field['alt']; ?>">
                    </a>
                    <!-- <div class="image-container-svg">
                        <img src="<?= get_template_directory_uri(); ?>/images/heden-verleden.svg"
                            alt="<?= esc_attr($logo['alt']); ?>">
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>