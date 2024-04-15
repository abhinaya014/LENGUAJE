<?php
connect_database();
function connect_database()

{
   

    $mysqli = new mysqli("127.0.0.1", "admin", "Almi123", "abhinaya");
    if ($mysqli->connect_errno) {
        echo "Fallo en la conexión: " . $mysqli->connect_errno;
    }
    return $mysqli;
}
obtenerUltimasNoticias();
obtenerDetallesNoticia(1);
function obtenerUltimasNoticias()
{
    $mysqli = connect_database();
    $sql = "SELECT id_noticia, titulo, descripcion, imagen, fecha_pub, url FROM noticias ORDER BY fecha_pub DESC LIMIT 5";

    $result = $mysqli->query($sql);

    $noticiverificarCredencialesas = array();

    while ($row = $result->fetch_assoc()) {
        $noticias[] = $row;
    }

    $mysqli->close();
    return $noticias;
}
obtenerUltimasNoticia();
function obtenerUltimasNoticia()
{ 
    $mysqli = connect_database();
    $sql = "SELECT id_noticia, titulo, descripcion, imagen, fecha_pub, url FROM noticias ORDER BY fecha_pub DESC ";

    $result = $mysqli->query($sql);

    $noticiverificarCredencialesas = array();

    while ($row = $result->fetch_assoc()) {
        $noticias[] = $row;
    }

    $mysqli->close();
    return $noticias;
}

// function obtenerUltimasNoticias()
// {
//     $mysqli = connect_database();
//     $sql = "SELECT id_noticia, titulo, descripcion, imagen, fecha_pub, url FROM noticias ORDER BY id_noticia ASC LIMIT 5";

//     $result = $mysqli->query($sql);

//     $noticias = array();

//     while ($row = $result->fetch_assoc()) {
//         $noticias[] = $row;
//     }

//     $mysqli->close();
//     return $noticias;
// }



function obtenerDetallesNoticia($id_noticia)
{
    $mysqli = connect_database();


    $sql = "SELECT * FROM noticias WHERE id_noticia = ?";
    $sentencia = $mysqli->prepare($sql);

    if (!$sentencia) {
        echo "Fallo en la preparación de la sentencia: " . mysqli_error($mysqli);
    }

    $asignar = $sentencia->bind_param("i", $id_noticia);
    if (!$asignar) {
        echo "Fallo en la asignación de parámetros " . $mysqli->errno;
    }

    $ejecucion = $sentencia->execute();
    if (!$ejecucion) {
        echo "Fallo en la ejecución: " . $mysqli->errno;
    }

    $detallesNoticia = array();

    $id_noticia = -1;
    $titulo = "";
    $descripcion = "";
    $imagen = "";
    $fecha_pub = "";
    $url = "";

    $vincular = $sentencia->bind_result($id_noticia, $titulo, $descripcion, $imagen, $fecha_pub, $url);
    if (!$vincular) {
        echo "Fallo al vincular la sentencia: " . $mysqli->errno;
    }

    if ($sentencia->fetch()) {
        $detallesNoticia = array('id_noticia' => $id_noticia, 'titulo' => $titulo, 'descripcion' => $descripcion,
            'imagen' => $imagen, 'fecha_pub' => $fecha_pub, 'url' => $url);

        }
        
        
    $mysqli->close();
    return $detallesNoticia;
   
    }
    

//gestionarNoticias();

// function gestionarNoticias()
// {
   
   
//     $mysqli = connect_database();
//     $sql = "SELECT id_noticia, titulo, descripcion, imagen, fecha_pub, url FROM noticias ORDER BY fecha_pub DESC LIMIT 5";

//     $result = $mysqli->query($sql);

//     $noticiverificarCredencialesas = array();

//     while ($row = $result->fetch_assoc()) {
//         $noticias[] = $row;
//     }

//     $mysqli->close();
//     return $noticias;
// }
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);




function insertarNoticia($titulo, $descripcion, $imagen, $fecha_pub, $url)
{
    
    $mysqli = connect_database();

    $sql = "INSERT INTO noticias (titulo, descripcion, imagen, fecha_pub, url) VALUES (?, ?, ?, ?, ?)";
    $sentencia = $mysqli->prepare($sql);

    if (!$sentencia) {
        echo "Fallo en la preparación de la sentencia: " . $mysqli->error;
    }

    $asignar = $sentencia->bind_param("sssss", $titulo, $descripcion, $imagen, $fecha_pub, $url);
    if (!$asignar) {
        echo "Fallo en la asignación de parámetros: " . $mysqli->error;
    }

    $ejecucion = $sentencia->execute();
    if (!$ejecucion) {
        echo "Fallo en la ejecución: " . $mysqli->error;
    }

    $sentencia->close();
    $mysqli->close();
}


