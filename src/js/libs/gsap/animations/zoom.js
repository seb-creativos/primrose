export default {
	"zoom-in": {
		origin: { scale: 0.8 },
		target: { scale: 1 },
	},
	"zoom-in-fade": {
		origin: { opacity: 0, scale: 0.8 },
		target: { opacity: 1, scale: 1 },
	},
	"zoom-in-up": {
		origin: { scale: 0.8, y: 100 },
		target: { scale: 1, y: 0 },
	},
	"zoom-in-fade-up": {
		origin: { opacity: 0, scale: 0.8, y: 100 },
		target: { opacity: 1, scale: 1, y: 0 },
	},
};
