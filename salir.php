<?php
session_start();//Iniciamos la sesión

$_SESSION = [];//Limpiamos todas las variables de sesión 
session_unset();//Eliminamos las variables de sesión
session_destroy();//Destruimos la sesión

header("Location: inicio_sesion.php");
exit;
?>