<?php

date_default_timezone_set('America/Argentina/Buenos_Aires');


function obtener_palabras($conexion) {
    $fecha_actual = date("Y-m-d");

    $sentenciaCate = $conexion->prepare("SELECT * FROM palabras WHERE fecha_repaso <= ?");
    $sentenciaCate->bind_param("s", $fecha_actual);
    $sentenciaCate->execute();
    $resultado = $sentenciaCate->get_result();

    $palabras = array();
    while ($fila = $resultado->fetch_assoc()) {
        $palabras[] = $fila;
    }

    return $palabras;
}




function obtener_palabra($conexion,$id) {
    $sentenciaCate = $conexion->prepare("SELECT * FROM palabras WHERE id = $id");
    $sentenciaCate->execute();
    $resultado = $sentenciaCate->get_result();

   $palabra = array();
    while ($fila = $resultado->fetch_assoc()) {
        $palabra[] = $fila;
    }

    return $palabra;
}

function eliminar_palabra($conexion, $id){
    $consulta = "DELETE FROM palabras WHERE id = $id";
    $resultado = mysqli_query($conexion, $consulta);

    return $resultado;
}

function eliminar_categoria($conexion, $id){
    $consulta = "DELETE FROM categorias WHERE id = $id";
    $resultado = mysqli_query($conexion, $consulta);
    
    return $resultado;
}

function eliminar_palabra_estudiada($conexion, $id_palabra, $id_usuario) {
    $consulta = "DELETE FROM palabras_estudiadas WHERE id_palabra = $id_palabra AND id_usuario = $id_usuario";
    $resultado = mysqli_query($conexion, $consulta);

    return $resultado;
}


function modificarFechaRepaso($conexion, $id_usuario, $id_palabra, $dias) {
    // Obtener la fecha actual
    $fecha_actual = date("Y-m-d");

    // Sumar los días recibidos por GET a la fecha actual
    $nueva_fecha_repaso = date('Y-m-d', strtotime($fecha_actual . ' + ' . $dias . ' days'));

    // Actualizar la fecha de repaso en la tabla palabras_estudiadas
    $sentenciaUpdate = $conexion->prepare("UPDATE palabras_estudiadas SET fecha_estudio = ? WHERE id_usuario = ? AND id_palabra = ?");
    $sentenciaUpdate->bind_param("sii", $nueva_fecha_repaso, $id_usuario, $id_palabra);
    $sentenciaUpdate->execute();

    // Verificar si la actualización fue exitosa
    if ($sentenciaUpdate->affected_rows > 0) {
        return true; // Se actualizó correctamente
    } else {
        return false; // No se pudo actualizar
    }
}



function obtener_categoria($conexion) {
    $sentenciaCate = $conexion->prepare("SELECT * FROM categorias");
    $sentenciaCate->execute();
    $resultado = $sentenciaCate->get_result();

   $categorias = array();
    while ($fila = $resultado->fetch_assoc()) {
        $categorias[] = $fila;
    }

    return $categorias;
}

function obtener_una_categoria($conexion, $id_categoria) {
    $sentenciaCate = $conexion->prepare("SELECT * FROM categorias WHERE id = ?");
    $sentenciaCate->bind_param("i",$id_categoria);
    $sentenciaCate->execute();
    $resultado = $sentenciaCate->get_result();

   $categorias = array();
    while ($fila = $resultado->fetch_assoc()) {
        $categorias[] = $fila;
    }

    return $categorias;
}


function obtener_palabras_por_categoria($conexion, $id_categoria) {
    $sentencia = $conexion->prepare("SELECT * FROM palabras WHERE id_categoria = ?");
    $sentencia->bind_param("i", $id_categoria);
    $sentencia->execute();
    $resultado = $sentencia->get_result();

    $palab = array();
    while ($fila = $resultado->fetch_assoc()) {
        $palab[] = $fila;
    }
   
    return $palab;
}

function obtener_usuario($conexion, $id) {
    $sentenciaUsuario = $conexion->prepare("SELECT * FROM usuarios WHERE id = ?");
    $sentenciaUsuario->bind_param("i",$id);
    $sentenciaUsuario->execute();
    $resultado = $sentenciaUsuario->get_result();

   $usuario = array();
    while ($fila = $resultado->fetch_assoc()) {
        $usuario[] = $fila;
    }

    return $usuario;
}

function comprobarSession(){
    if(!isset($_SESSION['admin'])){
        header('Location: '. RUTAS. '?status=noadmin');
    }
}

function comprobarSessionAdmin(){
    if(!isset($_SESSION['admin'])){
        header('Location: '. RUTAS.'login.php?status=noadmin');
    }
}


