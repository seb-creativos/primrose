import { gsap } from "gsap";
import { SplitText } from "gsap/all";
// import ScrollTrigger from "gsap/ScrollTrigger";
// import ScrollSmoother from "gsap/ScrollSmoother";
gsap.registerPlugin(SplitText);

export default gsapTest = () => {
	if (document.querySelector("#quote")) {
		new SplitText(document.querySelector("#quote"), {
			type: "lines",
			linesClass: "line",
		});

		const mask = document.createElement("div");
		mask.classList.add("line__mask");

		gsap.utils.toArray(".line").forEach((line) => {
			line.append(mask.cloneNode(false));

			const tl = gsap.timeline({
				scrollTrigger: {
					trigger: line,
					// markers: true,
					start: "top 80%",
					end: "bottom 20%",
					scrub: true,
				},
			});

			tl.to(gsap.utils.toArray(".line__mask", line), {
				width: "0%",
			});
		});
	}

	const textSplitter = (text) => {
		const type = text.getAttribute("split-text");
		console.log(type);

		let splittedText = new SplitText(text, {
			type: type,
		});

		splittedText = gsap.fromTo(
			splittedText.chars, // need to make this programmatically
			{
				opacity: 0,
				yPercent: 30,
				textShadow: `blue -30px 30px, turquoise -15px 15px, yellow 15px -15px, red 30px -30px`,
			},
			{
				opacity: 1,
				yPercent: 0,
				textShadow: `#FFF0 0px 0px, #FFF0 0px 0px, #FFF0 0px 0px, #FFF0 0px 0px`,

				stagger: {
					each: 0.05,
					// from: "end",
				},

				scrollTrigger: {
					trigger: text,
					// markers: true,
					start: "-50% center",
					end: "150% center",
					scrub: 0.5,
					// toggleActions: `play none none reverse`,
				},
			}
		);

		// splittedText.words.forEach((el) => {
		// 	el.setAttribute("data-aos", "fade-up-chroma");
		// });
	};
	gsap.utils.toArray("[split-text]").forEach((text) => textSplitter(text));

	// COURSE
	// gsap.timeline({
	// 	defaults: {
	// 		ease: "power2.inOut",
	// 		duration: 1.5,
	// 		repeat: -1,
	// 		yoyo: true,
	// 	},
	// })
	// 	.to(".box", { xPercent: 100, rotate: 360, scale: 2 })
	// 	.to(".circle", { xPercent: 100, rotate: 360, scale: 2 })
	// 	.to(".triangle", { xPercent: 100, rotate: 360, scale: 2 })
	// 	.to(".rombo", { xPercent: 100, rotate: 360, scale: 2 });
};
