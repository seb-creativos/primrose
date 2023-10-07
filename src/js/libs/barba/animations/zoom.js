import { gsap } from "gsap";

export const zoomOut = (container) => {
	return gsap.to(container, {
		scale: 0,
		ease: "power2.in",
		clearProps: "all",
	});
};

export const zoomIn = (container) => {
	return gsap.from(container, {
		scale: 0,
		ease: "power2.out",
		clearProps: "all",
	});
};
