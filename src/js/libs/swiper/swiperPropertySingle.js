import { Navigation, Pagination, Thumbs, Autoplay } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";

export const swiperPropertyThumbs = {
	selector: ".swiper-single--thumbs",
	options: {
		modules: [Navigation, Pagination, Autoplay],

		// Params
		spaceBetween: 16,
        slidesPerView: 2,
        slidesPerGroup: 2,
        direction: "vertical",

		// Responsive
		// breakpoints: {
		// 	768: {
		// 		slidesPerView: 1,
		// 		slidesPerGroup: 1,
		// 	},
		// 	992: {
		// 		slidesPerView: 1,
		// 		slidesPerGroup: 1,
		// 		spaceBetween: 0,
		// 	},
		// 	1600: {
		// 		slidesPerView: 1,
		// 		slidesPerGroup: 1,
		// 		spaceBetween: 0,
		// 	},
		// },
	},
};

export const swiperPropertySingle = {
	selector: ".swiper-single",
	options: {
		modules: [Navigation, Pagination, Thumbs, Autoplay],

		// Params
		spaceBetween: 0,

		// Navigation
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        // Autoplay
        // autoplay: {
        //     delay: 1000,
        // },

        // Thumbs
        thumbs: {
            swiper: '.swiper-single--thumbs',
        },

		// Responsive
		// breakpoints: {
		// 	768: {
		// 		slidesPerView: 1,
		// 		slidesPerGroup: 1,
		// 	},
		// 	992: {
		// 		slidesPerView: 1,
		// 		slidesPerGroup: 1,
		// 		spaceBetween: 0,
		// 	},
		// 	1600: {
		// 		slidesPerView: 1,
		// 		slidesPerGroup: 1,
		// 		spaceBetween: 0,
		// 	},
		// },
	},
};