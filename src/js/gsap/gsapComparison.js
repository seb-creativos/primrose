import gsap from "gsap";

export default function initGsapComparison() {
	function gsapComparison(comparison) {
		let wrappers = comparison.querySelectorAll(`.comparison__wrapper`);
		let tl = gsap.timeline({
			scrollTrigger: {
				trigger: comparison,
				start: `center center`,
				end: `+=${(comparison.offsetHeight * wrappers.length) / 1.5}`,
				scrub: true,
				pin: true,
				anticipatePin: 1,
			},
			defaults: {
				ease: `none`,
				duration: 1,
			},
		});

		gsap.utils.toArray(wrappers).forEach((wrapper, index) => {
			tl.fromTo(
				wrapper,
				{ xPercent: index % 2 === 0 ? -100 : 100 },
				{ xPercent: 0 },
				index
			).fromTo(
				wrapper.querySelector(`img`),
				{
					xPercent: index % 2 === 0 ? 100 : -100,
					// scale: 1.2,
					// transformOrigin:
					// index % 2 === 0 ? "center left" : "center right",
					// filter: "sepia(75%)",
				},
				{
					xPercent: 0,
					// scale: 1,
					// filter: "sepia(0%)",
				},
				index
			);
		});
	}
	gsap.utils.toArray(`.comparison`).forEach(gsapComparison);
}
