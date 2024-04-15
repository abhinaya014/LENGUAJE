<?php
include 'bbdd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el ID de la noticia a editar desde el formulario
    $id_noticia = $_POST['id_noticia'];

    // Obtener los datos de la noticia de la base de datos
    $noticia = obtenerDetallesNoticia($id_noticia);

    // Verificar si se encontró la noticia
    if ($noticia) {
        // Mostrar el formulario de edición prellenado con los datos de la noticia
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Noticia</title>
            <link rel="stylesheet" type="text/css" href="css/editar.css">
        </head>
        <body>
        <div class="container">
            <h1>Editar Noticia</h1>
            <form id="formulario" method="post" action="actualizar.php" enctype="multipart/form-data">
                <!-- Campos del formulario prellenados con los datos de la noticia -->
                <input type="hidden" name="id_noticia" value="<?php echo $noticia['id_noticia']; ?>">
                <div class="grupo">
                    <label for="titulo">Título</label>
                    <input type="text" id="titulo" name="titulo" placeholder="Escribe el título" value="<?php echo $noticia['titulo']; ?>" required>
                </div>
                <div class="grupo">
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" placeholder="Escribe la descripción" rows="4" required><?php echo $noticia['descripcion']; ?></textarea>
        </div>
        <div class="grupo">
            <label for="imagen">Imagen</label>
            <!-- Mostrar la imagen actual -->
            <img src="<?php echo $noticia['imagen']; ?>" alt="Imagen actual">
            <br>
            <input type="file" id="imagen" name="imagen" accept="image/*">
        </div>
        <div class="grupo">
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="fecha" value="<?php echo $noticia['fecha_pub']; ?>" required>
        </div>
        <div class="grupo">
            <label for="link">Link</label>
            <input type="text" id="link" name="link" value="<?php echo $noticia['url']; ?>" required>
        </div>
                <div class="form-group">
                    <button type="submit" id="editar-noticia">Actualizar Noticia</button>
                </div>
            </form>
        </div>
        </body>
        </html>
        <?php
    } else {
        // Mostrar un mensaje de error si no se encuentra la noticia
        echo "La noticia no existe o no se puede editar.";
    }
}
?>

