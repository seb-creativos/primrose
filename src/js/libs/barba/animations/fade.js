import { gsap } from "gsap";

export default {
	fadeOut: (container) => {
		return gsap.to(container, {
			opacity: 0,
			ease: `none`,
			clearProps: `all`,
			duration: 0.4,
		});
	},
	fadeIn: (container) => {
		return gsap.from(container, {
			opacity: 0,
			ease: `none`,
			clearProps: `all`,
			duration: 0.4,
		});
	},
};
