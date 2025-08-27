<?php
$logo = get_field('header_logo', 'option');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://use.typekit.net/dfb3xvw.css">
  <title>
    <?php wp_title(); ?>
  </title>
  <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>

  <div class="nav-logo">
    <a href="/home">
      <div class="nav-logo__container">
        <img src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>">
      </div>
    </a>
  </div>
  <!-- Fixed Bottom-Right Navigation -->
  <nav class="bottom-nav">

    <div class="nav-container">

      <!-- Hamburger Menu Button -->
      <div class="hamburger">
        <div class="hamburger-line"></div>
        <div class="hamburger-line"></div>
        <div class="hamburger-line"></div>
      </div>

      <!-- Menu Items (hidden by default on mobile) -->
      <div id="nav-items">
        <div class="nav-logo-mobile">
          <div class="nav-logo-mobile__container">
            <a href="/home">
              <img src="<?= get_template_directory_uri(); ?>/images/Logo Wit.svg" alt="<?= esc_attr($logo['alt']); ?>">

            </a>
          </div>
        </div>
        <div id="cross">
          <div class="cross-line-1"></div>
          <div class="cross-line-2"></div>
        </div>

        <?php
        wp_nav_menu([
          'theme_location' => 'primary',
          'menu_class' => 'primary-nav',
          'container_class' => 'menu-primary-container',
        ]);
        ?>
      </div>
  </nav>

  <main>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const navLogo = document.querySelector('.nav-logo');

        window.addEventListener('scroll', function () {
          if (window.scrollY > 50) { // adjust "50" to when you want the effect to trigger
            navLogo.classList.add('scrolled');
          } else {
            navLogo.classList.remove('scrolled');
          }
        });
      });
    </script>