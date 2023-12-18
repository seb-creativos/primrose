import { gsap, ScrollTrigger } from "gsap/all";

export default function initGsapHeader() {
    const body = document.querySelector(`body`);
    ScrollTrigger.create({
        id: `body`,
        // markers: true,
        trigger: `body`,
        start: `100px top`,
        toggleClass: {
            targets: body,
            className: `threshold--surpassed`,
        },
        onUpdate: (self) => {
            if (self.direction === 1) {
                body.classList.add(`scrolling--down`);
                body.classList.remove(`scrolling--up`);
            } else {
                body.classList.add(`scrolling--up`);
                body.classList.remove(`scrolling--down`);
            }
        },
    });
}
