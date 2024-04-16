<?php
// Incluir el archivo de conexión y funciones de base de datos
// include 'bbdd.php';

// // Mensaje de respuesta del servidor
// $mensaje = '';

// // Verificar si se ha enviado el formulario por método POST
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Obtener los datos del formulario
//     $nombreCompleto = $_POST['nombrecompleto'];
//     $apellido = $_POST['apellido'];
//     $usuario = $_POST['user'];
//     $contraseña = $_POST['password'];
//     $repetirContraseña = $_POST['repassword'];

//     // Validar las contraseñas
//     if ($contraseña !== $repetirContraseña) {
//         $mensaje = "Las contraseñas no coinciden. Por favor, inténtalo de nuevo.";
//     } elDocument ($resultado) {
//             $mensaje = "Usuario registrado correctamente.";
//         } else {
//             $mensaje = "Error al registrar el usuario. Por favor, inténtalo de nuevo.";
//         }
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" type="text/css" href="css/comun.css" />
    <link rel="stylesheet" type="text/css" href="css/regi.css" />

</head>

<?php
include_once 'menu.php';
?>
<body>
    <div class="container">
        <div class="form">
        <form id="registroForm" method="post" action="servicio.php">
            <h2>Registro de Usuario</h2>
            <div class="grupo">
                <label for="nombrecompleto" >Nombre</label>
                <input type="text" id="nombrecompleto" name="nombrecompleto" required>

            </div>
            <div class="grupo">
                <label for="apellido" >Apellidos</label>
                <input type="text" id="apellido" name="apellido" required>

            </div>
            <div class="grupo">
                <label for="user" >Usuario</label>
                <input type="text" id="user" name="user" required>

            </div>
            <div class="grupo">
                <label for="password" >Contraseña</label>
                <input type="password" id="password" name="password" required>

            </div>
            <div class="grupo">
                <label for="repassword" >Repetir Contraseña</label>
                <input type="password" id="repassword" name="repassword" required>

            </div>
            <div class="form-group">
                <button type="submit">Registrarse</button>
            </div>
            <div id="mensaje"><?php echo $mensaje;?></div>

        </form>
        </div>
    </div>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/registro.js"></script>
    
</body>
</html>