/**
 * Get to know the selector/s height.
 */
const getHeight = (...selectors) => {
	selectors.forEach((selector) => {
		if (typeof selector !== "string") {
			console.error(
				`Each selector should be a string, but got ${typeof selector}: ${selector}`
			);
			return;
		}

		const target = document.querySelector(selector);

		if (target) {
			const targetHeight = target.getBoundingClientRect().height;
			const targetName = selector.replace(/[^a-zA-Z0-9 _-]/g, "");
			document.documentElement.style.setProperty(
				`--${targetName}-height`,
				`${targetHeight}px`
			);
		} else {
			console.warn(`No element matches the selector "${selector}".`);
		}
	});
};

export default getHeight;
