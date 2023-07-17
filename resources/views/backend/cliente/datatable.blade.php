<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}

<!--    Datatables  -->
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>   --}}
    <link rel="stylesheet" href="{{asset('../resources/js/datatable_externa_1_10_20/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('../resources/js/datatable_externa_1_10_20/datatables.min.css')}}">
    <title></title>

    <style>
        table.dataTable thead {
            background: linear-gradient(to right, #4A00E0, #8E2DE2);
            color:white;
        }
    </style>

  </head>
  <body>
    <h2 class="text-center">Datatables</h2>
      
    <h3 class="text-center">Consumiendo datos desde MySQL con Ajax</h3>
    <label for="">Nombre</label>
    <input type="text" id="nomCliente" name="nomCliente">
    <label for="">Apellidos</label>
    <input type="text" id="apellidos" name="apellidos">
    <label for="">Id del cliente</label>
    <input type="text" name="idCliente" id="idCliente">

    <div class="container">
       <div class="row">
           <div class="col-lg-12">
            <table id="tablaClientes"  class="table table-bordered table-striped" style="width:100%">
                <thead>
                 <tr>
                    <th>Id</th>
                    <th>Num. Doc</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>                                
                    <th>Telefono</th>  
                    <th>Email</th>
                    <th>Servicio</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
           </div>
       </div> 
    </div>
 
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script>  --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> --}}
 <!--    Datatables-->
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>      --}}
    <script src="{{ asset('../resources/js/datatable_externa_1_10_20/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('../resources/js/datatable_externa_1_10_20/popper.min.js' ) }}"></script>
    <script src="{{ asset('../resources/js/datatable_externa_1_10_20/bootstrap.min.js') }}"></script>
    <script src="{{ asset('../resources/js/datatable_externa_1_10_20/datatables.min.js') }}"></script>
    
    <script src="{{ asset('../resources/js/datatable.js') }}"></script>
    <script>
     
    let espanol = idioma()
    var buscarClientes = function(){
        let table = $('#tablaClientes').addClass("nowrap").DataTable({
            "destroy": true,
            "ajax": {
                "url": "{{URL::to('/buscar-cliente-basicos')}}",
                "dataSrc": ""
            },
            "columns": [
                { "data": "id" },
                { "data": "num_documento" },
                { "data": "nombre" },
                { "data": "apellidos" },
                { "data": "telefonos_user" },
                { "data": "email_user" },
                { "data": "descripcion" },

            ],
            columnDefs: [
                { targets: 6, visible: true },
                {
                    targets: 7,
                    orderable: false,
                    data: null,
                    render: function (data, type, row, meta) {
                        let fila = meta.row;
                        let botones = `
                         <button type='button' class='editar btn btn-primary btn-xs'><i class='fa fa-pencil'></i>Editar</button>
                         <button type='button' class='eliminar btn btn-danger btn-xs'><i class='fa fa-trash'></i>Eliminar</button>`
                        return botones;
                    }
                }

            ],
            "language": espanol
        });
        obtener_data_buscar("#tablaClientes tbody", table);
    }

    let obtener_data_buscar = function (tbody, table) {
        $(tbody).on("click", "button.editar", function () {
            let data = table.row($(this).parents("tr")).data();
            console.log(data)
            idCliente = $("#idCliente").val(data.id);
            $("#nomCliente").val(data.nombre);
            $("#apellidos").val(data.apellidos);
        })
        
    }
    obtener_data_buscar()
    buscarClientes()
    </script>
      
  </body>
</html>

