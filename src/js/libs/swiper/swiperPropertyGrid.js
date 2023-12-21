import { Navigation, Pagination, Autoplay } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";

export default {
	selector: ".swiper-grid",
	options: {
		modules: [Navigation, Autoplay],

		// Params
		slidesPerView: 1,
		slidesPerGroup: 1,
		spaceBetween: 0,
		grabCursor: true,

		// Navigation
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
	},
};
