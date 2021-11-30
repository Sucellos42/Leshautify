let modal = null

/**
 * /**
 * crée la base de la boite modale
 * j'aurai du faire des le départ une boite modale qui se crée à l'ouverture de la page et qui est cachée
 * et prendra en parametre le content modal a chaque fois qu'on l'ouvre au lieu de créer la boite modale entiere
 * @param modal_title
 * @returns {*}
 */
function createModal(modal_title) {
    console.log(performance.now() + 'recent')
    const ASIDE = new CreateNewTag('aside', 'class', 'modal-recent modal', 'body')
    ASIDE.role = 'dialog'
    ASIDE.setAttribute('aria-labelledby', `${modal_title}`)
    //faire un if pour récupérer le title modal qui sera ajouter album ou ajouter artiste
    // ASIDE.setAttribute('aria-labelledby', `${modalTitle}`)
    const wrapper = new CreateNewTag('div', 'class', 'modal-wrapper', '.modal')
    const closeModalBtn = new CreateNewTag('button', 'id', 'close-modal', '.modal-wrapper')
    // closeModalBtn.addEventListener('click', closeModal(e))
    return ASIDE
//return aside et l'appele dans displaymodalartist et album (faire plus)
}


/*function closeModal(e) {
    e.preventDefault()
    //videra le content modal et cachera la modale au mieux
    //pour l'instant on supprime tout vu qu'on recrée la boite modale a chaque fois qu'on clique sur plus
    const modal = document.getElementById(".modal")
    modal.remove();
}*/



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
    const input2 = new CreateNewTag('input', 'type', 'text', '.modalForm')
    input.className = 'modalInput'
    // input.setAttribute('required', '')
    input.name = 'new-artist'
    input.type = 'text'
    input.placeholder = 'Artiste'

    input2.name = 'new-album'
    input2.type = 'text'
    input2.placeholder = 'Album'



    const btnContainer = new CreateNewTag('div', 'class', 'btnContainer', '.modalForm')
    const modalBtn = new CreateNewTag('button', 'type', 'submit', '.btnContainer')
    modalBtn.className = 'modalBtn'
    modalBtn.innerText = 'Confirmer'
    const btnCloseContainer = new CreateNewTag('div', 'class', 'btnContainer btnClose', '.modalForm')
    const modalCloseBtn = new CreateNewTag('button', 'type', 'submit', '.btnClose')
    modalCloseBtn.className = 'modalBtn'
    modalCloseBtn.innerText = 'Quitter'

    modalBtn.addEventListener('click', e => {
        e.preventDefault()
        const php = {
            artist: input.value,
            btn_name: 'artist',
            album: input2.value
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
                //si le champs est vide on affiche une alert champs vide
                //l'artiste n'existe pas il est inséré
                if(e.status ==='notok'){
                   alert(e.erreur)
                }
                else if(e.content === 'true' && e.status === 'ok') {
                    if (!document.querySelector('.submit-response')){
                        const success = new CreateNewTag('div', 'class', 'submit-response', '.modal-wrapper')
                        success.innerText = "Nouvel artiste ajouté"
                    } else {
                        document.querySelector('.submit-response').innerText = "Nouvel artiste ajouté"
                    }


                }
                //l'artiste existe deja
                else {
                    if (!document.querySelector('.submit-response')){
                        const fail = new CreateNewTag('div', 'class', 'submit-response', '.modal-wrapper')
                        fail.innerText = "L'artiste existe déjà"
                    } else {
                        document.querySelector('.submit-response').innerText = "L'artiste existe déjà"
                    }
                }

            })
        /*            .then(
                        () => closeMODAL
                    )*/
    })
    modalCloseBtn.addEventListener(('click'), e => {
        ASIDE.remove()

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
    const rowStand = new CreateNewTag('option', 'value', `Ajouter un artiste...`, '.artists-select')
    rowStand.innerText = 'Ajouter un artiste'

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
                //essayer de voir si l'album de l'artiste existe déjà en regardant dans associate album artiste
                if(e.status ==='notok'){
                    alert(e.erreur)
                }
                else if(e.content === 'true' && e.status === 'ok') {
                    if (!document.querySelector('.submit-response')){
                        const success = new CreateNewTag('div', 'class', 'submit-response', '.modal-wrapper')
                        success.innerText = "Nouvel album ajouté"
                    } else {
                        document.querySelector('.submit-response').innerText = "Nouvel album ajouté"
                    }


                }
                //l'album existe deja
                else {
                    if (!document.querySelector('.submit-response')){
                        const fail = new CreateNewTag('div', 'class', 'submit-response', '.modal-wrapper')
                        fail.innerText = "L'album existe déjà"
                    } else {
                        document.querySelector('.submit-response').innerText = "L'album existe déjà"
                    }
                }

            })
            })
        /*.catch pour voir s'il y'a une erreur*/
        /*            .then(
                        () => closeMODAL
                    )*/
}






