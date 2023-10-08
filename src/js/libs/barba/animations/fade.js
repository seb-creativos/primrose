import { gsap } from "gsap";

export default {
	fadeOut: (container) => {
		return gsap.to(container, {
			opacity: 0,
			duration: 0.4,
			ease: "none",
			clearProps: "all",
		});
	},
	fadeIn: (container) => {
		return gsap.from(container, {
			opacity: 0,
			duration: 0.4,
			ease: "none",
			clearProps: "all",
		});
	},
};
