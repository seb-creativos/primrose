import { ScrollTrigger } from "gsap/ScrollTrigger";

import initGsapAos from "./triggers/gsapAos";
import initGsapComparison from "./triggers/gsapComparison";
import initGsapMarquee from "./triggers/gsapMarquee";
import initGsapOdometer from "./triggers/gsapOdometer";
import initGsapReveal from "./triggers/gsapReveal";
import initGsapSticker from "./triggers/gsapSticker";
import initGsapThemeSwap from "./triggers/gsapThemeSwap";
// import initGsapXScroll from "./triggers/gsapXScroll";

export default function initTriggers() {
	if (!ScrollTrigger.isTouch) initGsapAos(), initGsapReveal();
	initGsapComparison();
	initGsapMarquee();
	initGsapOdometer();
	initGsapSticker();
	initGsapThemeSwap();
	// initGsapXScroll();
}
