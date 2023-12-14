export default function appendToBody( selector ) {
	const elements = document.querySelectorAll(selector);
	const body = document.querySelector('body');

	elements.forEach( (el) => {
		body.appendChild(el);
	} );
}
