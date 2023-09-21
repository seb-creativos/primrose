import { gsap, ScrollTrigger } from "gsap/all";

export default function initGsapSticker() {
	function gsapSticker(section) {
		const element = gsap.utils.toArray(".sticky__target", section);

		ScrollTrigger.create({
			// markers: true,
			id: `Sticking`,

			trigger: section,
			pin: element[0],

			// TOP TOP
			start: () =>
				`-=${gsap.getProperty(":root", "--siteNavbar-height")}`,
			end: () => `+=${section.offsetHeight - element[0].offsetHeight}`,

			// TOP CENTER
			// start: () => `top center`,
			// end: () => `${section.offsetHeight - element[0].offsetHeight} center`,

			// CENTER CENTER
			// start: () => `${element[0].offsetHeight / 2} center`,
			// end: () =>
			// 	`${section.offsetHeight - element[0].offsetHeight / 2} center`,

			// BOTTOM CENTER
			// start: () => `${element[0].offsetHeight} center`,
			// end: () => `${section.offsetHeight} center`,

			pinSpacing: false,
		});
	}
	gsap.utils
		.toArray(".sticky__container")
		.forEach((section) => gsapSticker(section));
}