function obtener_palabras_estudiadas_por_usuario($conexion, $id_usuario) {
    $sentenciaPalabrasEstudiadas = $conexion->prepare("
        SELECT p.id, p.espanol, p.ingles, p.imagen, p.fonetica
        FROM palabras_estudiadas pe
        JOIN palabras p ON pe.id_palabra = p.id
        WHERE pe.id_usuario = ? AND pe.fecha_estudio <= CURDATE()  AND pe.estado = 'estudiando'
    ");
    $sentenciaPalabrasEstudiadas->bind_param("i", $id_usuario);
    $sentenciaPalabrasEstudiadas->execute();
    $resultado = $sentenciaPalabrasEstudiadas->get_result();

    $palabras_estudiadas = array();
    while ($fila = $resultado->fetch_assoc()) {
        $palabras_estudiadas[] = $fila;
    }

    return $palabras_estudiadas;
}

function obtener_id_usuario_por_nombre($conexion, $nombreUsuario) {
    $sentenciaUsuario = $conexion->prepare("SELECT id FROM usuarios WHERE usuario = ?");
    $sentenciaUsuario->bind_param("s", $nombreUsuario);
    $sentenciaUsuario->execute();
    $resultado = $sentenciaUsuario->get_result();

    if ($fila = $resultado->fetch_assoc()) {
        return $fila['id'];
    } else {
        return null;
    }
}

function obtener_palabras1($conexion) {
    $sentenciaCate = $conexion->prepare("SELECT * FROM palabras");
    $sentenciaCate->execute();
    $resultado = $sentenciaCate->get_result();

   $palabras = array();
    while ($fila = $resultado->fetch_assoc()) {
        $palabras[] = $fila;
    }

    return $palabras;
}


function ingresar_usuario($conexion, $usuario, $pass, $repetirPass) {
    
    if ($pass != $repetirPass) {
       $mensaje = "las contraseñas no coinciden";
        header("Location: registrate.php?mensaje=" . urlencode($mensaje));
        exit;
        
    }
    
    // Verificar si el nombre de usuario ya existe
    $consulta = $conexion->prepare("SELECT id FROM usuarios WHERE usuario = ?");
    $consulta->bind_param("s", $usuario);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if ($resultado->num_rows > 0) {
        $mensaje = "El nombre de usuario ya existe por favor elija otro !";
        header("Location: registrate.php?mensaje=" . urlencode($mensaje));
        exit;
        
    } else {
        // Insertar el nuevo usuario
        $rol = "user";
        $consulta = $conexion->prepare("INSERT INTO usuarios (usuario, pass, rol) VALUES (?, ?, ?)");
        $consulta->bind_param("sss", $usuario, $pass, $rol);
        
        if ($consulta->execute()) {
            $mensaje = "Usuario ". $usuario ;
            
            
             $mensaje = "Su registro fue exitoso!! Puede iniciar Session.";
          $_SESSION['mensajes'] = $mensaje;
          header("Location: registrate.php");
          exit;
            
       // header("Location:login.php?accion=" . urlencode($mensaje));
        exit;
            
        } else {
            $mensaje = "Error al ingresar el usuario";
        header("Location: registrate.php?mensaje=" . urlencode($mensaje));
        exit;
        
        }
    }
}



function insertarPalabraEstudiada($conexion, $id_usuario, $id_palabra) {
    // Verificar si la palabra ya ha sido estudiada por el usuario
    $consultaExistencia = "SELECT COUNT(*) FROM palabras_estudiadas WHERE id_usuario = $id_usuario AND id_palabra = $id_palabra";
    $resultadoExistencia = mysqli_query($conexion, $consultaExistencia);
    
    if ($resultadoExistencia) {
        $existe = mysqli_fetch_row($resultadoExistencia)[0];
        
        if ($existe > 0) {
            // La palabra ya existe en la tabla para el usuario, no es necesario insertarla nuevamente
            return false;
        }
    }
    
    // Insertar la palabra estudiada para el usuario en la tabla
    $consultaInsertar = "INSERT INTO palabras_estudiadas (id_usuario, id_palabra, fecha_estudio, estado) VALUES ($id_usuario, $id_palabra, NOW(),'estudiando')";
    $resultadoInsertar = mysqli_query($conexion, $consultaInsertar);

    return $resultadoInsertar;
}


function cambiar_estado($conexion, $id_usuario, $id_palabra) {
    // Actualizar el estado en la tabla palabras_estudiadas
    $nuevo_estado = 'aprendida';
    $sentenciaUpdate = $conexion->prepare("UPDATE palabras_estudiadas SET estado = ? WHERE id_usuario = ? AND id_palabra = ?");
    $sentenciaUpdate->bind_param("sii", $nuevo_estado, $id_usuario, $id_palabra);
    $sentenciaUpdate->execute();

    // Verificar si la actualización fue exitosa
    if ($sentenciaUpdate->affected_rows > 0) {
        return true; // Se actualizó correctamente
    } else {
        return false; // No se pudo actualizar
    }
}



