<?php
// Incluir el archivo de conexión y funciones de base de datos
include 'bbdd.php';

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombreCompleto = $_POST['nombrecompleto'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['user'];
    $contraseña = $_POST['password'];
    $repetirContraseña = $_POST['repassword'];

    // Validar los datos del formulario
    if ($contraseña !== $repetirContraseña) {
        echo "Las contraseñas no coinciden. Por favor, inténtelo de nuevo.";
    } else {
        // Insertar el nuevo usuario en la base de datos
        insertarUsuario($usuario, $contraseña, $nombreCompleto, $apellido);
        echo "Usuario registrado correctamente.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="icon" type="image/png" href="/fotos/foto.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="css/comun.css" />
    <link rel="stylesheet" type="text/css" href="css/regi.css" />
</head>
<body>



<div class="container">
<nav class="menu">
            <!-- <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="checkbtn">☰</i>
            </label> -->
            <label class="logo"><a href="index.html"><img class="logoo" src="fotos/badlogo.png" alt="Logo de pájaro de twitter" /></a></label>
            <ul class="menul">
                <li><a class="active" href="index.php">Inicio</a></li>
                <li>
                    <a href="gira.html">Gira</a>
                    <ul class="gira">
                        <li><a href="giracom.html">GIRA COMPLETA</a></li>
                        <li><a href="galeria.html">GALERIA</a></li>
                        <li><a href="compras.html">COMPRAS</a></li>
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
                <li><a href="login.php">LOGIN</a></li>
                <li><a href="registro.php">Registro</a></li>
            </ul>
        </nav>
       
    
    <div class="form">
    <form method="post" action="registro.php" class="registro">
   
      <h2>Registro de Usuario</h2>
        <div class="grupo">
            <label for="nombrecompleto">Nombre</label>
            <input type="text" id="nombrecompleto" name="nombrecompleto" required>
        </div>
        <div class="grupo">
            <label for="apellido">Apellidos</label>
            <input type="text" id="apellido" name="apellido" required>
        </div>
        <div class="grupo">
            <label for="user">Usuario</label>
            <input type="text" id="user" name="user" required>
        </div>
        <div class="grupo">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="grupo">
            <label for="repassword">Repetir Contraseña</label>
            <input type="password" id="repassword" name="repassword" required>
        </div>
        <div class="form-group">
            <button type="submit">Registrarse</button>
        </div>
    </form>
    </div>
</div>

</body>
</html>
