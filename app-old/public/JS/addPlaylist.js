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

//function onhover element playlist qui affiche clic droit pour editer ou supprimer




//pour chaque element editable on créera une fonction qui selectionnera tout le champ et mettre une bordure noire

//1 on selection tous les élement editable
var div = document.querySelectorAll('editable')

//2