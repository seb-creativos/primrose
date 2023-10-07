import { gsap } from "gsap";

export const slideInFromLeft = (container) => {
	return gsap.fromTo(
		container,
		{ x: "100%" },
		{ x: "0%", duration: 0.5, ease: "power2.out", clearProps: "all" }
	);
};

export const slideOutToRight = (container) => {
	return gsap.to(container, {
		x: "-100%",
		duration: 0.5,
		ease: "power2.in",
		clearProps: "all",
	});
};
