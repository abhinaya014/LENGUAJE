<?php
// Verificar si se recibió una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener las credenciales ingresadas por el usuario
    $usuario = $_POST['user'];
    $contrasena = $_POST['password'];
    
    // Incluir el archivo de conexión a la base de datos
    include 'bbdd.php';
    
    // Realizar la validación del usuario y contraseña en la base de datos
    // Conectar a la base de datos (función definida en bbdd.php)
    $mysqli = connect_database();
    
    // Consulta SQL para verificar las credenciales del usuario
    $sql = "SELECT * FROM usuario WHERE user = ? AND password = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $usuario, $contrasena);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Verificar si se encontró un usuario con las credenciales proporcionadas
    if ($result->num_rows === 1) {
        // Iniciar sesión
        session_start();
        $_SESSION['nombre_usuario'] = $usuario;
        
        // Redirigir al usuario a index.php
        header("Location: index.php");
        exit;
    } else {
        // Si las credenciales no son válidas, mostrar un mensaje de error
        echo "Credenciales incorrectas. Por favor, inténtelo de nuevo.";
    }
    
    // Cerrar la conexión a la base de datos
    $stmt->close();
    $mysqli->close();
}
?>


<!-- Aquí puedes agregar el código HTML para el formulario de inicio de sesión -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abhinaya</title>
    <link rel="icon" type="image/png" href="/fotos/foto.png" />
    <link rel="stylesheet" type="text/css" href="css/comun.css" />
    <link rel="stylesheet" type="text/css" href="css/registro.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
</head>
<body>
    <div id="contain">
        
    <?php
    include 'menu.php';
    ?>
        <div class="form">
            <form id="formulario" method="post" class="login"
            action="login.php">
              <h2>Login</h2>
              <div class="grupo">
                <label for="user">Usuario</label  >
                <input type="text" id="user" name="user" 
                placeholder="="Escriba el usuario/>
              </div>
              <div class="grupo">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
              </div>
              <div class="form-group">
                <button type="submit" id="enviar">Login</button>
              </div>
            </form>
          </div>
     
        
      
        <div class="piecont">
            <div class="socialicon">
                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-twitter"></i></a>
                <a href=""><i class="fa-brands fa-youtube"></i></a>
            </div>
            <div class="pieboton">
                <p>copyright &copy;2024;  <span class="des">Abhinaya Dahal</span></p>
            </div>


          </div>
    </div>
</body>
</html>
