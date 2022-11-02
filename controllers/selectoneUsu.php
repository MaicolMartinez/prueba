<?php
 require_once '../models/db.php';
 require_once '../models/usuario.php';

 $usu = new Usuario();
 $usu -> setNumDocumento($_GET['ID_USUARIO']);
 $usuario = $usu -> getOne();

?>