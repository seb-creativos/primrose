import { gsap, ScrollTrigger } from "gsap/all";

export default function initGsapMarquee() {
	gsap.utils.toArray(".marquee__track").forEach(gsapMarquee);
}

function gsapMarquee(track) {
	const marqueeTrack = track;
	const marqueeText = track.querySelectorAll(".marquee__text");
	const rolled = roll(marqueeText);

	// Helper function that clones the targets, places them next to the original,
	// and animates the xPercent in a loop to make it appear to roll across the screen.
	function roll(
		targets,
		vars = { ease: "none", duration: 4 },
		reverse = false
	) {
		const tl = gsap.timeline({
			repeat: -1,
			onReverseComplete() {
				this.totalTime(this.rawTime() + this.duration() * 10);
			},
		});

		let clones = [];

		// Positions the clones relative to the originals
		const positionClones = () => {
			clones.forEach((clone, i) =>
				gsap.set(clone, {
					position: "absolute",
					overwrite: false,
					top: targets[0].offsetTop,
					left:
						targets[0].offsetLeft +
						(reverse
							? -targets[0].offsetWidth
							: targets[0].offsetWidth) *
							(i + 1),
				})
			);
		};

		const createClones = () => {
			const marqueeWidth = marqueeTrack.offsetWidth;
			const textWidth = targets[0].offsetWidth;
			const numClones = Math.ceil(marqueeWidth / textWidth);

			clones.forEach((clone) => clone.remove());
			clones = [];

			for (let i = 0; i < numClones; i++) {
				const clone = targets[0].cloneNode(true);
				targets[0].parentNode.appendChild(clone);
				clones.push(clone);
			}

			positionClones();
		};

		createClones();

		targets.forEach((el, i) =>
			tl.to(
				[el, ...clones],
				{ xPercent: reverse ? 100 : -100, ...vars },
				0
			)
		);

		window.addEventListener("resize", () => {
			resetTimeline(tl);
			createClones();
		});

		return tl;
	}

	// Resets the timeline and repositions the clones on window resize
	function resetTimeline(timeline) {
		const time = timeline.totalTime();
		timeline.totalTime(0);
		positionClones();
		timeline.totalTime(time);
	}

	// Creates a ScrollTrigger for the marquee track
	ScrollTrigger.create({
		trigger: marqueeTrack,
		// markers: true,
		start: "top bottom",
		end: "bottom top",

		onUpdate(self) {
			// Calculate the scroll velocity and adjust the animation speed
			let scrollVelocity = self.getVelocity() / 200;
			scrollVelocity =
				scrollVelocity > 0
					? Math.max(scrollVelocity, 0.5)
					: Math.min(scrollVelocity, -0.5);

			gsap.timeline({
				defaults: {
					ease: "none",
					duration: 0,
				},
			}).to([rolled], {
				timeScale: scrollVelocity,
				overwrite: true,
			});
		},
	});
}
