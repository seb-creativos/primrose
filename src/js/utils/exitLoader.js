/**
 * Execute in windowLoad() so the loader
 * goes away as soon as the page is loaded.
 * Remove it from the DOM after X seconds, just in case.
 */
export default function exitLoader() {
    const loaderElement = document.querySelector(`#siteLoader`);

    if (loaderElement) {
        const rootElement = document.querySelector(`html`);
        rootElement.classList.add(`page--loaded`);

        if (window.DEBUG) {
            console.log(`Loader has been dismissed.`);
        }

        // Escape the Loader
        setTimeout(() => {
            loaderElement.remove();

            if (window.DEBUG) {
                console.log(`Loader has been destroyed.`);
            }
        }, 7000);
    }
}