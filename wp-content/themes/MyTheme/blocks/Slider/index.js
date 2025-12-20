// Wait for Swiper to be loaded and available globally
function initSlider() {
  // Check if Swiper is available
  if (
    typeof window.Swiper === "undefined" ||
    typeof window.SwiperModules === "undefined"
  ) {
    console.warn("Swiper not loaded yet, retrying...");
    setTimeout(initSlider, 100);
    return;
  }

  const { Navigation, Pagination } = window.SwiperModules;
  const block = document.querySelector(".swiper-container");

  if (!block) {
    console.warn("Slider block container not found");
    return;
  }

  const is_preview = JSON.parse($container.attr("data-preview") || "false");

  const swiper = new window.Swiper(block, {
    modules: [Navigation, Pagination],
    slidesPerView: 1,
    loop: true,
    autoplay: true,
    navigation: {
      nextEl: block.querySelector(".swiper-button-next"),
      prevEl: block.querySelector(".swiper-button-prev"),
    },
    pagination: {
      el: block.querySelector(".swiper-pagination"),
      clickable: true,
    },
  });
}

// Initialize on DOM ready
if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", initSlider);
} else {
  initSlider();
}
