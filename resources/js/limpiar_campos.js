// window.addEventListener('load', () => {
    selectorCancelar = document.getElementById('cancelarProceso')
    selectorCancelar.addEventListener("click", () => {
        alert('hola')

        var cajas_ya_activadas = new Array();

        function asignar_evento (x,y,z) {
            if (x.addEventListener) { x.addEventListener(y,z,false); } else { x.attachEvent('on'+y,z); } 
        }

        function asignar_escuchas_cajas(){
            var inputs = document.getElementsByTagName('input');
            var textareas = document.getElementsByTagName('textarea');
            var select = document.getElementsByTagName('select');
            for (var h=0;h<inputs.length;h++){
                if(inputs[h].type=='text'){ asignar_evento(inputs[h],'focus',limpiar); }
            }
            for (var i=0;i<textareas.length;i++){
                asignar_evento(textareas[i],'focus',limpiar);
            }
            for (var j=0;i<select.length;j++){
                asignar_evento(select[j],'focus',limpiar);
            }	
        }

        function limpiar(evento){
            if(document.addEventListener){ var caja_a_limpiar = this; } else { var caja_a_limpiar = evento.srcElement; }
            var nueva = 1;
            for(var j=0;j<cajas_ya_activadas.length;j++){
                if(caja_a_limpiar==cajas_ya_activadas[j]){ nueva = 0; }
            }
            if(nueva){
                caja_a_limpiar.value = '';
                cajas_ya_activadas[cajas_ya_activadas.length] = caja_a_limpiar;
            }
        }		
        asignar_evento(window,'load',asignar_escuchas_cajas);
    })
// })
