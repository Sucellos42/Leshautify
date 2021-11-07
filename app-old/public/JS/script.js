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

const recentArtist = [
    {name: "Mylène Farmer"},
    {name: "Cypis"},
    {name: "Vaudeville Smash"},
    {name: "Sch"}

]



displayArtsist(recentArtist);
/**
 * fabrique une div pour chaque artiste du tableau et l'affiche dans le dom
 * rajouter ensuite une image
 *
 *
 * @param recentArtiste
 */
function displayArtsist(singers) {

    //parcour le tableau d'artiste
    let i = 1
    for (let singer of singers) {

        console.log(singer.name)
        const row = new createTag('div', 'grid-recent-element', '.recent-content-artist' )
        const id = 'grid-element__artist-' + i
        row.id = id
        //on peut soit mettre un étiquette avec le logo soit si il existe une image d'artiste, on la met
        //rajouter un h3 dans la div avec l'id correspondant avec le nom d'album correspondant
        const h3 = new createTag('h3', 'grid-recent-title', `#${id}`)
        console.log(h3)
        h3.innerHTML = singer.name


        i++
    }
}





const recentAlbum = [
    {name: "Classico Organisé"},
    {name: "A7"},
    {name: "&"},
    {name: "Let's Stay Together"}

]
displayAlbum(recentAlbum);
/**
 * fabrique une div pour chaque artiste du tableau et l'affiche dans le dom
 * rajouter ensuite une image
 *
 *
 * @param
 */
function displayAlbum(albums) {

    //parcour le tableau d'artiste
    let i = 1
    for (let album of albums) {

        console.log(album.name)
        const row = new createTag('div', 'grid-recent-element', '.recent-content-album' )
        const id = 'grid-album__element-' + i
        row.id = id
        //on peut soit mettre un étiquette avec le logo soit si il existe une image d'artiste, on la met
        //rajouter un h3 dans la div avec l'id correspondant avec le nom d'album
        const h3 = new createTag('h3', 'grid-recent-title', `#${id}`)
        console.log(h3)
        h3.innerHTML = album.name/*
        const img = new createTag('img', 'img-recent-album', `#${id}`)
        img.src = './public/assets/Logo/leshautify.png'*/
        i++

    }
}




