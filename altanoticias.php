<?php
session_start ();
//verificar que exista la sesion
include ("validacion.php");

include("head_sec.php");
require("db_modelo.php");

if (isset($_POST["titulo"])) {
    $titulo=$_POST["titulo"];
    $imagen=$_POST["imagen"];
    $txtIntro=$_POST["txtIntro"];
    $texto=$_POST["texto"];
    $fecha=$_POST["fecha"];
    $ubicacion=$_POST["ubicacion"];
    $periodista=$_POST["periodista"];
    $contexto=$_POST["contexto"];
    $tema=$_POST["tema"];
    //sanitizar
    $titulo=str_replace("'","",$titulo);
    $imagen=intval($imagen);
    $txtIntro=str_replace("'","",$txtIntro);
    $texto=str_replace("'","",$texto);
    $fecha=str_replace("'","",$fecha);
    $ubicacion=str_replace("'","",$ubicacion);
    $periodista=intval($periodista);
    $contexto=intval($contexto);
    $tema=intval($tema);
    //conexion con la BD
    $db = new Database("localhost", "webnews", "1ojNEpP0LgRFeef2", "noticias");
    //Armado de la senntencia SQL
    $sql = "INSERT INTO notas (titulo, id_imagen, txt_intro, text, fecha, ubicacion, id_periodista, id_contexto_noticia, id_temas) VALUES ('$titulo', $imagen, '$txtIntro', '$texto', '$fecha', '$ubicacion', $periodista, $contexto, $tema)";
    //Ejecutar el SQL
    $result = $db->query($sql);
    //cerrar la conexion
    $db->close();
    
    $db = new Database("localhost", "webnews", "1ojNEpP0LgRFeef2", "noticias");
    $sql2 = "SELECT n.id AS 'id1', n.titulo AS 'titulo1', i.url AS 'url_imagen', i.descripcion AS 'descripcion_imagen', n.txt_intro AS 'txt-intro1', n.text AS 'texto1', n.fecha AS 'fecha1', n.ubicacion AS 'ubicacion1', p.nombre AS 'nombre-periodista', p.fotografia AS 'url_periodista', cn.titulo AS 'titulo-contexto', cn.texto AS 'txt-contexto', t.titulo AS 'tema' FROM notas n INNER JOIN imagenes i ON n.id_imagen = i.id INNER JOIN periodista p ON n.id_periodista = p.id INNER JOIN contexto_noticia cn ON n.id_contexto_noticia = cn.id INNER JOIN temas t ON n.id_temas = t.id ORDER BY n.id DESC LIMIT 1;";
    $result1 = $db->query($sql2);    
    $row = $db->fetch($result1);

        // Días de la semana en español
        $dias_semana = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");

        // Meses en español
        $meses = array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

        // Formatear la fecha manualmente
        $timestamp = strtotime($row['fecha1']);
        $fechaFormateada = $dias_semana[date('w', $timestamp)] . ", " . date('j', $timestamp) . " de " . $meses[date('n', $timestamp)] . " de " . date('Y', $timestamp);
        $tema_name="";

        echo"<div class='position-absolute start-0 rounded-pill return-new ' style='margin-top:160px;margin-left:20px;padding:5px;font-family:Libre Franklin'><a href='../noticias/admin.php'><div class='themes-news'><span class='oi oi-arrow-thick-left' style='margin-right:10px;'></span>Regresar </div></a></div>";
        echo "  <p class='mx-auto' style='width: 600px;text-align:center;font-family:Newsreader;font-size:50px;font-weight:600'>Noticia agregada</p>";
        echo"   <div class='mx-auto p-2' style='width:60%'>";
        echo"       <div style='width:70%;margin-left:auto;margin-right:auto'>";
        echo"           <div class='position-relative border-bottom' style='margin-bottom:20px'>";
        echo"               <div style='font-family:Libre Franklin;text-transform: uppercase;font-size:22px;padding-bottom:10px'>{$row['tema']} </div>";
        echo"               <div class='position-absolute end-0' style='font-family:Fira Sans; font-weight:500'>{$fechaFormateada}</div>";
        echo"               <div style='padding-bottom:10px; font-family:Fira Sans; font-weight:500; text-decoration: underline;' >{$row['ubicacion1']}</div>";
        echo"           </div>";
        echo"       <div style='padding-bottom:20px'>";
        echo"           <div class='d-inline' style='font-family:Fira Sans; font-weight:600;'>Por: <div class='d-inline' style='text-decoration: underline;'>{$row['nombre-periodista']}</div></div>";
        echo "          <div class='d-inline'> <img src='{$row['url_periodista']}' style='width:50px;border-radius:100px;filter: grayscale(100%);'></div>";
        echo"       </div>";
        echo"           <h1 style='font-weight: 700;font-family:Newsreader;font-style: italic; padding-bottom:15px'>{$row['titulo1']}</h1>";
        echo"       </div>";
        echo "      <div style='position: relative;margin-bottom:22px'>";
        echo "          <img src='{$row['url_imagen']}' width='100%' style='display: block;'>";
        echo "          <div style='position: absolute; bottom: 0; width: 100%; background-color: rgba(0, 0, 0, 0.5); color: white; font-family: Fira Sans; font-size: 17px; padding: 10px;'>{$row['descripcion_imagen']}</div>";
        echo "      </div>";
        echo"       <div>";
        echo"           <div style='font-family:Times New Roman;font-size:23px'>{$row['txt-intro1']}</div><br>";
        echo"           <div style='font-family:Times New Roman;font-size:23px'>{$row['texto1']}</div><br>";
        echo"       </div>";
        echo"       <div class='border' style='border-radius:4px;padding:35px;box-shadow:0px 1px 5px 0px grey'>";
        echo"           <div style='font-size:35px;font-weight: 600;font-family:Newsreader;margin-bottom:19px'>{$row['titulo-contexto']}</div>";
        echo"           <div style='font-family:Fira Sans;font-size:18px'>{$row['txt-contexto']}</div>";
        echo"       </div>";
        echo "      <a href='admin.php'><button style='width:100%;margin-top:30px;border:0px solid black;border-radius:5px;color:white;background-color:black;font-family:Libre Franklin;font-size:20px;height:50px;padding:10px 10px'>Continuar</button></a>"; //Permitirle ir al menu
        echo"   </div>";

    include("foot_sec.php");
    die();
    $db->close();
}

