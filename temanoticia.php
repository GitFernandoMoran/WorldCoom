<?php
include ("head.php");
include ("db_modelo.php");

echo "<div class='position-absolute start-0 rounded-pill return-new ' style='margin-top:35px;margin-left:20px;padding:5px;font-family:Libre Franklin'><a href='../noticias'><div class='themes-news'><span class='oi oi-arrow-thick-left' style='margin-right:10px;'></span>Regresar </div></a></div>";

if (isset($_GET['idtn']))
{
    $titulotema=($_GET['idtn']);

    //conetcar la BD
    $db = new Database("localhost", "webnews", "1ojNEpP0LgRFeef2", "noticias");
    //añadir el SQL
    $sql = "SELECT n.id AS 'id', n.titulo AS 'titulo', n.txt_intro AS 'txt-intro', i.url AS 'url-imagen', n.fecha AS 'fecha' FROM notas n  INNER JOIN imagenes i ON n.id_imagen = i.id  INNER JOIN periodista p ON n.id_periodista = p.id  INNER JOIN contexto_noticia cn ON n.id_contexto_noticia = cn.id  INNER JOIN temas t ON n.id_temas = t.id  WHERE t.titulo = '{$titulotema}' ORDER BY n.fecha DESC";
            
    $result = $db->query($sql);

    if ($result) {
        echo "<div class='position-relative' style='display: flex; flex-wrap: wrap; justify-content: flex-start;margin-top:35px;margin-bottom:5px;'>";
        $firstNews = true; // Variable para rastrear la primera noticia
        $suma=1;
        while ($row = $db->fetch($result)) {
            // Aplicar estilos diferentes al primer div
            $divWidth = $firstNews ? '66.666%' : '33.333%';
            $imageWidth = $firstNews ? '62%' : '70%';

            $bordeNews = ($suma % 3==0||$suma == 1) ? '' : 'border-start';
            echo "<div class='d-inline-block border-bottom $bordeNews' style='width: $divWidth;padding:20px'>";
            echo "  <h1 style='font-size:1.49em;font-family:Newsreader;font-weight: 700'><a href='vernoticia.php?idn={$row['id']}'><div class='select-news'>{$row['titulo']}</div></a></h1>";
            echo "  <a href='vernoticia.php?idn={$row['id']}'><img src='{$row['url-imagen']}' style='width: $imageWidth;'></a>";
            echo "  <div style='font-family:Fira Sans;font-weight:400;font-size:0.9em;padding-top:5px'><a href='vernoticia.php?idn={$row['id']}'>{$row['txt-intro']}</a></div>";
            echo "</div>";

            $firstNews = false; // Desactivar la variable después de la primera noticia
            $suma++;
        }
        echo "</div>";
    } else {
        echo "
        <div class='alert alert-warning mx-auto mt-2 p-2' style='width: 750px;' role='alert'>
            No hay noticias
        </div>";
    }
} else{
    echo "
    <div class='alert alert-warning mx-auto mt-2 p-2' style='width: 750px;' role='alert'>
        No hay noticias
    </div>";
}

$db->close();

include('foot.php');
?>
