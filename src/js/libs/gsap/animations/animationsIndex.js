const animationModules = import.meta.globEager("./*.js");

const gsapAnimations = Object.values(animationModules).reduce((acc, mod) => {
	return { ...acc, ...mod.default };
}, {});

export default gsapAnimations;