?>

<!-- Formulario de alta de reportero -->

<div class='position-absolute start-0 rounded-pill return-new ' style='margin-top:160px;margin-left:20px;padding:5px;font-family:Libre Franklin'><a href='../noticias/admin.php'><div class='themes-news'><span class='oi oi-arrow-thick-left' style='margin-right:10px;'></span>Regresar </div></a></div>
<p class="mx-auto" style="width: 600px;text-align:center;font-family:Newsreader;font-size:35px;font-weight:500">Crear noticia</p>

<form id="myNForm" onsubmit="return validarNoticia()" method='post' class="mx-auto" style="width: 600px;">
    <div>
        <label for="inputTitle" style="font-family:Libre Franklin;font-size:15px;padding-bottom:5px">Titulo</label>
        <div>
            <input type="text"  class="d-inline w-100" name="titulo" style="height:44px;border:1px solid black;border-radius:3px;padding-left:15px;padding-right:15px" required>
        </div>
    </div>
    <div>
        <label for="inputImagen" style="font-family:Libre Franklin;font-size:15px;padding-top:10px;padding-bottom:5px">Imagen</label>
        <div>
            <select class="d-inline w-100" name="imagen" id="SelImagen" style="height:44px;border:1px solid black;border-radius:3px;padding-left:15px;padding-right:15px" required>
            <option selected disabled value="">Elige una imagen...</option>
            <?php
                $db = new Database("localhost", "webnews", "1ojNEpP0LgRFeef2", "noticias");
                
                $sql="SELECT id, url, descripcion FROM imagenes";
                $result=$db->query($sql);
                if($result)
                {
                    while ($row = $db->fetch($result))
                    {
                        echo "
                        <option value='{$row['id']}'>
                            <div>{$row['descripcion']}</div>
                        </option>";
                    }
                }
            ?>
            </select>
        </div>
    </div>
    <div>
        <label for="inputIntro" style="font-family:Libre Franklin;font-size:15px;padding-top:10px;padding-bottom:5px">Texto Introductorio</label>
        <div>
            <textarea  class="d-inline w-100" name="txtIntro" style="border:1px solid black;border-radius:3px;padding-left:15px;padding-right:15px" required></textarea>
        </div>
    </div>
    <div>
        <label for="inputTexto" style="font-family:Libre Franklin;font-size:15px;padding-top:10px;padding-bottom:5px">Texto</label>
        <div>
            <textarea onkeydown="handleEnterKey(event, 'txtTexto')" id="txtTexto" class="d-inline w-100" name="texto" style="border:1px solid black;border-radius:3px;padding-left:15px;padding-right:15px" required></textarea>
        </div>
    </div>
    <div>
        <label for="inputFecha" style="font-family:Libre Franklin;font-size:15px;padding-top:10px;padding-bottom:5px">Fecha</label>
        <div>
            <input type="date"  class="d-inline w-100" name="fecha" style="height:44px;border:1px solid black;border-radius:3px;padding-left:15px;padding-right:15px" required>
        </div>
    </div>
    <div>
        <label for="inputUbicacion" style="font-family:Libre Franklin;font-size:15px;padding-top:10px;padding-bottom:5px">Ubicacion</label>
        <div>
            <input type="text"  class="d-inline w-100" name="ubicacion" style="height:44px;border:1px solid black;border-radius:3px;padding-left:15px;padding-right:15px" required>
        </div>
    </div>
    <div>
        <label for="inputPeriodista" style="font-family:Libre Franklin;font-size:15px;padding-top:10px;padding-bottom:5px">Periodista</label>
        <div>
            <select class="d-inline w-100" name="periodista" id="SelPeriodista" style="height:44px;border:1px solid black;border-radius:3px;padding-left:15px;padding-right:15px" required>
            <option selected disabled value="">Elige un periodista...</option>
            <?php
                $db = new Database("localhost", "webnews", "1ojNEpP0LgRFeef2", "noticias");
                
                $sql="SELECT id, nombre, fotografia FROM periodista";
                $result=$db->query($sql);
                if($result)
                {
                    while ($row = $db->fetch($result))
                    {
                        echo "
                        <option value='{$row['id']}'>
                            <div>{$row['nombre']}</div>
                        </option>";
                    }
                }
            ?>
            </select>
        </div>
    </div>
    <div>
        <label for="inputContexto" style="font-family:Libre Franklin;font-size:15px;padding-top:10px;padding-bottom:5px">Contexto</label>
        <div>
            <select class="d-inline w-100" name="contexto" id="SelContexto" style="height:44px;border:1px solid black;border-radius:3px;padding-left:15px;padding-right:15px" required>
            <option selected disabled value="">Elige un contexto...</option>
            <?php
                $db = new Database("localhost", "webnews", "1ojNEpP0LgRFeef2", "noticias");
                
                $sql="SELECT id, titulo FROM contexto_noticia";
                $result=$db->query($sql);
                if($result)
                {
                    while ($row = $db->fetch($result))
                    {
                        echo "
                        <option value='{$row['id']}'>
                            <div>{$row['titulo']}</div>
                        </option>";
                    }
                }
            ?>
            </select>
        </div>
    </div>
    <div>
        <label for="inputTema" style="font-family:Libre Franklin;font-size:15px;padding-top:10px;padding-bottom:5px">Temas</label>
        <div>
            <select class="d-inline w-100" name="tema" id="SelTema" style="height:44px;border:1px solid black;border-radius:3px;padding-left:15px;padding-right:15px" required>
            <option selected disabled value="">Elige un tema...</option>
            <?php
                $db = new Database("localhost", "webnews", "1ojNEpP0LgRFeef2", "noticias");
                
                $sql="SELECT id, titulo FROM temas";
                $result=$db->query($sql);
                if($result)
                {
                    while ($row = $db->fetch($result))
                    {
                        echo "
                        <option value='{$row['id']}'>
                            <div>{$row['titulo']}</div>
                        </option>";
                    }
                }
            ?>
            </select>
        </div>
    </div>
    <button type="submit" value="Crear noticia" class="login-button d-inline w-100 mt-4" style="font-size:15px;font-family:Libre Franklin;background-color:black;color:white;padding:10px;border:0px solid black;border-radius:5px"
    onmouseover="this.style.backgroundColor='#333333'; this.style.border='0px solid #333333'"
    onmouseout="this.style.backgroundColor='black'; this.style.border='0px solid black'">Crear noticia</button>
</form>
<div id="undiv"></div>
<script src="Script/noticiaValidate.js"></script>
<script src="Script/Enterykey.js"></script>

<?php 
    include("foot_sec.php");
?>