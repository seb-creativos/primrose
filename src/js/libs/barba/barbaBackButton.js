/**
 * barbaBackButton.js
 *
 * This module provides functionality to manage a "Back" button with enhanced features
 * in a Barba.js powered single-page application (SPA). It ensures that when the back
 * button is clicked, users return to their previous scroll position and the previous URL.
 */

import barba from "@barba/core";
import { scrollTo } from "../gsap/gsapUtils";

/**
 * Generates and manages the behavior of the "Back" button on the page.
 * The function searches for an element with the ID `#backButtonContainer` to act as the back button.
 * If found, it replaces its content with an SVG arrow icon representing the "back" action and
 * preserves the original text of the button. When the button is clicked, it restores the user's
 * previous scroll position using Barba.js history and navigates to the previous URL.
 */

export default function barbaBackButton() {
	const backButtonElement = document.querySelector("#backButtonContainer");

	if (backButtonElement) {
		const labelText = backButtonElement.textContent || "";
		backButtonElement.innerHTML = "";

		const prevStatus = barba.history.previous;

		if (prevStatus) {
			backButtonElement.classList.remove("d-none");

			const backButton = document.createElement("a");
			backButton.className = "has-icon undecorated";

			const svg = document.createElementNS(
				"http://www.w3.org/2000/svg",
				"svg"
			);
			svg.setAttribute("class", "inline-svg inline-svg--stroke");
			svg.setAttribute("width", "16");
			svg.setAttribute("height", "16");
			svg.setAttribute("viewBox", "0 0 16 16");

			svg.innerHTML = `
                <g stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="15.5" y1="8" x2="0.5" y2="8"></line>
                    <polyline points="5.5 13 0.5 8 5.5 3"></polyline>
                </g>
            `;

			const label = document.createElement("label");
			label.textContent = labelText;

			backButton.appendChild(svg);
			backButton.appendChild(label);

			backButtonElement.appendChild(backButton);

			backButtonElement.addEventListener("click", (event) => {
				event.preventDefault();

				window.isBackButtonClicked = true; // Set the flag
				barba.go(prevStatus.url);

				// Restore the saved scroll position after a short delay
				setTimeout(() => {
					const savedScrollPosition = barba.history.previous
						? barba.history.previous.scroll
						: null;
					if (savedScrollPosition) {
						scrollTo(savedScrollPosition.y);
					}
				}, 1000); // Adjust the delay if needed
			});
		}
	}
}
