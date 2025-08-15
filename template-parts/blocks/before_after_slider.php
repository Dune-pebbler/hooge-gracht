<?php
$before_img = get_sub_field('before_img');
$after_img = get_sub_field('after_img');
?>

<section class="before_after">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div class="before-after-slider" id="beforeAfterSlider">
                    <div class="after-image">
                        <img src="<?php echo $after_img['url']; ?>" alt="<?php echo $after_img['alt']; ?>">
                        <div class="image-label">After</div>
                    </div>
                    <div class="before-image">
                        <img src="<?php echo $before_img['url']; ?>" alt="<?php echo $before_img['alt']; ?>">
                        <div class="image-label">Before</div>
                    </div>
                    <div class="slider-handle" id="sliderHandle">
                        <div class="slider-line"></div>
                        <div class="slider-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="31.413" height="19.277"
                                viewBox="0 0 31.413 19.277">
                                <path
                                    d="M22.7.383l8.33,8.33a1.309,1.309,0,0,1,0,1.851l-8.33,8.33a1.309,1.309,0,0,1-1.851-1.851l6.1-6.1H0V8.33H26.944l-6.1-6.1A1.309,1.309,0,1,1,22.7.383Z"
                                    transform="translate(31.413 19.277) rotate(180)" fill="#35231c"
                                    fill-rule="evenodd" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="31.413" height="19.277"
                                viewBox="0 0 31.413 19.277">
                                <path
                                    d="M22.7.383l8.33,8.33a1.309,1.309,0,0,1,0,1.851l-8.33,8.33a1.309,1.309,0,0,1-1.851-1.851l6.1-6.1H0V8.33H26.944l-6.1-6.1A1.309,1.309,0,1,1,22.7.383Z"
                                    fill="#35231c" fill-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>