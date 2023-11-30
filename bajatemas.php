<script>
function Confirma ()
{
    if (confirm("¿Estas seguro que deseas borrar el registro?")){
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
    $sql="DELETE FROM temas WHERE id={$idborr}";
    $db->query($sql);
    
}

//Armado de la sentencia SQL
$sql = "SELECT * FROM temas";

$result = $db->query($sql);

include("head_sec.php");
echo"<div class='position-absolute start-0 rounded-pill return-new ' style='margin-top:160px;margin-left:20px;padding:5px;font-family:Libre Franklin'><a href='../noticias/admin.php'><div class='themes-news'><span class='oi oi-arrow-thick-left' style='margin-right:10px;'></span>Regresar </div></a></div>";
echo "<div class='mx-auto mt-4' style='width:70%'>";
echo "  <p class='mx-auto' style='width: 600px;text-align:center;font-family:Newsreader;font-size:50px;font-weight:600'>Temas</p>";

if ($result)
{
    
    while ($row = $db->fetch($result))
    {
        echo"<div class='d-inline-block me-5 mb-5' style='width:28%;border:2px solid black;border-radius:10px'>";
        echo"<div style='width:100%; top: 0;padding:8px;font-size:17px;font-family:Libre Franklin;text-align:center'>{$row['titulo']}</div>";
        echo"   <div class='select-news' style='background-color:black;'>";        
        echo"       <a href='?idborra={$row['id']}' onclick='return Confirma()'>
                        <div style='text-align:center;padding:10px'>
                            <span class='oi oi-trash delete-journalist' style='font-size:30px;color:white'></span>
                        </div>
                    </a>
                </div>";
        echo"</div>";
    }
}
echo "</div>";
include("foot_sec.php");

?>
