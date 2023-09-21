// ScrollTrigger.create({
// 	// id: `#siteFooter`,
// 	// markers: true,
// 	trigger: `#siteFooter`,
// 	toggleClass: {
// 		targets: `body`,
// 		className: `footer--inview`,
// 	},
// });

// =================================================== //

// const body = document.querySelector(`body`);

// ScrollTrigger.create({
// 	id: `#siteMain`,
// 	// markers: true,
// 	trigger: `#siteMain`,
// 	start: `20% top`,
// 	end: `100% bottom`,
// 	toggleClass: {
// 		targets: body,
// 		className: `threshold--surpassed`,
// 	},
// 	onUpdate: (self) => {
// 		if (self.direction === 1) {
// 			body.classList.add(`scrolling--down`);
// 			body.classList.remove(`scrolling--up`);
// 		} else {
// 			body.classList.add(`scrolling--up`);
// 			body.classList.remove(`scrolling--down`);
// 		}
// 	},
// });

// =================================================== //

// https://codepen.io/GreenSock/pen/zYaxEKV

/*
	This helper function makes a group of elements animate along the x-axis in a seamless, responsive loop.

	Features:
	- Uses xPercent so that even if the widths change (like if the window gets resized), it should still work in most cases.
	- When each item animates to the left or right enough, it will loop back to the other side
	- Optionally pass in a config object with values like "speed" (default: 1, which travels at roughly 100 pixels per second), paused (boolean),  repeat, reversed, and paddingRight.
	- The returned timeline will have the following methods added to it:
	- next() - animates to the next element using a timeline.tweenTo() which it returns. You can pass in a vars object to control duration, easing, etc.
	- previous() - animates to the previous element using a timeline.tweenTo() which it returns. You can pass in a vars object to control duration, easing, etc.
	- toIndex() - pass in a zero-based index value of the element that it should animate to, and optionally pass in a vars object to control duration, easing, etc. Always goes in the shortest direction
	- current() - returns the current index (if an animation is in-progress, it reflects the final index)
	- times - an Array of the times on the timeline where each element hits the "starting" spot. There's also a label added accordingly, so "label1" is when the 2nd element reaches the start.
	*/

