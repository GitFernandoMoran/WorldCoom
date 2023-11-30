function validarPeriodista() {
    var nombre = document.forms["myForm"]["nombre"].value;
    var fotografia = document.forms["myForm"]["fotografia"].value;

    if (nombre === "" || fotografia === "") {
        // Campos vacíos, mostrar mensaje de error y evitar que se envíe el formulario
        document.getElementById("undiv").innerHTML = `
        <div role='alert' class='position-absolute top-0 start-50 translate-middle' style='margin-top:472px;color:rgb(201, 0, 0);margin-right:100px;background:white'>
            <span class='oi oi-warning'></span>Por favor, complete todos los campos.
        </div>`
        return false;
    }

    // Campos llenos, permitir que se envíe el formulario
    return true;
}