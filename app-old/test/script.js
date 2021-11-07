const adherents = [
    {name: "leo", tel: "06 23 45 19 32", mail:"ar@hotmail.fr"},
    {name: "mark", tel: "09 08 07 06 05", mail:"mark@caramail.fr"},
    {name: "kemar", tel: "3630", mail:"kemar@lalopette"},
    {name: "guy", tel: "", mail:""},
    {name: "georges", tel: "", mail:""},
    {name: "nathalie", tel: "", mail:""}
]

displayUsers(adherents);

function displayUsers(users) {

    //va parcourir la liste des user
    for (let user of users) {
        //pour chaqeu user : afficher ses info dans une ligne d'un tableau 
        let row = 
            `   
            <tr>
                <td>${user.name}</td>
                <td>${user.tel}</td>
                <td>${user.mail}</td>
            </tr>`
        document.querySelector('#user-list tbody').innerHTML += row;
    }

}

