/**
 * Main JavaScript file for the website.
 * This file handles event listeners, initializes plugins like Owl Carousel,
 * and manages custom UI interactions.
 */

// Use jQuery's ready function as the main entry point for the script.
// The dollar sign `$` is passed as an argument to avoid conflicts with other libraries.
jQuery(function ($) {
  // --- INITIALIZATION CALLS ---
  // All functions that need to run after the DOM is loaded should be called here.

  setHamburgerActiveToggle();
  initInView();
  initHeroSliderTwoCols();
  initProjectsCarousel();
  initBeforeAfterSlider();
  startOwlSlider(); // General Owl Carousel initializer
  initializeTimelineSlider(".timeline-slider"); // Specific timeline slider initializer

  // --- AJAX RELATED INITIALIZERS ---
  postcodeAutofill();
  setOnBtnAjaxFilter();

  // --- EVENT LISTENERS ---
  $(window).on("scroll", function () {
    // The hideOnScroll function is commented out as it seems incomplete.
    // hideOnScroll();
  });

  $(window).on("resize", function () {
    // Placeholder for any functions that need to run on window resize.
  });
});

// --- FUNCTION DEFINITIONS ---

/**
 * Toggles the active state for the hamburger menu and navigation.
 * Also prevents the body from scrolling when the menu is open.
 */
function setHamburgerActiveToggle() {
  jQuery(".hamburger").on("click", function () {
    jQuery(".hamburger").addClass("is-active");
    jQuery("#nav-items").addClass("is-active");
    jQuery("body, html").addClass("stop-scrolling");
  });

  jQuery("#cross").on("click", function () {
    jQuery(".hamburger").removeClass("is-active");
    jQuery("#nav-items").removeClass("is-active");
    jQuery("body, html").removeClass("stop-scrolling");
  });
}

/**
 * Hides the main header on scroll down.
 * NOTE: This function is incomplete. The variables `togglePosition` and `mainHeader`
 * need to be defined in the global scope for this to work.
 */
// let togglePosition = 0;
// const mainHeader = jQuery('header'); // Example definition
function hideOnScroll() {
  var currentScrollTop = jQuery(window).scrollTop();
  if (togglePosition < currentScrollTop && togglePosition > 180 && !isMobile) {
    mainHeader.addClass("hide");
  } else {
    mainHeader.removeClass("hide");
  }
  togglePosition = currentScrollTop;
}

/**
 * Initializes a generic Owl Carousel slider.
 */
function startOwlSlider() {
  // This targets all elements with .owl-carousel. To avoid conflict, ensure
  // more specific initializers (like timeline) run AFTER this or use more specific selectors.
  jQuery(
    ".owl-carousel:not(.timeline-slider):not(.projects-carousel):not(.hero-slider_two_cols .owl-carousel)"
  ).owlCarousel({
    dots: false,
    nav: true,
    margin: 12,
    navText: [
      '<img class="checkmark" src="/wp-content/themes/valkentij-theme/images/check.svg" alt="checkmark icon">',
      '<img class="checkmark" src="/wp-content/themes/valkentij-theme/images/check.svg" alt="checkmark icon">',
    ],
    responsive: {
      0: {
        items: 1,
        stagePadding: 32,
      },
      768: {
        items: 2,
      },
      1199: {
        items: 3,
      },
    },
  });
}

/**
 * Initializes the projects carousel with specific settings.
 */
function initProjectsCarousel() {
  jQuery(".projects-carousel").owlCarousel({
    items: 1,
    loop: true,
    margin: 0,
    nav: true,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    navText: [
      // Previous Arrow SVG
      `<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 70 70"><g id="Group_82" data-name="Group 82" transform="translate(-1620 -2559)"><circle id="Ellipse_1" data-name="Ellipse 1" cx="35" cy="35" r="35" transform="translate(1620 2559)" fill="#f58220"/><path id="Path_130" data-name="Path 130" d="M1143.152,3142.543l16.47,16.47-16.47,16.47" transform="translate(2806.387 5753.013) rotate(180)" fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="6"/></g></svg>`,
      // Next Arrow SVG
      `<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 70 70"><g id="Group_83" data-name="Group 83" transform="translate(-1707 -2559)"><circle id="Ellipse_2" data-name="Ellipse 2" cx="35" cy="35" r="35" transform="translate(1777 2629) rotate(180)" fill="#f58220"/><path id="Path_131" data-name="Path 131" d="M1143.152,3142.543l16.47,16.47-16.47,16.47" transform="translate(590.613 -565.013)" fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="6"/></g></svg>`,
    ],
  });
}

