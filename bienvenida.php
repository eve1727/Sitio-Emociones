   <!--PHP del registro de usuario-->     
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


<div id="header_fondo"><!-- Contenedor del header y los botones-->

    <!--Para que el usuario pueda ir a las secciones de la bienvenida-->
    <h2 id="tu_espacio">Tu espacio seguro para <br>expresar tus emociones</h2>

    <div class="botones">
      

      <a href="#" id="abrirModal" class="abrir">Comienza gratis</a>

        <p class="nav">

        <div id="miModal" class="modal"><!-- Contenedor del modal que pone el fondo negro-->
            <div class="modal_contenido"><!-- Contenedor que tiene el contenido del modal-->

                 <span class="cerrar-modal">&times;</span><!-- Boton para cerrar el modal-->
              
                  <img src="tres.jpg" id="modal_imagen">

                       <div class="elementos_modal"><!-- Contenedor de los elementos del modal-->


                    <h1>Registro de usuario</h1>

                  <p>Crea una cuenta para acceder al sitio.</p>

                  <!-- Mensaje -->
                  <?php if ($mensaje !== ""): ?>
                    <p class="mensaje.ok"><?= htmlspecialchars($mensaje) ?></p>
                  <?php endif; ?>

                  <!-- Formulario -->
                  <form method="post">
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
                      <button class="boton2" type="submit">Crear cuenta</button>
                    </div>
                  </form>

                  <hr class="hr">

                  <!--Partes para que el usuario pueda navegar-->
                  <p class="nav1">
                    <a href="inicio_sesion.php">Iniciar sesión</a>
                    <a href="bienvenida.php">Regresar</a>
                    <a href="index.php">Inicio</a>
                  </p>

                  </div>
               </div>

              </div><!--Fin de la modal-->
    </div><!--Fin de botones-->
   
    </div>

   </div><!-- Fin de la modal para mostrar el registro de usuario-->
</div><!-- Fin del header_fondo-->













   <div id="aparecer"> <!-- Contenedor de todo el texto que va a ir apareciendo-->

      <!--SECCIÓN 1 -->

   <div><!--Div de 1 seccion-->
      <h2 class="subtemas">¿Por qué llevar un diario emocional?</h2>
      <p class="palabra"> Llevar un diario emocional es una práctica poderosa que puede ayudarte a comprender <br>y gestionar tus emociones de manera más efectiva.</p>

      <div id="cuadros"><!--div de los cuadros de la 1era seccion-->
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
   </div><!--Fin div seccion 1-->


        <!--SECCIÓN 2 -->

    <div id="explicacion"><!-- Contenedor de explicacion del sitio -->
      <h2 class="exsubtema">¿Cómo funciona nuestra plataforma?</h2>
      <p class="palabra2">Nuestra plataforma está diseñada para ayudarte a llevar un diario emocional <br>de manera fácil y segura. Aquí te explicamos cómo funciona:</p>

      <div id="funcionamiento"><!--Div de todo los pasos-->
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
      </div><!--final del div de todos los pasos-->
   </div><!--Div de final de explicación del sitio-->


          <!--SECCIÓN 3 -->

   <div><!--Consejos de El Faro Emocional-->
     <h2 class="subtema3">Consejos por El Faro Emocional</h2>
        <p class="palabra3">Aquí tienes algunos consejos para aprovechar al máximo tu diario emocional:</p>
       
    <div class="consejos"><!-- Contenedor de los consejos-->
       
        <div id="consejos_primeros"><!-- Contenedor de los primeros dos consejos-->
             <div class="consejo1">
                <h3 class="razones2">Sé Honesto</h3>
                <p class="rtexto2">Escribe sin juzgarte. La honestidad contigo mismo es <br> clave para el crecimiento personal.</p>
                <hr id="hr1">
             </div>

              <br>
              <br>
              <br>

            <div class="consejo2">
                <h3 class="razones2">Escribe Regularmente</h3>
                <p class="rtexto2">Intenta escribir en tu diario todos los días o al menos varias veces a la semana para mantener un seguimiento constante de tus emociones.</p>
                <hr id="hr2">
            </div>
         
          </div><!-- Fin de los primeros dos consejos-->

          <div id="consejos_segundos"><!-- Contenedor de los segundos dos consejos-->

            <div class="consejo3">
                <h3 class="razones2">Reflexiona sobre tus entradas</h3>
                <p class="rtexto2">Tómate el tiempo para leer tus entradas anteriores y reflexionar sobre tu progreso emocional.</p>
                <hr id="hr3">
            </div>
                <br>
                <br>
                <br>
            <div class="consejo4">
                <h3 class="razones2">Escribe conciente</h3>
                <p class="rtexto2">Este es un espacio para estar en el presente y visualizar tus emociones asi que tomate el tiempo para sentirlas.</p>
                <hr id="hr4">
            </div>

         </div><!-- Fin de los segundos dos consejos-->

   </div><!--Fin de consejos-->


       <!--SECCIÓN 4 -->
   <div id="parte4">
        <div id="parte4_1">
            <h2 id="subtema4">Comienza gratis</h2>
            <p id="palabra4">Crea una cuenta o inicia sesion para poder ingresar a tu diario emocional.</p>
       
            <div id="parte4_botones">
              <a href="#" id="abrirModal" class="boton"><h3>Registrate</h3></a>
            </div>

            <div class="parte4_iniciaSesion">
            <a href="#" id="abrirModal">Inicia sesion</a>
            </div>

        </div><!--Fin de parte4_1-->

   </div><!--Final seccion 4-->

   <button id="ArribaBTN"><img src="iconos.bienvenida/arriba.svg" alt=""></button>


    <!--Enlazamos el javascript-->
 <script src="bienvenida.js"></script>
</body>

<div id="fot2">
<footer><!--Agregamos nuestro footer-->

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" id="ola"><path fill="#a2d9ff" fill-opacity="4" d="M0,64L40,80C80,96,160,128,240,128C320,128,400,96,480,112C560,128,640,192,720,197.3C800,203,880,149,960,112C1040,75,1120,53,1200,64C1280,75,1360,117,1400,138.7L1440,160L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>

  <div class="foot">
  <div id="seccion2"><!--Contenedor de las secciones del footer-->
    <div id="seccion1">
       <h2>El Faro Emocional</h2>
       <h4>Creado para poder acompañarte día a día y tener un registro de tus emociones</h4>
    </div>
    

    <div id="seccion3">
      <div>
        <h3>Privacidad</h3>
        <div id="privacidad">
          <a href="privacidad.html" class="footer_links">Politica de Privacidad</a>
          <br>
          <br>
          <a href="privacidad" class="footer_links">Terminos de Seguridad</a>
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

  <a href=""><img src="iconos.bienvenida/instagram.png" id="instagram"></a>
</footer>
      </div>

</html>