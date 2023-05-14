$(document).on("click", "#delete", function(e){
    alert("jakasdkA")
    e.preventDefault();
    var link = $(this).attr("href");
    swal({
        title: "Está seguro de eliminar el registro?",
        text: "Una vez eliminado, no podrá recuperarlo",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) =>{
        if (willDelete){
            windows.location.href = link;
        }else{
            swal("!El registro ha sido eliminado!")
        }
    });
});
