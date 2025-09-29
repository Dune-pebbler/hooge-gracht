</main>
<?php
//this is where the acf fields will be defined
?>
<footer>
  <div class="container">
    <div class="row justify-content-center">
      <?php if (have_rows('footer_info_repeater', 'option')): ?>
        <?php while (have_rows('footer_info_repeater', 'option')):
          the_row();
          $title = get_sub_field('company_role');
          $url = get_sub_field('company_url');
          $logo = get_sub_field('company_logo'); // image field
          $adres = get_sub_field('company_adres');
          $email = get_sub_field('company_email');
          $phone = get_sub_field('company_phone');
          $zip = get_sub_field('company_zip');
          ?>
          <div class="col-md-6 col-lg-3">
            <a class="footer-content-container">
              <?php if ($title): ?>
                <h2><?php echo $title; ?></h2>
              <?php endif; ?>

              <?php if ($logo): ?>
                <a href="<?php echo $url; ?>" target="_blank"><img src="<?php echo $logo['url']; ?>"
                    alt="<?php echo $logo['alt'] ?? $title; ?>"></a>
              <?php endif; ?>

              <?php if ($adres): ?>
                <p><?php echo $adres; ?></p>
              <?php endif; ?>

              <?php if ($zip): ?>
                <p><?php echo $zip; ?></p>
              <?php endif; ?>

              <?php if ($email): ?>
                <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
              <?php endif; ?>

              <?php if ($phone): ?>
                <a href="tel:<?php echo preg_replace('/\s+/', '', $phone); ?>"><?php echo $phone; ?></a>
              <?php endif; ?>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
  <div class="row justify-content-center align-items-center">
    <div class="col-12">
      <div class="under-footer-container">
        <a href="/privacybeleid">Privacy statement</a> -
        <a target="_blank" href="https://dunepebbler.nl/">website door:
          <svg id="Group_116" data-name="Group 116" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 45.994"
            style="width: 40px; height: 40px; vertical-align: middle; margin-left: 5px;">
            <defs>
              <style>
                .cls-1 {
                  fill: #ffffff;
                }
              </style>
            </defs>
            <path id="Path_48" data-name="Path 48" class="cls-1"
              d="M23,0c-.343,0-.68.006-1.017.025a1.176,1.176,0,0,1,.074.435V33.295a.889.889,0,0,1-.968,1h-.619c-.619,0-.968-.306-.968-.888V32.137c-.306.692-1.544,2.279-4.441,2.279-3.32,0-5.25-2.126-5.25-5.6V18.041c0-3.59,2.046-5.679,5.366-5.679,2.781,0,3.939,1.354,4.288,2.009V.459a1.855,1.855,0,0,1,.012-.19A23,23,0,0,0,23,45.994c.312,0,.619-.006.925-.018V13.459a.889.889,0,0,1,.968-1h.619c.619,0,.968.306.968.888v1.274c.306-.692,1.544-2.279,4.441-2.279,3.32,0,5.25,2.126,5.25,5.6V28.706c0,3.59-2.046,5.679-5.366,5.679-2.781,0-3.939-1.354-4.288-2.009V45.724A23,23,0,0,0,23,0Z" />
            <path id="Path_49" data-name="Path 49" class="cls-1"
              d="M436.369,256.653c2.242,0,3.4-1.195,3.4-3.473V242.637c0-2.242-1.158-3.437-3.4-3.437-2.009,0-3.669,1.158-3.669,3.357V253.29C432.7,255.5,434.36,256.653,436.369,256.653Z"
              transform="translate(-406.193 -224.547)" />
            <path id="Path_50" data-name="Path 50" class="cls-1"
              d="M205.7,239c-2.242,0-3.4,1.195-3.4,3.473v10.543c0,2.242,1.158,3.437,3.4,3.437,2.009,0,3.669-1.158,3.669-3.357V242.363C209.369,240.158,207.709,239,205.7,239Z"
              transform="translate(-189.907 -224.359)" />
          </svg>

        </a>
      </div>
    </div>
  </div>
  </div>
</footer>

<script>
  const currentYear = new Date().getFullYear();
  document.getElementById("copyright").innerHTML =
    `&copy; ${currentYear}`;
</script>
<?php wp_footer(); ?>
</body>

</html>
</main>