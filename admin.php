<?php
session_start ();
//verificar que exista la sesion
include ("validacion.php");

include("head_sec.php");

echo "<div class='position-absolute start-0 rounded-pill return-new ' style='margin-top:160px;margin-left:20px;padding:5px;font-family:Libre Franklin'><a href='../noticias'><div class='themes-news'><span class='oi oi-arrow-thick-left' style='margin-right:10px;'></span>Regresar </div></a></div>";
echo "<div class='mx-auto' style='width:700px'>"; 
echo "  <h1 style='margin-bottom:30px;idth: 600px;text-align:center;font-family:Newsreader;font-size:45px;font-weight:600'>Menu admin</h1>";
echo "  <div class='position-relative' style='background-color:black;border-radius:8px;height:70px;color:white;font-family:Newsreader;border:1px solid black;margin-bottom:30px;padding:10px'>
            <span class='oi oi-person d-inline position-absolute' style='font-size:35px;padding-top:15px'></span>
            <div class='d-inline' style='margin-bottom:10px;margin-right:10px;margin-left:240px;font-size:35px;'>Reportero</div> 
            <div class='d-inline position-absolute' style='font-size:36px;margin-left:120px;padding-top:5px'>
                <a href='altareporteros.php'>
                    <span class='oi oi-plus add-sign' style='color:white;margin-right:50px'></span>
                </a>
                <a href='bajareporteros.php' class='position-absolute'>
                    <span class='oi oi-minus delete-sign' style='color:white'></span>  
                </a>
            </div>
        </div>";
echo "  <div class='position-relative' style='background-color:black;border-radius:8px;height:70px;color:white;font-family:Newsreader;border:1px solid black;margin-bottom:30px;padding:10px'>
            <span class='oi oi-copywriting d-inline position-absolute' style='font-size:35px;padding-top:15px'></span>
            <div class='d-inline' style='margin-bottom:10px;margin-right:43px;margin-left:240px;font-size:35px;'>Noticias</div> 
            <div class='d-inline position-absolute' style='font-size:36px;margin-left:120px;padding-top:5px'>
                <a href='altanoticias.php' >
                    <span class='oi oi-plus add-sign' style='color:white;margin-right:50px'></span>
                </a>
                <a href='bajanoticias.php' class='position-absolute'>
                    <span class='oi oi-minus delete-sign' style='color:white'></span>  
                </a>
            </div>
        </div>";
echo "  <div class='position-relative' style='background-color:black;border-radius:8px;height:70px;color:white;font-family:Newsreader;border:1px solid black;margin-bottom:30px;padding:10px'>
            <span class='oi oi-image d-inline position-absolute' style='font-size:35px;padding-top:15px'></span>
            <div class='d-inline' style='margin-bottom:10px;margin-right:28px;margin-left:240px;font-size:35px;'>Imagenes</div> 
            <div class='d-inline position-absolute' style='font-size:36px;margin-left:120px;padding-top:5px'>
                <a href='altaimagenes.php' >
                    <span class='oi oi-plus add-sign' style='color:white;margin-right:50px'></span>
                </a>
                <a href='bajaimagenes.php' class='position-absolute'>
                    <span class='oi oi-minus delete-sign' style='color:white'></span>  
                </a>
            </div>
        </div>";
echo "  <div class='position-relative' style='background-color:black;border-radius:8px;height:70px;color:white;font-family:Newsreader;border:1px solid black;margin-bottom:30px;padding:10px'>
            <span class='oi oi-list-rich d-inline position-absolute' style='font-size:35px;padding-top:15px'></span>
            <div class='d-inline' style='margin-bottom:10px;margin-right:18px;margin-left:240px;font-size:35px;'>Contextos</div> 
            <div class='d-inline position-absolute' style='font-size:36px;margin-left:120px;padding-top:5px'>
                <a href='altacontextos.php' >
                    <span class='oi oi-plus add-sign' style='color:white;margin-right:50px'></span>
                </a>
                <a href='bajacontextos.php' class='position-absolute'>
                    <span class='oi oi-minus delete-sign' style='color:white'></span>  
                </a>
            </div>
        </div>";
echo "  <div class='position-relative' style='background-color:black;border-radius:8px;height:70px;color:white;font-family:Newsreader;border:1px solid black;margin-bottom:30px;padding:10px'>
            <span class='oi oi-book d-inline position-absolute' style='font-size:35px;padding-top:15px'></span>
            <div class='d-inline' style='margin-bottom:10px;margin-right:79px;margin-left:240px;font-size:35px;'>Temas</div> 
            <div class='d-inline position-absolute' style='font-size:36px;margin-left:120px;padding-top:5px'>
                <a href='altatemas.php' >
                    <span class='oi oi-plus add-sign' style='color:white;margin-right:50px'></span>
                </a>
                <a href='bajatemas.php' class='position-absolute'>
                    <span class='oi oi-minus delete-sign' style='color:white'></span>  
                </a>
            </div>
        </div>";
echo "</div>"; 

include("foot_sec.php");
?>