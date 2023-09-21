import { gsap, ScrollTrigger } from "gsap/all";

export default function initGsapReveal() {
	const gsapReveal = (container) => {
		const revealTarget = container.querySelectorAll(".reveal__target");

		gsap.set(revealTarget, { yPercent: -100 });
		const reveal = gsap.timeline({ paused: true });

		reveal.to(revealTarget, {
			yPercent: 0,
			ease: "none",
			// onUpdate: function () {
			// 	console.log("update", this.progress());
			// },
		});

		ScrollTrigger.create({
			trigger: container,
			// markers: true,
			end: `+=${gsap.getProperty(":root", "--siteFooter-height")}`,
			animation: reveal,
			scrub: true,
		});
	};

	gsap.utils.toArray(".reveal__container").forEach(gsapReveal);
}
