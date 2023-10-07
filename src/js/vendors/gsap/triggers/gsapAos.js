import { gsap, ScrollTrigger, SplitText } from "gsap/all";
import gsapAnimations from "../animations/animationsIndex";

gsap.registerPlugin(ScrollTrigger, SplitText);

export default function initGsapAos() {
	/**
	 * The gsapAos function animates HTML elements based on custom data attributes.
	 *
	 * @param {HTMLElement} el - The HTML element to be animated.
	 */
	function gsapAos(el) {
		let animationType = el.getAttribute("data-aos");
		let duration = parseFloat(el.getAttribute("data-aos-duration")) || 1;
		let delay = parseFloat(el.getAttribute("data-aos-delay")) || 0.2;
		let start = el.getAttribute("data-aos-start") || "top bottom";
		let end = el.getAttribute("data-aos-end") || "center center";
		let scrub = el.getAttribute("data-aos-scrub") === "true";
		let split;
		let splitType = el.getAttribute("data-aos-split") || "words";
		let splitStagger =
			parseFloat(el.getAttribute("data-aos-stagger")) || 0.05;

		// Check if the animation type includes any form of "split-text".
		if (animationType.includes("split-text")) {
			// Split the text of the element based on the specified type.
			split = new SplitText(el, { type: splitType });

			// Set the origin state of the splitted text elements.
			gsap.set(split[splitType], gsapAnimations[animationType].origin);
		}
		// For other animations, set the origin state for the element itself.
		else if (gsapAnimations[animationType]) {
			gsap.set(el, gsapAnimations[animationType].origin);
		}

		// Determine the target of the animation - either the splitted text elements or just the element itself.
		let animatedElement = animationType.includes("split-text")
			? split[splitType]
			: el;

		gsap.to(animatedElement, {
			...gsapAnimations[animationType].target,
			duration: duration,
			delay: delay,
			ease: "Power4.inOut",
			stagger: animationType.includes("split-text") ? splitStagger : null,

			scrollTrigger: {
				trigger: el,
				// markers: true,

				start: start,
				end: end,

				scrub: scrub,
				once: !scrub,
			},
		});
	}
	document.querySelectorAll("[data-aos]").forEach(gsapAos);
}
