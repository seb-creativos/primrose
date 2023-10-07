/**
 * anchorsManager.js
 *
 * This module provides functionality to manage anchor links in a Barba.js
 * powered single-page application (SPA). It ensures that when anchor links
 * are clicked, the SPA navigates to the correct section, even if the anchor
 * is on a different page.
 */

import barba from "@barba/core";
import { scrollTo } from "../libs/gsap/gsapUtils";

/**
 * Attach event listeners to all anchor links on the page.
 * Sets up the click behavior for anchor links on the current page to ensure
 * proper navigation in the SPA context.
 */
export function anchorSetupListeners() {
	const anchorLinks = document.querySelectorAll(
		'a[href*="#"]:not([href="#"])'
	);
	anchorLinks.forEach((link) => {
		// Prevent multiple attachments
		link.removeEventListener("click", anchorExecuteInternalSetupExternal);
		link.addEventListener("click", anchorExecuteInternalSetupExternal);
	});
}

/**
 * Normalize a URL by removing any trailing slashes.
 *
 * @param {string} url - The URL to be normalized.
 * @return {string} - The normalized URL.
 */
function normalizeUrl(url) {
	return url.replace(/\/$/, "");
}

/**
 * Event handler for anchor link clicks.
 * Executes the appropriate action based on the anchor's location:
 * - For internal anchors (on the same page), it smoothly scrolls to the target.
 * - For external anchors (on a different page), it sets up the SPA navigation
 *   to ensure the target is reached after the page transition.
 *
 * @param {Event} event - The click event object.
 */
export function anchorExecuteInternalSetupExternal(event) {
	const href = this.getAttribute("href");
	const urlParts = href.split("#");
	const baseUrl = urlParts[0];
	const anchor = urlParts[1];

	const normalizedCurrentUrl = normalizeUrl(
		window.location.origin + window.location.pathname
	);
	const normalizedBaseUrl = normalizeUrl(baseUrl);

	if (anchor) {
		event.preventDefault();
		// Check if the link is for an anchor on the current page (internal anchor)
		if (!baseUrl || normalizedCurrentUrl === normalizedBaseUrl) {
			const targetElement = document.querySelector(`#${anchor}`);
			if (targetElement) {
				scrollTo(targetElement, true);
			}
		}
		// Check if the link is for an anchor on a different page (external anchor)
		else if (baseUrl) {
			sessionStorage.setItem("externalAnchor", anchor);
			barba.go(baseUrl);
		}
	}
}

/**
 * Navigates to a saved external anchor on page load.
 * After an SPA transition, if the destination page has an anchor target,
 * this function ensures the page smoothly scrolls to it.
 */
export function anchorExecuteExternal() {
	const externalAnchor = sessionStorage.getItem("externalAnchor");
	if (externalAnchor) {
		const targetElement = document.querySelector(`#${externalAnchor}`);
		if (targetElement) {
			scrollTo(targetElement, false);
		}

		// Clear the stored anchor
		sessionStorage.removeItem("externalAnchor");
	}
}
