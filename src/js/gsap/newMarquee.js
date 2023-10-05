export default function initMarquees() {
	const marquees = document.querySelectorAll(".marquee__track");

	marquees.forEach((marquee) => {
		const content = marquee.querySelector(".marquee__content");

		if (!marquee || !content) {
			console.error("Element not found");
			return;
		}

		const contentWidth = content.offsetWidth;
		const viewportWidth = window.innerWidth;
		const repeats = Math.ceil(viewportWidth / contentWidth);

		for (let i = 0; i < repeats; i++) {
			const clone = content.cloneNode(true);
			marquee.appendChild(clone);
		}

		let position = 0;

		function moveMarquee() {
			position -= 1;
			if (-position >= contentWidth) {
				position = 0;
			}
			marquee.style.transform = `translateX(${position}px)`;
			requestAnimationFrame(moveMarquee);
		}

		moveMarquee();
	});
}
