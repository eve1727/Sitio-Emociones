<?php
require_once "conexion.php";

//ESTA PRIMERA PARTE ES PARA SELECCIONAR EL ID DEL USUARIO QUE ELIGIMOS
//Validamos el id del usuario 
$id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;
if ($id <= 0) {
    die("ID inválido.");
}

//Generas una consulta
$sql_sel = "SELECT ID FROM usuario WHERE ID = ?";

//Preparas la consulta
$sentencia_sel = $conn->prepare($sql_sel);

//If para ver si la consulta fallo
if (!$sentencia_sel) { 
    die("Error al preparar la consulta: " . $conn->error); 
}else{
   //Conectas los valores de la base de datos a una variable local
   $sentencia_sel->bind_param("i", $id);
   $sentencia_sel->execute();//Se hace la consulta
   $resultado = $sentencia_sel->get_result();//obtenemos el resultado de la consulta
}
if (!$resultado || $resultado->num_rows !== 1) {//Verifica la consulta solo traiga una fila
    die("Usuario no encontrado.");
}

$sentencia_sel->close();//Cerramos la consulta


// ESTA SEGUNDA PARTE ES PARA ELIMINAR AL USUARIO DEL QUE RECUPERAMOS SU ID

$sql_del = "DELETE FROM usuario WHERE ID = ?";//Generamos consulta para eliminar al usuario que escogimos
$sentencia_del = $conn->prepare($sql_del);//Preparamos la consulta
if (!$sentencia_del){//Por si hay un error mostrarlo
        die("Error al preparar la eliminación: " . $conn->error); 
    }
$sentencia_del->bind_param("i", $id);//Conectamos el valor de base de datos con variable local

if ($sentencia_del->execute()) {//Si la consulta se realiza bien, se ejecuta y se manda al sitio privado
    $sentencia_del->close();
    header("Location: privado.php");
    exit;
} else {//Si falla se muestra un mensaje de error
    $sentencia_del->close();
    die("Error al eliminar: " . $conn->error);
}


?>