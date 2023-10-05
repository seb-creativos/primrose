import { ScrollTrigger } from "gsap/ScrollTrigger";

export default function initMarquees() {
	const marquees = document.querySelectorAll(".marquee__track");

	marquees.forEach((marquee) => {
		const content = marquee.querySelector(".marquee__content");
		if (!content) return console.error("Element not found");

		const contentWidth = content.offsetWidth;
		const repeats = Math.ceil(window.innerWidth / contentWidth);
		let velocity = parseFloat(marquee.dataset.velocity) || 1;
		let direction = marquee.dataset.direction === "right" ? 1 : -1;
		let position = direction === 1 ? -contentWidth : 0;

		// Clone and append the content for the necessary repeats
		Array.from({ length: repeats }, () => content.cloneNode(true)).forEach(
			(clone) => marquee.appendChild(clone)
		);

		function moveMarquee() {
			position += direction * velocity;
			position =
				direction === 1 && position >= 0
					? -contentWidth
					: direction === -1 && -position >= contentWidth
					? 0
					: position;

			marquee.style.transform = `translateX(${position}px)`;
			requestAnimationFrame(moveMarquee);
		}

		moveMarquee();

		// Create a ScrollTrigger for the marquee track
		// ScrollTrigger.create({
		// 	markers: true,
		// 	trigger: marquee,

		// 	onUpdate(self) {
		// 		let scrollVelocity = self.getVelocity() / 200;
		// 		scrollVelocity = Math.abs(scrollVelocity);

		// 		if (self.direction === 1) {
		// 			direction = marquee.dataset.direction === "right" ? 1 : -1;
		// 		} else {
		// 			direction = marquee.dataset.direction === "right" ? -1 : 1;
		// 		}

		// 		velocity =
		// 			scrollVelocity > 0
		// 				? Math.max(scrollVelocity, 0.5)
		// 				: Math.min(scrollVelocity, -0.5);
		// 	},
		// });
	});
}
