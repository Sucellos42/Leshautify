/*1. on veut insert le nom de la playlist dans l'input
2. une fois qu'il est insérer on le gere avec un add event listener et on le fetch
3. on effectue la requête d'insertion dans la base donnée
4. Une fois la playlist est insérée on fetch php -> js on stock les playlist dans un tableau et on les affiches

ou

1. On récupère l'input on l'insère dans un tableau
2. on le charge en js
3. on l'envoie a php sans recharger la page et on le met en statique en js dans le dom
4. Chaque chargement de page fera une requête pour supprimer le tableau
5. on insère dans le tableau ce qu'on a récupérer en json
6. on l'affiche

on verra plus tard si il est possible de faire la requête une fois qu'on recharge la page et garder les elements dans le dom sans qu'il soit en base donnée pour l'instant*/

/*fetch('back-end/php.php')
    .then(json => json.json())
    .then(playlist => {
        console.log(playlist)
        console.log(performance.now() + 'fetch')
        // console.log(buez.recentArtist)
    })*/
//playlist sera les playlist que seront fetch
let playlist = []
let newPlaylistTab = []

fetch('./back-end/php/displayPlaylistUser.php')
    .then(response => response.json())
    .then(data => {
        //on récupère le tableau json de playlist et on le push dans playlist
        // window.toto = JSON.parse(JSON.stringify(data)) ---> sauvegarde copie de l'objet json (comme data.objet)
})      /*array.forEach( e => {

})*/



/*
onFocus()
    function onFocus() {
    const focus = document.querySelectorAll('.focusable')
    focus.forEach( e => {
        e.addEventListener('mouseover', (event) => {
            //quand on hover on affiche un menu pour editer ou supprimer un playlist
            event.target.style.color = "orange"
        })
    })

}
*/
displayPlaylists(newPlaylistTab)
function displayPlaylists (playlists)  {

    playlists.forEach(playlist => {
        let i = 0;
        i++
        const newPlaylist = new CreateNewTag('li', 'class', 'navigation__nav-list-item playlist-item focusable', '.navigation__nav-list')
        const id = 'nav-list-item-' + i
        const playlistLink = new CreateNewTag('a', 'href', '#', `#${id}`)
        playlistLink.innerText = playlist['playlist_name']
        playlistLink.className = 'playlist-link'

    })
}



/**
 * crée au clique
 */
createPlaylist()
function createPlaylist () {
    //définir i en fonction du nombre de row dans le tableau de playlist
    let i = 0

    const addPlaylistBtn = document.querySelector('#new-playlist-button');
    addPlaylistBtn.addEventListener('click', () => {
        i++
        const newPlaylist = new CreateNewTag('li', 'class', 'navigation__nav-list-item playlist-item focusable', '.navigation__nav-list')
        const id = 'nav-list-item-' + i
        newPlaylist.id = id
        const newPlaylistField = new CreateNewTag('input', 'type', 'text', `#${id}`)
        newPlaylistField.className = 'toremove'
        //quand on change le focus sur l'input
        newPlaylistField.addEventListener('change', e => {
            console.log(e.target.value + " Valeur de l\'input")
            const content = e.target.value
            //on supprime l'input
            const toRemove = document.querySelector(`.toremove`)
            //création de la balise a
            const playlistLink = new CreateNewTag('a', 'href', '#', `#${id}`)
            playlistLink.id = 'playlist-link-' + i

            //on met le contenu de l'input dans la balise a
            playlistLink.innerText = content
            playlistLink.className = 'playlist-link'
            //supprime la balise input
            toRemove.remove()
            //on met dans le tableau associatif newplaylist chaque playlist ajouté
            newPlaylistTab.push({
                playlist_name: content
            })
            console.log(newPlaylistTab)

            //une fois le content ajouté on fetch pour envoyé a php
    })
})
}

/*function createPlaylist (name) {

}*/

//function onhover element playlist qui affiche clic droit pour editer ou supprimer




//pour chaque element editable on créera une fonction qui selectionnera tout le champ et mettre une bordure noire

//1 on selection tous les élement editable


//2