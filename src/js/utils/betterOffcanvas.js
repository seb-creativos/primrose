import { Offcanvas, Dropdown } from "bootstrap";
import { ScrollTrigger, ScrollSmoother } from "gsap/all";

/**
 * `betterOffcanvas` enhances the behavior and interaction of Bootstrap's Offcanvas components on the page.
 *
 * Functionalities include:
 * - Managing the active state of Offcanvas toggle buttons.
 * - Closing Offcanvas when internal links are clicked, with exceptions for specific protocols.
 * - Pausing and resuming GSAP's ScrollSmoother when Offcanvas is shown or hidden, based on a data attribute.
 * - Handling dropdown hover events within Offcanvas for non-touch devices.
 */
export default function betterOffcanvas() {
	const offcanvasElements = document.querySelectorAll(".offcanvas");
	const ignoredProtocols = ["mailto:", "tel:"];

	// Loop through EACH offcanvas element
	offcanvasElements.forEach((offcanvasElement) => {
		// Initialize Bootstrap Offcanvas instance
		const offcanvasInstance = new Offcanvas(offcanvasElement);

		/**
		 * This code block manages the visual state of buttons that toggle Bootstrap Offcanvas elements.
		 * - Identifies the toggle button for each Offcanvas using its 'data-bs-target' attribute.
		 * - Adds event listeners for 'show.bs.offcanvas' and 'hide.bs.offcanvas' events.
		 * - When an Offcanvas is about to be shown, the class 'hamburger-icon--active' is added to its toggle button.
		 * - When an Offcanvas is about to be hidden, the class is removed, reverting the toggle button to its original state.
		 */
		const offcanvasTrigger = document.querySelector(
			`[data-bs-target="#${offcanvasElement.id}"]`
		);
		offcanvasElement.addEventListener("show.bs.offcanvas", () => {
			offcanvasTrigger.classList.add("hamburger-icon--active");
		});
		offcanvasElement.addEventListener("hide.bs.offcanvas", () => {
			offcanvasTrigger.classList.remove("hamburger-icon--active");
		});

		/**
		 * This code block enhances the behavior of Bootstrap's Offcanvas component.
		 * - Adds a click event listener to all anchor tags within each Offcanvas.
		 * - The Offcanvas will hide when a link is clicked, unless:
		 *   1. Its 'href' starts with specific protocols like "mailto:" or "tel:".
		 *   2. It has the attribute 'target="_blank"'.
		 * - The protocols to be ignored are stored in an array called 'ignoredProtocols'.
		 */
		offcanvasElement.querySelectorAll("a").forEach((link) => {
			link.addEventListener("click", (e) => {
				const href = e.currentTarget.getAttribute("href");
				const isTargetBlank =
					e.currentTarget.getAttribute("target") === "_blank";

				const shouldClose =
					!ignoredProtocols.some((protocol) =>
						href.startsWith(protocol)
					) && !isTargetBlank;

				if (shouldClose) {
					offcanvasInstance.hide();
				}
			});
		});

		/**
		 * This code block manages the scroll behavior when an Offcanvas is shown or hidden.
		 * - Defines a function `shouldPauseScroll` that checks if 'data-bs-scroll' attribute is set to "false".
		 * - If the condition is met, adds event listeners for 'show.bs.offcanvas' and 'hide.bs.offcanvas' events.
		 * - When the Offcanvas is shown, GSAP's ScrollSmoother is paused.
		 * - When the Offcanvas is hidden, ScrollSmoother is resumed.
		 */
		if (!ScrollTrigger.isTouch) {
			function shouldPauseScroll() {
				return (
					offcanvasElement.getAttribute("data-bs-scroll") === "false"
				);
			}

			if (shouldPauseScroll()) {
				offcanvasElement.addEventListener("show.bs.offcanvas", () => {
					setTimeout(() => {
						ScrollSmoother.get().paused(true);
					}, 600);
				});
				offcanvasElement.addEventListener("hide.bs.offcanvas", () => {
					ScrollSmoother.get().paused(false);
				});
			}
		}
	});

	/**
	 * This function enhances dropdown interactions within menus for non-touch devices.
	 * It performs the following operations:
	 *
	 * 1. Finds all elements with the class '.menu-item-has-children'.
	 * 2. For each dropdown parent ('.menu-item-has-children'):
	 *    - Locates its toggle button ('.dropdown-toggle').
	 *    - Initializes a new Bootstrap Dropdown instance for this toggle button.
	 * 3. Adds two event listeners for each dropdown parent:
	 *    - 'mouseenter': Shows the dropdown.
	 *    - 'mouseleave': Hides the dropdown.
	 */
	if (!ScrollTrigger.isTouch) {
		const dropdownParents = document.querySelectorAll(
			".menu-item-has-children"
		);

		dropdownParents.forEach((dropdownParent) => {
			const dropdownToggle =
				dropdownParent.querySelector(".dropdown-toggle");

			if (dropdownToggle) {
				const dropdownInstance = new Dropdown(dropdownToggle);

				dropdownParent.addEventListener("mouseenter", () => {
					dropdownInstance.show();
				});
				dropdownParent.addEventListener("mouseleave", () => {
					dropdownInstance.hide();
				});
			}
		});
	}
}
