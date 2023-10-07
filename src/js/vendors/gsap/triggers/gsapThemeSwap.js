import { gsap, ScrollTrigger } from "gsap/all";

export default function initGsapThemeSwap() {
	function gsapThemeSwap(section) {
		const defaultTheme =
			document.documentElement.getAttribute("data-theme");
		const forcedTheme = section.getAttribute("force-theme"); // Get the forced theme once, as it doesn't change

		ScrollTrigger.create({
			trigger: section,
			start: "top center",
			end: "bottom center",

			// markers: {
			// 	startColor: "green",
			// 	endColor: "red",
			// 	fontSize: "14px",
			// 	indent: 10,
			// },
			// id: `Trigger: ${forcedTheme}`,

			// onToggle: (self) => {
			//     // Check if the section is currently in the viewport (isActive)
			//     // If active, set the "data-theme" attribute to the forced theme
			//     // If not active, revert to the "default" theme
			//     document.documentElement.setAttribute(
			//         "data-theme",
			//         self.isActive ? forcedTheme : defaultTheme
			//     );
			// }

			onEnter: () => {
				// When entering the section, set the "data-theme" attribute to the forced theme
				document.documentElement.setAttribute(
					"data-theme",
					forcedTheme
				);
			},
			// onLeave: () => {
			// 	// When leaving the section, revert to the "default" theme
			// 	document.documentElement.setAttribute(
			// 		"data-theme",
			// 		defaultTheme
			// 	);
			// },
			onEnterBack: () => {
				// When scrolling back and re-entering the section, set the "data-theme" attribute to the forced theme
				document.documentElement.setAttribute(
					"data-theme",
					forcedTheme
				);
			},
			onLeaveBack: () => {
				// When scrolling back and leaving the section, revert to the "default" theme
				document.documentElement.setAttribute(
					"data-theme",
					defaultTheme
				);
			},
		});
	}
	gsap.utils
		.toArray("[force-theme]")
		.forEach((section) => gsapThemeSwap(section));
}
