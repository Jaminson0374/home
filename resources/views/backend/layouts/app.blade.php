<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Fundación Hogar la Roca | Dashboard</title>
    
  <!-- Google Font: Source Sans Pro -->
     <!-- Google Font: Source Sans Pro -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  

     <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('backend/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    
  {{-- <link rel='stylesheet' href="{{asset('backend/dist/css/font-awesome.min.css')}}"> --}}


  
  <!-- dropzonejs -->
 <link rel="stylesheet" href="{{asset('backend/plugins/dropzone/min/dropzone.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">

  <!-- Jaminson - Tooltip Inf. -->
  {{-- <link rel="stylesheet" href="{{asset('backend/plugins/css/estilos_personalizados.css')}}"> --}}

  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('toastr/toastr.min.css')}}">
  <link rel="stylesheet" href="{{asset('sweetalert2/sweetalert2.min.css')}}">

   <!-- DataTables -->
   <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
   <link rel="stylesheet" href="{{asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
   <link rel="stylesheet" href="{{asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  
    <!-- Plugin de DataTable Externa -->
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <!--    Datatables  -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
 
</head>
<!-- dark-mode -->
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{asset('backend/dist/img/fundahogarlaroca.jpg')}}" alt="" height="60" width="60">
  </div>

  <!-- Navbar -->
    @include('backend.layouts.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('backend.layouts.sidebar')
  @yield('content')
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Derechos reservados &copy; 2023 <a href="https://www.fundaroca.org/">PC-Soft.com.co</a>.</strong>
    todos los derechos reservados.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


<!-- jQuery -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('backend/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('backend/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('backend/plugins/chart.js/Chart.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
//{{-- <!-- <script src="{{asset('backend/dist/js/demo.js')}}"></script> --> --}}

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('backend/dist/js/pages/dashboard2.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('backend/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('backend/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>


<script src="{{asset('backend/dist/js/adminlte.js')}}"></script>

<!-- Bootstrap Switch -->
<script src="{{asset('backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<!-- dropzonejs -->
<script src="{{asset('backend/plugins/dropzone/min/dropzone.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
{{-- <script src="{{ asset('../resources/js/save_dato_basico.js') }}"></script> --}}

<!-- overlayScrollbars -->
<script src="{{asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->


<!-- Select2 -->
<script src="{{asset('backend/plugins/select2/js/select2.full.min.js')}}"></script>

<!-- toastr -->
<script src="{{asset('toastr/toastr.min.js')}}"></script>
<script src="{{asset('sweetalert2/sweetalert2.all.min.js')}}"></script>

<!-- ./Plugin DataTable Externa -->
{{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> --}}
<!--    Datatables-->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  

{{-- <script src="{{asset('../resources/js/funciones.js')}}"></script> --}}


<script>

    @if(Session::has('messege'))

        var type="{{Session::get('alert-type','info')}}"

        switch(type){
            case 'info':
                toastr.info("{{Session::get('messege')}}");
                break;
                case 'success':
                toastr.success("{{Session::get('messege')}}");
                break;
                case 'warning':
                toastr.warning("{{Session::get('messege')}}");
                break;
                case 'error':
                toastr.error("{{Session::get('messege')}}");
                break;
        }
    @endif
    </script>

<script>
$(document).on("click", "#delete", function(e){
    e.preventDefault();
    var link = $(this).attr("href");
    Swal.fire({
        title: "Está seguro de eliminar el registro?",
        text: "Una vez eliminado, no podrá recuperarlo",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminarlo!'
    })
    .then((result) =>{
        if (result.isConfirmed){

            // Swal.fire('Eliminado!',
            // 'El registro ha sido eliminado.',
            // 'success');
            window.location.href = link;
        }else{
            Swal.fire('Cancelado!',
            'Se canceló la Eliminación.',
            'warning');
        }

    });
});

</script>
<!-- fin de Toastr -->

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    })

    // $("#example1").DataTable({
    //   "responsive": true, "lengthChange": false, "autoWidth": false,
    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });


  $(document).on("click", "#btnsalir_edit", function(e){
    e.preventDefault();
    var link2 = $(this).attr("href");
    window.location.href = link2
});

$(document).on("click", "#btnsalir_new", function(e){
    e.preventDefault();
    var link2 = $(this).attr("href");
    window.location.href = link2
});

$("input[data-bootstrap-switch]").each(function(){
    $(this).bootstrapSwitch('state', $(this).prop('checked'));
  });

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })


</script>
<!-- <script src="{{asset('toastr/toaster.js')}}"></script> -->

</body>
</html>
