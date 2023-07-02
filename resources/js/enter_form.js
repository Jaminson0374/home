/* SCRIPT PARA QUE AL PRESIONAR EL ENTER, SALTE AL SIGUIENTE CAMPO*/

document.addEventListener('keypress', function(evt) {

  // Si el evento NO es una tecla Enter
  if (evt.key !== 'Enter') {
    return;
  }
  
  let element = evt.target;

  // Si el evento NO fue lanzado por un elemento con class "focusNext"
  if (!element.classList.contains('focusNext')) {
    return;
  }

  // AQUI logica para encontrar el siguiente
  let tabIndex = element.tabIndex + 1;
  var next = document.querySelector('[tabindex="'+tabIndex+'"]');

  // Si encontramos un elemento
  if (next) {
    next.focus();
    evt.preventDefault();
  }
});