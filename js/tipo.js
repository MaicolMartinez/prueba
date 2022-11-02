
function alerta(id) {
    var id = id;
    var opcion = confirm("Desea Eliminar ");
    if (opcion == true) {
      window.location.href = "../controllers/tipos/deletetip.php?ID_TIPO_EQUIPO="+id;
    }
}