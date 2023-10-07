import { clipAnimations } from "./clip";
import { fadeAnimations } from "./fade";
import { splitAnimations } from "./split";
import { zoomAnimations } from "./zoom";

const gsapAnimations = {
	...clipAnimations,
	...fadeAnimations,
	...splitAnimations,
	...zoomAnimations,
};

export default gsapAnimations;
