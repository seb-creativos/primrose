import { gsap, ScrollTrigger, ScrollSmoother } from "gsap/all";

import initGsapThemeSwap from "./gsapThemeSwap";
import initGsapMarquee from "./gsapMarquee";
import initGsapXScroll from "./gsapXScroll";
import initGsapReveal from "./gsapReveal";
import initGsapOdometer from "./gsapOdometer";
import initGsapSticker from "./gsapSticker";
import initGsapComparison from "./gsapComparison";
import initGsapAOS from "./gsapAOS";

export function initTriggers() {
	// initGsapXScroll();
	// initGsapThemeSwap();
	// initGsapMarquee();
	initGsapOdometer();
	// initGsapSticker();
	initGsapComparison();

	if (!ScrollTrigger.isTouch) initGsapAOS(), initGsapReveal();
}

export function killTriggers() {
	const triggers = ScrollTrigger.getAll();
	triggers.forEach((trigger) => trigger.kill());

	if (window.DEBUG) {
		console.log(`${triggers.length} ScrollTriggers have been killed.`);
	}
}

export function refreshTriggers() {
	ScrollTrigger.refresh();
	if (window.DEBUG) {
		console.log(`Triggers have been refreshed.`);
	}
}

export function updateTriggers() {
	ScrollTrigger.update();
	if (window.DEBUG) {
		console.log(`Triggers have been updated.`);
	}
}

export function updateEffects() {
	const smoother = ScrollSmoother.get();
	// smoother.effects().forEach((effect) => effect.kill());
	smoother.effects(`[data-speed], [data-lag]`);
}

export function scrollTo(
	target,
	smooth = true,
	position = `top ${gsap.getProperty(":root", "--siteNavbar-height")}`
) {
	const smoother = ScrollSmoother.get();

	if (typeof target === "number") {
		// If target is a number, treat it as a pixel position
		smoother.scrollTo(target, smooth);
	} else if (target instanceof Element) {
		// If target is a DOM element, scroll to it
		smoother.scrollTo(target, smooth, position);
	} else {
		console.warn("Invalid target for scrollTo: ", target);
	}
}
