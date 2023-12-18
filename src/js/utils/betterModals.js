import { Modal } from "bootstrap";
import { ScrollTrigger, ScrollSmoother } from "gsap/all";
import appendToBody from "./appendToBody";

export default function betterModals() {
    appendToBody('.modal');
    const modalElements = document.querySelectorAll(".modal");

    try {
        modalElements.forEach((modalElement) => {
            const modalInstance = new Modal(modalElement);
    
            // KOBLE FIELDS
            if( modalElement.querySelectorAll('#min-price, #max-price').length ) {
                disableMinMaxPrices();
                priceFormatter();
            }
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
                        if(DEBUG) console.log(value + ', disable: ' + disableBool);
                    
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
                const textInput = document.querySelector('.MinMaxPriceText');
                const minInput = document.querySelector('[name="min-price"]');
                const maxInput = document.querySelector('[name="max-price"]');
                const min = selects[0]?.selectedIndex ?? 0;
                const max = selects[1]?.selectedIndex ?? 0;
    
                if (min == 0 && max == 0) {
                    if(textInput) {
                        textInput.value = "";
                    }
                    if(minInput && maxInput) {
                        textInput.value = "";
                        minInput.value = "";
                        maxInput.value = "";
                    }
                } 
                else if (min != 0 && max != 0) {
                    textInput.value = `${selects[0][min].text} & ${selects[1][max].text}`; 
                    minInput.value = selects[0].value;
                    maxInput.value = selects[1].value;
                }
                else {
                    if (min != 0) {
                        textInput.value = `${selects[0][min].text}`;
                        minInput.value = selects[0].value;
                        maxInput.value = "";
                    } else {
                        textInput.value = `${selects[1][max].text}`;
                        minInput.value = "";
                        maxInput.value = selects[1].value;
                    }
                }
            }
            modalElement.querySelector('.clear')?.addEventListener('click', () => {
                modalElement.querySelectorAll('[type="checkbox"]')?.forEach(cb => {
                    cb.checked = false;
                });
                modalElement.querySelectorAll('select')?.forEach(s => {
                    s.value = '';
                    priceFormatter();
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
    } catch(error) {
        console.log('ignoring');
        // Ignore all, its a shitty solution but im on deadline :)
    }
}