function eliminarNoticia($id_noticia) {
    $mysqli = connect_database();

    // Preparar y ejecutar la consulta SQL para eliminar la noticia por su ID
    $sql = "DELETE FROM noticias WHERE id_noticia = ?";
    $sentencia = $mysqli->prepare($sql);
    $sentencia->bind_param("i", $id_noticia);
    $sentencia->execute();

    // Cerrar la sentencia y la conexión
    $sentencia->close();
    $mysqli->close();
}

function actualizarNoticia($id_noticia, $titulo, $descripcion, $imagen, $fecha_pub, $url)
{
    $mysqli = connect_database();

    // Preparar la consulta SQL para actualizar la noticia
    $sql = "UPDATE noticias SET titulo = ?, descripcion = ?, imagen = ?, fecha_pub = ?, url = ? WHERE id_noticia = ?";
    $sentencia = $mysqli->prepare($sql);

    if (!$sentencia) {
        echo "Fallo en la preparación de la sentencia: " . $mysqli->error;
        return false;
    }

    // Vincular los parámetros a la consulta
    $bind_result = $sentencia->bind_param("sssssi", $titulo, $descripcion, $imagen, $fecha_pub, $url, $id_noticia);
    if (!$bind_result) {
        echo "Fallo en la asignación de parámetros: " . $mysqli->error;
        return false;
    }

    // Ejecutar la consulta
    $ejecucion = $sentencia->execute();
    if (!$ejecucion) {
        echo "Fallo en la ejecución de la consulta: " . $mysqli->error;
        return false;
    }

    // Cerrar la sentencia y la conexión
    $sentencia->close();
    $mysqli->close();

    return true; // La noticia se actualizó correctamente
}




// // Función para verificar las credenciales del usuario
// function verificarCredenciales($usuario, $contraseña)
// {
//     // Conectar a la base de datos
//     $mysqli = connect_database();

//     // Preparar la consulta SQL para buscar el usuario en la tabla de usuarios
//     $sql = "SELECT id_usuario FROM usuario WHERE user = ? AND password = ?";
//     $sentencia = $mysqli->prepare($sql);

//     // Vincular los parámetros a la consulta
//     $sentencia->bind_param("ss", $usuario, $contraseña);

//     // Ejecutar la consulta
//     $sentencia->execute();

//     // Vincular el resultado de la consulta
//     $sentencia->bind_result($id_usuario);

//     // Obtener el resultado de la consulta
//     $usuario_encontrado = $sentencia->fetch();

//     // Cerrar la sentencia y la conexión
//     $sentencia->close();
//     $mysqli->close();

//     // Devolver true si se encontró al usuario, de lo contrario false
//     return $usuario_encontrado;
// }



function insertarUsuario($user, $password, $nombre, $apellido1) {
    // Conectar a la base de datos
    $mysqli = connect_database();

    // Preparar la consulta SQL para insertar un nuevo usuario
    $sql = "INSERT INTO usuario (user, password, nombre, apellido1) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    // Vincular los parámetros y ejecutar la consulta
    $stmt->bind_param("ssss", $user, $password, $nombre, $apellido1);
    $result = $stmt->execute();

    // Verificar si la consulta fue exitosa
    if ($result) {
        echo "Usuario registrado correctamente.";
    } else {
        echo "Error al registrar usuario. Por favor, inténtelo de nuevo.";
    }

    // Cerrar la conexión y la declaración preparada
    $stmt->close();
    $mysqli->close();
}

function verificarCredenciales($user, $password) {
    // Conectar a la base de datos
    $mysqli = connect_database();

    // Preparar la consulta SQL para verificar las credenciales
    $sql = "SELECT id_usuario FROM usuario WHERE user = ? AND password = ?";
    $stmt = $mysqli->prepare($sql);

    // Vincular los parámetros y ejecutar la consulta
    $stmt->bind_param("ss", $user, $password);
    $stmt->execute();

    // Vincular el resultado de la consulta
    $stmt->bind_result($id_usuario);
    $usuario_encontrado = $stmt->fetch();

    // Cerrar la conexión y la declaración preparada
    $stmt->close();
    $mysqli->close();

    // Devolver true si se encontró el usuario, de lo contrario false
    return $usuario_encontrado;
}







    

?>
