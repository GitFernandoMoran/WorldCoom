<?php
session_start ();
include("head_sec.php");
require("db_modelo.php");

if (isset($_POST["url"])) {
    $url=$_POST["url"];
    $descripcion=$_POST["descripcion"];
    //sanitizar
    $url=str_replace("'","",$url);
    $descripcion=str_replace("'","",$descripcion);
    //conexion con la BD
    $db = new Database("localhost", "webnews", "1ojNEpP0LgRFeef2", "noticias");
    //Armado de la senntencia SQL
    $sql = "INSERT INTO imagenes (url, descripcion) VALUES ('$url', '$descripcion')";
    //Ejecutar el SQL
    $result = $db->query($sql);
    //cerrar la conexion
    $db->close();
    
    echo "<div class='mx-auto' style='width:600px;text-align:center'>";
    echo "  <p class='mx-auto' style='width: 600px;text-align:center;font-family:Newsreader;font-size:35px;font-weight:500'>Se ha agregado la imagen</p>";
    echo "      <div style='border:3px solid black;border-radius:5px;margin-right:auto;margin-left:auto;width:400px;position: relative;margin-bottom:22px'>";
    echo "          <img src='$url' width='100%' style='display: block;'>";
    echo "          <div style='position: absolute; bottom: 0; width: 100%; background-color: rgba(0, 0, 0, 0.5); color: white; font-family: Fira Sans; font-size: 17px; padding: 10px;'>$descripcion</div>";
    echo "      </div>";
    echo "  <a href='admin.php'><button style='border:0px solid black;border-radius:5px;color:white;background-color:black;font-family:Libre Franklin;font-size:20px;height:50px;padding:10px 10px'>Continuar</button></a>"; //Permitirle ir al menu
    echo "</div>";
    include("foot_sec.php");
    die();
}

?>

<!-- Formulario de alta de imagen -->

<div class='position-absolute start-0 rounded-pill return-new ' style='margin-top:160px;margin-left:20px;padding:5px;font-family:Libre Franklin'><a href='../noticias/admin.php'><div class='themes-news'><span class='oi oi-arrow-thick-left' style='margin-right:10px;'></span>Regresar </div></a></div>
<p class="mx-auto" style="width: 600px;text-align:center;font-family:Newsreader;font-size:35px;font-weight:500">Crear imagen</p>

<form id="myForm" onsubmit="return validarPeriodista()" method='post' class="mx-auto" style="width: 600px;">
    <div>
        <label for="inputImagen" style="font-family:Libre Franklin;font-size:15px;padding-bottom:5px">Imagen</label>
        <div>
            <input type="text"  class="d-inline w-100" name="url" style="height:44px;border:1px solid black;border-radius:3px;padding-left:15px;padding-right:15px" placeholder="Agrega el URL de la imagen" required>
        </div>
    </div>
    <div>
        <label for="inputDescripcion" style="font-family:Libre Franklin;font-size:15px;padding-top:10px;padding-bottom:5px">Descripcion</label>
        <div>
            <textarea  class="d-inline w-100" name="descripcion" style="border:1px solid black;border-radius:3px;padding-left:15px;padding-right:15px" required></textarea>
        </div>
    </div>
    <button type="submit" value="Crear imagen" class="login-button d-inline w-100 mt-4" style="font-size:15px;font-family:Libre Franklin;background-color:black;color:white;padding:10px;border:0px solid black;border-radius:5px"
    onmouseover="this.style.backgroundColor='#333333'; this.style.border='0px solid #333333'"
    onmouseout="this.style.backgroundColor='black'; this.style.border='0px solid black'">Crear imagen</button>
</form>
<div id="undiv"></div>
<script src="Script/periodistaValidate.js"></script>

<?php 
    include("foot_sec.php");
?>