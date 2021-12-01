function removeRightNav() {
    const playlistLinks = document.querySelectorAll('.deleteRightNav')
    const toRemove = document.querySelector('.navigation-right')
    playlistLinks.forEach(link => {
        const content = link.textContent
        link.addEventListener('click', e => {
            e.preventDefault()
            //on récupère le nom de la playlist sur laquelle on a cliqué
            const playlistName = e.target.textContent
            //on supprime tous les enfants de navigation-right
            removeAllChildNodes(toRemove)
            console.log(playlistName + ' : good')
            displayPlaylistPage(playlistName)


        })
    })
}

function removeAllChildNodes(parent) {
    while (parent.firstChild) {
        parent.removeChild(parent.firstChild)
        console.log(performance.now() + 'remove')
    }
}

function displayPlaylistPage(playlistName) {
    const playlistsLinks = document.querySelectorAll('.playlistPage')
    playlistsLinks.forEach(playlist => {
        playlist.addEventListener('click', playlist => {
            console.log(performance.now() + 'display')

        })
    })
}