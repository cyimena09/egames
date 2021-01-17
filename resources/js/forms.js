function validateForm() {
    let firstName = document.forms["admin_signup"]["firstName"].value;
    let lastName = document.forms["admin_signup"]["lastName"].value;
    let email = document.forms["admin_signup"]["email"].value;
    let password = document.forms["admin_signup"]["password"].value;
    let confirmPassword = document.forms["admin_signup"]["confirmPassword"].value;

    let numberRegex = /[0-9]/g;
    const emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (firstName == "" || lastName == "" || email == "" || password == "" || confirmPassword == "") {
        alert("Veuillez remplir tous les champs");
        return false;
    } else if (firstName.match(numberRegex) || lastName.match(numberRegex)) { // on vérifie s'il y a des chiffres dans le prénom
        alert("Le prénom et le nom ne peuvent pas contenir de chiffress ");
        return false;
    } else if (!email.match(emailRegex)) {
        alert("L'email n'est pas valide");
        return false;
    }

    else if (password != confirmPassword) {
        alert("Les mots de passe ne correspondent pas");
        return false;
    }
}