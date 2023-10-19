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
		const animationType = el.getAttribute("data-aos");

		if (!gsapAnimations[animationType]) {
			console.error(`Invalid animation type: ${animationType}`);
			return;
		}

		const duration = parseFloat(el.getAttribute("data-aos-duration")) || 1;
		const delay = parseFloat(el.getAttribute("data-aos-delay")) || 0.2;
		const start = el.getAttribute("data-aos-start") || "top bottom";
		const end = el.getAttribute("data-aos-end") || "center center";

		const repeat = el.hasAttribute("data-aos-repeat");
		const scrub = el.hasAttribute("data-aos-scrub");

		let split;
		const splitType = el.getAttribute("data-aos-split-type") || "words";
		const splitStagger =
			parseFloat(el.getAttribute("data-aos-split-stagger")) || 0.05;
		const splitFrom = el.getAttribute("data-aos-split-from") || "start";

		// Check if the animation type includes any form of "split".
		if (animationType.includes("split")) {
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
		const animatedElement = animationType.includes("split")
			? split[splitType]
			: el;

		gsap.to(animatedElement, {
			...gsapAnimations[animationType].target,
			duration: duration,
			delay: delay,
			ease: "Power3.inOut",
			stagger: animationType.includes("split")
				? { each: splitStagger, from: splitFrom }
				: null,

			scrollTrigger: {
				trigger: el,
				// markers: true,

				start: start,
				end: end,

				toggleActions: repeat
					? "play none none reverse"
					: "play none none none",
				scrub: scrub,
				once: !(scrub || repeat),
			},
		});
	}
	document.querySelectorAll("[data-aos]").forEach(gsapAos);
}
