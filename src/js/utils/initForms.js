/**
 * Force WS Form's to Init/re-Render
 * Used in Barba.js hooks to avoid the AJAX conflict.
 */
const initForms = () => {
	const formElements = document.querySelectorAll(".wsf-form");

	if (formElements.length) {
		formElements.forEach((form) => wsf_form_init(form));
	}
};

export default initForms;
