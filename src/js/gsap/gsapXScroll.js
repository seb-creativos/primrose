import gsap from "gsap";

export default function initGsapXScroll() {
	// PARAMS
	// const maxDeviation = 40,
	// 	maxSkew = 10,
	// 	random = gsap.utils.random(-maxDeviation, maxDeviation, 1, true),
	// 	clamp = gsap.utils.clamp(-maxSkew, maxSkew),
	// 	setSkew = gsap.quickSetter(".hz-scroll", "skewX", "deg"),
	// 	proxy = { skew: 0 };

	// Randomly shift items up or down, 50px max
	// gsap.utils
	// 	.toArray(".hz-scroll__item")
	// 	.forEach((item) => gsap.set(item, { y: random() }));

	// SKEW: Function for skewing a section
	// const skew = (section) => {
	// 	gsap.to(proxy, {
	// 		skew: 0,
	// 		overwrite: true,
	// 		onUpdate: () => setSkew(proxy.skew),
	// 	});
	// };

	// SIMPLE WAY
	// const xScroll = (section) => {
	// 	const sectionWidth = gsap.getProperty(section, "width");

	// 	// const direction = (section.dataset.direction || "left") == "left" ? -1 : 1;

	// 	gsap.to(section, {
	// 		x: () => -(section.scrollWidth - sectionWidth),
	// 		ease: "none",

	// 		scrollTrigger: {
	// 			trigger: section,
	// 			// start: "center center", // Default is "top top" = "trigger viewport"
	// 			end: "+=2700", // Determines the speed
	// 			scrub: 0.75, // Determines the lag
	// 			pin: true,
	// 			// snap: 1 / (items.length - 1),

	// 			onUpdate: (self) => {
	// 				// SKEW
	// 				let skewAmount = clamp(self.getVelocity() / 800);
	// 				// Only apply skew if skewAmount is greater than the previous value
	// 				if (Math.abs(skewAmount) > Math.abs(proxy.skew)) {
	// 					// proxy.skew = direction * skewAmount;
	// 					proxy.skew = -skewAmount;
	// 					skew(section);
	// 				}
	// 			},
	// 		},
	// 	});
	// };
	// gsap.utils.toArray(".hz-scroll").forEach((section) => xScroll(section));

	// COMPLEX WAY
	function xScroll(section) {
		const sectionWidth = gsap.getProperty(section, "width");
		// const direction = (section.dataset.direction || "left") == "left" ? -1 : 1;
		const timeline = gsap.timeline({
			defaults: {
				ease: "none",
			},

			scrollTrigger: {
				trigger: section,
				// start: "center center", // Default is "top top" = "trigger viewport"
				end: `+=${section.scrollWidth / 3}`, // Determines the speed
				// end: `+=${sectionWidth}`, // Makes parallax work
				scrub: 0.75, // Determines the lag
				pin: true,
				// snap: 1 / (items.length - 1),

				// onUpdate: (self) => {
				// 	// SKEW
				// 	let skewAmount = clamp(self.getVelocity() / 600);
				// 	// Only apply skew if skewAmount is greater than the previous value
				// 	if (Math.abs(skewAmount) > Math.abs(proxy.skew)) {
				// 		// proxy.skew = direction * skewAmount;
				// 		proxy.skew = -skewAmount;
				// 		skew(section);
				// 	}
				// },
			},
		});

		timeline.to(section, {
			x: () => -(section.scrollWidth - sectionWidth),
		});

		// timeline.fromTo(
		// 	images,
		// 	{
		// 		// opacity: 1,
		// 		yPercent: 0,
		// 		filter: "blur(0px)",
		// 		// clipPath: `polygon(0 0, 100% 0, 100% 0, 0 0)`,
		// 	},
		// 	{
		// 		// opacity: 0,
		// 		yPercent: -100,
		// 		filter: "blur(20px)",
		// 		// clipPath: `polygon(0 0, 100% 0, 100% 100%, 0% 100%)`,
		// 	}
		// );
	}
	gsap.utils.toArray(".hz-scroll").forEach((section) => xScroll(section));
}
