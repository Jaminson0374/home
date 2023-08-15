function pruebaJs(){
$("#modalBuscarEvol2").modal({
    backdrop: 'static',
    keyboard: false,
    show: true
});
table = $('#tablaClientesEvol2').DataTable({
responsive: true,
serverSide: true,
destroy: false,
scroll: true,
scrollCollapse: true,
scrollY: '400px',
scrollx: true,
deferRender: true,
paging: true,
select: true,
bAutoWidth: false,
scrollCollapse: false,
"ajax": {
    "type": "GET",
    "url": "{{ URL::to('/empleadosListaShow') }}",
    "dataSrc": ""
},
"columns": [
    {"data": "nombre"},
    {"data": "apellidos"},
    {"data": "email"},
    {"data": "fecha_nacimiento"},     
    {"data": "telefonos"},
    {"data": "sexo"},
    {"data": "cargo"},                                           
],
 columnDefs: [{
        targets: 6,
        visible: true
    },
    {
        targets: 7,
        orderable: false,
        data: null,
        render: function(data, type, row, meta) {
            let fila = meta.row;
            let botones =
                `
            <button type='button' id='btnCaptura' class='btnCaptura btn btn-primary btn-md' data-dismiss="modal"><i class="fa fa-check-circle"></i></i></button>`
            return botones;
        }
    }
],
"destroy": true,
"language":{"url": "../resources/js/espanol.json"
}
}).draw()
//   return true

$('#tablaClientesEvol2').on("click", "button.btnCaptura", function () {
var datos = table.row($(this).parents("tr")).data();
let dataEvol = datos;
console.log(dataEvol)
funcLib.asignaValorEdit(dataEvol)

var btnGuardar = document.getElementById('btnSaveEmp');
btnGuardar.innerHTML = 'Actualizar'

document.getElementById('btnSaveEmp').disabled = true;
document.getElementById('btnEditEmp').disabled = false;
document.getElementById('btnCancelEmp').disabled = false;
document.getElementById('btnNewEmp').disabled = true;
document.getElementById('btnSearchEmp').disabled = true;
let btnDeleteEmpclick1 = document.getElementById('btnDeleteEmp')
btnDeleteEmpclick1.disabled = false
})

}
