<?php
connect_database();
function connect_database()

{
   

    $mysqli = new mysqli("54.237.92.191", "admin", "Almi123", "abhinaya");
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
function insertarUsuario($usuario, $contraseña, $nombreCompleto, $apellido) {
   
    $mysqli = connect_database();


    // Preparar la consulta SQL para insertar el nuevo usuario
    $sql = "INSERT INTO usuario (user, password, nombre, apellido1) VALUES ('$usuario', '$contraseña', '$nombreCompleto', '$apellido')";

    // Ejecutar la consulta y verificar el resultado
    if ($mysqli->query($sql) === TRUE) {
        return true; // Éxito al insertar el usuario
    } else {
        return false; // Error al insertar el usuario
    }

    // Cerrar la conexión
    $mysqli->close();
}

// Función para verificar si un usuario ya existe en la base de datos
function existeUsuario($usuario) {
  
    $mysqli = connect_database();


   
    // Consulta SQL para verificar si el usuario ya existe
    $sql = "SELECT * FROM usuario WHERE user='$usuario'";
    $result = $mysqli->query($sql);

    // Comprobar si se encontraron filas (usuario existente)
    if ($result->num_rows > 0) {
        return true; // El usuario existe
    } else {
        return false; // El usuario no existe
    }

    // Cerrar la conexión
    $mysqli->close();

}







    

?>
