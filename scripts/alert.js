function validate() {
    let password = document.getElementsByName("password")[0].value;
    let password2 = document.getElementsByName("password2")[0].value;

    if (password !== password2) {
        alert("Las contraseñas no coinciden");
        return false;
    }

    let answer = confirm("¿Estás seguro de que quieras registrar ese usuario?");
    if (answer == true) {
        return true;
    }
    return false
}