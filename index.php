
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
            Bienvenid@ a MyEmotions</h2>
    </header>
    <hr id="hr">

<div id="dos_partes"><!-- Contenedor para poner frase a un lado de elegir emocion-->

 <div id="contenedor"><!--Contenedor de elegir una emocion-->

    <form method="POST">
   
      <h2 id="QueEmocion">¿Cómo te sientes ahora?</h2>

      <p id="proceso">(Edit: En proceso)</p>
         <div id=contenedor2><!--Contenedor de las 5 primeras emociones-->

        <!-- Opción Feliz -->
        <input type="radio" name="feliz" class="no_radio" >
        <label for="feliz" class="todos_circulo" style="background-color: #FEF9C3;">
        <div id="acomodoFeli">
          <div id="emojiFeli">☺️</div>
          <p>Feliz</p>
        </div>
        </label>

        <!-- Opción Emocionada -->
        <input type="radio" name="emocionado" class="no_radio">
        <label for="emocionado" class="todos_circulo" style="background-color: #FFEDD6;">
        <div id="acomodoEmocionado">
          <div id="emojiEmocionado">🤩</div>
          <p>Emocionada</p>
          </div>
        </label>

        <!-- Opción Calmada -->
        <input type="radio" name="calmado" class="no_radio">
        <label for="calmado" class="todos_circulo" style="background-color: #DCFCE6;">
        <div id="acomodoCalmado">
          <div id="emojiCalmado">🙃</div>
          <p>Calmada</p>
        </div>
        </label>

        <!-- Opción Cansada -->
        <input type="radio" name="cansado" class="no_radio">
        <label for="cansado" class="todos_circulo" style="background-color: #DBE9FE;">
            <div id="acomodoCansado">
          <div id="emojiCansado">😴</div>
          <p>Cansada</p>
          </div>
        </label>

         
        <!-- Opción Neutral -->
        <input type="radio" name="neutral" class="no_radio">
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
    <input type="radio" name="neutral" class="no_radio">
    <label for="neutral" class="todos_circulo" style="background-color:#FBE7F3;">
        <div id="acomodoEnojado">
      <div id="emojiEnojado">😠</div>
      <p>Enojada</p>
      </div>
    </label>

     <!-- Opción Triste -->
    <input type="radio" name="neutral" class="no_radio">
    <label for="neutral" class="todos_circulo" style="background-color:#DBE9FE;">
        <div id="acomodoTriste">
      <div id="emojiTriste">😢</div>
      <p>Triste</p>
      </div>
    </label>


    <!-- Opción Ansiosa -->
    <input type="radio" name="neutral" class="no_radio">
    <label for="neutral" class="todos_circulo" style="background-color:#F3E7FF;">
        <div id="acomodoAnsioso">
      <div id="emojiAnsioso">😬</div>
      <p>Ansiosa</p>
      </div>
    </label>

    <!-- Opción Confundida -->
    <input type="radio" name="neutral" class="no_radio">
    <label for="neutral" class="todos_circulo" style="background-color:#FFEDD6;">
        <div id="acomodoConfundido">
      <div id="emojiConfundido">🤨</div>
      <p>Confundida</p>
      </div>
    </label>


    <!-- Opción Pensativa -->
    <input type="radio" name="neutral" class="no_radio">
    <label for="neutral" class="todos_circulo" style="background-color:#CBFBF2;">
        <div id="acomodoPensativo">
      <div id="emojiPensativo">🤔</div>
      <p>Pensativa</p>
      </div>
    </label>


</div>
  
<input type="submit" value="Guardar estado" id="enviar">

</form>
</div><!--Fin contenedor elegir emocion-->

  <div style="dysplay:flex"><!--Contenedor de la frase del dia-->
  
    <div id="frase_contenedor">
     <h3>Frase del día</h3>
    </div>

    <div id="frase">
     <p>"Que tu autoexigencia no te impida disfrutar de todo lo que lograste"</p>
     <p>anonimo.</p>
   </div>

</div><!--Fin contenedor de la frase del dia-->

</div><!--Fin contenedor de  las dos partes-->

</body>

<footer>
  <div class="foot"><!--Contenedor del footer-->
  <div id="seccion2"><!--Contenedor de las secciones del footer-->
    <div id="seccion1"><!--Contenedor de la primera seccion-->
       <h2>MyEmotions</h2>
       <p>Creado para poder acompañarte día a día <br>y tener un registro de tus emociones</p>
    </div>
    

      <div>
        <h3>Privacidad</h3>
        <div id="privacidad">
          <a href="privacidad" class="footer_links">Politica de Privacidad</a>
          <p><a href="privacidad" class="footer_links">Terminos de Seguridad</a></p>
        </div>
      </div>

      <div class="espacio">
        <h3 ><a href="inicio_sesion.php" class="footer_links">Inicia Sesion</a></h3>
      </div>

      <div class="espacio2">
        <h3>Nuestras redes</h3>
           <p>Instagram</p>
      </div>
        
    </div>
  </div>
</footer> 
</html>