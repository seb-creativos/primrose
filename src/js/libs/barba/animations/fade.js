import { gsap } from "gsap";

export const fadeOut = (container) => {
	return gsap.to(container, {
		opacity: 0,
		ease: `none`,
		clearProps: `all`,
		duration: 0.4,
	});
};

export const fadeIn = (container) => {
	return gsap.from(container, {
		opacity: 0,
		ease: `none`,
		clearProps: `all`,
		duration: 0.4,
	});
};
