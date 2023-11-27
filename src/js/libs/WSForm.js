import { Collapse } from "bootstrap";

export default function initWSFormCollapse() {
    const collapse = document.getElementById('collapseContact');
    // Stop execution if the custom form does not exist in current page
    if (! collapse ) return;
    const buttons = collapse.closest('section').querySelectorAll('.btn');

    /**
     * At the creation, the collapse opens itself. To prevent it from showing I
     * added the class d-none to it and set height to 0 by default. As soon as
     * it ends opening we close it again and remove the class. After that we add
     * the functionality to the buttons.
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
                collapse.querySelector('[data-preferred]').value = button.textContent;
            })
        } )
    }

}
