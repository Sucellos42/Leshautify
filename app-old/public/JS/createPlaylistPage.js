
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
    console.log(btnContainer)
    const addSongBtn = new CreateNewTag('button', 'type', 'submit', `.${btnContainer.className}`)
    addSongBtn.className = 'modalBtn addSong'
    addSongBtn.innerText = 'Ajouter une chanson'
    //header
    const rowHeader = new CreateNewTag('li', 'id', 'row-header',)
    addSongBtn.addEventListener('click', e => {
        e.preventDefault()
        createSongRow()
        console.log(`ok ok`)
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
let j = 0
function createSongRow (){
    const playlistsRows = {}
    i++
    const row = new CreateNewTag('li', 'class', 'song-list__row', '.song-list' )
    row.id = 'song-list__row-' + i
    j++


    const RowContainer1 = new CreateNewTag('div', 'id', 'row-track', `#${row.id}`)
    RowContainer1.className = "rowContainer"
    const trackPlaylist = new CreateNewTag('input', 'class', 'song-list__row-input', `#row-track`)
    putNameToInput (trackPlaylist, 'text', 'track')
    trackPlaylist.id = 'song-list__row-input-1'

    const RowContainer2 = new CreateNewTag('div', 'id', 'row-artist', `#${row.id}`)
    RowContainer2.className = "rowContainer"
    const artistPlaylist = new CreateNewTag('input', 'class', 'song-list__row-input', `#row-artist`)
    putNameToInput(artistPlaylist, 'text', 'artist')
    artistPlaylist.id = 'song-list__row-input-2'

    const RowContainer3 = new CreateNewTag('div', 'id', 'row-album', `#${row.id}`)
    RowContainer3.className = "rowContainer"
    const albumPlaylist = new CreateNewTag('input', 'class', 'song-list__row-input', `#row-album`)
    putNameToInput (albumPlaylist, 'text', 'album')
    albumPlaylist.id = 'song-list__row-input-3'

    const RowContainer4 = new CreateNewTag('div', 'id', 'row-length', `#${row.id}`)
    RowContainer4.className = "rowContainer"
    const lengthPlaylist = new CreateNewTag('input', 'class', 'song-list__row-input', `#row-length`)
    putNameToInput (lengthPlaylist, 'text', 'length')
    lengthPlaylist.id = 'song-list__row-input-4'

    //on met le place holder que pour le premier li pour faire l'animation
    if(document.querySelectorAll('.song-list__row').length === 1){
        document.querySelectorAll('#song-list__row-1>div>[id^="song-list__row-input"]').forEach(e => {
            const placeholder = new CreateNewTag('span', 'class','song-placeholder-title', `#row-${e.name}`)
            placeholder.id = 'placeholder-' + e.name
            placeholder.innerText = e.name
        })
    }

    trackPlaylist.focus()
        let count = 0
    document.querySelectorAll('.song-list__row-input').forEach(inputs => {


        inputs.addEventListener('change', input => {
            inputs.className = 'toRemove'
            count ++
            const input_id = 'song-list__row-input-' + count
            console.log(input_id)
            document.querySelector(`#${input_id}`).focus()
            console.log(input.target.value)

            const inputContent = input.target.value
            const inputName = input.target.name
            const toRemove = document.querySelector(`.toRemove`)
            const rowField = new CreateNewTag('p', 'id', `${input.target.name}`, `#row-${input.target.name}`)
            rowField.innerText = input.target.value
            rowField.className = 'rowField'
            //on associe la clef input name a la valeur de l'input content
            playlistsRows[inputName] = inputContent
            console.log(playlistsRows)
            toRemove.remove()
            //dès qu'on a fait tous les input donc 4 on fetch
            if (count === 4) {
                let playlist_title = document.querySelector('#playlist-title')
                playlist_title = playlist_title.innerText
                playlistsRows.playlist_title = playlist_title
                console.log(playlistsRows)
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

    const inputAnimation = document.querySelectorAll('.song-list>li:first-child>div>input')
    inputAnimation.className = "inputAnimation"
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