// function horizontalLoop(items, config) {
// 	items = gsap.utils.toArray(items);
// 	config = config || {};
// 	let tl = gsap.timeline({
// 			repeat: config.repeat,
// 			paused: config.paused,
// 			defaults: { ease: "none" },
// 			onReverseComplete: () =>
// 				tl.totalTime(tl.rawTime() + tl.duration() * 100),
// 		}),
// 		length = items.length,
// 		startX = items[0].offsetLeft,
// 		times = [],
// 		widths = [],
// 		xPercents = [],
// 		curIndex = 0,
// 		pixelsPerSecond = (config.speed || 1) * 100,
// 		snap =
// 			config.snap === false
// 				? (v) => v
// 				: gsap.utils.snap(config.snap || 1), // some browsers shift by a pixel to accommodate flex layouts, so for example if width is 20% the first element's width might be 242px, and the next 243px, alternating back and forth. So we snap to 5 percentage points to make things look more natural
// 		totalWidth,
// 		curX,
// 		distanceToStart,
// 		distanceToLoop,
// 		item,
// 		i;
// 	gsap.set(items, {
// 		// convert "x" to "xPercent" to make things responsive, and populate the widths/xPercents Arrays to make lookups faster.
// 		xPercent: (i, el) => {
// 			let w = (widths[i] = parseFloat(
// 				gsap.getProperty(el, "width", "px")
// 			));
// 			xPercents[i] = snap(
// 				(parseFloat(gsap.getProperty(el, "x", "px")) / w) * 100 +
// 					gsap.getProperty(el, "xPercent")
// 			);
// 			return xPercents[i];
// 		},
// 	});
// 	gsap.set(items, { x: 0 });
// 	totalWidth =
// 		items[length - 1].offsetLeft +
// 		(xPercents[length - 1] / 100) * widths[length - 1] -
// 		startX +
// 		items[length - 1].offsetWidth *
// 			gsap.getProperty(items[length - 1], "scaleX") +
// 		(parseFloat(config.paddingRight) || 0);
// 	for (i = 0; i < length; i++) {
// 		item = items[i];
// 		curX = (xPercents[i] / 100) * widths[i];
// 		distanceToStart = item.offsetLeft + curX - startX;
// 		distanceToLoop =
// 			distanceToStart + widths[i] * gsap.getProperty(item, "scaleX");
// 		tl.to(
// 			item,
// 			{
// 				xPercent: snap(((curX - distanceToLoop) / widths[i]) * 100),
// 				duration: distanceToLoop / pixelsPerSecond,
// 			},
// 			0
// 		)
// 			.fromTo(
// 				item,
// 				{
// 					xPercent: snap(
// 						((curX - distanceToLoop + totalWidth) / widths[i]) *
// 							100
// 					),
// 				},
// 				{
// 					xPercent: xPercents[i],
// 					duration:
// 						(curX - distanceToLoop + totalWidth - curX) /
// 						pixelsPerSecond,
// 					immediateRender: false,
// 				},
// 				distanceToLoop / pixelsPerSecond
// 			)
// 			.add("label" + i, distanceToStart / pixelsPerSecond);
// 		times[i] = distanceToStart / pixelsPerSecond;
// 	}
// 	function toIndex(index, vars) {
// 		vars = vars || {};
// 		Math.abs(index - curIndex) > length / 2 &&
// 			(index += index > curIndex ? -length : length); // always go in the shortest direction
// 		let newIndex = gsap.utils.wrap(0, length, index),
// 			time = times[newIndex];
// 		if (time > tl.time() !== index > curIndex) {
// 			// if we're wrapping the timeline's playhead, make the proper adjustments
// 			vars.modifiers = { time: gsap.utils.wrap(0, tl.duration()) };
// 			time += tl.duration() * (index > curIndex ? 1 : -1);
// 		}
// 		curIndex = newIndex;
// 		vars.overwrite = true;
// 		return tl.tweenTo(time, vars);
// 	}
// 	tl.next = (vars) => toIndex(curIndex + 1, vars);
// 	tl.previous = (vars) => toIndex(curIndex - 1, vars);
// 	tl.current = () => curIndex;
// 	tl.toIndex = (index, vars) => toIndex(index, vars);
// 	tl.times = times;
// 	tl.progress(1, true).progress(0, true); // pre-render for performance
// 	if (config.reversed) {
// 		tl.vars.onReverseComplete();
// 		tl.reverse();
// 	}
// 	return tl;
// }

// const scrollingText = gsap.utils.toArray(".marquee__text");

// const tl = horizontalLoop(scrollingText, {
// 	repeat: -1,
// });

// ScrollTrigger.create({
// 	trigger: ".marquee__track",
// 	// markers: true,
// 	start: "top bottom",
// 	end: "bottom top",

// 	onUpdate: (self) => {
// 		let factor = self.getVelocity() / 100;

// 		console.log(`velocity: ${factor}`);

// 		gsap.timeline({
// 			defaults: {
// 				ease: "none",
// 			},
// 		})
// 			// .to(tl, { timeScale: factor * 2.5, duration: 0.2 })
// 			// .to(tl, { timeScale: factor * 1, duration: 1 }, "+=0.3");
// 			.to(tl, { timeScale: factor * 2.5 })
// 			.to(tl, { timeScale: factor * 1, duration: 1 });
// 	},
// });

// Observer.create({
// 	onChangeY(self) {
// 		let factor = 2.5;
// 		if (self.deltaY < 0) {
// 			factor *= -1;
// 		}
// 		gsap.timeline({
// 			defaults: {
// 				ease: "none",
// 			},
// 		})
// 			.to(tl, { timeScale: factor * 2.5, duration: 0.2 })
// 			.to(tl, { timeScale: factor * 1, duration: 1 });
// 	},
// });

// =================================================== //

// =================================================== //

