<?php
session_start ();
include("head_sec.php");
require("db_modelo.php");

if (isset($_POST["titulo"])) {
    $titulo=$_POST["titulo"];
    $texto=$_POST["texto"];
    //sanitizar
    $titulo=str_replace("'","",$titulo);
    $texto=str_replace("'","",$texto);
    //conexion con la BD
    $db = new Database("localhost", "webnews", "1ojNEpP0LgRFeef2", "noticias");
    //Armado de la senntencia SQL
    $sql = "INSERT INTO contexto_noticia (titulo, texto) VALUES ('$titulo', '$texto')";
    //Ejecutar el SQL
    $result = $db->query($sql);
    //cerrar la conexion
    $db->close();
    
    echo "<div class='mx-auto' style='width:600px;text-align:center'>";
    echo "  <p class='mx-auto' style='width: 600px;text-align:center;font-family:Newsreader;font-size:35px;font-weight:500'>Se ha agregado el contexto</p>";
    echo"       <div class='border' style='margin-top:10px;margin-bottom:25px;border-radius:4px;padding:35px;box-shadow:0px 1px 5px 0px grey'>";
    echo"           <div style='font-size:35px;font-weight: 600;font-family:Newsreader;margin-bottom:19px'>$titulo</div>";
    echo"           <div style='font-family:Fira Sans;font-size:18px'>$texto</div>";
    echo"       </div>";
    echo "  <a href='admin.php'><button style='border:0px solid black;border-radius:5px;color:white;background-color:black;font-family:Libre Franklin;font-size:20px;height:50px;padding:10px 10px'>Continuar</button></a>"; //Permitirle ir al menu
    echo "</div>";
    include("foot_sec.php");
    die();
}

?>

<!-- Formulario de alta de imagen -->

<div class='position-absolute start-0 rounded-pill return-new ' style='margin-top:160px;margin-left:20px;padding:5px;font-family:Libre Franklin'><a href='../noticias/admin.php'><div class='themes-news'><span class='oi oi-arrow-thick-left' style='margin-right:10px;'></span>Regresar </div></a></div>
<p class="mx-auto" style="width: 600px;text-align:center;font-family:Newsreader;font-size:35px;font-weight:500">Crear contexto</p>

<form id="myForm" method='post' class="mx-auto" style="width: 600px;">
    <div>
        <label for="inputTitulo" style="font-family:Libre Franklin;font-size:15px;padding-bottom:5px">Titulo</label>
        <div>
            <input type="text"  class="d-inline w-100" name="titulo" style="height:44px;border:1px solid black;border-radius:3px;padding-left:15px;padding-right:15px" required>
        </div>
    </div>
    <div>
        <label for="inputTextos" style="font-family:Libre Franklin;font-size:15px;padding-top:10px;padding-bottom:5px">Texto</label>
        <div>
            <textarea onkeydown="handleEnterKey(event, 'context-text')" id="context-text"  class="d-inline w-100" name="texto" style="border:1px solid black;border-radius:3px;padding-left:15px;padding-right:15px" required></textarea>
        </div>
    </div>
    <button type="submit" value="Crear imagen" class="login-button d-inline w-100 mt-4" style="font-size:15px;font-family:Libre Franklin;background-color:black;color:white;padding:10px;border:0px solid black;border-radius:5px"
    onmouseover="this.style.backgroundColor='#333333'; this.style.border='0px solid #333333'"
    onmouseout="this.style.backgroundColor='black'; this.style.border='0px solid black'">Crear contexto</button>
</form>
<div id="undiv"></div>
<script src="Script/Enterykey.js"></script>


<?php 
    include("foot_sec.php");
?>