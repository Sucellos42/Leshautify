/**
 *
 * @param {HTMLElement} tag
 * @param {HTMLAttribute} classe
 * @param {HTMLElement} parent
 *
 * crée une div et la met dans un parent
 *
 * première version de la fonction
 */
function CreateTag(tag, classe, parent) {
    const newTag = document.createElement(tag);
    newTag.className = classe;
    parent = document.querySelector(parent);
    parent.appendChild(newTag);
    return newTag;
}


/**
 * deuxieme version de la fonction
 * @param tag
 * @param attribute
 * @param value
 * @param parents
 * @returns {*}
 */
function CreateNewTag(tag, attribute, value, parents) {
    const newTag = document.createElement(tag);
    newTag.setAttribute(attribute, value);
    parents = document.querySelectorAll(parents);
    //fonction qui s'appelle elle meme et qui prend en paramètre parent
    parents.forEach(parent => {
        parent.appendChild(newTag)
    })
    return newTag;
}





