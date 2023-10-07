import { Navigation, Pagination, Autoplay } from "swiper/modules";
import "swiper/css";

export default {
	selector: ".swiper-example",
	options: {
		modules: [Navigation, Pagination, Autoplay],

		// Params
		loop: true,
		spaceBetween: 132,
		speed: 1400,
		autoHeight: true,
		watchSlidesProgress: true,

		// Auto
		autoplay: {
			delay: 4000,
			disableOnInteraction: false,
			pauseOnMouseEnter: true,
		},

		// Navigation
		navigation: {
			prevEl: ".swiper-button--prev",
			nextEl: ".swiper-button--next",
		},

		// Pagination
		pagination: {
			el: ".swiper-pagination",
			type: "fraction",
		},

		// Parallax
		on: {
			progress: function () {
				const swiper = this;
				for (let i = 0; i < swiper.slides.length; i++) {
					const slideProgress = swiper.slides[i].progress;
					const innerOffset = swiper.width * 0.4;
					const innerTranslate = slideProgress * innerOffset;
					const slideMediaElement = swiper.slides[i].querySelector(
						".swiper-example__media"
					);
					if (slideMediaElement) {
						slideMediaElement.style.transform =
							"translate3d(" + innerTranslate + "px, 0, 0)";
					}
				}
			},
		},
	},
};
