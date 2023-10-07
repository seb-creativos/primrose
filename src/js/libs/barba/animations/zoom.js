import { gsap } from "gsap";

export default {
	zoomOut: (container) => {
		return gsap.to(container, {
			scale: 0,
			ease: "power2.in",
			clearProps: "all",
		});
	},
	zoomIn: (container) => {
		return gsap.from(container, {
			scale: 0,
			ease: "power2.out",
			clearProps: "all",
		});
	},
};
