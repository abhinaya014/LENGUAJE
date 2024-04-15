<?php
include 'bbdd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_noticia'])) {
    $id_noticia = $_POST['id_noticia'];
    
    // Llamar a una función para eliminar la noticia por su ID
    eliminarNoticia($id_noticia);

    // Redirigir de vuelta a la página de gestión después de eliminar
    header('Location: gestionar.php');
    exit();
}
?>
