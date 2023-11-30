<script>
function Confirma ()
{
    if (confirm("¿Estas seguro que deseas borrar la noticia?")){
        return true
    }else{
        return false
    }
}
</script>
<?php
session_start ();
//verificar que exista la sesion
include ("validacion.php");

require ("db_modelo.php");
//Conexion con la base de datos
$db = new Database("localhost", "webnews", "1ojNEpP0LgRFeef2", "noticias");
if (isset($_GET['idborra']))
{
    //Al borrar
    $idborr=intval($_GET['idborra']);
    $sql="DELETE FROM notas WHERE id={$idborr}";
    $db->query($sql);
    
}

//Armado de la sentencia SQL
$sql = "SELECT notas.id, titulo, txt_intro, fecha, url as imagen FROM notas INNER join imagenes ON notas.id_imagen=imagenes.id ORDER BY fecha DESC";

$result = $db->query($sql);

include("head_sec.php");
echo "  <p class='mx-auto' style='width: 600px;text-align:center;font-family:Newsreader;font-size:50px;font-weight:600'>Noticias</p>";
echo "<div class='position-absolute start-0 rounded-pill return-new ' style='margin-top:160px;margin-left:20px;padding:5px;font-family:Libre Franklin'><a href='../noticias/admin.php'><div class='themes-news'><span class='oi oi-arrow-thick-left' style='margin-right:10px;'></span>Regresar </div></a></div>";
echo "<div class='position-relative mx-auto' style='width:80%;display: flex; flex-wrap: wrap; justify-content: flex-start;margin-bottom:5px;'>";
if ($result)
{
    $suma=0;
    while ($row = $db->fetch($result))
    {
        $bordeNews = ($suma % 3==0||$suma == 0) ? '' : 'border-start';

        echo "<div class='d-inline-block position-relative border-bottom $bordeNews' style='width: 33.33%;padding:20px'>";
        echo "  <h1 style='font-size:1.49em;font-family:Newsreader;font-weight: 700'><div>{$row['titulo']}</div></h1>";
        echo "  <img src='{$row['imagen']}' style='width: 70%;'>";
        echo "  <div style='margin-bottom:25px;font-family:Fira Sans;font-weight:400;font-size:0.9em;padding-top:5px'>{$row['txt_intro']}</div>";
        echo "  <a href='?idborra={$row['id']}' onclick='return Confirma()'>
                    <div class='position-absolute bottom-0 w-100' style='border-radius:5px;height:40px;margin-left:-20px;background-color:black;text-align: center'>
                        <span class='oi oi-trash delete-journalist' style='padding:5px;font-size:25px;color:white'></span>
                    </div>
                </a>";
        echo "</div>";
        $suma++;
    }
}
echo "</div>";
include("foot_sec.php");

?>
