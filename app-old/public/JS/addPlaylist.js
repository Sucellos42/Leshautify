// createModal('')<

/*fetch('back-end/php/displayPlaylist.php')
    .then(json => json.json())
    .then(playlist => {
        console.log(playlist)
        console.log(performance.now() + 'fetch')
        // console.log(buez.recentArtist)
    })*/



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

function createPlaylist () {
    const addPlaylistBtn = document.querySelector('#add-playlist-button');
    addPlaylistBtn.addEventListener('click', () => {
        let i = 0
        i++
        const newPlaylist = new CreateNewTag('li', 'class', 'nav-list-item playlist-item focusable', '.navigation__nav-list')
        id = 'nav-list-item-' + i
        newPlaylist.id = id
        const newPlaylistField = new CreateNewTag('input', 'type', 'text', `${id}`)

    })
}

//function onhover element playlist qui affiche clic droit pour editer ou supprimer




//pour chaque element editable on créera une fonction qui selectionnera tout le champ et mettre une bordure noire

//1 on selection tous les élement editable
var div = document.querySelectorAll('editable')

//2