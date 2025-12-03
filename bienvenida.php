<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
    <link rel="stylesheet" type="text/css" href="bienvenida.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>

<div class="botones">
   <p class="nav">
        <a href="registrar.php">Registrate</a>

  
        <!--estilo de los campos del formulario-->
        
<?php

require_once "conexion.php"; //Conectas a la base de datos

$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    if ($nombre === "" || $correo === "" || $contrasena === "") {
      $mensaje = "Completa todos los campos.";
  } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {//Filtro para validar el email, estructura: filter_var(valor, filtro) 
      $mensaje = "El correo no es válido.";
  } else {

    $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT); // Cambias la visualizacion de la contraseña del usuario en la tabla
    
    $sql = "INSERT INTO usuario (Nombre, correo, contrasena_hash) VALUES (?, ?, ?)"; // Creas una consulta 
    

    $prepare = $conn->prepare($sql); // Preparamos la consulta

    if ($prepare === false) {
        die("Error al preparar la sentencia: " . $conn->error);//Por si falla la consulta
    }

    // conectamos los valores que pone el usuario con los de la base de datos
    $prepare->bind_param("sss", $nombre, $correo, $contrasena); 

    
// mandas un mensaje si si se registro
if ($prepare->execute()) {
    echo "<h2>Se registro correctamente</h2>";
} else {
    echo "Error al intentar registrarse" . $stmt->error;
}
}
   }   ?>

  <div class="contenedor">
    <div class="tarjeta">
      <div class="encabezado">
        <h1>Registro de usuario</h1>
      </div>

      <p class="sub">Crea una cuenta para acceder al sitio.</p>

      <!-- Mensaje -->
      <?php if ($mensaje !== ""): ?>
        <p class="mensaje.ok"><?= htmlspecialchars($mensaje) ?></p>
      <?php endif; ?>

      <!-- Formulario -->
      <form method="post" action="registrar.php" novalidate>
        <div class="campo"><!--estilo de los campos del formulario-->
          <label for="nombre">Nombre</label>
          <input id="nombre" name="nombre" type="text" required maxlength="100" autocomplete="name">
        </div>

        <div class="campo">
          <label for="correo">Correo</label>
          <input id="correo" name="correo" type="email" required maxlength="120" autocomplete="email">
        </div>

        <div class="campo">
          <label for="contrasena">Contraseña</label>
          <input id="contrasena" name="contrasena" type="password" required minlength="6" autocomplete="new-password">
        </div>

        <div class="barra-acciones">
          <button class="boton" type="submit">Crear cuenta</button>
        </div>
      </form>

      <hr class="hr">

      <!--Partes para que el usuario pueda navegar-->
      <p class="nav">
        <a href="inicio_sesion.php">Iniciar sesión</a>
        <a href="bienvenida.php">Regresar</a>
        <a href="index.php">Inicio</a>
      </p>
    </div><!--fin del div de la clase tarjeta-->
  </div>


        <a href="inicio_sesion.php">Inicia sesión</a>
      </p>
   </div>

   <div>
      <header id="encabezado">
         <h2>¡Hola!</h2>

      </header>
   </div>

   <div id="aparecer"> <!-- Contenedor de todo el texto que va a ir apareciendo-->

   <div>
      <h2 class="subtemas">¿Por qué llevar un diario emocional?</h2>
      <p class="palabra"> Llevar un diario emocional es una práctica poderosa que puede ayudarte a comprender <br>y gestionar tus emociones de manera más efectiva.</p>

      <div id="cuadros">
             <div id="uno">
                  <img src="iconos.bienvenida/cuadro1.svg" class="iconos">
                  <h3 class="razones">Autoconocimiento</h3>
                  <p class="rtexto">Conocer tus emociones te permite  identificar patrones en tu comportamiento a lo largo de tus dias, lo que facilita el autoconocimiento.</p>
             </div>

             <div id="dos">
                 <img src="iconos.bienvenida/cuadro2.svg" class="iconos">
                  <h3 class="razones">Reducción del Estrés</h3>
                  <p class="rtexto">Expresar tus sentimientos en un diario puede aliviar la tensión emocional y reducir el estrés, promoviendo una sensación de calma.</p>
             </div>

             <div id="tres">
                  <img src="iconos.bienvenida/cuadro3.svg" class="iconos">
                  <h3 class="razones">Mejora de la Salud Mental</h3>
                  <p class="rtexto">Numerosos estudios han demostrado que llevar un diario emocional mejorar la salud mental al proporcionar una salida para las emociones negativas.</p>
             </div>
      </div>
   </div>


    <div id="explicacion"><!-- Contenedor de explicacion del sitio -->
      <h2 class="exsubtema">¿Cómo funciona nuestra plataforma?</h2>
      <p class="palabra2">Nuestra plataforma está diseñada para ayudarte a llevar un diario emocional <br>de manera fácil y segura. Aquí te explicamos cómo funciona:</p>

      <div id="funcionamiento">
          <div id="paso1">
            
          <img src="iconos.bienvenida/paso1.svg" id="cir1">
                <a href="registrar.php" id="cir1_icono"><img src="iconos.bienvenida/registro.svg" ></a>
                    <h3 class="razones" id="raz1">Registrate</h3>

                    <img src="iconos.bienvenida/flecha.svg" id="flecha">
          </div>
          

          <div id="paso2">
             
              <img src="iconos.bienvenida/paso2.svg" id="cir2">
              <img src="iconos.bienvenida/seleccionar.svg" id="cir2_icono">
              <h3 class="razones">Selecciona una emoción <br> y escribe</h3>
             
              <img src="iconos.bienvenida/flecha.svg" id="flecha2">
          </div>


          <div id="paso3">
    
              <img src="iconos.bienvenida/paso3.svg" id="cir3">
              <img src="iconos.bienvenida/flor.svg" id="cir3_icono">
              <h3 class="razones">Reflexiona y Crece</h3>

          </div>
      </div>
   </div>
</body>
 <!--Enlazamos el javascript-->
 <script src="bienvenida.js"></script>
</html>