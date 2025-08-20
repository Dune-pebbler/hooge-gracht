<?php
$form_description = get_sub_field('form_description');
?>
<section class="interest_form" id="interesse?">
    <div class="container fade-in-on-scroll">
        <div class="row">
            <div class="col-10">
                <div class="interest_form__description-container">
                    <?= $form_description; ?>
                </div>
                <div class="interest_form__form-container">
                    <?php echo do_shortcode('[gravityform id="1" title="false"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>