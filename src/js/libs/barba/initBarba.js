import barba from "@barba/core";
import barbaPrefetch from "@barba/prefetch";

import barbaAnimations from "./animations/animationsIndex";

barba.use(barbaPrefetch);

export default function initBarba() {
	barba.init({
		debug: window.DEBUG,
		preventRunning: true,

		prevent: ({ el }) =>
			el.classList.contains("ab-item") ||
			el.classList.contains("glightbox") ||
			el.hasAttribute("data-gallery-name"),

		transitions: [
			{
				name: "self",
				leave: ({ current }) =>
					barbaAnimations.fadeOut(current.container),
				enter({ next }) {
					barbaAnimations.fadeIn(next.container);
				},
			},
			{
				name: "fade",
				leave: ({ current }) =>
					barbaAnimations.fadeOut(current.container),
				enter({ next }) {
					barbaAnimations.fadeIn(next.container);
				},
			},
			{
				namespace: "Barba",
				name: "slide",
				sync: true,
				leave: ({ current }) =>
					barbaAnimations.slideOutToRight(current.container),
				enter({ next }) {
					barbaAnimations.slideInFromLeft(next.container);
				},
			},
		],
	});
}
