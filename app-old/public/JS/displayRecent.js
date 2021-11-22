// Qu'est-ce qu'on veut faire

/**
 * ajouter une div pour chaque élement récent album et artiste
 *
 * de faire une div + artiste et + album si la lib est vide
 */


/**
 *
 * les div sont créer uniquement si quand on check en fetch si dans ma bdd j'ai des artistes et des albums
 * si j'en ai moins que 6 j'ai la possibilité d'ajouté soit un artiste un album
 *
 */

fetch('./back-end/php/recent.php')
    .then(zeub => zeub.json())
    .then(buez => {
        displayArtsist(buez.recentArtist);
        displayAlbum(buez.recentAlbum);
        displayArtistInModal(buez.recentArtist);
        console.log(buez.recentArtist)
    })


/**
 * fabrique une div pour chaque artiste du tableau et l'affiche dans le dom
 * rajouter ensuite une image
 *
 *
 * @param recentArtiste
 */
function displayArtsist(singers) {
    // const container = new createTag('div', 'recent-artist-container', '.recent-add__artists')
    const container = new createNewTag ('div', 'id', 'recent-artist-container', '.recent-add__artists')

    container.className = 'recent-container'
    //parcour le tableau d'artiste
    let singer = null
    for (let i = 0; i < singers.length; i++) {
        singer = singers[i]
        console.log(singers.length)
        //on crée le parent avec un id increment

        const id = 'grid-element__artist-' + i
        const child = new createNewTag('div', 'id', `${id}`, '#recent-artist-container')
        child.className = 'recent-element'

        //on crée la div avec l'image
        const row = new createTag('div', 'grid-recent-thumbnail', `#${id}`)
        //on peut soit mettre un étiquette avec le logo soit si il existe une image d'artiste, on la met
        //rajouter un h3 dans la div avec l'id correspondant avec le nom d'album correspondant
        const p = new createTag('p', 'grid-recent-title', `#${id}`)
        p.innerText = singer.artist_name
    }
    if ( singers.length < 5 ) {
        const recentBtn = new createTag('button', 'recent-element recent-button js-modal' , '#recent-artist-container')
        recentBtn.id = 'add-recent-artist'
        recentBtn.addEventListener("click", createModal)
            console.log('okok')
        // recentBtn.setAttribute('onclick' , 'onclick="displayCreateRecent()"')

    }

}
/**
 * fabrique une div pour chaque artiste du tableau et l'affiche dans le dom
 * rajouter ensuite une image
 *
 *
 * @param albums
 */
function displayAlbum(albums) {
    const container = new createNewTag ('div', 'id', 'recent-album-container', '.recent-add__albums')
    container.className = 'recent-container'
    //parcour le tableau d'albums
    let album = null
    for (let i = 0; i < albums.length; i++) {
        if(i === 5) return
        album = albums[i]
        //on crée le parent avec un id increment

        const id = 'grid-element__album-' + i
        const child = new createNewTag('div', 'id', `${id}`, '#recent-album-container')
        child.className = 'recent-element'

        //on crée la div avec l'image
        const row = new createTag('div', 'grid-recent-thumbnail', `#${id}`)
        //on peut soit mettre un étiquette avec le logo soit si il existe une image d'artiste, on la met
        //rajouter un h3 dans la div avec l'id correspondant avec le nom d'album correspondant
        const p = new createTag('p', 'grid-recent-title', `#${id}`)
        p.innerText = album.album_title
    }
    if ( albums.length < 6 ) {
        const recentBtn = new createTag('button', 'recent-element recent-button js-modal' , '#recent-album-container')
        recentBtn.id = 'add-recent-album'
        recentBtn.addEventListener("click", createModal(contentArtistModal))
        // recentBtn.setAttribute('onclick' , 'onclick="displayCreateRecent()"')
    }

}

const contentArtistModal = function () {

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
}


/*
* On veut quand on appuie sur le bouton on insert en bdd le nouvel album
* déjà on verra pour la suite*/
/*function addRecent (album_title) {

}*/








