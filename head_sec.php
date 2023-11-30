<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WorldCoom</title>
    <link rel="icon" href="IMG/world.png">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Open iconic -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css">
    <!-- Font utilizados -->
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=nyt-cheltenham:wght@300;400;500;600;700&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@100;200;300;400;500;600;700;800;900&family=Libre+Franklin:wght@700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz,wght@6..72,300;6..72,500;6..72,600;6..72,700;6..72,800&display=swap" rel="stylesheet">
    <style>
        /* Hover para el boton de login*/
        .login-button:hover{
            background-color:#E6E6E9;
        }
        .select-news:hover{ /*hover para los titulos de las noticias en index*/
            color:#666666 ;
        }
        .themes-news:hover{ /*hover para los temas de las noticias en index*/
            border-bottom: 0.185em solid black;
        }
        a {
            color: black; /* Cambia el color del enlace a negro */
            text-decoration: none; /* Elimina la subrayado del enlace */
        }
        .return-new:hover{
            font-size:18px;
        }
        .imagen-edit {
            width: 30px; 
            height: 30px; 
            overflow: hidden; /* oculta cualquier parte de la imagen que exceda el tamaño del contenedor */
        }
        .contenedor-imagen {
            width: 100%;
            height: 100%;
            object-fit: cover; /* indica que la imagen debe cubrir el contenedor sin deformarse */
        }
        .add-sign:hover{
            color:green !important;
        }
        .delete-sign:hover{
            color:red !important;
        }
        .delete-journalist:hover{
            color:rgb(141, 0, 0) !important;
        }
        .periodistas-edit {
            width: 200px; 
            height: 200px; 
            overflow: hidden; /* oculta cualquier parte de la imagen que exceda el tamaño del contenedor */
        }
        .imagenes-edit {
            width: 100%; 
            height: 300px; 
            overflow: hidden; /* oculta cualquier parte de la imagen que exceda el tamaño del contenedor */
        }
    </style>
</head>

<body style="display:flex;flex-direction:column;min-height:100vh">
    <header style="height:160px">
        <p class="tiempo d-inline position-absolute end-0" style=";margin-top:55px;font-family:Libre Franklin;margin-right:40px"></p>
        <!-- Logo -->
        <div style="text-align: center">
        <div class="reloj position-absolute" style="margin-top:40px;margin-left:40px">
            <p class="fecha" style="text-align:left;font-family:Libre Franklin"></p>
        </div>
            <a href="index.php"><img style="margin-top:10px; width:300px" src="IMG/logo1,5.png" width=300px ></a>
        </div>
        <div class="border-bottom border border-black" style="margin-top:10px"></div>
        <div class="border-bottom border border-black" style="margin-top:2px"></div>
    </header>