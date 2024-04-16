<?php
include 'bbdd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $link = $_POST['url'];

    $imagen = $_FILES['imagen'];
    $nombreImagen = subirImagen($imagen);

    insertarNoticia($titulo, $descripcion, $nombreImagen, $fecha, $link);

    header('Location: publicar.php');
    exit();
}
session_start();
if (!isset($_SESSION['nombre_usuario'])) {
    // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
    header("Location: login.php");
    exit; // Asegúrate de salir después de redirigir
}

function subirImagen($archivo)
{
    
    $directorioImagenes = '/var/www/LENGUAJE/fotos/';
    $nombreImagen = uniqid() . '_' . $archivo['name'];
    $rutaImagen = $directorioImagenes . $nombreImagen;
    move_uploaded_file($archivo['tmp_name'], $rutaImagen);

    return $rutaImagen;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Noticia</title>
    <link rel="stylesheet" type="text/css" href="css/publicar.css">
</head>
<body>
<div class="container">
        <h1>Agregar Noticia</h1>
        <form id="formulario" method="post" action="insertar.php" enctype="multipart/form-data">
            <div class="grupo">
                <label for="titulo">Título</label>
                <input type="text" id="titulo" name="titulo" placeholder="Escribe el título" required>
            </div>

            <div class="grupo">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" placeholder="Escribe la descripción" rows="4" required></textarea>
            </div>

            <div class="grupo">
                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" name="imagen" accept="image/*" required>
            </div>

            <div class="grupo">
                <label for="fecha">Fecha</label>
                <input type="date" id="fecha" name="fecha" required>
            </div>
            <div class="grupo">
                <label for="link">Link</label>
                <input type="text" id="link" name="link" required>
            </div>

            <div class="form-group">
                <button type="submit" id="agregar-noticia">Agregar Noticia</button>
            </div>
        </form>
    </div>
</body>
</html>
