// Qu'est-ce qu'on veut faire

/**
 * ajouter une div pour chaque élement récent album et artiste
 *
 * de faire une div + artiste et + album si la lib est vide
 */


/**
 *
 * les div sont créer uniquement si quand on check en fetch si dans ma bdd j'ai des artistes et des albums
 * si j'en ai moins que 4 j'ai la possibilité d'ajouté soit un artiste un album
 *
 */

fetch('./back-end/test/recent.php')
    .then(zeub => zeub.json())
    .then(buez => {
        displayArtsist(buez.recentArtist);
        displayAlbum(buez.recentAlbum);
    })
/**
 * fabrique une div pour chaque artiste du tableau et l'affiche dans le dom
 * rajouter ensuite une image
 *
 *
 * @param recentArtiste
 */
function displayArtsist(singers) {
    //parcour le tableau d'artiste
    let singer = null
    for (let i = 0; i < singers.length; i++) {
        singer = singers[i]
        //on crée le parent avec un id increment
        const container = new createTag('div', 'recent-artist-container', '.recent-add__artists')
        const id = 'grid-element__artist-' + i
        const child = new createNewTag('div', 'id', `${id}`, '.recent-artist-container')

        //on crée la div avec l'image
        const row = new createTag('div', 'grid-recent-thumbnail', `#${id}`)
        //on peut soit mettre un étiquette avec le logo soit si il existe une image d'artiste, on la met
        //rajouter un h3 dans la div avec l'id correspondant avec le nom d'album correspondant
        const h3 = new createTag('h3', 'grid-recent-title', `#${id}`)
        h3.innerText = singer.artist_name
    }

    if ( singers.length < 6 ) {
        const recentBtn = new createTag('button', 'add-recent' , '.recent-add__artists')
        recentBtn.id = 'add-recent'

    }

}
/**
 * fabrique une div pour chaque artiste du tableau et l'affiche dans le dom
 * rajouter ensuite une image
 *
 *
 * @param
 */
function displayAlbum(albums) {

    //parcour le tableau d'artiste
    let i = 0
    for (let album of albums) {
        //on crée le parent
        const container = new createTag('div', 'recent-content-album grid-recent', '.recent-add__albums')
        const id = 'grid-element__album-' + i
        container.id = id
        const row = new createTag('div', 'grid-recent-thumbnail',  `#${id}`)
        //on peut soit mettre un étiquette avec le logo soit si il existe une image d'artiste, on la met
        //rajouter un h3 dans la div avec l'id correspondant avec le nom d'album
        const h3 = new createTag('h3', 'grid-recent-title', `#${id}`)
        h3.innerText = album.album_title
        i++
    }

    if ( albums.length < 6 ) {
        const recentBtn = new createTag('button', 'add-recent' , '.recent-add__albums')
        recentBtn.id = 'add-recent'

    }
}



/*
* On veut quand on appuie sur le bouton on insert en bdd le nouvel album
* déjà on verra pour la suite*/
/*function addRecent (album_title) {

}*/








