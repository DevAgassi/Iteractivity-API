// Block script depends on 'swiper' global dependency
// Swiper is loaded from assets/scripts/vendor/swiper.js entry point
import "./index.css";
import Swiper from "swiper";
import { Navigation, Pagination, EffectCoverflow } from "swiper/modules";
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
console.log("Slider block script loaded");
gsap.registerPlugin(ScrollTrigger);

const slider = new Swiper(".swiper-slider", {
  modules: [Navigation, Pagination, EffectCoverflow],
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  centeredSlides: true,
  initialSlide: 1,
  slidesPerView: 1.4,
  spaceBetween: 30,
  loop: false,
});
console.log(slider);
const sliderEl = document.querySelectorAll(".swiper-wrapper");
if (sliderEl) {
  console.log('sliderEl', sliderEl);
  sliderEl.forEach((slide) =>
    gsap.from(slide, {
      opacity: 0,
      y: 100,
      duration: 1,
      scrollTrigger: {
        trigger: slide,
        start: "top 80%",
      },
    })
  );
}
