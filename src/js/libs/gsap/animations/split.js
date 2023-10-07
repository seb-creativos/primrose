export default {
	"split-text": {
		origin: { opacity: 0 },
		target: { opacity: 1 },
	},
	"split-text-up": {
		origin: { opacity: 0, y: 25 },
		target: { opacity: 1, y: 0 },
	},
	"split-text-down": {
		origin: { opacity: 0, y: -25 },
		target: { opacity: 1, y: 0 },
	},
	"split-text-left": {
		origin: { opacity: 0, x: 25 },
		target: { opacity: 1, x: 0 },
	},
	"split-text-right": {
		origin: { opacity: 0, x: -25 },
		target: { opacity: 1, x: 0 },
	},
	"split-text-aberration": {
		origin: {
			opacity: 0,
			y: 30,
			textShadow: `blue -30px 30px, turquoise -15px 15px, yellow 15px -15px, red 30px -30px`,
		},
		target: {
			opacity: 1,
			y: 0,
			textShadow: `#FFF0 0px 0px, #FFF0 0px 0px, #FFF0 0px 0px, #FFF0 0px 0px`,
		},
	},
};
