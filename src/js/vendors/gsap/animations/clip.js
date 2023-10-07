export const clipAnimations = {
	"clip-up": {
		origin: {
			opacity: 0,
			clipPath: "polygon(0% 100%, 100% 100%, 100% 100%, 0% 100%)",
		},
		target: {
			opacity: 1,
			clipPath: "polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)",
		},
	},
	"clip-down": {
		origin: {
			opacity: 0,
			clipPath: "polygon(0% 100%, 100% 100%, 100% 100%, 0% 100%)",
		},
		target: {
			opacity: 1,
			clipPath: "polygon(0% 0%, 100% 0%, 100% 0%, 0% 0%)",
		},
	},
	"clip-left": {
		origin: {
			opacity: 0,
			clipPath: "polygon(0% 0%, 0% 0%, 0% 100%, 0% 100%)",
		},
		target: {
			opacity: 1,
			clipPath: "polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)",
		},
	},
	"clip-right": {
		origin: {
			opacity: 0,
			clipPath: "polygon(100% 0%, 100% 0%, 100% 100%, 100% 100%)",
		},
		target: {
			opacity: 1,
			clipPath: "polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)",
		},
	},
};
