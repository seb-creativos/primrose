import MouseFollower from "mouse-follower";
import { gsap } from "gsap";

MouseFollower.registerGSAP(gsap);

let mouseFollowerInstance;

export default function initMouseFollower() {
	// Destroy any existing instance
	if (mouseFollowerInstance) {
		mouseFollowerInstance.destroy();
	}

	// Create a new instance
	mouseFollowerInstance = new MouseFollower({
		stateDetection: {
			"-pointer":
				"button,a:not([data-cursor-img], [data-cursor-video]),.wsf-field",
			"-media": "[data-cursor-img],[data-cursor-video]",
			"-hidden": ".map",
		},
		initialPos: [window.cursorPosition.x, window.cursorPosition.y],
		// visible: true,
		// visibleOnState: false,
		speed: 0.3,
		// ease: "power2.out",
		// overwrite: true,
		// skewing: 0,
		// skewingText: 2,
		// skewingIcon: 2,
		skewingMedia: 0,
		// skewingDelta: 0.001,
		// skewingDeltaMax: 0.15,
		// stickDelta: 0.15,
		// showTimeout: 20,
		// hideOnLeave: true,
		// hideTimeout: 300,
		// hideMediaTimeout: 300
	});
}
