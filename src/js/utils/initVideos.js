export default function initVideos() {
	const videoElements = document.querySelectorAll("video");

	if (videoElements.length) {
		const observer = new IntersectionObserver(
			(entries, observer) => {
				entries.forEach((entry) => {
					if (entry.isIntersecting) {
						entry.target.play();
					} else {
						entry.target.pause();
					}
				});
			},
			{
				threshold: 0,
			}
		);

		videoElements.forEach((video) => observer.observe(video));
	}
}
