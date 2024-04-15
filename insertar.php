<?php
include 'bbdd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha_pub = $_POST['fecha'];
    $url = $_POST['link'];

    $imagen = $_FILES['imagen'];
    $nombreImagen = subirImagen($imagen);

    // Concatenar la ruta base con el nombre de la imagen
    $rutaImagen = 'fotos/' . $nombreImagen;

    insertarNoticia($titulo, $descripcion, $rutaImagen, $fecha_pub, $url);

    header('Location: gestionar.php');
    exit();
}

function subirImagen($archivo)
{
    $directorioImagenes = '/var/www/html/LENGUAJE/fotos/';
    $nombreImagen = uniqid() . '_' . $archivo['name'];
    $rutaImagen = $directorioImagenes . $nombreImagen;
    move_uploaded_file($archivo['tmp_name'], $rutaImagen);

    // Devolver solo el nombre de la imagen
    return $nombreImagen;
}
?>
