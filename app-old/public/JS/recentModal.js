let modal = null

function createModal(modal_title) {
    console.log(performance.now() + 'recent')
    const ASIDE = new CreateNewTag('aside', 'class', 'modal-recent modal', 'body')
    ASIDE.role = 'dialog'
    ASIDE.setAttribute('aria-labelledby', `${modal_title}`)
    //faire un if pour récupérer le title modal qui sera ajouter album ou ajouter artiste
    // ASIDE.setAttribute('aria-labelledby', `${modalTitle}`)
    const wrapper = new CreateNewTag('div', 'class', 'modal-wrapper', '.modal')
    return ASIDE
//return aside et l'appele dans displaymodalartist et album (faire plus
}

/**
 * crée la base de la boite modale
 * @param modal_title
 */

/**
 * fonction pour créer le contenu de la boite modal pour ajouter un artiste récent
 * appelée dans displayArtist dans le fichier displayRecent
 * @param modal_title
 */
function modalArtistContent(modal_title) {
    const ASIDE = createModal(modal_title)
    const modalForm = new CreateNewTag('form', 'method', 'POST', '.modal-wrapper')
    modalForm.action = './back-end/php/insertRecent.php'
    modalForm.className = 'modalForm'
    const modalTitle = new CreateNewTag('h1', 'id', 'modal-title', '.modalForm')
    //sera par la suite dynamique
    modalTitle.innerText = modal_title
    const input = new CreateNewTag('input', 'type', 'text', '.modalForm')
    input.className = 'modalInput'
    input.setAttribute('required', '')
    input.name = 'new-artist'
    input.type = 'text'

    const btnContainer = new CreateNewTag('div', 'class', 'btnContainer', '.modalForm')
    const modalBtn = new CreateNewTag('button', 'type', 'submit', '.btnContainer')
    modalBtn.className = 'modalBtn'
    modalBtn.innerText = 'Confirmer'
    modalBtn.addEventListener('click', e => {
        e.preventDefault()
        const php = {
            artist: input.value,
            btn_name: 'artist',
            album: ''
        }
        fetch('./back-end/php/insertRecent.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(php)
        })
            .then(e => e.json())
            .then(e => {
                console.log(e);
            })
        /*            .then(
                        () => closeMODAL
                    )*/
    })
}

/**
 * crée le contenue boite modale add recent album
 * appelée dans displayRecent, displayAlbum()
 * @param modal_title titre de la modale définie dans displayRecent.js
 * @param tab objet json d'artistes
 */
function modalAlbumContent(modal_title, tab) {
    const ASIDE = createModal(modal_title)
    const modalForm = new CreateNewTag('form', 'method', 'POST', '.modal-wrapper')
    modalForm.className = 'modalForm'
    modalForm.action = './back-end/php/insertRecent.php'


    const modalTitle = new CreateNewTag('h1', 'id', 'modal-title', '.modalForm')
    //sera par la suite dynamique
    modalTitle.innerText = modal_title

    const input = new CreateNewTag('input', 'type', 'text', '.modalForm')
    input.className = 'modalInput'
    input.name = 'new-album'
    input.type = 'text'

    const labelArtistSelect = new CreateNewTag('label', 'for', 'artist-select', '.modalForm')
    labelArtistSelect.className = 'artists-select-label'
    const selectArtists = new CreateNewTag('select', 'name', 'artist-select', '.modalForm')
    selectArtists.className = 'artists-select'

    tab.forEach(e => {
        const row = new CreateNewTag('option', 'value', `${e.artist_name}`, '.artists-select')
        row.className = 'artist-selec-row'
        row.innerText = e.artist_name
    })

    const btnContainer = new CreateNewTag('div', 'class', 'btnContainer', '.modalForm')
    const modalBtn = new CreateNewTag('button', 'type', 'submit', '.btnContainer')
    modalBtn.className = 'modalBtn'
    modalBtn.innerText = 'Confirmer'
    modalBtn.addEventListener('click', e => {
        e.preventDefault()
        const php = {
            artist: selectArtists.value,
            album: input.value,
            btn_name: 'album'
        }
        fetch('./back-end/php/insertRecent.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(php)
        })
            .then(e => e.json())
            .then(e => {
                console.log(e);
            })
        /*            .then(
                        () => closeMODAL
                    )*/
    })
}




