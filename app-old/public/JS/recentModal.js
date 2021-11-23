

console.log(performance.now() + 'recent')

    function createModal() {

        const ASIDE = new CreateNewTag('aside', 'class', 'modal-recent modal', 'body')
        ASIDE.role = 'dialog'
        //faire un if pour récupérer le title modal qui sera ajouter album ou ajouter artiste
        // ASIDE.setAttribute('aria-labelledby', `${modalTitle}`)
        const wrapper = new CreateNewTag('div', 'class', 'modal-wrapper', '.modal')
        return ASIDE
//return aside et l'appele dans displaymodalartist et album (faire plus
    }


    /**
     * On veut créer une liste déroulante dans la fenêtre modale avec tous les artistes pour pouvoir assigner un artiste à un album
     * se passe uniquement quand on clique sur ajouter un album récent
     * @param modal_title
     */


    function modalArtistContent(modal_title) {
        const modalForm = new CreateNewTag('form', 'action', 'POST', '.modal-wrapper')
        modalForm.className = 'modalForm'
        const modalTitle = new CreateNewTag('h1', 'id', 'modal-title', '.modalForm')
        //sera par la suite dynamique
        modalTitle.innerText = modal_title
        const input = new CreateNewTag('input', 'type', 'text', '.modalForm')
        input.className = 'modalInput'
        const btnContainer = new CreateNewTag('div', 'class', 'btnContainer', '.modalForm')
        const modalBtn = new CreateNewTag('button', 'type', 'submit', '.btnContainer')
        modalBtn.className = 'modalBtn'
        modalBtn.innerText = 'Confirmer'
    }


    function modalAlbumContent(modal_title, tab) {
        const modalForm = new CreateNewTag('form', 'action', 'POST', '.modal-wrapper')
        modalForm.className = 'modalForm'

        const modalTitle = new CreateNewTag('h1', 'id', 'modal-title', '.modalForm')
        //sera par la suite dynamique
        modalTitle.innerText = modal_title

        const input = new CreateNewTag('input', 'type', 'text', '.modalForm')
        input.className = 'modalInput'

        const labelArtistSelect = new CreateNewTag('label', 'for', 'artist-select', '.modalForm')
        labelArtistSelect.className = 'artists-select-label'
        console.log('okokokokokokok')
        const selectArtists = new CreateNewTag('select', 'name', 'artist-select', '.modalForm')
        selectArtists.className = 'artists-select'
        tab.forEach(e => {
            const row = new CreateNewTag('option', 'value', `${e}`, 'body')
            row.className = 'artist-selec-row'
            row.innerText = e.artist_name
            console.log('rowrow')
            console.log(e + row + 'row')
        })

        const btnContainer = new CreateNewTag('div', 'class', 'btnContainer', '.modalForm')
        const modalBtn = new CreateNewTag('button', 'type', 'submit', '.btnContainer')
        modalBtn.className = 'modalBtn'
        modalBtn.innerText = 'Confirmer'


}



