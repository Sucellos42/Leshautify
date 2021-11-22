



function createModal(modal_title) {
    console.log('ok')
    const ASIDE = new CreateNewTag('aside', 'class', 'modal-recent modal', 'body')
    ASIDE.role = 'dialog'
    //faire un if pour récupérer le title modal qui sera ajouter album ou ajouter artiste
    // ASIDE.setAttribute('aria-labelledby', `${modalTitle}`)
    const wrapper = new CreateNewTag('div', 'class', 'modal-wrapper', '.modal')
    const modalForm = new CreateNewTag ('form', 'action', 'POST', '.modal-wrapper')
    modalForm.className = 'modalForm'
    const modalTitle = new CreateNewTag('h1', 'id', 'modal-title', '.modalForm')
    //sera par la suite dynamique
    modalTitle.innerText = modal_title
    const input = new CreateNewTag('input', 'type', 'text', '.modalForm')
    input.className = 'modalInput'
    const btnContainer = new CreateNewTag('div', 'class', 'btnContainer', '.modalForm')
    const modalBtn = new CreateNewTag('button', 'type' , 'submit', '.btnContainer')
    modalBtn.className = 'modalBtn'
    modalBtn.innerText = 'Confirmer'
//return aside et l'appele dans displaymodalartist et album (faire plus
}

/**
 * On veut créer une liste déroulante dans la fenêtre modale avec tous les artistes pour pouvoir assigner un artiste à un album
 * se passe uniquement quand on clique sur ajouter un album récent
 * @param artistsModal
 */

/*
function displayArtistInModal(artistsModal, modal_title){



    const artists = new CreateNewTag('ul', 'class', 'artistsModal', '.modalForm')
    artistsModal.forEach(e => {
        const artist = new CreateNewTag('li', 'class','artistsModal_element', '.artistsModal')

        console.log (e.artist_name)
        console.log (artist)
    })

}*/





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


