



/**
 *
 * @param {HTMLElement} tag
 * @param {HTMLAttribute} classe
 * @param {HTMLElement} parent
 *
 * crée une div et la met dans un parent
 */
function createTag (tag, classe, parent) {
    const newTag = document.createElement(tag);
    newTag.className =  classe;
    parent = document.querySelector(parent)
    parent.appendChild(newTag)
    return newTag;
}