// function gsapMarquee(instance) {
// 	// https://codepen.io/GreenSock/pen/QWqoKBv

// 	// const rolled = roll(".marquee__text", { duration: 10 }),
// 	// 	roll2 = roll(".marquee__text--reverse", { duration: 10 }, true);

// 	// helper function that clones the targets, places them next to the original, then animates the xPercent in a loop to make it appear to roll across the screen in a seamless loop.

// 	const marqueeTrack = instance;
// 	const marqueeText = gsap.utils.toArray(".marquee__text", marqueeTrack);

// 	console.log(marqueeText);

// 	let direction = 1;

// 	const test = roll(marqueeText, { duration: 10, ease: "none" });

// 	const scroll = ScrollTrigger.create({
// 		ease: "none",
// 		duration: 10,

// 		onUpdate(self) {
// 			if (self.direction !== direction) {
// 				direction *= -1;
// 				gsap.to(test, {
// 					timeScale: direction,
// 					overwrite: true,
// 				});
// 			}
// 		},
// 	});

// 	function roll(targets, vars) {
// 		vars = vars || {};
// 		vars.ease || (vars.ease = "none");

// 		const tl = gsap.timeline({
// 				repeat: -1,

// 				onReverseComplete() {
// 					this.totalTime(this.rawTime() + this.duration() * 10); // otherwise when the playhead gets back to the beginning, it'd stop. So push the playhead forward 10 iterations (it could be any number)
// 				},
// 			}),
// 			elements = targets,
// 			clones = elements.map((el) => {
// 				let clone = el.cloneNode(true);
// 				el.parentNode.appendChild(clone);
// 				return clone;
// 			}),
// 			positionClones = () =>
// 				elements.forEach((el, i) =>
// 					gsap.set(clones[i], {
// 						position: "absolute",
// 						overwrite: false,
// 						top: el.offsetTop,
// 						left: el.offsetLeft + el.offsetWidth,
// 					})
// 				);
// 		positionClones();
// 		elements.forEach((el, i) =>
// 			tl.to([el, clones[i]], { xPercent: -100 }, 0)
// 		);
// 		window.addEventListener("resize", () => {
// 			let time = tl.totalTime(); // record the current time
// 			tl.totalTime(0); // rewind and clear out the timeline
// 			positionClones(); // reposition
// 			tl.totalTime(time); // jump back to the proper time
// 		});
// 		return tl;
// 	}
// 	// roll();

// 	// ScrollTrigger.create({
// 	// 	trigger: marqueeTrack,
// 	// 	markers: true,
// 	// 	start: "top bottom",
// 	// 	end: "bottom top",

// 	// 	onUpdate(self) {
// 	// 		let scrollVelocity = self.getVelocity() / 100;
// 	// 		console.log(`velocity: ${scrollVelocity}`);

// 	// 		gsap.timeline({
// 	// 			defaults: {
// 	// 				ease: "none",
// 	// 				duration: 0,
// 	// 			},
// 	// 		}).to(test, {
// 	// 			timeScale: scrollVelocity * 2,
// 	// 			overwrite: true,
// 	// 		});
// 	// 	},
// 	// });
// }
// gsap.utils.toArray(`.marquee__track`).forEach(gsapMarquee);

// =================================================== //

// function aosTriggers() {
// 	/**
// 	 * fade-up AOS
// 	 * Fade Up elements as they enter the viewport.
// 	 */
// 	gsap.utils.toArray(`[data-aos="fade-up"]`).forEach((element) => {
// 		const tl = gsap.timeline({
// 			defaults: {
// 				duration: 1.2,
// 			},

// 			scrollTrigger: {
// 				trigger: element,

// 				start: `${element.offsetHeight * -0.3} 85%`,
// 				end: `+=${element.offsetHeight} 15%`,
// 				toggleActions: `play none none reverse`,

// 				// markers: true,
// 				id: `${element.tagName}__aos-${element.dataset.aos}`,
// 				toggleClass: `aos--inview`,
// 			},
// 		});

