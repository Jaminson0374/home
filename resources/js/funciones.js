// class Funciones {
  /******************************************************
 * VENTANA DE CONFIRMACION DE ABANDONO DEL FORMULARIO *
 ******************************************************/
  function salirFormulario() {
    window.addEventListener('load', () => {

      window.addEventListener("beforeunload", (evento) => {
        if (true) {
          evento.preventDefault();
          evento.returnValue = "";
          return "";
        }
      });
    });
  }

  /**************************************************
   * IR AL SIGUIENTE CAMPO AL PRESIONAR ENTER
   ***************************************************/
  function saltarEnter() {
    window.addEventListener('load', () => {
      document.addEventListener('keypress', function (evt) {

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
        var next = document.querySelector('[tabindex="' + tabIndex + '"]');

        // Si encontramos un elemento
        if (next) {
          next.focus();
          evt.preventDefault();
        }
      });
    });
  }

  function saltarEnterForm() {
    // alert('hola presionaste enter')

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
            var next = document.querySelector('[tabindex="' + tabIndex + '"]');

            // Si encontramos un elemento
            if (next) {
                next.focus();
                event.preventDefault();
            }
        });
}
saltarEnterForm()
  /********************************************************
    FUNCION PARA FORMATEAR CIFRAS
  ********************************************************/
  function number_format(amount, decimals) {
    window.addEventListener('load', () => {
      amount += ''; // por si pasan un numero en vez de un string
      amount = parseFloat(amount.replace(/[^0-9\.-]/g, '')); // elimino cualquier cosa que no sea numero o punto

      decimals = decimals || 0; // por si la variable no fue fue pasada

      // si no es un numero o es igual a cero retorno el mismo cero
      if (isNaN(amount) || amount === 0)
        return parseFloat(0).toFixed(decimals);

      // si es mayor o menor que cero retorno el valor formateado como numero
      amount = '' + amount.toFixed(decimals);

      var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;

      while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

      return amount_parts.join('.');
    })
  }

  /********************************************************
    FUNCION PARA CAMBIAR EL TEXTO DE LOS BOTONES
  ********************************************************/
    function cambioTextBotton(nomBotton, textIni, textCambio) {
      // window.addEventListener('load', () => {
        let textNom = document.getElementById(nomBotton);
        if (textNom.innerHTML == textIni)
          textNom.innerHTML = textCambio;
        // else textNom.innerHTML = textIni;
      // })
      
    }


     /*************************************************************
obtener el valor d una celda al hacer doble click  con js
*************************************************************/
  // var table = $('#tabla_busquedaMov').DataTable();
  // $('#tabla_busquedaMov tbody').on('dblclick', 'tr', function () {
  //     var data = table.row( this ).data();
  //     alert(data[1])
  //     // $("#tabla_busquedaMov").DataTable().draw()
  // })


  /***************************************************************
   * CAPTURAR LOS DATA DE CADA COLUMNA DE LA FILA DEL btnSelec editar
   * ************************************************************/
  /*
       btnEdiObtenerData = function(tbody, tableProdBtnEdit){
         const codProveEdit ="";
       $(tbody).on("click", "button.btnEditar", function(){
           document.getElementById("accionBotones").value="btnEditaraProdProd"
           $('#modalEditarProducto').modal({ keyboard: false, show: true});
           $('#modalEditarProducto .modal-dialog').draggable({handle: ".modal-header"}); 			
           let data2 = tableProdBtnEdit.row( $(this).parents("tr")).data()
 
           let idProd = data2[0]    
       })
     }               */

// }

function tuEdadReal100(fecha) {
  var hoy = new Date();
  var cumpleanos = new Date(fecha);
  var edad = hoy.getFullYear() - cumpleanos.getFullYear();
  var m = hoy.getMonth() - cumpleanos.getMonth();

  if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
      edad--;
  }

  return edad;
}
