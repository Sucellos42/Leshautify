
//1. On supprime la partie récent on met une autre partie qui prendra tous le reste de la page
{

}

let songs = []


function displayPlaylistPage(playlistName) {
    const rightNav = document.querySelector('.container > :nth-child(2)')
    rightNav.className = 'navigation-playlist'
    //container qui contiendra une section en-tête et une section avec les morceaux de la playlist
    const playlistPage = new CreateNewTag('div', 'id', 'playlist-container', '.navigation-playlist')
    console.log(playlistPage)
    //les deux sections
    const header = new CreateNewTag('div', 'id', 'header-playlist-page', '#playlist-container')
    console.log(header.id)
    const title = header.id
    const header_title = new CreateNewTag('h1', 'id', 'playlist-title', `#${header.id}`)
    header_title.innerText = playlistName
    const songContainer = new CreateNewTag('div', 'id', 'playlist-song-container', `#${playlistPage.id}`)
    const songList = new CreateNewTag('ul', 'class', 'song-list', `#${songContainer.id}`)
    const btnContainer = new CreateNewTag('div', 'class', 'btnContainer', `#${header.id}`)
    const addSongBtn = new CreateNewTag('button', 'type', 'submit', '.btnContainer')
    addSongBtn.className = 'modalBtn addSong'
    addSongBtn.innerText = 'Ajouter une chanson'
    addSongBtn.addEventListener('click', e => {
        e.preventDefault()
        createSongRow()
        console.log('okok')

    })

}


/*function displaySongRow(songs) {
    songs.forEach(song => {
        let i = 0
        i++
        const row = new CreateNewTag('li', 'class', 'song-list__row', '.song-list' )
        row.id = 'song-list__row-' + i
        //ONMETTRA DANS UN LI 4 section --> morceau, artiste, album, durée


    })

}*/



let i = 0

function createSongRow (){
    const playlistsRows = []
    i++
    const row = new CreateNewTag('li', 'class', 'song-list__row', '.song-list' )

    row.id = 'song-list__row-' + i


    const trackPlaylist = new CreateNewTag('input', 'class', 'song-list__row-input', `#${row.id}`)
    putNameToInput (trackPlaylist, 'text', 'track')

    const artistPlaylist = new CreateNewTag('input', 'class', 'song-list__row-input', `#${row.id}`)
    putNameToInput (artistPlaylist, 'text', 'artist')

    const albumPlaylist = new CreateNewTag('input', 'class', 'song-list__row-input', `#${row.id}`)
    putNameToInput (albumPlaylist, 'text', 'album')

    const lengthPlaylist = new CreateNewTag('input', 'class', 'song-list__row-input', `#${row.id}`)
    putNameToInput (lengthPlaylist, 'text', 'length')
        let count = 0
    document.querySelectorAll('.song-list__row-input').forEach(input => {

        input.className = 'toRemove'
        input.addEventListener('change', input => {
            count ++
            console.log(input.target.value)
            const inputContent = input.target.value
            const inputName = input.target.name
            const toRemove = document.querySelector(`.toRemove`)
            const rowField = new CreateNewTag('p', 'id', `${input.target.name}`, `#${row.id}`)
            rowField.innerText = input.target.value
            rowField.className = 'rowField'
            playlistsRows.inputName = inputContent
            const rowToPush = {
                [inputName]: inputContent
            }
            //on push chaque objet créé dans le tableau track, artist, album, length
            playlistsRows.push(rowToPush)
            console.log(playlistsRows)
            toRemove.remove()
            //dès qu'on a fait tous les input donc 4 on fetch
            if (count === 4) {
                fetch('./back-end/php/insertTrack.php', {
                    method: 'POST',
                    header: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(playlistsRows)
                }).then(r => console.log(r))

            }


        })
    })
}

/**
 *
 * @param input
 * @param type
 * @param name
 */
function putNameToInput (input, type, name) {
    input.type = type
    input.name = name
}