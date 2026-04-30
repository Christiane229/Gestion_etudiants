function valider() {
    const nom = document.getElementById('nom').value.trim();
    const prenom = document.getElementById('prenom').value.trim();

    if (nom === '') {
        alert('Le nom est obligatoire !');
        return false;
    }

    if (prenom === '') {
        alert('Le prénom est obligatoire !');
        return false;
    }

    return true;
}