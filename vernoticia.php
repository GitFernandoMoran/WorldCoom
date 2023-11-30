<?php
include ("head.php");
include ("db_modelo.php");

echo "<div class='position-absolute start-0 rounded-pill return-new ' style='margin-top:25px;margin-left:20px;padding:5px;font-family:Libre Franklin'><a href='../noticias'><div class='themes-news'><span class='oi oi-arrow-thick-left' style='margin-right:10px;'></span>Regresar </div></a></div>";

if (isset($_GET['idn']))
{
    $idnoticia=intval($_GET['idn']);

    //conetcar la BD
    $db = new Database("localhost", "webnews", "1ojNEpP0LgRFeef2", "noticias");
    
    //añadir el SQL
    $sql = "SELECT n.id AS 'id', n.titulo AS 'titulo', i.url AS 'url_imagen', i.descripcion AS 'descripcion_imagen', n.txt_intro AS 'txt-intro', n.text AS 'texto', n.fecha AS 'fecha', n.ubicacion AS 'ubicacion', p.nombre AS 'nombre-periodista', p.fotografia AS 'url_periodista', cn.titulo AS 'titulo-contexto', cn.texto AS 'txt-contexto', t.titulo AS 'tema' FROM notas n INNER JOIN imagenes i ON n.id_imagen = i.id INNER JOIN periodista p ON n.id_periodista = p.id INNER JOIN contexto_noticia cn ON n.id_contexto_noticia = cn.id INNER JOIN temas t ON n.id_temas = t.id WHERE n.id = {$idnoticia};";

    //ejecturar el SQL
    $result = $db->query($sql);

    //mostrar la noticia
    if ($result) 
    {
        if ($row = $db->fetch($result))
        {
            // Días de la semana en español
            $dias_semana = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");

            // Meses en español
            $meses = array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

            // Formatear la fecha manualmente
            $timestamp = strtotime($row['fecha']);
            $fechaFormateada = $dias_semana[date('w', $timestamp)] . ", " . date('j', $timestamp) . " de " . $meses[date('n', $timestamp)] . " de " . date('Y', $timestamp);

            echo"   <div class='mx-auto p-2' style='width:60%;margin-top:40px'>";
            echo"       <div style='width:70%;margin-left:auto;margin-right:auto'>";
            echo"           <div class='position-relative border-bottom' style='margin-bottom:20px'>";
            echo"               <div style='font-family:Libre Franklin;text-transform: uppercase;font-size:22px;padding-bottom:10px'>{$row['tema']} </div>";
            echo"               <div class='position-absolute end-0' style='font-family:Fira Sans; font-weight:500'>{$fechaFormateada}</div>";
            echo"               <div style='padding-bottom:10px; font-family:Fira Sans; font-weight:500; text-decoration: underline;' >{$row['ubicacion']}</div>";
            echo"           </div>";
            echo"       <div style='padding-bottom:20px'>";
            echo"           <div class='d-inline' style='font-family:Fira Sans; font-weight:600;'>Por: <div class='d-inline' style='text-decoration: underline;'>{$row['nombre-periodista']}</div></div>";
            echo "          <div class='d-inline'> <img src='{$row['url_periodista']}' style='width:50px;border-radius:100px;filter: grayscale(100%);'></div>";
            echo"       </div>";
            echo"           <h1 style='font-weight: 700;font-family:Newsreader;font-style: italic; padding-bottom:15px'>{$row['titulo']}</h1>";
            echo"       </div>";
            echo "      <div style='position: relative;margin-bottom:22px'>";
            echo "          <img src='{$row['url_imagen']}' width='100%' style='display: block;'>";
            echo "          <div style='position: absolute; bottom: 0; width: 100%; background-color: rgba(0, 0, 0, 0.5); color: white; font-family: Fira Sans; font-size: 17px; padding: 10px;'>{$row['descripcion_imagen']}</div>";
            echo "      </div>";
            echo"       <div>";
            echo"           <div style='font-family:Times New Roman;font-size:23px'>{$row['txt-intro']}</div><br>";
            echo"           <div style='font-family:Times New Roman;font-size:23px'>{$row['texto']}</div><br>";
            echo"       </div>";
            echo"       <div class='border' style='border-radius:4px;padding:35px;box-shadow:0px 1px 5px 0px grey'>";
            echo"           <div style='font-size:35px;font-weight: 600;font-family:Newsreader;margin-bottom:19px'>{$row['titulo-contexto']}</div>";
            echo"           <div style='font-family:Fira Sans;font-size:18px'>{$row['txt-contexto']}</div>";
            echo"       </div>";
            echo"   </div>";
            
        }
    } else 
    {
        echo "
        <div class='alert alert-warning mx-auto mt-2 p-2' style='width: 750px;' role='alert'>
            No se encontro la noticia {$idnoticia}
        </div>";
    }

    $sql2 = "SELECT n.id AS 'id', n.titulo AS 'titulo', i.url AS 'url-imagen', n.fecha AS 'fecha' FROM notas n INNER JOIN imagenes i ON n.id_imagen = i.id INNER JOIN temas t ON n.id_temas = t.id WHERE t.titulo = '{$row['tema']}' ORDER BY n.fecha DESC LIMIT 3";

    $result2 = $db->query($sql2);
    $sumador=0;
    if ($result2) 
    {   
        echo"<div class='news-container'>";
        echo "<div class='news-item ' style='font-weight:600;font-size:30px;font-family:Newsroman;text-align:center'>{$row['tema']}</div>";
        while ($row1 = $db->fetch($result2))
        {
            $sumador++;
            echo"
            <a href='vernoticia.php?idn={$row1['id']}'>
            <div class='news-item' style='border-bottom-color: grey;'>
                <p class='news-number' style='font-weight:800;font-size:35px;font-family:Newsreader;'>$sumador</p>
                <div class='news-content'>
                    <p style='font-weight:500;font-size:16px;font-family:Newsreader'>{$row1['titulo']}</p>
                </div>
                <img class='news-image contenedor-imagen noticias-short' style='margin-right:30px' src='{$row1['url-imagen']}' alt='News Image'>
            </div>
            </a>";
        }
        echo "</div>";
    }

    //cerrar BD
    $db->close();

}else
{
    echo"<div>La noticia no ha sido encontrada</div>";
}

include ("foot.php");


?>