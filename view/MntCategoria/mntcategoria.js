function init() {
  $("#mantenimiento_form").on("submit", function (e) {
    guardaryeditar(e);
  });
}

function guardaryeditar(e) {
  e.preventDefault();
  var formData = new FormData($("#mantenimiento_form")[0]);
  $.ajax({
    url: "../../controller/categoria.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (data) {
      $("#table_data").DataTable().ajax.reload();
      $("#modalmantenimiento").modal("hide");

      swal.fire({
        title: "Categoria",
        text: "Registro Confirmado",
        icon: "success",
      });
    },
  });
}

$(document).ready(function () {
  $("#table_data").DataTable({
    aProcessing: true,
    aServerSide: true,
    dom: "Bfrtip",
    buttons: ["copyHtml5", "excelHtml5", "csvHtml5"],
    ajax: {
      url: "../../controller/categoria.php?op=listar",
      type: "get",
    },
    bDestroy: true,
    responsive: true,
    bInfo: true,
    iDisplayLength: 10,
    order: [[0, "desc"]],
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
  });
});

function editar(cat_id) {
  $.post(
    "../../controller/categoria.php?op=mostrar",
    { cat_id: cat_id },
    function (data) {
      data = JSON.parse(data);
      $("#cat_id").val(data.cat_id);
      $("#cat_nom").val(data.cat_nom);
    }
  );
  $("#lbltitulo").html("Editar Registro");
  $("#modalmantenimiento").modal("show");
}

function eliminar(cat_id) {
  Swal.fire({
    title: "Eliminar!",
    text: "Desea Eliminar el Registro?",
    icon: "error",
    confirmButtonText: "Si",
    showCancelButton: true,
    cancelButtonText: "No",
  }).then((result) => {
    if (result.value) {
      $.post(
        "../../controller/categoria.php?op=eliminar",
        { cat_id: cat_id },
        function (data) {}
      );
      $("#table_data").DataTable().ajax.reload();

      swal.fire({
        title: "Categoria",
        text: "Registro Eliminado",
        icon: "success",
      });
    }
  });
}

$(document).on("click", "#btnnuevo", function () {
  $("#cat_id").val("");
  $("#cat_nom").val("");
  $("#lbltitulo").html("Nuevo Registro");
  $("#mantenimiento_form")[0].reset();
  $("#modalmantenimiento").modal("show");
});

init();
