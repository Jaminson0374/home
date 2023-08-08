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
        let btnAtributo = textNom.getAttribute('accionBtn')
        
        if (btnAtributo === textIni)
          textNom.setAttribute('btnAtributo') = textCambio;
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

/*Selecionar un option por defectoa*/
function select(){
			/*Seleccionar una opción en el Selec2*/
			$('#tiposervicio_id').val(jamin).trigger('change.select2');

			/*Seleccionar una opción en el Select normal*/
			var status = $("#tiposervicio_id").val(jamin).val();
			$("#tiposervicio_id option").filter("[value=" + status + "]").attr("selected", "selected");	

}

function crearJson(){  //Se genera un Json con varios datos para agregar en un solo campo

 	//Con este for recorremos el select o los input que tiene la clase .agregarProducto que se almacená en la var descripcion
   for (var i = 0; i < descripcion.length; i++) {   
  	
    //con el push(), le agragamos elementos con sus respectivos indices al arra vacío listaProductos, en este caso se los agregaremos en 
    //formato json.
    //$(descripcion) lo tomamos del val que tenga la clas agregarProducto
  listaProductosVta.push({"id" : $(descripcion[i]).attr("idProducto"), 
             "cod_producto" : $(descripcion[i]).attr("codProducto"),
              "descripcion" : $(descripcion[i]).val(),
              "cantidad" : $(cantidad[i]).val(),
              "stock" : $(cantidad[i]).attr("newStock"),
              "pventa" : $(precio[i]).attr("precioReal"),
              "vlr_final" :  $(precio[i]).val(),
              "iva" :  $(vrIva[i]).val(),
              "descuento" :  $(vrDesc[i]).val()

            });
       
        //console.log("listaProductos",JSON.stringify(listaProductos));
      }

        //CON JSON.stringify se convierta la cadena JSON a una caena de String para poderla almacenar en DB
        //Aqui le digo que listaProductos (es la cadena Json que está con el push) se le asigne a #listaPrductos
        $("#listaProductosVta").val(JSON.stringify(listaProductosVta));

          // console.log('$("#listaProductosVta")',$("#listaProductosVta"));

}

function fechas(fecha_ini, fecha_fin)
  {
    /*NUMERO DE DIAS ENTRE FECHAS*/
    function cambioFecha(){
      let fechaIni  = moment(document.getElementsByName('fecha_ingreso')[0].value).format('MM/DD/YYYY');
      let fechaFin = moment(document.getElementsByName('fecha_retiro')[0].value).format('MM/DD/YYYY');

      let numDias = moment(fechaFin).diff(moment(fechaIni), 'days');
      document.getElementsByName("num_dias")[0].value = numDias;
   }
}
//converti filas de tabla en json

// jQuery(document).ready(function() {
//   jQuery('#enviar').on('click', function() {
//       var filas = [];
//       $('#tablaFormula tbody tr').each(function() {
//       var medicamento = $(this).find('td').eq(0).text();
//       var cantidad = $(this).find('td').eq(1).text();
//       var posologia = $(this).find('td').eq(2).text();

//       var fila = {
//           medicamento,
//           cantidad,
//           posologia
//       };
//       filas.push(fila);
//       });
//       console.log(filas);
//   });
//   });



