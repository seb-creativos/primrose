import { gsap, ScrollTrigger } from "gsap/all";
import Odometer from "odometer";

// Global Odometer options
window.odometerOptions = {
	auto: false, // Don't automatically initialize everything with class 'odometer'
	format: "(.ddd),dd", // Change how digit groups are formatted, and how many digits are shown after the decimal point
	// animation: "count", // Count is a simpler animation method which just increments the value,
};

export default function initGsapOdometer() {
	function gsapOdometer(element) {
		const odometerOriginValue = element.getAttribute(
			"odometer-origin-value"
		);
		const odometerTargetValue = element.getAttribute(
			"odometer-target-value"
		);

		if (odometerTargetValue) {
			const odometer = new Odometer({
				el: element,
				value: odometerOriginValue,
			});

			odometer.update(odometerTargetValue);
		}
	}
	// if (!ScrollTrigger.isTouch) {
	gsap.utils.toArray(".odometer").forEach((element) => {
		ScrollTrigger.create({
			trigger: element,
			// markers: true,
			// start: "top 90%",

			onEnter: (self) => {
				gsapOdometer(element);
				self.kill();
			},
		});
	});
	// }
}
