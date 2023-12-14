import { Modal } from "bootstrap";
import { ScrollTrigger, ScrollSmoother } from "gsap/all";
import appendToBody from "./appendToBody";

export default function betterModals() {
    appendToBody('.modal');
    const modalElements = document.querySelectorAll(".modal");

    modalElements.forEach((modalElement) => {
        const modalInstance = new Modal(modalElement);


        if (!ScrollTrigger.isTouch) {

            modalElement.addEventListener("show.bs.modal", () => {
                setTimeout(() => {
                    ScrollSmoother.get().paused(true);
                }, 300);
            });
            modalElement.addEventListener("hide.bs.modal", () => {
                ScrollSmoother.get().paused(false);
            });
        }
    });
}