// 		tl.fromTo(
// 			element,
// 			{
// 				opacity: 0,
// 				yPercent: 30,
// 				clipPath: `polygon(0 0, 100% 0, 100% 0, 0 0)`,
// 			},
// 			{
// 				opacity: 1,
// 				yPercent: 0,
// 				clipPath: `polygon(0 0, 100% 0, 100% 100%, 0% 100%)`,
// 			}
// 		);
// 	});

// 	/**
// 	 * fade-up-chroma AOS
// 	 * Fade Up elements as they enter the viewport.
// 	 * Remove Chromatic Aberration as they enter the viewport.
// 	 */
// 	gsap.utils.toArray(`[data-aos="fade-up-chroma"]`).forEach((element) => {
// 		const tl = gsap.timeline({
// 			defaults: {
// 				duration: 1.2,
// 			},

// 			scrollTrigger: {
// 				trigger: element,

// 				start: `${element.offsetHeight * -0.3} 85%`,
// 				end: `+=${element.offsetHeight} 15%`,
// 				toggleActions: `play none none reverse`,

// 				markers: true,
// 				id: `${element.tagName}__aos-${element.dataset.aos}`,
// 				toggleClass: `aos--inview`,
// 			},
// 		});

// 		tl.fromTo(
// 			element,
// 			{
// 				opacity: 0,
// 				yPercent: 30,
// 				clipPath: `polygon(0 0, 100% 0, 100% 0, 0 0)`,
// 				textShadow: `blue -30px 30px, turquoise -15px 15px, yellow 15px -15px, red 30px -30px`,
// 			},
// 			{
// 				opacity: 1,
// 				yPercent: 0,
// 				clipPath: `polygon(0 0, 100% 0, 100% 100%, 0% 100%)`,
// 				textShadow: `#FFF0 0px 0px, #FFF0 0px 0px, #FFF0 0px 0px, #FFF0 0px 0px`,
// 			}
// 		);
// 	});

// 	/**
// 	 * fade-left-chroma AOS
// 	 * Fade Left elements as they enter the viewport.
// 	 * Remove Chromatic Aberration as they enter the viewport.
// 	 */
// 	gsap.utils
// 		.toArray(`[data-aos="fade-left-chroma"]`)
// 		.forEach((element) => {
// 			const tl = gsap.timeline({
// 				defaults: {
// 					duration: 1.2,
// 				},

// 				scrollTrigger: {
// 					trigger: element,

// 					start: `top 85%`,
// 					end: `bottom 15%`,
// 					toggleActions: `play none none reverse`,

// 					// markers: true,
// 					// id: `${element.tagName}__aos-${element.dataset.aos}`,
// 					// toggleClass: `aos--inview`,
// 				},
// 			});

// 			tl.fromTo(
// 				element,
// 				{
// 					opacity: 0,
// 					xPercent: 20,
// 					clipPath: `polygon(0 0, 0 0, 0 100%, 0% 100%)`,
// 					textShadow: `blue -30px 30px, turquoise -15px 15px, yellow 15px -15px, red 30px -30px`,
// 				},
// 				{
// 					opacity: 1,
// 					xPercent: 0,
// 					clipPath: `polygon(0 0, 100% 0, 100% 100%, 0% 100%)`,
// 					textShadow: `#FFF0 0px 0px, #FFF0 0px 0px, #FFF0 0px 0px, #FFF0 0px 0px`,
// 				}
// 			);
// 		});
// }
// aosTriggers();
// }

// =================================================== //

// const box = document.querySelector(`#triggerBox`);
// const circle = document.querySelector(`#triggerCircle`);

// gsap.to(circle, {
//     // x: 1160 - circle.offsetWidth,
//     duration: 3,

//     scrollTrigger: {
//         markers: {
//             startColor: `rgb(150 255 150)`,
//             endColor: `rgb(255 150 150)`,
//             indent: 200,
//         },
//         id: circle.id,
//         trigger: circle,
//         // toggleActions: `play reverse play reverse`,
//         // toggleActions: `play none reverse none`,
//         // start: `top 60%`,
//         // end: `bottom 40%`,
//         start: `top center`,
//         end: `bottom center`,
//         toggleClass: `is--inview`,
//         scrub: true,
//     }
// });

