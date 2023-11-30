function validarFormulario() {
    let usuario = document.getElementsByName('user')[0].value
    let contraseña = document.getElementsByName('pass')[0].value
    let eldiv = document.getElementById ("eldiv")
    
    if (usuario === '' || contraseña === '') {
        eldiv.innerHTML=`
        <div role='alert' class='position-absolute top-0 start-50 translate-middle' style='margin-top:480px;color:rgb(201, 0, 0);margin-right:100px;background:white'>
            <span class='oi oi-warning'></span>Por favor, complete todos los campos.
        </div>`
        return false; // Evita que el formulario se envíe
    }

    return true; // Permite que el formulario se envíe
}