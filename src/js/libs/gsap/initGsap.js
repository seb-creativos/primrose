import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollSmoother } from "gsap/ScrollSmoother";

gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

export default function initGsap() {
	ScrollTrigger.normalizeScroll(!ScrollTrigger.isTouch);

	ScrollSmoother.create({
		smooth: 1.6,
		speed: 1,
		// ease: "power4.out",
		effects: true,
		// smoothTouch: 0.1,
		// ignoreMobileResize: true,
	});

	// gsap.defaults({
	// ease: "steps(12)",
	// duration: 6,
	// });
}
