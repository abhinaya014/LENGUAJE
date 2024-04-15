<?php

require_once 'bbdd.php';

$id_noticia = $_GET['id'];

$detallesNoticia = obtenerDetallesNoticia($id_noticia);

if ($detallesNoticia) {
    $titulo = $detallesNoticia['titulo'];
    $imagen = $detallesNoticia['imagen'];
    $fecha_pub = $detallesNoticia['fecha_pub'];
    $descripcion = $detallesNoticia['descripcion'];
    $url = $detallesNoticia['url'];
} else {
    $titulo = "Noticia no encontrada";
    $imagen = "";
    $fecha_pub = "";
    $descripcion = "Lo sentimos, la noticia no se encuentra disponible.";
    $url = "#";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
    <link rel="stylesheet" type="text/css" href="css/noticia.css">
</head>
<body>
    <div class="container">
        <div class="noticia-detalle">
            <h1 id="titulo-noticia" ><?php echo $titulo; ?></h1>
            <img id="imagen-noticia" src="<?php echo $imagen; ?>" alt="imagen de la noticia">
            <p id="fecha-publicacion">Fecha de publicación: <?php echo $fecha_pub; ?></p>
            <p id="descripcion-noticia"><?php echo $descripcion; ?></p>
            <a id="leer-mas" href="<?php echo $url; ?>" target="_blank">LEER MÁS</a>
        </div>
    </div>
</body>
</html>
