<?php
include 'bbdd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_noticia = $_POST['id_noticia'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha_pub = $_POST['fecha'];
    $url = $_POST['link'];

    // Verificar si se subió una nueva imagen kerarandka 
    if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        // Se subió una nueva imagen
        $nombreImagen = subirImagen($_FILES['imagen']);
        // Concatenar la ruta base con el nombre de la imagen
        $rutaImagen = 'fotos/' . $nombreImagen;
    } else {
        // No se subió una nueva imagen, mantener la imagen existente
        // Obtener la ruta de la imagen existente de la base de datos
        $rutaImagen = obtenerRutaImagenExistente($id_noticia);
    }

    // Actualizar la noticia
    if (actualizarNoticia($id_noticia, $titulo, $descripcion, $rutaImagen, $fecha_pub, $url)) {
        header('Location: gestionar.php');
        exit();
    } else {
        echo "Error al actualizar la noticia.";
    }
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

function obtenerRutaImagenExistente($id_noticia)
{
    // Aquí llamas a la función que obtiene los detalles de la noticia
    // y extraes la ruta de la imagen del array de detalles
    $detallesNoticia = obtenerDetallesNoticia($id_noticia);
    return $detallesNoticia['imagen']; // Ajusta esto según la estructura de tus datos
}
?>
