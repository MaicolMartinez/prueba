function alerta(id) {
    var id = id;
    var opcion = confirm("Desea Eliminar ");
    if (opcion == true) {
      window.location.href = "../controllers/usuario/deleteuser.php?DOCUMENTO_DE_IDENTIFICACION="+id;
    }
}