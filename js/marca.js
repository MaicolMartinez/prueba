function alerta(id) {
    var id = id;
    var opcion = confirm("Desea Eliminar ");
    if (opcion == true) {
      window.location.href = "../controllers/marca/deletemar.php?ID_MARCA="+id;
    }
}