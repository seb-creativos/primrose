import { Navigation, Pagination, Autoplay } from "swiper/modules";
import "swiper/css";
import "swiper/css/pagination";

export default {
	selector: ".swiper-testimonies",
	options: {
		modules: [Navigation, Pagination, Autoplay],

		// Params
		spaceBetween: 50,

		// Auto
		autoplay: {
			delay: 4000,
			disableOnInteraction: false,
			pauseOnMouseEnter: true,
		},

		// Pagination
		pagination: {
			el: ".swiper-pagination",
			dynamicBullets: false,
		},

		// Responsive
		breakpoints: {
			768: {
				slidesPerView: 2,
				slidesPerGroup: 2,
			},
			992: {
				slidesPerView: 2,
				slidesPerGroup: 2,
				spaceBetween: 100,
			},
			1600: {
				slidesPerView: 2,
				slidesPerGroup: 2,
				spaceBetween: 300,
			},
		},
	},
};
