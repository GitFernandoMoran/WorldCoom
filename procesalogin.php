<?php
include('head_sec.php');
require("db_modelo.php");

session_start ();

$us = '';
$pas = '';

// Verifica si se han enviado datos POST para el usuario y la contraseña
if (isset($_POST['user'])) {
    $us = $_POST['user'];
}
if (isset($_POST['pass'])) {
    $pas = $_POST['pass'];
}

// Verifica si el usuario o la contraseña estan vacios
if ($us == '' || $pas == '') {
    //  echo "
    //  <div class='alert alert-danger mx-auto mt-2 p-2' style='width: 750px;' role='alert'>
    //      Usuario o contraseña invalidos
    //  </div>";
    include("login.php"); // Incluye el archivo de inicio de sesion
    include('foot_sec.php');
    die(); // Termina la ejecucion del script
}

// Sanitiza los datos (es importante hacer esto para prevenir ataques de inyeccion SQL)

$us=str_replace("'","",$us);
$pas=str_replace("'","",$pas);


// Conectar a la base de datos
$conn = new mysqli("localhost", "webnews", "1ojNEpP0LgRFeef2", "noticias");

// Verifica si la conexion a la base de datos fue exitosa
if ($conn->connect_error) {
    die("La conexion a la base de datos fallo: " . $conn->connect_error);
}

// Armar la consulta SQL para verificar las credenciales del usuario
$sql = "SELECT * FROM usuarios WHERE login='{$us}' AND password='{$pas}';";

// Ejecutar la consulta
$result = $conn->query($sql);

// Verifica si se encontro un registro coincidente en la base de datos
if ($result->num_rows > 0) 
{
    $row = $result->fetch_assoc(); //Recuperar el primer registro
    $_SESSION ['admin']=$row['nombre']; //Crear la sesion con el nombre
    $_SESSION ['adminid']=$row['id']; //ID de la sesion
    echo "<div class='position-absolute start-0 rounded-pill return-new ' style='margin-top:160px;margin-left:20px;padding:5px;font-family:Libre Franklin'><a href='../noticias'><div class='themes-news'><span class='oi oi-arrow-thick-left' style='margin-right:10px;'></span>Regresar </div></a></div>"; 
    echo "<div class='mx-auto' style='width:600px;text-align:center'>";
    echo "  <p class='mx-auto' style='width: 600px;text-align:center;font-family:Newsreader;font-size:35px;font-weight:500'>Bienvenido usuario</p>";
    echo "  <a href='admin.php'><button style='border:0px solid black;border-radius:5px;color:white;background-color:black;font-family:Libre Franklin;font-size:20px;height:50px;padding:10px 10px'>Continuar</button></a>"; //Permitirle ir al menu
    echo "</div>";
    include('foot_sec.php');
} else {

    echo "
    <div role='alert' class='position-absolute top-0 start-50 translate-middle' style='margin-top:470px;color:rgb(201, 0, 0);margin-right:100px;background:white'>
        <span class='oi oi-warning'></span>Usuario o contraseña incorrecta
    </div>";
    include("login.php"); // Incluye el archivo de inicio de sesion
    include('foot_sec.php');
    die(); // Termina la ejecucion del script
}

// Cerrar la conexion a la base de datos
$conn->close();

?>
