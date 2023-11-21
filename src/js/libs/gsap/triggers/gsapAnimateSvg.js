import { gsap } from "gsap/all";

export default function initGsapAnimateSvg() {

    function logoAnimation(svg) {
        // svg#logo is the g containing all the paths
        if( svg ){
            Array.from(svg.getElementById('logo').children).forEach((path, i) => {
                gsap.to(path, {
                    opacity: 1,
                    scale: 1,
                    rotation: 0,
                    duration: 1 + (i * 0.3), //adds more delay to further childs 
                })
            });
        }
    }

    const svg = document.querySelector('#siteSvg svg');
    const paths = svg?.querySelectorAll('circle, path');
    const trigger = svg?.closest('section');

    if( paths && trigger ) {        
        // set the svg to 0 by default
        gsap.to(paths, {
            opacity: 0,
            scale: 0,
            rotation: 90,
        });
    
        const animationTimeline = gsap.timeline({
            scrollTrigger: {
                trigger: trigger,
                start: "bottom bottom",
                scrub: 1,   // Enable scrubbing for a smoother animation
                // markers: true,
    
                onEnter: (self) => {
                    logoAnimation(svg);
                    self.kill();
                },
            }
        });
    }
}
