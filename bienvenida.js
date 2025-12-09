// Seleccionamos todos los elementos <p> dentro del contenedor #aparecer
const paragraphs = document.querySelectorAll('#aparecer p, #aparecer h2');
// 'paragraphs' tiene todos los párrafos y encabezados h2 dentro del div con id 'aparecer'

//En esto vemos cuando un parrafo esta visible en la pantalla 
const observer = new IntersectionObserver(
  (entries) => {
    // 'entries' es un array de objetos, cada uno corresponde a un elemento observado
    entries.forEach(entry => {
      // entry.isIntersecting es true si el elemento es visible (aunque sea parcial)
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        // Si el párrafo está (al menos un poco) visible en la pantalla,
        // se le añade la clase 'visible'
      } else {
        entry.target.classList.remove('visible');
        // Si el párrafo deja de ser visible, se elimina la clase 'visible'
      }
    });
  }, 
);

// Recorremos cada párrafo y lo registramos en el observer.
// Así, cada uno será monitoreado de forma independiente.
paragraphs.forEach(p => observer.observe(p));
// Cuando un párrafo entra o sale de la zona visible, IntersectionObserver ejecuta la función definida arriba.




// Para la modal
// Obtener elementos del html
const modal = document.getElementById("miModal"); // Selecciona el contenedor de la ventana emergente
const btn = document.getElementById("abrirModal"); // Selecciona el enlace que abre la ventana emergente
const span = document.getElementsByClassName("cerrar-modal")[0]; // Selecciona el botón "X" para cerrar la ventana


// Cuando el usuario hace clic en el enlace, se muestra la ventana emergente
btn.onclick = function() {
    modal.style.display = "block"; // Cambia el estilo de la ventana emergente a visible
}

// Cuando el usuario hace clic en el botón de cerrar, se oculta la ventana emergente
span.onclick = function() {
    modal.style.display = "none"; // Cambia el estilo de la ventana emergente a oculto
}


// Si el usuario hace clic fuera del contenido de la ventana emergente, se oculta
window.onclick = function(event) {
    if (event.target == modal) { // Si el clic lo da en el fondo oscuro 
        modal.style.display = "none"; // Se oculta la ventana emergente
    }
}


//CODIGO PARA QUE FUNCIONE EL BOTON DE IR ARRIBA

const toTopBtn = document.getElementById("ArribaBTN");
// Obtiene el botno por su ID

//Evento para mostrar u ocultar el botón "Ir arriba" basado en scroll
window.addEventListener("scroll", () => {
  if (window.scrollY > 100) {
      // Si el usuario ha hecho scroll hacia abajo más de 100px
      toTopBtn.style.display = "block";
      // se cambia el estilo del botón para mostrarlo

  } else {
      // Si el scroll está en 100px o menos
      toTopBtn.style.display = "none";
      // ...se oculta el botón (display:none).
  }
});

// 
toTopBtn.addEventListener("click", () => {
  // Cuando el usuario da clic en el botón "Ir arriba", se ejecuta esta función.
  window.scrollTo({
    top: 0,              // Posición vertical a la que se quiere ir: inicio (0px)
    behavior: "smooth"   // Efecto de desplazamiento suave (no brusco)
});
});