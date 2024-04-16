<?php
include 'bbdd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion']) && $_POST['accion'] === 'eliminar' && isset($_POST['id_noticia'])) {
        eliminarNoticia($_POST['id_noticia']);
        header('Location: gestionar.php?eliminado=1'); // Redirige después de eliminar
        exit();
    }
}
session_start();
if (!isset($_SESSION['nombre_usuario'])) {
    // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
    header("Location: login.php");
    exit; // Asegúrate de salir después de redirigir
}

$noticias = obtenerUltimasNoticia();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GESTIONAR NOTICIA</title>
    <link rel="stylesheet" type="text/css" href="css/gestionar.css">
    <link rel="icon" type="image/png" href="/fotos/foto.png" />
    <link rel="stylesheet" type="text/css" href="css/comun.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>


<nav class="menu">
            <!-- <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="checkbtn">☰</i>
            </label> -->
            <label class="logo"><a href="index.htmlphp"><img class="logoo" src="fotos/badlogo.png" alt="Logo de pájaro de twitter" /></a></label>
            <ul class="menul">
                <li><a class="active" href="index.php">Inicio</a></li>
                <li>
                    <a href="gira.html">Gira</a>
                    <ul class="gira">
                        <li><a href="giracom.html">GIRA COMPLETA</a></li>
                        <li><a href="galeria.html">GALERIA</a></li>
                        <li><a href="compras.html">COMPRAS</a></li>
                        <span class="nombre-usuario"><?php echo htmlspecialchars($_GET['usuario']); ?></span>
                    </ul>

                </li>
                <li>
                    <a href="tienda.html">Tienda</a>
                    <ul class="gira">
                        <li><a href="merchan.html">Merchandising</a></li>
                        <li><a href="discos.html">Discos</a></li>
                        
                    </ul>

                </li>

                <li><a href="miembros.html">Miembros</a></li>
                <li><a href="disco.html">Discografía</a></li>
                <?php
     
        if (!isset($_SESSION['nombre_usuario'])) {
            echo '<li><a href="login.php">LOGIN</a></li>';
            echo '<li><a href="registro.php">Registro</a></li>';
        } else {
            echo '<li><a href="gestionar.php">Gestionar Noticias</a></li>';
      
        }

        ?>

                
            </ul>
            <div class="usuario-container">
        <?php
        
        if (isset($_SESSION['nombre_usuario'])) {
            $nombreUsuario = htmlspecialchars($_SESSION['nombre_usuario']);
            echo "<span class='nombre-usuario'>$nombreUsuario</span>";
            echo "<a href='logout.php' class='boton-salir'>Salir</a>";
        }
        ?>
    </div>

        </nav>

        <div class="buscar">
            <label for="buscar-titulo"><h2>Buscar por Titulo</h2></label>
            <input type="text" id="buscar-titulo" name="buscar-titulo" placeholder="Escriba el titulo...">
        </div>

   <div class="container">
        <h1>Gestionar Noticias</h1>
      
        <table id="noticias-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Fecha de Publicación</th>
                    <th>Borrar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($noticias as $noticia): ?>
                    <tr>
                        <td><?php echo $noticia['id_noticia']; ?></td>
                        <td><?php echo $noticia['titulo']; ?></td>
                        <td><?php echo $noticia['descripcion']; ?></td>
                        <td><?php echo $noticia['fecha_pub']; ?></td>
<td>
    <form method="post" action="eliminar.php" class="delete-form">
        <input type="hidden" name="id_noticia" value="<?php echo $noticia['id_noticia']; ?>">
        <button type="button" class="delete-button">❌</button>
</form>



                           
</td>
<td>
    <form action="editar.php" method="post">
        <input type="hidden" name="id_noticia" value="<?php echo $noticia['id_noticia']; ?>">
        <input type="hidden" name="accion" value="editar">
        <button type="submit">✏️</button>
    </form>
    <div class="diol">
    <p>¿Estás seguro de querer eliminar esta noticia?</p>
    <button class="confirm">Eliminar</button>
    <button class="cancel">Cancelar</button>
</div>
</td>
    
      
    <?php endforeach; ?>
            </tbody>
        </table>
        <div class="button-container">
        <a href="index.php" class="back-link">Volver a la página de inicio</a>
        <a href="publicar.php" class="add-news-link">Agregar Noticia</a>
    </div>
    </div>

  
 

    <script src="js/jquery-3.7.1.min.js"> </script>
    <script src="js/borrar.js"> </script>

</body>

</html>


