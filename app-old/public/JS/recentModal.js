



function createModal(content) {
    console.log('ok')
    const ASIDE = new createNewTag('aside', 'class', 'modal-recent modal', 'body')
    ASIDE.role = 'dialog'
    //faire un if pour récupérer le title modal qui sera ajouter album ou ajouter artiste
    // ASIDE.setAttribute('aria-labelledby', `${modalTitle}`)
    const wrapper = new createNewTag('div', 'class', 'modal-wrapper', '.modal')
    return ASIDE
    console.log('1')
//return aside et l'appele dans displaymodalartist et album (faire plus
}

/**
 * On veut créer une liste déroulante dans la fenêtre modale avec tous les artistes pour pouvoir assigner un artiste à un album
 * se passe uniquement quand on clique sur ajouter un album récent
 * @param artistsModal
 */
function displayArtistInModal(artistsModal, modal_title){

    const modalForm = new createNewTag ('form', 'action', 'POST', '.modal-wrapper')
    modalForm.className = 'modalForm'
    const modalTitle = new createNewTag('h1', 'id', 'modal-title', '.modalForm')
    //sera par la suite dynamique
    modalTitle.innerText = modal_title
    const input = new createNewTag('input', 'type', 'text', '.modalForm')
    input.className = 'modalInput'
    const btnContainer = new createNewTag('div', 'class', 'btnContainer', '.modalForm')
    const modalBtn = new createNewTag('button', 'type' , 'submit', '.btnContainer')
    modalBtn.className = 'modalBtn'
    modalBtn.innerText = 'Confirmer'
    const artists = new createNewTag('ul', 'class', 'artistsModal', '.modalForm')
    artistsModal.forEach(e => {
        const artist = new createNewTag('li', 'class','artistsModal_element', '.artistsModal')

        console.log (e.artist_name)
        console.log (artist)
    })

}





/*const btn = document.querySelectorAll('.js-modal')
console.log(btn)
console.log('okok')*/



/*
const modalBtn =document.querySelectorAll('.js-modal')
modalBtn.forEach(a => {
    a.addEventListener('click', openModal)
    e.target.getAttribute('href')
})

//function openmodal prendra en paramètre l'évènement
function openModal (e) {
    e.preventDefault()
}*/


