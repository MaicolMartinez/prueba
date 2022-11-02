function alerta(id) {
    var id = id;
    var opcion = confirm("Desea Eliminar ");
    if (opcion == true) {
      window.location.href = "../controllers/estado/deleteesta.php?ID_ESTADO="+id;
    }
}