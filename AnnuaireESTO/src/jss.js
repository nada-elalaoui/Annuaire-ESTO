document.getElementById("passview").onclick = function() {
    var input = document.getElementsByClassName("motdepasse")[0];
    var actuel = input.getAttribute('type');
    input.setAttribute('type', actuel == 'password' ? 'text' : 'password');
}

function verifierRecherche(form) {
    var boxs = form.querySelectorAll('input[type=checkbox]');
    for (var i = 0; i < boxs.length; i++) {
        if (boxs[i].checked) return true;
    }

    alert("Séléctionner au moins un champs pour rechercher!");
    return false;


}