/**
 * Sets up an AJAX call to an API for postcode autofill functionality.
 */
function postcodeAutofill() {
  jQuery("#input_3_7").on("change", function () {
    var postcodeValue = jQuery("#input_3_3").val();
    var houseNumberValue = jQuery(this).val();

    jQuery.ajax({
      url: `https://postcode.tech/api/v1/postcode?postcode=${encodeURIComponent(
        postcodeValue
      )}&number=${encodeURIComponent(houseNumberValue)}`,
      headers: {
        Authorization: "Bearer 28d9bd81-3f4d-4cec-a05d-4ec732e9f578",
      },
      method: "GET",
      success: function (data) {
        jQuery("#input_3_5").val(data.city);
        console.log("Postcode data fetched successfully:", data);
      },
      error: function (error) {
        console.error("Error fetching postcode data:", error);
      },
    });
  });
}

/**
 * Sets up AJAX filtering for projects based on form input changes.
 */
function setOnBtnAjaxFilter() {
  jQuery(".filter-change").on("change", function () {
    jQuery("#all-projects").addClass("fade-out");
    jQuery("#loader").show();

    jQuery.ajax({
      url: ajax_object.ajax_url, // Passed from WordPress (functions.php)
      type: "POST",
      data: {
        action: "filter_projects",
        filters: {
          budget: {
            budgetFrom: jQuery("input[name='budget-from']").val(),
            budgetTo: jQuery("input[name='budget-to']").val(),
            field: "budget",
          },
          stays: {
            staysAmount: jQuery("#filter-stays").val(),
            field: "aantal_nachten",
          },
          people: {
            peopleAmount: jQuery("#filter-people").val(),
            field: "max_aantal_bruiloftsgasten",
          },
        },
      },
      success: function (response) {
        try {
          var responseData = JSON.parse(response);
          var htmlContent = responseData.html;
          var postCount = responseData.postCount;

          jQuery("#loader").hide();
          jQuery("#all-projects").html(htmlContent).removeClass("fade-out");
          jQuery("#filter-results").text(postCount);
        } catch (e) {
          console.error("Error parsing filter response:", e);
          jQuery("#loader").hide();
        }
      },
      error: function (error) {
        console.error("Error with AJAX filter request:", error);
        jQuery("#loader").hide();
      },
    });
  });
}

/**
 * Immediately-invoked function expression (IIFE) for website maintenance closure.
 * Redirects users if the site is within a specified maintenance window.
 */
(function () {
  var startDate = new Date("2024-11-22T13:47:00");
  var endDate = new Date("2024-11-22T13:56:00");
  var currentDate = new Date();
  var currentUrl = window.location.href;

  if (currentDate >= startDate && currentDate <= endDate) {
    if (currentUrl === "https://template-tim.dune-pebbler.nl/") {
      window.location.href =
        "https://template-tim.dune-pebbler.nl/niet-beschikbaar/";
    }
  }
})();

/**
 * Initializes the inView.js library to trigger animations on scroll.
 */
function initInView() {
  if (typeof inView === "undefined") {
    console.error("inView library not loaded");
    return;
  }

  const animationTargets = [
    ".fade-in-on-scroll",
    ".slide-left-on-scroll",
    ".slide-right-on-scroll",
    ".scale-up-on-scroll",
    ".rotate-in-on-scroll",
    ".bounce-in-on-scroll",
    ".flip-in-on-scroll",
    ".typewriter-on-scroll",
    ".delayed-on-scroll",
  ];

  inView(animationTargets.join(","))
    .on("enter", (el) => el.classList.add("in-view"))
    .on("exit", (el) => el.classList.remove("in-view"));

  // Special handler for staggered animations
  inView(".stagger-on-scroll")
    .on("enter", function (el) {
      el.querySelectorAll(".stagger-item").forEach((child, index) => {
        setTimeout(() => child.classList.add("in-view"), index * 100);
      });
    })
    .on("exit", function (el) {
      el.querySelectorAll(".stagger-item").forEach((child) => {
        child.classList.remove("in-view");
      });
    });
}

