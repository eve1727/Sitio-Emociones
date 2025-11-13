
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyEmotions</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <!--Fuente de google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>

<header id ="inicio">
<p><!--Partes a las que el usuario puede ir-->
        <a href="registrar.php">Registrarse</a>
        <a href="inicio_sesion.php">Iniciar sesión</a>
        <a href="privado.php">Privado</a>
      </p>
   </header>

    <header id="encabezado">
        <h2>¡Hola! <br>
            Bienvenid@ a El Faro Emocional</h2>
    </header>
    <hr id="hr">

<div id="dos_partes"><!-- Contenedor para poner frase a un lado de elegir emocion-->


 <div id="contenedor"><!--Contenedor de elegir una emocion-->

    <form method="POST">

   
      <h2 id="QueEmocion">¿Cómo te sientes ahora?</h2>

      <div class="opciones">

      <!--Parte de php para guardar la emocion y mostrar mensaje de que se guardo-->
<?php

require_once "conexion2.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $emocion  = $_POST['sentimiento'];
//Recivimos la emocion que selecciono el usuario    

  $sql ="INSERT INTO diario (Emocion,fecha) VALUES (?, CURRENT_TIMESTAMP)";//Hacemos la consulta para insertar la emocion y la fecha actual

  $prepara = $conn->prepare($sql);

  if(!$prepara) {//Por si la consulta falla
     die ("Error al preparar la consulta: " .$conn->error);
    }else{
    $prepara->bind_param("s", $emocion);//Conectamos la variable del usuario con la de la base de datos
    if ($prepara->execute()) {
        echo "<h2 class='mensajeExito'>Estado de animo guardado ✅ </h2>";
    }else{
        die ("No se pudo ejecutar la sentencia");
    }
  }
}

?>

         <div id=contenedor2><!--Contenedor de las 5 primeras emociones-->

        <!-- Opción Feliz -->
        <input type="radio" name="sentimiento" id="feliz" value="feliz" >
        <label for="feliz" class="todos_circulo" style="background-color: #FEF9C3;">
        <div id="acomodoFeli">
          <div id="emojiFeli">☺️</div>
          <p>Feliz</p>
        </div>
        </label>

        <!-- Opción Emocionada -->
        <input type="radio" name="sentimiento" id="emocionada" value ="emocionada">
        <label for="emocionada" class="todos_circulo" style="background-color: #FFEDD6;">
        <div id="acomodoEmocionado">
          <div id="emojiEmocionado">🤩</div>
          <p>Emocionada</p>
          </div>
        </label>

        <!-- Opción Calmada -->
        <input type="radio" name="sentimiento" id="calmada" value ="calmada">
        <label for="calmada" class="todos_circulo" style="background-color: #DCFCE6;">
        <div id="acomodoCalmado">
          <div id="emojiCalmado">🙃</div>
          <p>Calmada</p>
        </div>
        </label>

        <!-- Opción Cansada -->
        <input type="radio" name="sentimiento" id="cansada" value ="cansada">
        <label for="cansada" class="todos_circulo" style="background-color: #DBE9FE;">
            <div id="acomodoCansado">
          <div id="emojiCansado">😴</div>
          <p>Cansada</p>
          </div>
        </label>

         
        <!-- Opción Neutral -->
        <input type="radio" name="sentimiento" id="neutral" value ="neutral" >
        <label for="neutral" class="todos_circulo" style="background-color:#F3F4F6;">
            <div id="acomodoNeutral">
          <div id="emojiNeutral">🥱</div>
          <p>Neutral</p>
          </div>
        </label>

</div>
<br>

<div id="contenedor3"><!--Contenedor de las 5 siguientes emociones-->
    
     <!-- Opción Enojada -->
    <input type="radio" name="sentimiento" id="enojada" value ="enojada">
    <label for="enojada" class="todos_circulo" style="background-color:#FBE7F3;">
        <div id="acomodoEnojado">
      <div id="emojiEnojado">😠</div>
      <p>Enojada</p>
      </div>
    </label>

     <!-- Opción Triste -->
    <input type="radio" name="sentimiento" id="triste" value ="triste">
    <label for="triste" class="todos_circulo" style="background-color:#DBE9FE;">
        <div id="acomodoTriste">
      <div id="emojiTriste">😢</div>
      <p>Triste</p>
      </div>
    </label>


    <!-- Opción Ansiosa -->
    <input type="radio" name="sentimiento" id="ansiosa" value ="ansiosa">
    <label for="ansiosa" class="todos_circulo" style="background-color:#F3E7FF;">
        <div id="acomodoAnsioso">
      <div id="emojiAnsioso">😬</div>
      <p>Ansiosa</p>
      </div>
    </label>

    <!-- Opción Confundida -->
    <input type="radio" name="sentimiento" id="confundida" value ="confundida">
    <label for="confundida" class="todos_circulo" style="background-color:#FFEDD6;">
        <div id="acomodoConfundido">
      <div id="emojiConfundido">🤨</div>
      <p>Confundida</p>
      </div>
    </label>


    <!-- Opción Pensativa -->
    <input type="radio" name="sentimiento" id="pensativa" value ="pensativa">
    <label for="pensativa" class="todos_circulo" style="background-color:#CBFBF2;">
        <div id="acomodoPensativo">
      <div id="emojiPensativo">🤔</div>
      <p>Pensativa</p>
      </div>
    </label>


</div>
  
<input type="submit" value="Guardar estado" id="enviar">



</form>
</div><!--Fin contenedor elegir emocion-->

</div>

</div><!--Fin contenedor de  las dos partes-->

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