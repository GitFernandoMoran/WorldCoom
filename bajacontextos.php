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
    $sql="DELETE FROM contexto_noticia WHERE id={$idborr}";
    $db->query($sql);
    
}

//Armado de la sentencia SQL
$sql = "SELECT * FROM contexto_noticia";

$result = $db->query($sql);

include("head_sec.php");
echo"<div class='position-absolute start-0 rounded-pill return-new ' style='margin-top:160px;margin-left:20px;padding:5px;font-family:Libre Franklin'><a href='../noticias/admin.php'><div class='themes-news'><span class='oi oi-arrow-thick-left' style='margin-right:10px;'></span>Regresar </div></a></div>";
echo"   <div class='mx-auto mt-4' style='width:70%'>";
echo"       <p class='mx-auto' style='width: 600px;text-align:center;font-family:Newsreader;font-size:50px;font-weight:600'>Contextos</p>";
echo"       <div style='display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;'>";

if ($result)
{
    
    while ($row = $db->fetch($result))
    {
        echo "  <div class='noticia-container' style='display: flex; flex-direction: column;'>";
        echo "    <div class='border' style='margin-top: 10px; margin-bottom: 25px; border-radius: 4px; padding: 35px; box-shadow: 0px 1px 5px 0px grey; display: flex; flex-direction: column; height: 100%;'>";
        echo "      <div style='font-size: 35px; font-weight: 600; font-family: Newsreader; margin-bottom: 19px;'>{$row['titulo']}</div>";
        echo "      <div class='noticia-text' style='font-family: Fira Sans; font-size: 18px;'>{$row['texto']}</div>";
        echo "      <a href='?idborra={$row['id']}' style='text-align:center;padding:10px;border-radius:10px;height:50px;background-color:black;margin-top: auto;' onclick='return Confirma()'>
                        <div >
                            <span class='oi oi-trash delete-journalist' style='font-size:30px;color:white'></span>
                        </div>
                    </a>";
        echo "    </div>";
        echo "  </div>";
    }
}
echo"   </div>";
echo "</div>";
include("foot_sec.php");

?>
