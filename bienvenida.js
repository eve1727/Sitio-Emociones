// Seleccionamos todos los elementos <p> dentro del contenedor #aparecer
const paragraphs = document.querySelectorAll('#aparecer p, #aparecer h2');
// 'paragraphs' será un NodeList con todos los párrafos del contenido.

// Creamos un nuevo IntersectionObserver, que nos permite detectar
// si un elemento (en este caso cada párrafo) entra o sale del viewport (zona visible de la pantalla).
const observer = new IntersectionObserver(
  (entries) => {
    // 'entries' es un array de objetos, cada uno corresponde a un elemento observado
    entries.forEach(entry => {
      // entry.isIntersecting es true si el elemento es visible (aunque sea parcial)
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        // Si el párrafo está (al menos un poco) visible en el viewport,
        // se le añade la clase 'visible', que normalmente activa el fade-in en CSS.
      } else {
        entry.target.classList.remove('visible');
        // Si el párrafo deja de ser visible, se elimina la clase 'visible'
        // Esto activa el fade-out en CSS.
      }
    });
  }, 
);

// Recorremos cada párrafo y lo registramos en el observer.
// Así, cada uno será monitoreado de forma independiente.
paragraphs.forEach(p => observer.observe(p));
// Cuando un párrafo entra o sale de la zona visible, IntersectionObserver ejecuta la función definida arriba.




// Para la modal
// Obtener elementos del DOM
const modal = document.getElementById("miModal"); // Selecciona el contenedor de la ventana emergente
const btn = document.getElementById("abrirModal"); // Selecciona el enlace que abre la ventana emergente
const span = document.getElementsByClassName("cerrar-modal")[0]; // Selecciona el botón "X" para cerrar la ventana

// ====== Mostrar la ventana emergente ======
// Cuando el usuario hace clic en el enlace, se muestra la ventana emergente
btn.onclick = function() {
    modal.style.display = "block"; // Cambia el estilo de la ventana emergente a visible
}

// ====== Cerrar la ventana emergente con el botón "X" ======
// Cuando el usuario hace clic en el botón de cerrar, se oculta la ventana emergente
span.onclick = function() {
    modal.style.display = "none"; // Cambia el estilo de la ventana emergente a oculto
}

// ====== Cerrar la ventana emergente al hacer clic fuera del contenido ======
// Si el usuario hace clic fuera del contenido de la ventana emergente, se oculta
window.onclick = function(event) {
    if (event.target == modal) { // Si el clic ocurre en el fondo oscuro (modal)
        modal.style.display = "none"; // Se oculta la ventana emergente
    }
}