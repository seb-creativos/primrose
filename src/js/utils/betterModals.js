import { Modal } from "bootstrap";
import { ScrollTrigger, ScrollSmoother } from "gsap/all";
import appendToBody from "./appendToBody";

export default function betterModals() {
    appendToBody('.modal');
    const modalElements = document.querySelectorAll(".modal");

    modalElements.forEach((modalElement) => {
        const modalInstance = new Modal(modalElement);

        // KOBLE FIELDS
        disableMinMaxPrices();
        // Function to disable certain values in another nested dropdown
        function disableMinMaxPrices() {
    
            let selects = modalElement.querySelectorAll('#min-price, #max-price');
            selects?.forEach( select => {
    
                let disableID = '';
                // Determine whether to disable values greater or smaller than the selected value
                if (select.classList.contains('min-price')) {
                    disableID = 'max-price';
                } else if (select.classList.contains('max-price')) {
                    disableID = 'min-price';
                } else {
                    return;
                }
            
                select.addEventListener( 'change', (e) => {
                    disableOtherOptions(e.target.value, disableID);
                    priceFormatter(selects);
                } )
            } )
    
            function disableOtherOptions(selected, disable) {
                // Loop through all checkbox parents
                let select = document.getElementById(disable);
                let selectedVal = parseInt(selected);
                let disableBool;
    
                Array.prototype.forEach.call( select.options, (option) => {
    
                    let value = option.value;
    
                    // Determine whether to disable or enable the option
                    switch (disable) {
                        case 'max-price':
                            disableBool = eval(value && value <= selectedVal);
                            break;
                        case 'min-price':
                            disableBool = eval(value && value >= selectedVal);
                            break;
                            
                        default:
                            // This should not happen
                            disableBool = false;
                    }
                    
                    // Log the value and disable status
                    // console.log(value + ', disable: ' + disableBool);
                
                    // Update option and option visibility based on disable status
                    if (disableBool) {
                        option.setAttribute('disabled', true);
                        option.classList.add('d-none');
                    } else {
                        option.removeAttribute('disabled');
                        option.classList.remove('d-none');
                    }
                } )		
            }
        }
        function priceFormatter(selects = false){
            if (!selects) selects = modalElement.querySelectorAll('#min-price, #max-price');
            const input = document.querySelector('.MinMaxPriceText');
            const min = selects[0].selectedIndex;
            const max = selects[1].selectedIndex;

            if (min == 0 && max == 0) {
                input.value = "";
            } 
            else if (min != 0 && max != 0) {
                input.value = `${selects[0][min].text} & ${selects[1][max].text}`; 
            }
            else {
                if (min != 0)
                    input.value = `${selects[0][min].text}`;
                else 
                    input.value = `${selects[1][max].text}`;
            }
        }
        modalElement.querySelector('.clear')?.addEventListener('click', () => {
            modalElement.querySelectorAll('[type="checkbox"]')?.forEach(cb => {
                cb.checked = false;
            });
            modalElement.querySelectorAll('select')?.forEach(s => {
                s.value = '';
            });
        })
        modalElement.querySelector('.apply')?.addEventListener('click', () => {
            modalInstance.hide();
        })

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
