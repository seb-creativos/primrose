export default function initMarquees() {
	const marquees = document.querySelectorAll(".marquee__track");

	marquees.forEach((marquee) => {
		const content = marquee.querySelector(".marquee__content");
		if (!content) return console.error("Element not found");

		const contentWidth = content.offsetWidth;
		const repeats = Math.ceil(window.innerWidth / contentWidth);
		const direction = marquee.dataset.direction === "right" ? 1 : -1;
		const speed = parseFloat(marquee.dataset.velocity) || 1;
		let position = direction === 1 ? -contentWidth : 0;

		// Clone and append the content for the necessary repeats
		Array.from({ length: repeats }, () => content.cloneNode(true)).forEach(
			(clone) => marquee.appendChild(clone)
		);

		function moveMarquee() {
			position += direction * speed;

			// Reset position based on direction
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
	});
}
