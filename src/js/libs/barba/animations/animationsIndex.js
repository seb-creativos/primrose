const animationModules = import.meta.globEager("./*.js");

const barbaAnimations = Object.values(animationModules).reduce((acc, mod) => {
	return { ...acc, ...mod };
}, {});

export default barbaAnimations;
