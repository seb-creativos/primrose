import { gsap, ScrollTrigger, SplitText } from "gsap/all";
gsap.registerPlugin(ScrollTrigger, SplitText);

export default function initGsapAOS() {
	const animationsConfig = {
		"split-text": {
			origin: { opacity: 0 },
			target: { opacity: 1 },
		},
		"split-text-right": {
			origin: { opacity: 0, x: -25 },
			target: { opacity: 1, x: 0 },
		},
		"split-text-up": {
			origin: { opacity: 0, y: 25 },
			target: { opacity: 1, y: 0 },
		},
		"split-text-down": {
			origin: { opacity: 0, y: -25 },
			target: { opacity: 1, y: 0 },
		},
		"split-text-aberration": {
			origin: {
				opacity: 0,
				y: 30,
				textShadow: `blue -30px 30px, turquoise -15px 15px, yellow 15px -15px, red 30px -30px`,
			},
			target: {
				opacity: 1,
				y: 0,
				textShadow: `#FFF0 0px 0px, #FFF0 0px 0px, #FFF0 0px 0px, #FFF0 0px 0px`,
			},
		},

		"fade-up": {
			origin: { opacity: 0, y: 50 },
			target: { opacity: 1, y: 0 },
		},
		"fade-left": {
			origin: { opacity: 0, x: 50 },
			target: { opacity: 1, x: 0 },
		},
		"fade-right": {
			origin: { opacity: 0, x: -50 },
			target: { opacity: 1, x: 0 },
		},
		"zoom-in": {
			origin: { opacity: 0, scale: 0.8 },
			target: { opacity: 1, scale: 1 },
		},

		"clip-up": {
			origin: {
				opacity: 0,
				y: 50,
				clipPath: "polygon(0% 100%, 100% 100%, 100% 100%, 0% 100%)",
			},
			target: {
				opacity: 1,
				y: 0,
				clipPath: "polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)",
			},
		},
	};

	/**
	 * The gsapAOS function animates HTML elements based on custom data attributes.
	 *
	 * @param {HTMLElement} el - The HTML element to be animated.
	 */
	function gsapAOS(el) {
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
			gsap.set(split[splitType], animationsConfig[animationType].origin);
		}
		// For other animations, set the origin state for the element itself.
		else if (animationsConfig[animationType]) {
			gsap.set(el, animationsConfig[animationType].origin);
		}

		// Determine the target of the animation - either the splitted text elements or just the element itself.
		let animatedElement = animationType.includes("split-text")
			? split[splitType]
			: el;

		gsap.to(animatedElement, {
			...animationsConfig[animationType].target,
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
	document.querySelectorAll("[data-aos]").forEach(gsapAOS);
}
