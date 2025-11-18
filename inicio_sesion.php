<?php

session_start(); //Inicia la sesion
require_once "conexion.php";

$mensaje = "";//Variable sin valor para despues utilizarla

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $correo     = trim($_POST["correo"] ?? "");
  $contrasena = $_POST["contrasena"] ?? "";


  if ($correo === "" || $contrasena === "") {
    $mensaje = "Ingresa tu correo y tu contraseña.";
  } else { //Hace una consulta a la base de datos 
                $sql = "SELECT ID, Nombre, correo, contrasena_hash
                FROM usuario
                WHERE correo = ?"; 
                
                $sentencia = $conn->prepare($sql); // Prepara la sentencia y agrega seguridad


                      if ($sentencia) {
                      $sentencia->bind_param("s", $correo);//conectar el valor que puso el usuario con el de la base de datos
                      $sentencia->execute();
                      $resultado = $sentencia->get_result();//Los resultados de la consulta se guardan en esta variable
          

                          if ($resultado && $resultado->num_rows === 1) {
                            $usuario = $resultado->fetch_assoc(); 
                                 //fetch_assoc() obtiene una fila de resultados como un array asociativo para poder acceder a los datos
                              

                            if ($contrasena == $usuario["contrasena_hash"]) {//Verifica que la contraseña sea correcta
                              $_SESSION["usuario_id"]     = $usuario["ID"];//Guarda los datos del usuario en variables que podemos usar en los archivos
                              $_SESSION["usuario_nombre"] = $usuario["Nombre"];
                              $_SESSION["usuario_correo"] = $usuario["correo"];
                              $_SESSION["usuario_contrasena"] = $usuario["contrasena_hash"];
                              header("Location: privado.php");
                              //Session nos ayuda a crear una variable que dura mientras el navegador este abierto y es superglobal
                              exit;
                            } else {
                                  $mensaje = "Contraseña incorrecta.";
                              }
                            } else {
                              $mensaje = "No existe una cuenta con ese correo.";
                              }

                              $sentencia->close();//Cierra la sentencia
                            } else {
                            $mensaje = "Error al preparar la consulta: " . $conn->error;
                            }
                          } 
                        }

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar sesión</title>
  <link rel="stylesheet" href="estilos.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <div class="contenedor">
    <div class="tarjeta">
      <div class="encabezado">
        <h1>Iniciar sesión</h1>
      </div>
      <p class="sub">Accede con tu correo y contraseña.</p>

      <!-- Mensaje -->
      <?php if ($mensaje !== ""): ?>
        <p class="mensaje"><?= htmlspecialchars($mensaje) ?></p>
      <?php endif; ?>

      <!-- Formulario -->
      <form method="post" action="inicio_sesion.php" novalidate>
        <div class="campo">
          <label for="correo">Correo</label>
          <input id="correo" name="correo" type="email" required maxlength="120" autocomplete="email">
        </div>

        <div class="campo">
          <label for="contrasena">Contraseña</label>
          <input id="contrasena" name="contrasena" type="password" required minlength="6" autocomplete="current-password">
        </div>

        <div class="barra-acciones">
          <button class="boton" type="submit">Entrar</button>
          <a class="boton boton-sec" href="registrar.php">Crear cuenta</a>
        </div>
      </form>

      <hr class="hr">

      <!-- Navegación -->
      <p class="nav">
        <a href="registrar.php">Registrarse</a>
        <a href="inicio_sesion.php">Regresar</a>
        <a href="index.php">Inicio</a>
      </p>
    </div>
  </div>
</body>


<footer><!--Agregamos nuestro footer-->

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" id="ola"><path fill="#a2d9ff" fill-opacity="4" d="M0,64L40,80C80,96,160,128,240,128C320,128,400,96,480,112C560,128,640,192,720,197.3C800,203,880,149,960,112C1040,75,1120,53,1200,64C1280,75,1360,117,1400,138.7L1440,160L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>

  <div class="foot">
  <div id="seccion2"><!--Contenedor de las secciones del footer-->
    <div id="seccion1">
       <h2>El Faro Emocional</h2>
       <p>Creado para poder acompañarte día a día <br>y tener un registro de tus emociones</p>
    </div>
    

    <div id="seccion3">
      <div>
        <h3>Privacidad</h3>
        <div id="privacidad">
          <a href="privacidad" class="footer_links">Politica de Privacidad</a>
          <p><a href="privacidad" class="footer_links">Terminos de Seguridad</a></p>
        </div>
      </div>

      <div class="espacio">
        <h3 ><a href="inicio_sesion.php" class="footer_links">Sobre nosotras</a></h3>
      </div>

      <div class="espacio2">
        <h3>Nuestras redes</h3>
           <p>Instagram</p>
      </div>
        </div><!--Fin de la seccion3-->
    </div><!--Fin de la seccion2-->
  </div>
</footer>
</html>