// gsap.to(box, {
//     // x: 1160 - box.offsetWidth,
//     // rotate: 360,

//     scrollTrigger: {
//         markers: true,
//         markers: {
//             startColor: `rgb(150 255 150)`,
//             endColor: `rgb(255 150 150)`,
//             indent: 200,
//         },
//         id: box.id,
//         trigger: `.pinningSection2`,
//         // start: `top 80%`,
//         // end: `bottom 20%`,
//         start: () => `-=${gsap.getProperty(':root', '--siteHeader-height')}`,
//         end: () => `+=${(document.querySelector(`.pinningSection2`).offsetHeight - box.offsetHeight)}`,
//         toggleClass: `is--inview`,
//         scrub: true,
//         pin: box,
//         pinSpacing: false,
//     }
// });

// Skew =============================================== //

// let proxy = { skew: 0 },
// skewSetter = gsap.quickSetter(`.box, .circle`, `skewY`, `deg`), // fast
// clamp = gsap.utils.clamp(-20, 20); // don`t let the skew go beyond 20 degrees.

// ScrollTrigger.create({
//     onUpdate: (self) => {
//         let skew = clamp(self.getVelocity() / -300);
//         // only do something if the skew is MORE severe. Remember, we`re always tweening back to 0, so if the user slows their scrolling quickly, it`s more natural to just let the tween handle that smoothly rather than jumping to the smaller skew.
//         if (Math.abs(skew) > Math.abs(proxy.skew)) {
//             proxy.skew = skew;
//             gsap.to(proxy, {skew: 0, duration: 1, overwrite: true, onUpdate: () => skewSetter(proxy.skew)});
//         }
//     }
// });

// if (document.querySelector(`.skewElem`)) {
//     // make the right edge `stick` to the scroll bar. force3D: true improves performance
//     gsap.set(`.skewElem`, {transformOrigin: `right center`, force3D: true});
// }

// AOS ================================================ //

// =================================================== //

// ScrollTrigger.create({
//     trigger: `#siteNavbar`,
//     // start: `top top`,
//     // end: `bottom bottom`,
//     // pin: `#siteHeader`,
//     toggleClass: {
//         targets: `body`,
//         className: `QWEQWEQWEQWEQWEQWEQWE`
//     }
// });

// const scrollProgress = document.querySelectorAll(`.scroll-progress__text`);
// gsap.to(scrollProgressText, {
//     autoAlpha: 1,
// })

// gsap.fromTo(`.scroll-progress__bar`, {
//     scaleX: 0,
// })

// gsap.from(scrollProgress, {
//     opacity: 0,
//     duration: 3,
// });

// gsap.fromTo(scrollProgress, {
//     clipPath: `circle(100% at 50% 50%)`,
// }, {
//     clipPath: `circle(50% at 50% 50%)`,
//     duration: 3,
// })
// const image = document.querySelectorAll(`.clipped`)
// const box = document.querySelectorAll(`.box`)
// const circle = document.querySelectorAll(`.circle`)

// gsap.from([box, circle], {
//     // clipPath: ` polygon(0 0, 100% 0, 100% 0, 0 0)`,
//     // opacity: 0,
//     // aspectRatio: 2,

// })

// gsap.to([box, circle], {
//     // clipPath: `polygon(0 0, 100% 0, 100% 100%, 0 100%)`,
//     // opacity: 1,
//     x: 500,
//     // aspectRatio: .8,
//     // repeat: 4,
//     // yoyo: true,
// })

// gsap.from(image, {
//     clipPath: `polygon(0 0, 100% 0, 100% 0, 0 0)`,
// })

// gsap.to(image, {
//     clipPath: `polygon(0 0, 100% 0, 100% 100%, 0 100%)`,
// })

// gsap.from(`h3, p`, {
//     opacity: 0,
//     y: 20,
// })
