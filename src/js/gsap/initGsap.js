import { gsap, ScrollTrigger, ScrollSmoother } from "gsap/all";

gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

export default function initGsap() {
	if (!ScrollTrigger.isTouch) ScrollTrigger.normalizeScroll(true);

	ScrollSmoother.create({
		smooth: 1.6,
		speed: 1,
		effects: true,
		// smoothTouch: 0.1,
		// ignoreMobileResize: false,
	});

	// gsap.defaults({
	// ease: "steps(12)",
	// duration: 6,
	// });
}
