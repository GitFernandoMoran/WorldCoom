function validarNoticia() {
    var titulo = document.forms["myNForm"]["titulo"].value;
    var imagen = document.forms["myNForm"]["imagen"].value;
    var txtIntro = document.forms["myNForm"]["txtIntro"].value;
    var texto = document.forms["myNForm"]["texto"].value;
    var fecha = document.forms["myNForm"]["fecha"].value;
    var ubicacion = document.forms["myNForm"]["ubicacion"].value;
    var periodista = document.forms["myNForm"]["periodista"].value;
    var contexto = document.forms["myNForm"]["contexto"].value;
    var tema = document.forms["myNForm"]["tema"].value;

    if (titulo === "" || imagen === ""|| txtIntro === ""|| texto === ""|| fecha === ""|| ubicacion === ""|| periodista === ""|| contexto === ""|| tema === "") {
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