<?php
session_start ();
include("head_sec.php");
require("db_modelo.php");

if (isset($_POST["nombre"])) {
    $nombre=$_POST["nombre"];
    $fotografia=$_POST["fotografia"];
    //sanitizar
    $nombre=str_replace("'","",$nombre);
    $fotografia=str_replace("'","",$fotografia);
    //conexion con la BD
    $db = new Database("localhost", "webnews", "1ojNEpP0LgRFeef2", "noticias");
    //Armado de la senntencia SQL
    $sql = "INSERT INTO periodista (nombre, fotografia, id_usuario) VALUES ('$nombre', '$fotografia', '{$_SESSION ['adminid']}')";
    //Ejecutar el SQL
    $result = $db->query($sql);
    //cerrar la conexion
    $db->close();
    echo "<div class='mx-auto' style='width:600px;text-align:center'>";
    echo "  <p class='mx-auto' style='width: 600px;text-align:center;font-family:Newsreader;font-size:35px;font-weight:500'>Se ha creado el periodista</p>";
    echo "  <div style='margin-right:auto;margin-left:auto;width:400px;background-color:rgb(224, 224, 224);border:2px solid black;border-radius:5px;padding:35px;margin-bottom:20px'>
                <div class='contenedor-imagen imagen-edit' style='width:70px;height:70px;margin-right:auto;margin-left:auto'>
                    <img src='$fotografia' class='contenedor-imagen' style='filter: grayscale(100%);border-radius:10%;border:1px solid black'>
                </div>
                <p style='margin-bottom:-16px;padding-top:10px;font-family:Times New Roman;color:black;font-size:30px;font-weight:500'>$nombre</p>
            </div>";
    echo "  <a href='admin.php'><button style='border:0px solid black;border-radius:5px;color:white;background-color:black;font-family:Libre Franklin;font-size:20px;height:50px;padding:10px 10px'>Continuar</button></a>"; //Permitirle ir al menu
    echo "</div>";
    include("foot_sec.php");
    die();
}

?>

<!-- Formulario de alta de reportero -->

<div class='position-absolute start-0 rounded-pill return-new ' style='margin-top:160px;margin-left:20px;padding:5px;font-family:Libre Franklin'><a href='../noticias/admin.php'><div class='themes-news'><span class='oi oi-arrow-thick-left' style='margin-right:10px;'></span>Regresar </div></a></div>
<p class="mx-auto" style="width: 600px;text-align:center;font-family:Newsreader;font-size:35px;font-weight:500">Crear reportero</p>

<form id="myForm" onsubmit="return validarPeriodista()" method='post' class="mx-auto" style="width: 600px;">
    <div>
        <label for="inputName" style="font-family:Libre Franklin;font-size:15px;padding-bottom:5px">Nombre</label>
        <div>
            <input type="text"  class="d-inline w-100" name="nombre" style="height:44px;border:1px solid black;border-radius:3px;padding-left:15px;padding-right:15px" required>
        </div>
    </div>
    <div>
        <label for="inputPhoto" style="font-family:Libre Franklin;font-size:15px;padding-top:10px;padding-bottom:5px">Fotografia</label>
        <div>
            <input type="text"  class="d-inline w-100" name="fotografia" style="height:44px;border:1px solid black;border-radius:3px;padding-left:15px;padding-right:15px" placeholder="Agrega el URL de la fotografia" required>
        </div>
    </div>
    <button type="submit" value="Crear Reportero" class="login-button d-inline w-100 mt-4" style="font-size:15px;font-family:Libre Franklin;background-color:black;color:white;padding:10px;border:0px solid black;border-radius:5px"
    onmouseover="this.style.backgroundColor='#333333'; this.style.border='0px solid #333333'"
    onmouseout="this.style.backgroundColor='black'; this.style.border='0px solid black'">Crear reportero</button>
</form>
<div id="undiv"></div>
<script src="Script/periodistaValidate.js"></script>

<?php 
    include("foot_sec.php");
?>