function alerta(id) {
    var id = id;
    var opcion = confirm("Desea Eliminar ");
    if (opcion == true) {
      window.location.href = "../controllers/inventario/delete.php?ID_SERIAL="+id;
    }
}
