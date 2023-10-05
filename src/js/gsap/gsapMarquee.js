import { ScrollTrigger } from "gsap/ScrollTrigger";

export default function initGsapMarquee() {
	const marquees = document.querySelectorAll(".marquee__track");

	marquees.forEach((marquee) => {
		const content = marquee.querySelector(".marquee__content");
		if (!content)
			return console.error(".marquee__content element not found");

		// Get the width of the content
		const contentWidth = content.offsetWidth;
		// Calculate how many times to repeat the content based on screen width
		const repeats = Math.ceil(window.innerWidth / contentWidth);
		// Get the velocity from the dataset, or set it to 1 as default
		let originalVelocity = parseFloat(marquee.dataset.velocity) || 1;
		let velocity = originalVelocity;
		// Determine the direction based on the dataset, either 1 (right) or -1 (left)
		let direction = marquee.dataset.direction === "right" ? 1 : -1;
		// Initial position for translation; dependent on the direction
		let position = direction === 1 ? -contentWidth : 0;

		// Clone and append the content for the necessary number of repeats
		Array.from({ length: repeats }, () => content.cloneNode(true)).forEach(
			(clone) => marquee.appendChild(clone)
		);

		const moveMarquee = () => {
			// Increment position by direction times velocity
			position += direction * velocity;
			// Reset the position based on direction when it reaches either end
			position =
				direction === 1 && position >= 0
					? -contentWidth
					: direction === -1 && -position >= contentWidth
					? 0
					: position;

			// Apply the new position to the element's transform property
			marquee.style.transform = `translateX(${position}px)`;
			// Call the function again on the next animation frame
			requestAnimationFrame(moveMarquee);
		};
		moveMarquee();

		// Flag to identify the first run of ScrollTrigger's onUpdate
		let isFirstRun = true;
		// Create a ScrollTrigger to update velocity and direction based on scroll
		ScrollTrigger.create({
			trigger: marquee,

			onUpdate(self) {
				// Skip the first run of the callback
				if (isFirstRun) {
					isFirstRun = false;
					return;
				}

				// Calculate the absolute velocity of scrolling
				const scrollVelocity = Math.abs(self.getVelocity() / 200);

				// Update direction based on the scroll direction
				direction =
					self.direction === 1
						? marquee.dataset.direction === "right"
							? 1
							: -1
						: marquee.dataset.direction === "right"
						? -1
						: 1;

				// Update velocity based on scroll velocity
				velocity = Math.max(scrollVelocity, 1) * originalVelocity;
			},
		});
	});
}
