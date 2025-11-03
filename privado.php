
<?php

session_start();//inicia sesion

require_once "conexion.php";//conectamos con la base de datos

//Verificacion para ver si el usuario ya inicio sesion
//isset sirve para verificar si una variable esta definida o no
if (!isset($_SESSION["usuario_id"])) {
    header("Location: inicio_sesion.php");
    exit;
}

//traemos las variables de la sesion iniciada
$nombre_usuario = $_SESSION["usuario_nombre"];
$correo_usuario = $_SESSION["usuario_correo"];
$contrasena_usuario = $_SESSION["usuario_contrasena"];

$consulta = $conn->query(//Generamos consulta
    "SELECT ID, Nombre, correo, contrasena_hash
     FROM usuario
     ORDER BY ID DESC"
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona privada</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>

<div class="encabezado">
<h1>Zona privada</h1>
</div>
<p>Bienvenid@, <strong><?= htmlspecialchars($correo_usuario) ?></strong>
   (<?= htmlspecialchars($contrasena_usuario) ?>)</p><!--Mostramos el correo y la contraseña del usuario-->
   <p>Este es un espacio creado para el administrador de este sitio web</p>


<p class="nav">
  <a href="registrar.php">Crear usuario</a>
  <a href="index.php">Inicio</a>
  <a href="salir.php">Cerrar sesión</a>
</p>
<hr class="hr">

   
<h2>Usuarios registrados</h2>

<?php 

if ($consulta && $consulta->num_rows > 0): ?> <!--Condición que ve si la consulta si funciono y trajo al menos una fila-->

  <table border="1" cellpadding="6" class = "tabla">
    <tr><!--Crea una fila en la tabla-->
      <!--Columnas-->
      <th>ID</th>
      <th>Nombre</th>
      <th>Correo</th>
      <th>Contraseña (hash)</th>
    </tr>
    
    <?php while ($fila = $consulta->fetch_assoc()): ?>
      <tr><!--Otra fila en la tabla-->
        <td><?= (int)$fila["ID"] ?></td><!--Muestra el ID del usuario-->
        <td><?= htmlspecialchars($fila["Nombre"]) ?></td>
        <td><?= htmlspecialchars($fila["correo"]) ?></td>
        <td><?= htmlspecialchars($fila["contrasena_hash"]) ?></td>
        <td>
          <a href="editar.php?id=<?= (int)$fila['ID'] ?>">Editar</a> 
          <a href="eliminar.php?id=<?= (int)$fila['ID'] ?>"
             onclick="return confirm('¿Seguro de eliminar?');">Eliminar</a>
        </td>
      </tr>
    <?php endwhile; ?><!--Termina el php del ciclo while-->
  </table>
<?php else: ?><!--Sirve por si no hay usuarios registrados-->
  <p>No hay usuarios registrados.</p>
<?php endif; ?><!--Termina el php del if-->

</body>

</html>