/**
 * Initializes the two-column hero slider.
 */
function initHeroSliderTwoCols() {
  const $carousel = jQuery(".hero-slider_two_cols .owl-carousel");
  if (!$carousel.length) return;

  $carousel.owlCarousel({
    items: 2,
    loop: false,
    autoplay: false,
    smartSpeed: 800,
    nav: false,
    dots: false,
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 2,
      },
    },
  });

  // Custom autoplay logic for mobile only
  if (window.innerWidth < 768) {
    let direction = "next";
    setInterval(function () {
      const total = $carousel.find(".owl-item:not(.cloned)").length;
      const current = $carousel.find(".owl-item.active").index();

      if (current === 0) direction = "next";
      // The last item index is total - 1
      if (current === total - 1) direction = "prev";

      $carousel.trigger(`${direction}.owl.carousel`);
    }, 5000);
  }
}

/**
 * Initializes a pure JavaScript before-and-after image comparison slider.
 */
function initBeforeAfterSlider() {
  const slider = document.getElementById("beforeAfterSlider");
  const handle = document.getElementById("sliderHandle");
  if (!slider || !handle) return;

  const beforeImage = slider.querySelector(".before-image");
  let isDragging = false;

  const updateSlider = (clientX) => {
    const rect = slider.getBoundingClientRect();
    const x = clientX - rect.left;
    const percentage = Math.max(0, Math.min(100, (x / rect.width) * 100));

    handle.style.left = percentage + "%";
    beforeImage.style.clipPath = `inset(0 ${100 - percentage}% 0 0)`;
  };

  handle.addEventListener("mousedown", (e) => {
    isDragging = true;
    e.preventDefault();
  });

  document.addEventListener("mousemove", (e) => {
    if (isDragging) updateSlider(e.clientX);
  });

  document.addEventListener("mouseup", () => {
    isDragging = false;
  });

  handle.addEventListener("touchstart", (e) => {
    isDragging = true;
    e.preventDefault();
  });

  document.addEventListener("touchmove", (e) => {
    if (isDragging && e.touches[0]) {
      updateSlider(e.touches[0].clientX);
    }
  });

  document.addEventListener("touchend", () => {
    isDragging = false;
  });

  slider.addEventListener("click", (e) => {
    if (e.target === slider || e.target.tagName === "IMG") {
      updateSlider(e.clientX);
    }
  });
}

/**
 * Initializes an Owl Carousel timeline slider with responsive settings.
 * @param {string} selector - The CSS selector for the timeline slider element.
 */
function initializeTimelineSlider(selector) {
  const slider = jQuery(selector);
  if (!slider.length) {
    console.warn(`Timeline slider with selector "${selector}" not found.`);
    return;
  }

  function getTimelineOptions(amount) {
    const navItems = slider.find(".timeline-slide").length;
    const isNavNeeded = navItems > amount;
    return {
      items: amount,
      nav: isNavNeeded,
      mouseDrag: isNavNeeded,
      touchDrag: isNavNeeded,
      pullDrag: isNavNeeded,
      freeDrag: isNavNeeded,
    };
  }

  const carouselOptions = {
    ...getTimelineOptions(2),
    dots: false,
    margin: 25,
    navText: [
      '<i class="fal fa-arrow-left"></i>',
      '<i class="fal fa-arrow-right"></i>',
    ],
    responsive: {
      768: { ...getTimelineOptions(4) },
      1199: { ...getTimelineOptions(5) },
      1360: { margin: 100, ...getTimelineOptions(6) },
      1500: { margin: 50, ...getTimelineOptions(8) },
    },
  };

  slider.on("initialized.owl.carousel", function () {
    jQuery(this).find(".owl-item").last().addClass("last");
  });

  slider.owlCarousel(carouselOptions);
}
