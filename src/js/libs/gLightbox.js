import GLightbox from "glightbox";
import { ScrollSmoother } from "gsap/ScrollSmoother";

/**
 * Initializes a GLightbox gallery.
 *
 * This function creates a GLightbox instance with specified options.
 * It also binds click event listeners to elements with the attribute
 * `data-gallery-name`. When such an element is clicked, it opens
 * the GLightbox gallery starting from a specific item.
 *
 * - If the trigger element has an `href` attribute, the gallery will start from
 *   the item that matches both the `data-gallery` and `href` attributes.
 * - If the trigger element doesn't have an `href` attribute, the gallery will
 *   start from the first item in the `data-gallery`.
 */
export default function initGLightbox() {
	// Initialize GLightbox with options
	const lightbox = GLightbox({
		loop: true,
		draggable: false,
		openEffect: "fade",
		closeEffect: "fade",
		slideEffect: "fade",

		onOpen: () => {
			setTimeout(() => {
				ScrollSmoother.get().paused(true);
			}, 600);

			const wheelHandler = (e) => {
				e.deltaY > 0 ? lightbox.nextSlide() : lightbox.prevSlide();
			};

			document.addEventListener("wheel", wheelHandler);
			lightbox.on("close", () => {
				document.removeEventListener("wheel", wheelHandler);
			});
		},

		onClose: () => {
			ScrollSmoother.get().paused(false);
		},
	});

	// Open Gallery Externally
	document.querySelectorAll("[data-gallery-name]").forEach((trigger) => {
		trigger.addEventListener("click", function (e) {
			e.preventDefault();

			const galleryName = this.getAttribute("data-gallery-name");
			const galleryTarget = this.getAttribute("href");

			let targetElement;

			if (galleryTarget) {
				targetElement = document.querySelector(
					`[data-gallery="${galleryName}"][href="${galleryTarget}"]`
				);
			} else {
				targetElement = document.querySelector(
					`[data-gallery="${galleryName}"]`
				);
			}

			// Open the gallery starting from the target element if it exists
			if (targetElement) {
				lightbox.open(targetElement);
			} else {
				console.error(
					`Target element for gallery "${galleryName}" not found.`
				);
			}
		});
	});
}
