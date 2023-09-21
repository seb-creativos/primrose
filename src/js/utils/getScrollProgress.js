/**
 * Get to know the current scroll progress.
 *
 * Divide the current scroll position by the total scrollable area.
 * The scrollable area is the total height of the document minus the viewport height.
 */
const getScrollProgress = () => {
	const scrollProgressElement = document.querySelector(".scroll-progress");

	if (scrollProgressElement) {
		const documentScrollableArea =
			document.documentElement.scrollHeight - window.innerHeight;
		const currentScrollProgress = window.scrollY / documentScrollableArea;

		scrollProgressElement.style.setProperty(
			`--progress`,
			`${currentScrollProgress}`
		);
	}
};

export default getScrollProgress;
