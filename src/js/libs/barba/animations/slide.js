import { gsap } from "gsap";

export default {
	slideToLeft: (container) => {
		return gsap.to(container, {
			xPercent: -100,
			duration: 1.4,
			ease: "power2.in",
			clearProps: "all",
		});
	},
	slideFromRight: (container) => {
		gsap.set(container, {
			position: "absolute",
			top: 0,
			left: 0,
		});
		return gsap.fromTo(
			container,
			{ xPercent: 100 },
			{
				xPercent: 0,
				duration: 1.4,
				ease: "power2.in",
				clearProps: "all",
			}
		);
	},
};
