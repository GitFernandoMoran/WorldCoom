
<?php
include('head.php');
require("db_modelo.php");

$db = new Database("localhost", "webnews", "1ojNEpP0LgRFeef2", "noticias");
//left join
$sql = "SELECT notas.id, titulo, txt_intro, fecha, url as imagen FROM notas INNER join imagenes ON notas.id_imagen=imagenes.id ORDER BY fecha DESC";

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
        echo "  <a href='vernoticia.php?idn={$row['id']}'><img src='{$row['imagen']}' style='width: $imageWidth;'></a>";
        echo "  <div style='font-family:Fira Sans;font-weight:400;font-size:0.9em;padding-top:5px'><a href='vernoticia.php?idn={$row['id']}'>{$row['txt_intro']}</a></div>";
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

$db->close();

include('foot.php');
?>
