
<?php
// Incluir el archivo de conexión y funciones de base de datos
include 'bbdd.php';

// Verificar si se ha enviado el formulario por método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombreCompleto = $_POST['nombrecompleto'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['user'];       
    $contraseña = $_POST['password'];
    $repetirContraseña = $_POST['repassword'];

    // Validar las contraseñas
    if ($contraseña !== $repetirContraseña) {
        echo "Las contraseñas no coinciden. Por favor, inténtalo de nuevo.";
        exit; // Terminar la ejecución del script
    }

    // Validar que el nombre de usuario no contenga mayúsculas
    if (preg_match('/[A-Z]/', $usuario)) {
        echo "El nombre de usuario no puede contener letras mayúsculas.";
        exit; // Terminar la ejecución del script
    }

    // Verificar si el usuario ya existe en la base de datos
    if (existeUsuario($usuario)) {
        echo "El nombre de usuario ya está en uso. Por favor, elige otro.";
        exit; // Terminar la ejecución del script
    }

    // Insertar el nuevo usuario en la base de datos
    $resultado = insertarUsuario($usuario, $contraseña, $nombreCompleto, $apellido);

    if ($resultado) {
        echo "Usuario registrado correctamente.";
    } else {
        echo "Error al registrar el usuario. Por favor, inténtalo de nuevo.";
    }
}
?>
