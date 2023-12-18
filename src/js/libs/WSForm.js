import { Collapse } from "bootstrap";

export function WSFormCollapse() {
    const collapse = document.getElementById('collapseContact');
    // Stop execution if the custom form does not exist in current page
    if (! collapse ) return;
    if (DEBUG) console.log("WSForm init Collapse customization");
    const buttons = collapse.closest('section').querySelectorAll('.btn');

    /**
     * At the creation, the collapse opens itself. To prevent it from showing I
     * added the class d-none to it and set height to 0 by default. As soon as
     * it ends opening we close it again and remove the class. After that we add
     * the functionality to the buttons. This also address a formating problem
     * with the phone field that occurs when the form is rendered without
     * visibility.
     */
    collapse.classList.add('d-none');
    const collapseObj = new Collapse(collapse);
    collapse.addEventListener( 'shown.bs.collapse', () => {
        collapseObj.hide();
        collapse.classList.remove('d-none');
        buttonsListener();
    }, {once: true} )

    function buttonsListener(){
        buttons?.forEach( button => {
            button.addEventListener( 'click', () => {
                collapseObj.show(); // can be changed to toggle()
            }, {once: true} ) // This make the show trigger only shoot once
            button.addEventListener( 'click', () => {
                buttons.forEach((b)=>{b.classList.remove('selected')});
                button.classList.add('selected');
                if( collapse.querySelector('[data-preferred]') )
                    collapse.querySelector('[data-preferred]').value = `Prefer to be contacted by: ${button.textContent}`;
            })
        } )
    }
}

export function WSFormAgent(){
    const name = document.getElementById('agent-name')?.textContent;
    const email = document.getElementById('agent-email')?.dataset.email;
    if( !name || !email ) return;
    if (DEBUG) console.log("WSForm init Agent customization");
    
    const form = document.querySelector('.agent__content--contact .wsf-form');
    if( form ){
        form.querySelector('[agent-name]').value = `${name}`;
        form.querySelector('[agent-email]').value = `${email}`;
    }

}
