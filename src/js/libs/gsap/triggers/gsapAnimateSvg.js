import { gsap } from "gsap/all";

export default function initGsapAnimateSvg() {

    function logoAnimation(svg, progress) {

        let percentage;

        // percentage calculator (base 1, 0% -> 0, 100% -> 1)
        if (progress <= 0.33) {
            // First third: Animate from 0% to 100%
            percentage = progress * 3;
        } else if (progress <= 0.66) {
            // Second third: Continue animating at 100%
            percentage = 1;
        } else {
            // Final third: deanimate from 100% to 0%
            percentage = (1 - progress) * 3;

            // Keep the animation in the final third
            // percentage = 1;
        }

        // svg#logo is the g containing all the paths
        Array.from(svg.getElementById('logo').children).forEach((path, i) => {
            gsap.to(path, {
                opacity: percentage - (i*0.01),
                scale: percentage,
                rotation: (1-percentage) * 90,
                duration: i * 0.125, //adds more delay to further childs 
            })
        });
    }

    const svg = document.querySelector('#siteSvg svg');
    const paths = svg.querySelectorAll('circle, path');
    const firstWhite = document.querySelectorAll('section.bg-white')[0];
    const secondWhite = document.querySelectorAll('section.bg-white')[1];

    // set the svg to 0 by default
    gsap.to(paths, {
        opacity: 0,
        scale: 0,
    });

    const animationTimeline = gsap.timeline({
        scrollTrigger: {
            trigger: firstWhite,
            start: "top top",
            endTrigger: secondWhite,
            end: "top bottom",
            scrub: 1,   // Enable scrubbing for a smoother animation
            // markers: true,

            onUpdate: (self) => {
                logoAnimation(svg, self.progress);
            },
        }
    });
}
