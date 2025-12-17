// assets/scripts/swiper-global.js
import Swiper from "swiper";

// Import modules from the correct path
import { Navigation, Pagination, Autoplay } from 'swiper/modules';

// Make Swiper available globally
window.Swiper = Swiper;
window.SwiperModules = { Navigation, Pagination, Autoplay };

// Trigger custom event to signal Swiper is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        window.dispatchEvent(new CustomEvent('swiperReady'));
    });
} else {
    window.dispatchEvent(new CustomEvent('swiperReady'));
}
